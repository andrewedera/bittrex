<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\BT;
use Pepijnolivier\Bittrex\Bittrex;

class BittrexController extends Controller
{
    //
    protected function showChart($market, $interval) {
    	$data = Bittrex::getChartData($market, $interval);
    	return $data['result'];
    }

    protected function showLatestChart($market, $interval) {
    	$data = Bittrex::getLatestTicker($market, $interval);
    	return $data['result'];
    }
}