<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\VehicleModel;
use Validator ;

class Vehicle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(VehicleModel::get(),200);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle =VehicleModel::find($id);
        if(is_null($vehicle)){
            return response()->json(['message'=>'Record Not Found'],404);
        }
        return response()->json($vehicle,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        
        $vehicle = VehicleModel::find($id);
        if(is_null($vehicle)){
            return response()->json(['message'=>'Record Not Found'],404);
        }
        $vehicle->update($request->all());
        return response()->json($vehicle,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = VehicleModel::find($id);
        if(is_null($vehicle)){
            return response()->json(['message'=>'Record Not Found'],404);
        }
        $vehicle->delete();
        return response()->json(null,204);
    }
}
