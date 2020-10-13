<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehicleModel;
use Validator ;

class VehicleController extends Controller
{
    //
    public function vehicle(){
        return response()->json(VehicleModel::get(),200);
    }
    public function vehicleByID($id){
        $vehicle =VehicleModel::find($id);
        if(is_null($vehicle)){
            return response()->json(['message'=>'Record Not Found'],404);
        }
        return response()->json($vehicle,200);
    }
    public function vehicleAdd(Request $request){
        $rules=[
            'name'=>"required|min:3",
            'model'=>"required|min:2|max:20"
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $vehicle = VehicleModel::create($request->all());
        return response()->json($vehicle,201);
    }
    public function vehicleUpdate(Request $request,$id){
        $vehicle = VehicleModel::find($id);
        if(is_null($vehicle)){
            return response()->json(['message'=>'Record Not Found'],404);
        }
        $vehicle->update($request->all());
        return response()->json($vehicle,200);
    }
    public function vehicleDelete(Request $request , $id){
        $vehicle = VehicleModel::find($id);
        if(is_null($vehicle)){
            return response()->json(['message'=>'Record Not Found'],404);
        }
        $vehicle->delete();
        return response()->json(null,204);
    }
}
