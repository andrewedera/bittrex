<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Pepijnolivier\Bittrex\Bittrex;

class BT extends Model
{
    //
    protected function getBal() {
    	return Bittrex::getBalances();
    }

    protected function getChartData($market, $interval = "hour"){
    	$data = Bittrex::getChartData($market, $interval);
    	return $data;
    }

    protected function getMarketSummary($market) {
    	return Bittrex::getMarketSummary($market);
    }

    // protected function getCoinName($market) {
    //     $options = [
    //         'http' => [
    //             'method'  => 'GET',
    //             'timeout' => 10,
    //         ],
    //     ];

    //     $publicUrl = 'https://coinbin.org/';
    //     $url = $publicUrl . $market;
    //     $feed = file_get_contents($url, false, stream_context_create($options));
    //     return json_decode($feed, true);
    // }
}