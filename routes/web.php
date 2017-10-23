<?php
use App\BT;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

function formatCrypto($val){
	$val = rtrim(sprintf('%.10f', $val), '0');
	if ($val == 0.0)
		$val = '0';
    return $val;
}

Route::get('/', function () {
	//dd(Bittrex::getOpenOrders('BTC-XVC'));
	//$data['latest'] = Bittrex::getLatestTicker('BTC-XRP');
	$currency = Bittrex::getCurrencyInfo('XRP');
	
	$bal = BT::getBal();
	//dd($data);
    return view('welcome', [ 'balance' => $bal['result'],
    						'currency' => $currency['result']]);
});

Route::get('/chart/{market}/{interval}', 'BittrexController@showChart');
Route::get('/chartLatestTick/{market}/{interval}', 'BittrexController@showLatestChart');