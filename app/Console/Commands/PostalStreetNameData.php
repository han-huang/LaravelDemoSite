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
     * @return void
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
                if ($response) {
                    $xml = simplexml_load_string($response->getBody());
                    $this->line($city[$i]." ".$cityArea[$j]." 總數：".count($xml->array->array0));
                    $streets = $xml->array->array0;
                    foreach ($streets as $street) {
                        // $this->info($street);
                        // $cols = [$city[$i], $cityArea[$j], $street];
                        $cols = [
                                    'county'   => "$city[$i]",
                                    'district' => "$cityArea[$j]",
                                    'street'   => "$street"
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
        $this->insertOrUpdateTable($rows);
    }

    /**
     * Send Request to PostalUri.
     *
     * @param  array  $rows
     * @return void
     */
    public function insertOrUpdateTable($rows)
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
        // sleep(mt_rand(1, 2));
        sleep(1);
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
     * Execute the console command.
     *
     * @return mixed
     */
    public function handleCreateOrAppendToExcel()
    {
        $array = $this->getCity();
        extract($array);
        $cityLength = count($city);
        // $rows = [];
        // $rows[0] = ['縣市', '鄉鎮市區', '道路或街名或村里名稱'];
        $filename = 'street'.date("YmdHis");
        // $filename = 'street20170424170921';
        for ($i = 0; $i < $cityLength; $i++) {
            $count = $cityAreaCount[$i + 1] - $cityAreaCount[$i];
            $start = $cityAreaCount[$i] + 1;
            $end = $cityAreaCount[$i + 1];
            for ($j = $start; $j <= $end; $j++) {
                $this->info($city[$i]." ".$cityArea[$j]);
                sleep(mt_rand(1, 2));
                $client = new Client();
                try {
                    $response = $client->request('POST', $this->postalUri, [
                        'form_params' => [
                            'city'     => $city[$i],
                            'cityarea' => $cityArea[$j]
                        ],
                        'timeout' => 5
                    ]);
                } catch (RequestException $e) {
                    // Log::info('Exception StatusCode: '.$response->getStatusCode());
                    // $this->info('Exception StatusCode: '.$response->getStatusCode());
                    $this->error(Psr7\str($e->getRequest()));
                    if ($e->hasResponse()) {
                        $this->error(Psr7\str($e->getResponse()));
                    }
                    exit(1);
                }

                $body = $response->getBody();
                $xml = simplexml_load_string($response->getBody());
                $this->line($city[$i]." ".$cityArea[$j]." 總數：".count($xml->array->array0));
                $streets = $xml->array->array0;
                $rows = [];
                foreach ($streets as $street) {
                    $rows[] = [$city[$i], $cityArea[$j], $street];
                }
                $this->createOrAppendToExcel($filename, $rows);
            }
        }
        // print_r($rows);
        // date_default_timezone_set('Asia/Taipei');
        // $now = date("YmdHis");
        // Excel::create('street'.$now, function ($excel) use ($rows) {
            // $excel->sheet('street', function ($sheet) use ($rows) {
                // Set width for multiple cells
                // $sheet->setWidth(array(
                    // 'A'     =>  10,
                    // 'B'     =>  12,
                    // 'C'     =>  25
                // ));
                // $sheet->fromArray($rows, null, 'A1', false, false);
            // });
        // })->store('xlsx', storage_path('excel/exports'));
    }

    /**
     * Create Or Append To Excel.
     *
     * @param  string $filename
     * @param  array  $rows
     * @return mixed
     *
     * @result
     * ini_set("memory_limit","1024M") or modify memory_limit to 1024M
     * in /etc/php/7.1/fpm/php.ini and /etc/php/7.1/cli/php.ini
     * but memory still exhausted
     *
     * PHP Fatal error:  Allowed memory size of 1073741824 bytes exhausted (tried to allocate 20480 bytes)
     * in /home/vagrant/Code/Laravel/public/crawler_install/vendor/phpoffice/phpexcel/Classes/PHPExcel.php on line 866
     * PHP Fatal error:  Allowed memory size of 1073741824 bytes exhausted (tried to allocate 32768 bytes)
     * in /home/vagrant/Code/Laravel/public/crawler_install/vendor/symfony/debug/Exception/FatalErrorException.php on line 1
     */
    public function createOrAppendToExcel($filename, $rows)
    {
        $file_path = storage_path('excel/exports/'.$filename.'.xlsx');
        $this->info($file_path);
        if (file_exists($file_path)) {
            Excel::load($file_path, function ($reader) use ($rows) {
                $reader->sheet('street', function ($sheet) use ($rows) {
                    // $sheet->appendRow($rows);
                    // $this->info(implode(', ', $rows));
                    $sheet->setWidth(array(
                        'A'     =>  10,
                        'B'     =>  12,
                        'C'     =>  25
                    ));

                    foreach ($rows as $row) {
                        // $this->info(implode(', ', $row));
                        $sheet->appendRow($row);
                    }
                });
            // use store, not export
            // })->export('xls');
            })->store('xlsx', storage_path('excel/exports'));
            // $this->info(implode(', ', $rows));
        } else {
            Excel::create($filename, function ($excel) use ($rows) {
                $excel->sheet('street', function ($sheet) use ($rows) {
                    // Set width for multiple cells
                    $sheet->setWidth(array(
                        'A'     =>  10,
                        'B'     =>  12,
                        'C'     =>  25
                    ));
                    $heading = ['縣市', '鄉鎮市區', '道路或街名或村里名稱'];
                    // $rows = array($heading, $rows);
                    // $sheet->fromArray($rows, null, 'A1', false, false);
                    // $rows = array_merge($heading, $rows);
                    $data = array();
                    $data[] = $heading;
                    foreach ($rows as $row) {
                        $data[] = $row;
                    }

                    $sheet->fromArray($data, null, 'A1', false, false);
                    // foreach ($streets as $street) {
                        // $sheet->appendRow($streets);
                    // }
                });
            })->store('xlsx', storage_path('excel/exports'));
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function previous()
    {
        $array = $this->getCity();
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
                // $cols = [$city[$i], $cityArea[$j]];
                // $rows[] = $cols;

                sleep(mt_rand(1, 2));
                $client = new Client();
                try {
                    // $this->info('$client->request');
                    // Log::info('$client->request '." ".__FILE__." ".__FUNCTION__." ".__LINE__);
                    $response = $client->request('POST', $this->postalUri, [
                        'form_params' => [
                            'city'     => $city[$i],
                            'cityarea' => $cityArea[$j]
                        ],
                        'timeout' => 5
                    ]);
                    // Log::info('$client->request end '." ".__FILE__." ".__FUNCTION__." ".__LINE__);
                } catch (RequestException $e) {
                    // Log::info('Exception StatusCode: '.$response->getStatusCode());
                    // $this->info('Exception StatusCode: '.$response->getStatusCode());
                    $this->error(Psr7\str($e->getRequest()));
                    if ($e->hasResponse()) {
                        $this->error(Psr7\str($e->getResponse()));
                    }
                    exit(1);
                }
                // $this->info('after $client->request');
                // Log::info('after $client->request '." ".__FILE__." ".__FUNCTION__." ".__LINE__);
                // $this->info('StatusCode: '.$response->getStatusCode());

                // Get all of the response headers.
                // foreach ($response->getHeaders() as $name => $values) {
                    // $this->info($name . ': ' . implode(', ', $values) . "\r\n");
                // }

                $body = $response->getBody();
                $xml = simplexml_load_string($response->getBody());
                $this->line($city[$i]." ".$cityArea[$j]." 總數：".count($xml->array->array0));
                $streets = $xml->array->array0;
                foreach ($streets as $street) {
                    // $this->info($street);
                    $cols = [$city[$i], $cityArea[$j], $street];
                    $rows[] = $cols;
                }
            }
        }
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
     * Execute the console command.
     *
     * @return mixed
     */
    public function old()
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
        // var_dump($city);
        // index 0 is empty value, Shift an element off the beginning of array
        array_shift($city);
        print_r($city);
        // $pattern = "/^cityarea_account\[[0-9]*\] = [0-9]*\;$/"; //fail
        // $pattern = "/^cityarea_account(.*?) = [0-9]+;$/"; //fail
        // $pattern = '/^cityarea_account\[\d+\] = (.*)$/m';
        $pattern = '/^cityarea_account\[\d+\] = (.*);$/m';
        // preg_match($pattern, $html, $matches);
        preg_match_all($pattern, $html, $matches);
        // print_r($matches);
        // exit(0);
        // $cityAreaCount = preg_replace('/;/', '', $matches[1]);
        $cityAreaCount = $matches[1];
        print_r($cityAreaCount);
        // exit(0);

        // $pattern = '/^cityarea\[\d+\] = (.*)$/m';
        // $pattern = '/^cityarea\[\d+\] = (.*);$/m';
        $pattern = '/^cityarea\[\d+\] = \'(.*)\';$/m';
        preg_match_all($pattern, $html, $matches);
        // print_r($matches);
        array_unshift($matches[1], '');
        // print_r($matches[1]);
        // $cityArea = preg_replace('/;/', '', $matches[1]);
        $cityArea = $matches[1];
        // $cityArea = preg_replace('/\'/', '', $cityArea);
        print_r($cityArea);
        // exit(0);
        return compact('city', 'cityArea', 'cityAreaCount');
    }

    /**
     * Get City.
     *
     * @return mixed
     */
    public function getCity()
    {
        $city = [
                    "基隆市",
                    "臺北市",
                    "新北市",
                    "桃園市",
                    "新竹市",
                    "新竹縣",
                    "苗栗縣",
                    "臺中市",
                    "彰化縣",
                    "南投縣",
                    "雲林縣",
                    "嘉義市",
                    "嘉義縣",
                    "臺南市",
                    "高雄市",
                    "屏東縣",
                    "臺東縣",
                    "花蓮縣",
                    "宜蘭縣",
                    "澎湖縣",
                    "金門縣",
                    "連江縣"
                ];
        $cityArea = [];
        $cityAreaCount = [];
        $cityAreaCount[0] = 0;
        $cityArea[1] = '仁愛區';
        $cityArea[2] = '信義區';
        $cityArea[3] = '中正區';
        $cityArea[4] = '中山區';
        $cityArea[5] = '安樂區';
        $cityArea[6] = '暖暖區';
        $cityArea[7] = '七堵區';
        $cityAreaCount[1] = 7;
        $cityArea[8] = '中正區';
        $cityArea[9] = '大同區';
        $cityArea[10] = '中山區';
        $cityArea[11] = '松山區';
        $cityArea[12] = '大安區';
        $cityArea[13] = '萬華區';
        $cityArea[14] = '信義區';
        $cityArea[15] = '士林區';
        $cityArea[16] = '北投區';
        $cityArea[17] = '內湖區';
        $cityArea[18] = '南港區';
        $cityArea[19] = '文山區';
        $cityAreaCount[2] = 19;
        $cityArea[20] = '萬里區';
        $cityArea[21] = '金山區';
        $cityArea[22] = '板橋區';
        $cityArea[23] = '汐止區';
        $cityArea[24] = '深坑區';
        $cityArea[25] = '石碇區';
        $cityArea[26] = '瑞芳區';
        $cityArea[27] = '平溪區';
        $cityArea[28] = '雙溪區';
        $cityArea[29] = '貢寮區';
        $cityArea[30] = '新店區';
        $cityArea[31] = '坪林區';
        $cityArea[32] = '烏來區';
        $cityArea[33] = '永和區';
        $cityArea[34] = '中和區';
        $cityArea[35] = '土城區';
        $cityArea[36] = '三峽區';
        $cityArea[37] = '樹林區';
        $cityArea[38] = '鶯歌區';
        $cityArea[39] = '三重區';
        $cityArea[40] = '新莊區';
        $cityArea[41] = '泰山區';
        $cityArea[42] = '林口區';
        $cityArea[43] = '蘆洲區';
        $cityArea[44] = '五股區';
        $cityArea[45] = '八里區';
        $cityArea[46] = '淡水區';
        $cityArea[47] = '三芝區';
        $cityArea[48] = '石門區';
        $cityAreaCount[3] = 48;
        $cityArea[49] = '中壢區';
        $cityArea[50] = '平鎮區';
        $cityArea[51] = '龍潭區';
        $cityArea[52] = '楊梅區';
        $cityArea[53] = '新屋區';
        $cityArea[54] = '觀音區';
        $cityArea[55] = '桃園區';
        $cityArea[56] = '龜山區';
        $cityArea[57] = '八德區';
        $cityArea[58] = '大溪區';
        $cityArea[59] = '復興區';
        $cityArea[60] = '大園區';
        $cityArea[61] = '蘆竹區';
        $cityAreaCount[4] = 61;
        $cityArea[62] = '東區';
        $cityArea[63] = '北區';
        $cityArea[64] = '香山區';
        $cityAreaCount[5] = 64;
        $cityArea[65] = '竹北市';
        $cityArea[66] = '湖口鄉';
        $cityArea[67] = '新豐鄉';
        $cityArea[68] = '新埔鎮';
        $cityArea[69] = '關西鎮';
        $cityArea[70] = '芎林鄉';
        $cityArea[71] = '寶山鄉';
        $cityArea[72] = '竹東鎮';
        $cityArea[73] = '五峰鄉';
        $cityArea[74] = '橫山鄉';
        $cityArea[75] = '尖石鄉';
        $cityArea[76] = '北埔鄉';
        $cityArea[77] = '峨眉鄉';
        $cityAreaCount[6] = 77;
        $cityArea[78] = '竹南鎮';
        $cityArea[79] = '頭份市';
        $cityArea[80] = '三灣鄉';
        $cityArea[81] = '南庄鄉';
        $cityArea[82] = '獅潭鄉';
        $cityArea[83] = '後龍鎮';
        $cityArea[84] = '通霄鎮';
        $cityArea[85] = '苑裡鎮';
        $cityArea[86] = '苗栗市';
        $cityArea[87] = '造橋鄉';
        $cityArea[88] = '頭屋鄉';
        $cityArea[89] = '公館鄉';
        $cityArea[90] = '大湖鄉';
        $cityArea[91] = '泰安鄉';
        $cityArea[92] = '銅鑼鄉';
        $cityArea[93] = '三義鄉';
        $cityArea[94] = '西湖鄉';
        $cityArea[95] = '卓蘭鎮';
        $cityAreaCount[7] = 95;
        $cityArea[96] = '中區';
        $cityArea[97] = '東區';
        $cityArea[98] = '南區';
        $cityArea[99] = '西區';
        $cityArea[100] = '北區';
        $cityArea[101] = '北屯區';
        $cityArea[102] = '西屯區';
        $cityArea[103] = '南屯區';
        $cityArea[104] = '太平區';
        $cityArea[105] = '大里區';
        $cityArea[106] = '霧峰區';
        $cityArea[107] = '烏日區';
        $cityArea[108] = '豐原區';
        $cityArea[109] = '后里區';
        $cityArea[110] = '石岡區';
        $cityArea[111] = '東勢區';
        $cityArea[112] = '和平區';
        $cityArea[113] = '新社區';
        $cityArea[114] = '潭子區';
        $cityArea[115] = '大雅區';
        $cityArea[116] = '神岡區';
        $cityArea[117] = '大肚區';
        $cityArea[118] = '沙鹿區';
        $cityArea[119] = '龍井區';
        $cityArea[120] = '梧棲區';
        $cityArea[121] = '清水區';
        $cityArea[122] = '大甲區';
        $cityArea[123] = '外埔區';
        $cityArea[124] = '大安區';
        $cityAreaCount[8] = 124;
        $cityArea[125] = '彰化市';
        $cityArea[126] = '芬園鄉';
        $cityArea[127] = '花壇鄉';
        $cityArea[128] = '秀水鄉';
        $cityArea[129] = '鹿港鎮';
        $cityArea[130] = '福興鄉';
        $cityArea[131] = '線西鄉';
        $cityArea[132] = '和美鎮';
        $cityArea[133] = '伸港鄉';
        $cityArea[134] = '員林市';
        $cityArea[135] = '社頭鄉';
        $cityArea[136] = '永靖鄉';
        $cityArea[137] = '埔心鄉';
        $cityArea[138] = '溪湖鎮';
        $cityArea[139] = '大村鄉';
        $cityArea[140] = '埔鹽鄉';
        $cityArea[141] = '田中鎮';
        $cityArea[142] = '北斗鎮';
        $cityArea[143] = '田尾鄉';
        $cityArea[144] = '埤頭鄉';
        $cityArea[145] = '溪州鄉';
        $cityArea[146] = '竹塘鄉';
        $cityArea[147] = '二林鎮';
        $cityArea[148] = '大城鄉';
        $cityArea[149] = '芳苑鄉';
        $cityArea[150] = '二水鄉';
        $cityAreaCount[9] = 150;
        $cityArea[151] = '南投市';
        $cityArea[152] = '中寮鄉';
        $cityArea[153] = '草屯鎮';
        $cityArea[154] = '國姓鄉';
        $cityArea[155] = '埔里鎮';
        $cityArea[156] = '仁愛鄉';
        $cityArea[157] = '名間鄉';
        $cityArea[158] = '集集鎮';
        $cityArea[159] = '水里鄉';
        $cityArea[160] = '魚池鄉';
        $cityArea[161] = '信義鄉';
        $cityArea[162] = '竹山鎮';
        $cityArea[163] = '鹿谷鄉';
        $cityAreaCount[10] = 163;
        $cityArea[164] = '斗南鎮';
        $cityArea[165] = '大埤鄉';
        $cityArea[166] = '虎尾鎮';
        $cityArea[167] = '土庫鎮';
        $cityArea[168] = '褒忠鄉';
        $cityArea[169] = '東勢鄉';
        $cityArea[170] = '臺西鄉';
        $cityArea[171] = '崙背鄉';
        $cityArea[172] = '麥寮鄉';
        $cityArea[173] = '斗六市';
        $cityArea[174] = '林內鄉';
        $cityArea[175] = '古坑鄉';
        $cityArea[176] = '莿桐鄉';
        $cityArea[177] = '西螺鎮';
        $cityArea[178] = '二崙鄉';
        $cityArea[179] = '北港鎮';
        $cityArea[180] = '水林鄉';
        $cityArea[181] = '口湖鄉';
        $cityArea[182] = '四湖鄉';
        $cityArea[183] = '元長鄉';
        $cityAreaCount[11] = 183;
        $cityArea[184] = '東區';
        $cityArea[185] = '西區';
        $cityAreaCount[12] = 185;
        $cityArea[186] = '番路鄉';
        $cityArea[187] = '梅山鄉';
        $cityArea[188] = '竹崎鄉';
        $cityArea[189] = '阿里山鄉';
        $cityArea[190] = '中埔鄉';
        $cityArea[191] = '大埔鄉';
        $cityArea[192] = '水上鄉';
        $cityArea[193] = '鹿草鄉';
        $cityArea[194] = '太保市';
        $cityArea[195] = '朴子市';
        $cityArea[196] = '東石鄉';
        $cityArea[197] = '六腳鄉';
        $cityArea[198] = '新港鄉';
        $cityArea[199] = '民雄鄉';
        $cityArea[200] = '大林鎮';
        $cityArea[201] = '溪口鄉';
        $cityArea[202] = '義竹鄉';
        $cityArea[203] = '布袋鎮';
        $cityAreaCount[13] = 203;
        $cityArea[204] = '中西區';
        $cityArea[205] = '東區';
        $cityArea[206] = '南區';
        $cityArea[207] = '北區';
        $cityArea[208] = '安平區';
        $cityArea[209] = '安南區';
        $cityArea[210] = '永康區';
        $cityArea[211] = '歸仁區';
        $cityArea[212] = '新化區';
        $cityArea[213] = '左鎮區';
        $cityArea[214] = '玉井區';
        $cityArea[215] = '楠西區';
        $cityArea[216] = '南化區';
        $cityArea[217] = '仁德區';
        $cityArea[218] = '關廟區';
        $cityArea[219] = '龍崎區';
        $cityArea[220] = '官田區';
        $cityArea[221] = '麻豆區';
        $cityArea[222] = '佳里區';
        $cityArea[223] = '西港區';
        $cityArea[224] = '七股區';
        $cityArea[225] = '將軍區';
        $cityArea[226] = '學甲區';
        $cityArea[227] = '北門區';
        $cityArea[228] = '新營區';
        $cityArea[229] = '後壁區';
        $cityArea[230] = '白河區';
        $cityArea[231] = '東山區';
        $cityArea[232] = '六甲區';
        $cityArea[233] = '下營區';
        $cityArea[234] = '柳營區';
        $cityArea[235] = '鹽水區';
        $cityArea[236] = '善化區';
        $cityArea[237] = '大內區';
        $cityArea[238] = '山上區';
        $cityArea[239] = '新市區';
        $cityArea[240] = '安定區';
        $cityAreaCount[14] = 240;
        $cityArea[241] = '新興區';
        $cityArea[242] = '前金區';
        $cityArea[243] = '苓雅區';
        $cityArea[244] = '鹽埕區';
        $cityArea[245] = '鼓山區';
        $cityArea[246] = '旗津區';
        $cityArea[247] = '前鎮區';
        $cityArea[248] = '三民區';
        $cityArea[249] = '楠梓區';
        $cityArea[250] = '小港區';
        $cityArea[251] = '左營區';
        $cityArea[252] = '仁武區';
        $cityArea[253] = '大社區';
        $cityArea[254] = '東沙群島';
        $cityArea[255] = '南沙群島';
        $cityArea[256] = '岡山區';
        $cityArea[257] = '路竹區';
        $cityArea[258] = '阿蓮區';
        $cityArea[259] = '田寮區';
        $cityArea[260] = '燕巢區';
        $cityArea[261] = '橋頭區';
        $cityArea[262] = '梓官區';
        $cityArea[263] = '彌陀區';
        $cityArea[264] = '永安區';
        $cityArea[265] = '湖內區';
        $cityArea[266] = '鳳山區';
        $cityArea[267] = '大寮區';
        $cityArea[268] = '林園區';
        $cityArea[269] = '鳥松區';
        $cityArea[270] = '大樹區';
        $cityArea[271] = '旗山區';
        $cityArea[272] = '美濃區';
        $cityArea[273] = '六龜區';
        $cityArea[274] = '內門區';
        $cityArea[275] = '杉林區';
        $cityArea[276] = '甲仙區';
        $cityArea[277] = '桃源區';
        $cityArea[278] = '那瑪夏區';
        $cityArea[279] = '茂林區';
        $cityArea[280] = '茄萣區';
        $cityAreaCount[15] = 280;
        $cityArea[281] = '屏東市';
        $cityArea[282] = '三地門鄉';
        $cityArea[283] = '霧臺鄉';
        $cityArea[284] = '瑪家鄉';
        $cityArea[285] = '九如鄉';
        $cityArea[286] = '里港鄉';
        $cityArea[287] = '高樹鄉';
        $cityArea[288] = '鹽埔鄉';
        $cityArea[289] = '長治鄉';
        $cityArea[290] = '麟洛鄉';
        $cityArea[291] = '竹田鄉';
        $cityArea[292] = '內埔鄉';
        $cityArea[293] = '萬丹鄉';
        $cityArea[294] = '潮州鎮';
        $cityArea[295] = '泰武鄉';
        $cityArea[296] = '來義鄉';
        $cityArea[297] = '萬巒鄉';
        $cityArea[298] = '崁頂鄉';
        $cityArea[299] = '新埤鄉';
        $cityArea[300] = '南州鄉';
        $cityArea[301] = '林邊鄉';
        $cityArea[302] = '東港鎮';
        $cityArea[303] = '琉球鄉';
        $cityArea[304] = '佳冬鄉';
        $cityArea[305] = '新園鄉';
        $cityArea[306] = '枋寮鄉';
        $cityArea[307] = '枋山鄉';
        $cityArea[308] = '春日鄉';
        $cityArea[309] = '獅子鄉';
        $cityArea[310] = '車城鄉';
        $cityArea[311] = '牡丹鄉';
        $cityArea[312] = '恆春鎮';
        $cityArea[313] = '滿州鄉';
        $cityAreaCount[16] = 313;
        $cityArea[314] = '臺東市';
        $cityArea[315] = '綠島鄉';
        $cityArea[316] = '蘭嶼鄉';
        $cityArea[317] = '延平鄉';
        $cityArea[318] = '卑南鄉';
        $cityArea[319] = '鹿野鄉';
        $cityArea[320] = '關山鎮';
        $cityArea[321] = '海端鄉';
        $cityArea[322] = '池上鄉';
        $cityArea[323] = '東河鄉';
        $cityArea[324] = '成功鎮';
        $cityArea[325] = '長濱鄉';
        $cityArea[326] = '太麻里鄉';
        $cityArea[327] = '金峰鄉';
        $cityArea[328] = '大武鄉';
        $cityArea[329] = '達仁鄉';
        $cityAreaCount[17] = 329;
        $cityArea[330] = '花蓮市';
        $cityArea[331] = '新城鄉';
        $cityArea[332] = '秀林鄉';
        $cityArea[333] = '吉安鄉';
        $cityArea[334] = '壽豐鄉';
        $cityArea[335] = '鳳林鎮';
        $cityArea[336] = '光復鄉';
        $cityArea[337] = '豐濱鄉';
        $cityArea[338] = '瑞穗鄉';
        $cityArea[339] = '萬榮鄉';
        $cityArea[340] = '玉里鎮';
        $cityArea[341] = '卓溪鄉';
        $cityArea[342] = '富里鄉';
        $cityAreaCount[18] = 342;
        $cityArea[343] = '宜蘭市';
        $cityArea[344] = '頭城鎮';
        $cityArea[345] = '礁溪鄉';
        $cityArea[346] = '壯圍鄉';
        $cityArea[347] = '員山鄉';
        $cityArea[348] = '羅東鎮';
        $cityArea[349] = '三星鄉';
        $cityArea[350] = '大同鄉';
        $cityArea[351] = '五結鄉';
        $cityArea[352] = '冬山鄉';
        $cityArea[353] = '蘇澳鎮';
        $cityArea[354] = '南澳鄉';
        $cityArea[355] = '釣魚臺';
        $cityAreaCount[19] = 355;
        $cityArea[356] = '馬公市';
        $cityArea[357] = '西嶼鄉';
        $cityArea[358] = '望安鄉';
        $cityArea[359] = '七美鄉';
        $cityArea[360] = '白沙鄉';
        $cityArea[361] = '湖西鄉';
        $cityAreaCount[20] = 361;
        $cityArea[362] = '金沙鎮';
        $cityArea[363] = '金湖鎮';
        $cityArea[364] = '金寧鄉';
        $cityArea[365] = '金城鎮';
        $cityArea[366] = '烈嶼鄉';
        $cityArea[367] = '烏坵鄉';
        $cityAreaCount[21] = 367;
        $cityArea[368] = '南竿鄉';
        $cityArea[369] = '北竿鄉';
        $cityArea[370] = '莒光鄉';
        $cityArea[371] = '東引鄉';
        $cityAreaCount[22] = 371;
        return compact('city', 'cityArea', 'cityAreaCount');
    }
}
