<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use Excel;
use Log;
use Symfony\Component\DomCrawler\Crawler;
use App\Street;

class PostalStreetNameData extends Command
{
    private $postalIndex = 'http://www.post.gov.tw/post/internet/Postal/index.jsp?ID=207';

    private $postalUri = 'http://www.post.gov.tw/post/internet/Postal/streetNameData.jsp';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'postal:street';
    // protected $signature = 'postal:street {city=臺南市} {cityarea=安南區}';

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
        $array = $this->getPostalCity();
        // $array = $this->getCity();
        extract($array);
        $cityLength = count($city);
        $rows = [];
        $rows[0] = ['縣市', '鄉鎮市區', '道路或街名或村里名稱'];
        for ($i = 0; $i < $cityLength; $i++) {
            $count = $cityAreaCount[$i + 1] - $cityAreaCount[$i];
            $start = $cityAreaCount[$i] + 1;
            $end = $cityAreaCount[$i + 1];
            for ($j = $start; $j <= $end; $j++) {
                $this->info($city[$i]." ".$cityArea[$j]);
                $response = $this->requestPostalUri($city[$i], $cityArea[$j]);
                // $body = $response->getBody();
                $contents = $response->getBody()->getContents();
                if ($response) {
                    $xml = simplexml_load_string($contents);
                    $this->line($city[$i]." ".$cityArea[$j]." 總數：".count($xml->array->array0));
                    $streets = $xml->array->array0;
                    foreach ($streets as $street) {
                        // $this->info($street);
                        // $cols = [$city[$i], $cityArea[$j], $street];
                        $cols = [
                                    'county'   => $city[$i],
                                    'district' => $cityArea[$j],
                                    'street'   => $street
                                ];
                        $rows[] = $cols;
                    }
                } else {
                    $this->error(__FUNCTION__." No Response");
                    exit(2);
                }
            }
        }
        // print_r($rows);
        $this->createExcel($rows);
        // $this->exportToTable($rows);
    }

    /**
     * Export data to table streets.
     *
     * @param  array  $rows
     * @return void
     */
    public function exportToTable($rows)
    {
        // if (Street::all()->count()) {
            // foreach ($rows as $row) {
                // Street::firstOrCreate($row);
            // }
        // } else {
            // Street::insert($rows);
        // }
        //remove ['縣市', '鄉鎮市區', '道路或街名或村里名稱']
        array_shift($rows);
        foreach ($rows as $row) {
            $this->comment(implode(', ', $row));
            Street::firstOrCreate([
                'county'   => $row['county'],
                'district' => $row['district'],
                'street'   => $row['street']
            ]);
        }
    }

    /**
     * Send Request to PostalUri.
     *
     * @param  string  $city
     * @param  string  $cityArea
     * @return mixed
     */
    public function requestPostalUri($city, $cityArea)
    {
        $response = null;
        sleep(mt_rand(1, 2));
        // sleep(1);
        $client = new Client();
        try {
            $response = $client->request('POST', $this->postalUri, [
                'form_params' => [
                    'city'     => $city,
                    'cityarea' => $cityArea
                ],
                'timeout' => 5
            ]);
        } catch (RequestException $e) {
            $this->error(Psr7\str($e->getRequest()));
            if ($e->hasResponse()) {
                $this->error(Psr7\str($e->getResponse()));
            } else {
                $this->error(__FUNCTION__." No Response");
            }
            $this->error("city=".$city."&cityarea=".$cityArea);
            exit(1);
        }
        return $response;
    }

    /**
     * Create Excel.
     *
     * @param  array  $rows
     * @return void
     */
    public function createExcel($rows)
    {
        // print_r($rows);
        // date_default_timezone_set('Asia/Taipei');
        $now = date("YmdHis");
        Excel::create('street'.$now, function ($excel) use ($rows) {
            $excel->sheet('street', function ($sheet) use ($rows) {
                // Set width for multiple cells
                $sheet->setWidth(array(
                    'A'     =>  10,
                    'B'     =>  12,
                    'C'     =>  25
                ));
                $sheet->fromArray($rows, null, 'A1', false, false);
            });
        })->store('xlsx', storage_path('excel/exports'));
    }

    /**
     * Get Postal City.
     *
     * @return mixed
     */
    public function getPostalCity()
    {
        $client = new Client();
        // $url = 'http://www.post.gov.tw/post/internet/Postal/index.jsp?ID=207';
        // $response = $client->request('GET', $url);

        try {
            $response = $client->request('GET', $this->postalIndex, ['timeout' => 5]);
        } catch (RequestException $e) {
            $this->error(Psr7\str($e->getRequest()));
            if ($e->hasResponse()) {
                $this->error(Psr7\str($e->getResponse()));
            } else {
                $this->error(__FUNCTION__." No Response");
            }
            exit(1);
        }

        $html = $response->getBody()->getContents();
        // echo $body;
        $crawler = new Crawler($html);
        // echo $crawler->filter('select[name="city"]')->text();
        //$city = [];
        $city = $crawler->filter('select[name="city"]')->filter('option')->each(function (Crawler $node, $i) {
            // echo $i." ".$node->text().",";
            // echo gettype($i).' $i '.$node->text().",";
            // do not return index 0 - "請選擇縣市"
            if ($i) {
                return $node->text();
            }
        });

        // index 0 is empty value, Shift an element off the beginning of array
        array_shift($city);
        print_r($city);
        $pattern = '/^cityarea_account\[\d+\] = (.*);$/m';
        preg_match_all($pattern, $html, $matches);
        $cityAreaCount = $matches[1];
        print_r($cityAreaCount);

        $pattern = '/^cityarea\[\d+\] = \'(.*)\';$/m';
        preg_match_all($pattern, $html, $matches);
        array_unshift($matches[1], '');
        $cityArea = $matches[1];
        print_r($cityArea);
        return compact('city', 'cityArea', 'cityAreaCount');
    }
}
