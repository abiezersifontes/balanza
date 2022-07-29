<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\Driver;
use App\Vehicle;
use App\Http\Requests;
use App\Http\Requests\TransactionRequest;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view("adminlte::layouts.querys.open_transactions");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $drivers = Driver::pluck('rif','name')->prepend('selecciona');
        // ,['drivers'=>$drivers]
        $drivers = Driver::all();
        return view("adminlte::layouts.forms.register_transaction",['drivers'=>$drivers]);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *///
    public function store(TransactionRequest $request)
    {
        $vehicle = Vehicle::select('id')->where('number_plate','=',$request->number_plate_vehicle)->first();
        $transaction = new Transaction;
        $transaction->input_weight = $request->input_weight;
        $transaction->output_weight = 0;
        $transaction->state = "transit";
        $transaction->product_id = $request->product;
        $transaction->type = $request->type;
        $transaction->driver_rif = $request->driver_rif;
        $transaction->vehicle_id = $vehicle->id;
        $transaction->beneficiary_rif = $request->beneficiary_rif;
        $transaction->users_id = \Auth::user()->id;
        // $transaction->date_input = $request->date_input;
        // $transaction->date_output = $request->date_output;
        $transaction->save();
                
        return response()->json([
            'state' =>  'success',
        ]);
    }

    public function transactions_transit(){
        $transactions = Transaction::where('state','transit')->count();
        return $transactions;
    }

    public function listing_open(){
        $transactions = Transaction::where('state','transit')
        ->join('beneficiarys','transactions.beneficiary_rif','=','beneficiarys.rif')
        ->orderBy('transactions.created_at', 'desc')
        ->paginate(6);
        return view('adminlte::layouts.querys.open_transactions',['transactions'=>$transactions]);
    }

    public function listing_close(){
        $transactions = Transaction::where('state','finish')
        ->join('beneficiarys','transactions.beneficiary_rif','=','beneficiarys.rif')
        ->orderBy('transactions.created_at', 'desc')
        ->paginate(6);
        return view('adminlte::layouts.querys.close_transactions',['transactions'=>$transactions]);
    }

    public function listing_null(){
        $transactions = Transaction::onlyTrashed()
        ->join('beneficiarys','transactions.beneficiary_rif','=','beneficiarys.rif')
        ->orderBy('transactions.created_at', 'desc')
        ->paginate(6);
        return view('adminlte::layouts.querys.null_transactions',['transactions'=>$transactions]);
    }

    public function pdf($id){
        $transaction = Transaction::select("transactions.id",
        'transactions.type',
        "transactions.beneficiary_rif as beneficiary_rif", 
        "beneficiarys.name as beneficiary_name",
        "beneficiarys.type_id",
        "transactions.driver_rif as driver_rif", 
        "drivers.name as name_driver", 
        "vehicles.number_plate as number_plate_vehicle", 
        "vehicles.model as model_vehicle", 
        "input_weight",
        "output_weight",
        "vehicles.brand as brand_vehicle",
        "products.name as name_product",
        "users.name as name_user",
        "transactions.created_at as date_input",
        "transactions.updated_at as date_output"
        // "transactions.date_input",
        // "transactions.date_output",
        )
                    ->where('transactions.id','=',$id)                    
                    ->join("beneficiarys","transactions.beneficiary_rif","=","beneficiarys.rif")
                    ->join("drivers","transactions.driver_rif","=","drivers.rif")
                    ->join("vehicles","transactions.vehicle_id","=","vehicles.id")
                    ->join("products","transactions.product_id","=","products.id")
                    ->join("users","transactions.users_id","=","users.id")
                    ->first();

                    if($transaction->type == "purchase"){
                        $neto = $transaction->input_weight - $transaction->output_weight;
                    }else{
                        $neto = $transaction->output_weight - $transaction->input_weight;
                    }
                    
        $pdf = PDF::loadView('transaction_pdf',['transaction'=>$transaction, 'neto' => $neto]);
        return $pdf->stream('prueba');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::select("transactions.id",
        "transactions.type",
        "transactions.beneficiary_rif as beneficiary_rif", 
        "beneficiarys.name as beneficiary_name", 
        "transactions.driver_rif as driver_rif", 
        "drivers.name as name_driver", 
        "vehicles.number_plate as number_plate_vehicle", 
        "vehicles.model as model_vehicle", "input_weight", 
        "vehicles.brand as brand_vehicle",
        "products.name as product_name"
        // "transactions.date_input",
        // "transactions.date_output"
        )
                    ->where('transactions.id','=',$id)                    
                    ->join("beneficiarys","transactions.beneficiary_rif","=","beneficiarys.rif")
                    ->join("drivers","transactions.driver_rif","=","drivers.rif")
                    ->join("vehicles","transactions.vehicle_id","=","vehicles.id")
                    ->join("products","transactions.product_id","=","products.id")
                    ->first();

        $date_input = str_replace(" ","T",$transaction->date_input);
        $date_output = str_replace(" ","T",$transaction->date_output);
        return view('adminlte::layouts.forms.modal_transaction',['transaction'=>$transaction, 'date_input'=>$date_input, 'date_output'=>$date_output]);
    }

    public function search_open($type_input,$input_value){       

        if($type_input=="nro"){
            $transactions = Transaction::where('id','like', '%' . $input_value . '%')->paginate(6);
        }else{
            $transactions = Transaction::where('beneficiary_rif','like', '%' . $input_value . '%')->paginate(6);
        }
        // input_value, type_input_beneficiary
        return view('adminlte::layouts.querys.search_open_transactions',['transactions'=>$transactions]);
    }    

    public function search_close($type_input,$input_value){
        
        if($type_input=="nro"){
            $transactions = Transaction::where('id','like', '%' . $input_value . '%')->paginate(6);
        }else{
            $transactions = Transaction::where('beneficiary_rif','like', '%' . $input_value . '%')->paginate(6);
        }
        // input_value, type_input_beneficiary
        return view('adminlte::layouts.querys.search_close_transactions',['transactions'=>$transactions]);
    }  

    public function search_null($type_input,$input_value){
        
        if($type_input=="nro"){
            $transactions = Transaction::onlyTrashed()->where('id','like', '%' . $input_value . '%')->paginate(6);
        }else{
            $transactions = Transaction::onlyTrashed()->where('beneficiary_rif','like', '%' . $input_value . '%')->paginate(6);
        }
        // input_value, type_input_beneficiary
        return view('adminlte::layouts.querys.search_close_transactions',['transactions'=>$transactions]);
    }  

    // public function search_null(){

    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'output_weight' => 'required',
            'input_weight' => 'required',
        ],[
            'output_weight.required' =>  'Debe ingresar un peso de salida',
            'input_weight.required'  =>  'Debe ingresar un peso de entrada',
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        // if($request->input_weight < $request->output_weight){
        //     $data = "mayor";
        //     return $data;
        // }else{

        // if($request->period_input == "PM"){
        //     $hour_input = $request->hour_input + 12;
        // }else{
        // $hour_input = $request->hour_input;
        // }
        // if($request->period_output == "PM"){
        //     $hour_output = $request->hour_output + 12;
        // }else{
        //     $hour_output = $request->hour_output;
        // }

        // $request->date_input = $request->date_input . " " . $hour_input . ":" . $request->minute_input;
        // $request->date_output = $request->date_output . " " . $hour_output . ":" . $request->minute_output;
        $transaction = Transaction::find($id);
        $transaction->state = "finish";
        $transaction->input_weight = $request->input_weight;
        $transaction->output_weight = $request->output_weight;
        $transaction->save();
        return $request->input_weight;
        // }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Transaction::where('id', $id)->delete();
        Transaction::destroy($id);
        return $this->listing_close();
    }
}
