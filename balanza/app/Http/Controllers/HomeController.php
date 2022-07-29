<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Driver;
use App\Beneficiary;
use App\Vehicle;
use App\Product;
use App\Transaction;
use Carbon\Carbon;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $top_transactions = Transaction::where('state','transit')
            ->join('beneficiarys','transactions.beneficiary_rif','=','beneficiarys.rif')
            ->paginate(2);
        $drivers = Driver::all();
        $beneficiarys = Beneficiary::all();
        $vehicles = Vehicle::all();
        $products = Product::all();
        
        $pre_date = Carbon::now();
        $date = $pre_date->toDateString() . "T" . $pre_date->toTimeString();

        return view('adminlte::home',['drivers'=>$drivers,'beneficiarys'=>$beneficiarys,'vehicles'=>$vehicles,'top_transactions'=>$top_transactions, 'products'=>$products,'date'=>$date]);
    }
}