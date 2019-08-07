<?php

use \sadjadteh\PayPing\PayPing;
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

Route::get('/', function () {
    return PayPing::pay([
        'amount' => 100,
        'payerIdentity' => "09354775019",
        'payerName' => 'سجاد طهرانچی',
        'description' => 'این یک پرداخت تستی است',
        'returnUrl' => "http://local.payping/verifyPage",
        'clientRefId' => '1234567890',
    ]);

    return view('welcome');
});

Route::Get('verifyPage', function () {

});
