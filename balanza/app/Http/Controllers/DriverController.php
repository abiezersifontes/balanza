<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Driver;
use App\Http\Requests;
use App\Http\Requests\DriverRequest;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *///
    public function index()
    {
        return view("adminlte::layouts.querys.driver");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("adminlte::layouts.forms.register_driver");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DriverRequest $request)
    {        
        $driver = new Driver;
        $driver->rif = $request->rif;
        $driver->name = $request->name;
        if($request->phone ==""){
            $driver->phone = "S/TLFN";
        }else{
            $driver->phone = $request->phone;
        }
        $driver->save();
                
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
        $driverss = Driver::orderBy('created_at', 'desc')->paginate(6);
        return view('adminlte::layouts.querys.driver',['driverss'=>$driverss]);
        
    }

    public function search($type_input_driver, $input_value){
        if($type_input_driver=="rif"){
            $driverss = Driver::where('rif','like', '%' . $input_value . '%')->orderBy('created_at', 'desc')->paginate(6);
        }else{
            $driverss = Driver::where('name','like', '%' . $input_value . '%')->orderBy('created_at', 'desc')->paginate(6);
        }
        // input_value, type_input_driver
        return view('adminlte::layouts.querys.search_driver',['driverss'=>$driverss]);
        
    }
    public function search_for_transaction($rif){
        $driver = Driver::where('rif', $rif)->first();
        return $driver;
    }

    public function query_driver(Request $request){
        if($request->type_input == "rif"){  
            $driverss = Driver::where("rif",'like', '%' . $request->input . '%')->orderBy('created_at', 'desc')->paginate(6);
            // 'like', '%' . Input::get('name') . '%'
        return view('adminlte::layouts.querys.search_driver',['driverss'=>$driverss]);
            // return  $driverss;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($rif)
    {
        $driver = Driver::where('drivers.rif','=',$rif)->first();
        return view('adminlte::layouts.forms.modal_driver',['driver'=>$driver]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rif)
    {
        $validator = Validator::make($request->all(), [
            'rif' => 'required',
            'name' => 'required',
            'phone'=> 'required'
        ],[
            'rif.required' =>  'Debe ingresar el rif',
            'name.required'  =>  'Debe ingresar el nombre',
            'phone.required'  =>  'Debe ingresar un telefono',
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }else{
            $driver = Driver::where("rif","=",$rif)
            ->update(['name' => $request->name,
            'phone' => $request->phone]);
            return $driver;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rif)
    {
        $deletedRows = Driver::where('rif', $rif)->delete();
        return $this->listing();
    }
}
