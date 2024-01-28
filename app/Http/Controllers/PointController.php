<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Point;
use App\Models\T_Archive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pionts=Point::all();
        return view('points.index',[
            'points'=>$pionts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        if(Gate::Authorize('create',Point::class)){
        $users=User::where('role','Manager')->get();
        return view ('points.create',[
            'managers'=>$users
        ]);
    }
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
        $point->manager_id=$request->manager;
        $point->save();
        return to_route('points.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Point $point)
    {
        if(Gate::Authorize('view',$point)){
        $user=User::find($point->manager_id);
        $archives = T_Archive::where('sender_id', $point->id)
                    ->orWhere('receiver_id', $point->id)
                    ->get();
        return view('points.show',[
            'point'=>$point,
            'archives'=>$archives,
            'manager'=>$user
        ]);
    }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Point $point)
    {
        if(Gate::Authorize('update',$point)){
        $users=User::where('role','Manager')->get();
        return view('points.update',[
            'point'=>$point,
            'managers'=>$users
        ]);
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Point $point)
    {
        $point->name=$request->name;
        $point->country=$request->country;
        $point->address=$request->address;
        $point->current_balance=$request->current_balance;
        $point->manager_id=$request->manager;
        $point->update();
        return to_route('points.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Point $point)
    {
        if(Gate::Authorize('delete',$point)){
        $point->delete();
        return to_route('points.index');
    }
    }
}
