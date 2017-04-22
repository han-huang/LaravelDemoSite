<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\ClientException;

class MultithreadingRequest extends Command
{
    private $totalPageCount;
    private $counter        = 1;
    private $concurrency    = 7;  // 同時併發抓取

    private $users = [
                        'CycloneAxe',
                        'appleboy',
                        'Aufree',
                        'lifesign',
                        'overtrue',
                        'zhengjinghua',
                        'NauxLiu'
                     ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:multithreading-request';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->totalPageCount = count($this->users);

        $options['verify']=false;//取消驗證ca證書等
        $client = new Client($options);
        //print_r($client->getConfig());

        $requests = function ($total) use ($client) {
            foreach ($this->users as $key => $user) {
                $uri = 'https://api.github.com/users/' . $user;
                yield function () use ($client, $uri) {
                    return $client->getAsync($uri);
                };
            }
        };

        $pool = new Pool($client, $requests($this->totalPageCount), [
            'concurrency' => $this->concurrency,
            //完成
            'fulfilled'   => function ($response, $index) {
                $res = json_decode($response->getBody()->getContents());

                $info = "請求第 $index 個請求，用戶 ".$this->users[$index]." 的 Github ID 為：".$res->id;
                // $info = mb_convert_encoding($info, "GBK", "UTF-8");
                $this->info($info);

                $this->countedAndCheckEnded();
            },
            //拒絕
            'rejected' => function ($reason, $index) {
                $this->error("rejected");
                $this->error("rejected reason: " . $reason);
                $this->countedAndCheckEnded();
            },
        ]);

        // 開始發送請求
        $promise = $pool->promise();
        $promise->wait();
    }

    public function countedAndCheckEnded()
    {
        if ($this->counter < $this->totalPageCount) {
            $this->counter++;
            return;
        }
        $this->info("請求結束！");
    }
}
