<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PointCollection;
use App\Http\Resources\PointResource;
use App\Models\Point;
use Illuminate\Http\Request;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $points=Point::with('manager')->get();
        return new PointCollection($points);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $point=new Point();
        $point->name=$request->name;
        $point->country=$request->country;
        $point->address=$request->address;
        $point->current_balance=$request->current_balance;
        $point->manager_id=$request->manager_id;
        $point->save();
        return new PointResource($point);
    }

    /**
     * Display the specified resource.
     */
    public function show(int  $point_id)
    {
        $point=Point::with('manager')
                        ->find($point_id);
        return new PointResource($point);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int  $id)
    {
        $point=Point::find($id);
        $point->name=$request->name;
        $point->country=$request->country;
        $point->address=$request->address;
        $point->current_balance=$request->current_balance;
        $point->update();
        return new PointResource($point);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $point=Point::find($id);
        $point->delete();
        return response()->json(null, 204);
    }
}
