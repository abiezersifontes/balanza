<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Beneficiary;
use App\Http\Requests;
use App\Http\Requests\BeneficiaryRequest;

class BeneficiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("adminlte::layouts.querys.beneficiary");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("adminlte::layouts.forms.register_beneficiary");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BeneficiaryRequest $request)
    {
        $beneficiary = new Beneficiary;
        $beneficiary->type_id = $request->type_id;
        $beneficiary->rif = $request->rif;
        $beneficiary->name = $request->name;
        $beneficiary->phone = $request->phone;
        $beneficiary->save();
                
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
        $beneficiarys = Beneficiary::orderBy('created_at', 'desc')->paginate(6);
        // return json_encode($beneficiarys);
        return view('adminlte::layouts.querys.beneficiary',['beneficiarys'=>$beneficiarys]);
    }

    public function search($type_input_beneficiary, $input_value){
        if($type_input_beneficiary=="rif"){
            $beneficiarys = beneficiary::where('rif','like', '%' . $input_value . '%')->orderBy('created_at', 'desc')->paginate(6);
        }else{
            $beneficiarys = beneficiary::where('name','like', '%' . $input_value . '%')->orderBy('created_at', 'desc')->paginate(6);
        }
        // input_value, type_input_beneficiary
        return view('adminlte::layouts.querys.search_beneficiary',['beneficiarys'=>$beneficiarys]);
    }

     public function search_for_transaction($rif){
        $beneficiary = Beneficiary::where('rif', $rif)->first();
        return $beneficiary;
    }

    // public function transaction_beneficiary(){
    //     $beneficiarys = Beneficiary::all();
    //     return $beneficiarys;
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($rif)
    {
        $beneficiary = Beneficiary::where("rif",$rif)->first();
        if($beneficiary->type_id == "J"){
            $false_type_id = "V";
        }else{
            $false_type_id = "J";
        }
        return view('adminlte::layouts.forms.modal_beneficiary',['beneficiary'=>$beneficiary,'false_type_id'=>$false_type_id]);
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
            $beneficiary = Beneficiary::where("rif","=",$rif)
            ->update([
                'type_id'=> $request->type_id,
                'name' => $request->name,
                'phone' => $request->phone
                ]);
            return $beneficiary;
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
        $deletedRows = Beneficiary::where('rif', $rif)->delete();
        return $this->listing();
    }
}