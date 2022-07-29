<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Vehicle;
use App\Http\Requests;
use App\Http\Requests\VehicleRequest;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("adminlte::layouts.querys.vehicle");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("adminlte::layouts.forms.register_vehicle");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleRequest $request)
    {
        $vehicle = new Vehicle;
        $vehicle->number_plate = $request->number_plate;
        $vehicle->brand = $request->brand;
        $vehicle->model = $request->model;
        $vehicle->save();
                
        return response()->json([
            'state' => 'success',            
        ]);
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

    public function listing(){
        $vehicles = Vehicle::orderBy('created_at', 'desc')->paginate(10);        
        return view('adminlte::layouts.querys.vehicle',['vehicles'=>$vehicles]);
    }

    public function search($number_plate){
        $vehicles = Vehicle::where("number_plate",'like', '%' . $number_plate . '%')->orderBy('created_at', 'desc')->paginate(6);
        return view('adminlte::layouts.querys.search_vehicle',['vehicles'=>$vehicles]);
    }

    public function search_for_transaction($number_plate){
        $vehicle = Vehicle::where('number_plate', $number_plate)->first();
        return $vehicle;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::where('vehicles.id','=',$id)->first();
        return view('adminlte::layouts.forms.modal_vehicle',['vehicle'=>$vehicle]);
    }

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
            'number_plate' => 'required',
            'brand' => 'required',
            'model'=> 'required'
        ],[
            'number_plate.required' =>  'Debe ingresar una placa',
            'brand.required'  =>  'Debe ingresar la marca del vehiculo',
            'model.required'  =>  'Debe ingresar el modelo del vehiculo',
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }else{
          $vehicle = Vehicle::where('id', $id)
          ->update(['number_plate' => $request->number_plate,
          'brand' => $request->brand, 
          'model' => $request->model]);
          return $vehicle;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedRows = Vehicle::where('id', $id)->delete();
        return $this->listing();
    }
}
