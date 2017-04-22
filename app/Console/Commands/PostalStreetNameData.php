<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;

class PostalStreetNameData extends Command
{
    private $postalUri = 'http://www.post.gov.tw/post/internet/Postal/streetNameData.jsp';
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'postal:street';
    protected $signature = 'postal:street {city=臺南市} {cityarea=安南區}';

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
        $client = new Client();
        $response = $client->request('POST', $this->postalUri, [
            'form_params' => [
                // 'city'     => '臺南市',
                // 'cityarea' => '安南區'
                'city'     => $this->argument('city'),
                'cityarea' => $this->argument('cityarea')
            ]
        ]);
        $body = $response->getBody();
        // echo $body;
        // $xml = simplexml_load_string($response->getBody(),'SimpleXMLElement',LIBXML_NOCDATA);
        $xml = simplexml_load_string($response->getBody());
        // echo count($xml->array->array0)."\n";
        $this->line("總數：".count($xml->array->array0));
        $streets = $xml->array->array0;
        foreach ($streets as $street) {
            // echo $street."\n";
            $this->info($street);
        }
    }
}
