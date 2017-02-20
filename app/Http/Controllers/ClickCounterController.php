<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClickCounter;
use DB;
use Log;

class ClickCounterController extends Controller
{
    /**
     * Record url, session id and ip from client request and count.
     *
     * @param  Request  $request
     * @return void
     */
    public static function trackRecord(Request $request)
    {
        $url = $request->path();
        $session_id = session()->getId();
        $client_ip = $request->ip();
        
        DB::transaction(function () use ($url, $session_id, $client_ip)
        {
            $prefix = explode("/", $url)[0];
            // Log::info('$prefix: '.$prefix." ".__FILE__." ".__FUNCTION__." ".__LINE__);
            if (!strcmp("api", $prefix)) {
                $url = str_replace("api", "news", $url);
            }
            // Log::info('$url: '.$url." ".__FILE__." ".__FUNCTION__." ".__LINE__);
            $url_records = ClickCounter::where('url', $url)->get();

            if ($url_records->count()) {
                //if url & session_id already exist, count + 1 and add new record
                if (!in_array($session_id, $url_records->pluck('session_id')->toArray())) {
                    $latest = DB::table('click_counter')->where('url', $url)->orderBy('count', 'desc')
                                  ->lockForUpdate()->first();
                    ClickCounter::create([
                        'url' => $url,
                        'session_id' => $session_id,
                        'client_ip' => $client_ip,
                        'count'     => $latest->count + 1,
                    ]);
                    /*
                    $record = new ClickCounter;
                    $record->fill([
                        'url' => $url,
                        'session_id' => $session_id,
                        'client_ip' => $client_ip,
                        'count'     => $latest_count,
                    ])->save();
                    */
                }
            } else {
                //empty record, add new record
                ClickCounter::create([
                    'url' => $url,
                    'session_id' => $session_id,
                    'client_ip' => $client_ip,
                    'count'     => 1,
                ]);
                /*
                $record = new ClickCounter;
                $record->fill([
                    'url' => $url,
                    'session_id' => $session_id,
                    'client_ip' => $client_ip,
                    'count'     => 1,
                ])->save();
                */
            }
        });
    }
}
