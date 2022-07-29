<?php

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
    return view('adminlte::auth.login');
});

Route::get('test1',function(){
    DB::table('users')->insert([
            'name'      => 'Brenda Sifontes',
            'email'     => 'brendasifontes1@gmail.com',
            'password'  =>  bcrypt('bsifontes'),
            'role'      =>  'editor'
        ]);
        DB::table('users')->insert([
            'name'      => 'Leacsy Sanchez',
            'email'     => 'leacsy.sanchez@hotmail.com',
            'password'  =>  bcrypt('lsanchez'),
            'role'      =>  'editor'
        ]);
});
// Route::get('login',function(){
//     return view('adminlte::auth.login');
// });


Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
    //        // Uses Auth Middleware
    //    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::group(['middleware' => 'web'], function () {
    //Driver
    Route::resource('driver', 'DriverController');
    Route::get('listing_driver','DriverController@listing');
    Route::get('query_driver','DriverController@query_driver');
    Route::get('search_driver/{type_input_driver}/{input_value}','DriverController@search');
    Route::get('driver_for_transaction/{rif}','DriverController@search_for_transaction');
    
    //Vehicle
    Route::resource('vehicle', 'VehicleController');
    Route::get('listing_vehicle','VehicleController@listing');
    Route::get('search_vehicle/{number_plate}','VehicleController@search');
    Route::get('vehicle_for_transaction/{number_plate}','VehicleController@search_for_transaction');

    //Beneficiary
    Route::resource('beneficiary', 'BeneficiaryController');
    Route::get('listing_beneficiary','BeneficiaryController@listing');
    Route::get('search_beneficiary/{type_input_beneficiary}/{input_value}','BeneficiaryController@search');
    Route::get('beneficiary_for_transaction/{rif}','BeneficiaryController@search_for_transaction');
    
    //Transaction
    Route::resource('transaction', 'TransactionController');
    Route::get('listing_transaction_open','TransactionController@listing_open');
    Route::get('listing_transaction_close','TransactionController@listing_close');
    Route::get('listing_transaction_null','TransactionController@listing_null');
    Route::get('transactions_transit','TransactionController@transactions_transit');
    Route::get('transaction_pdf/{id}','TransactionController@pdf');    
    Route::get('search_open_transaction/{type_input}/{input_value}','TransactionController@search_open');
    Route::get('search_close_transaction/{type_input}/{input_value}','TransactionController@search_close');
    Route::get('search_null_transaction/{type_input}/{input_value}','TransactionController@search_null');
});