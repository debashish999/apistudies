<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Validator;

class DeviceController extends Controller
{
    //for all
    // public function list(){

    //     return Device::all();
    // }


    //both remommended way
    public function listAll($id=null){

        return $id?Device::find($id):Device::all();
    }

    //for one parameter
    // public function listParam($id){

    //     return Device::find($id);
    // }

    public function add(Request $req){

        $device =new Device;
        $device->name = $req->name;
        $device->member_id = $req->member_id;
        $result = $device->save();
        if($result){
        return ["Result" => "data stored in devices"];
    }
    else{
        return ['Result' => 'opration failed'];
    }
    
    }

    public function update(Request $req){
        $device = Device::find($req->id);

        $device->name = $req->name;
        $device->member_id = $req->member_id;

        $result = $device->save();

        if($result){
            return ['result' => 'updated'];
        }
        else{
            return ['result' => 'operation failed'];
        }


        
    }
    public function search($name){
        
        $data =  Device::where('name', 'like', '%'.$name.'%')->get();
        
        $dataArray = json_decode($data, true);
           
        if(count($dataArray) < 1){
            return ["result" => "no record found"];
        }
        return $data;
    }
    public function delete($id){

        $device = Device::find($id);
        $result = $device->delete();

        if($result){
            return ['result' => 'deleted'];
        }
        else{
            return ['result' => 'operation failed'];
        }
    }

    public function testData(Request $req){

        $rules= array(
            "member_id" =>"required|min:1|max:4"
        );
        $validator = Validator::make($req->all(),$rules);
        if($validator->fails()){
            // return $validator->errors();
            return response()->json($validator->errors(),401);
        }
        else{
            $device =new Device;
            $device->name = $req->name;
            $device->member_id = $req->member_id;
            $result = $device->save();
            if($result){
            return ["Result" => "data stored in devices"];
        }
        else{
            return ['Result' => 'opration failed'];
        }
        }

       
    }
}


