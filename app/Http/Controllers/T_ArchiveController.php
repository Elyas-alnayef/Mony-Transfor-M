<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\User;

use App\Models\T_Archive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class T_ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allarchives=T_Archive::with(['t_point','user','receiver'])->get();
        return view ('archive.index',[
            'allarchives'=>$allarchives,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::Authorize('create',T_Archive::class)){
            $users=User::all();
            $points=Point::all();
            return view ('archive.create',[
                'points'=>$points,
                'users'=>$users
            ]);
        }
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sender=Point::find($request->send);
        $receiver=Point::find($request->receive);

        if ((int)$request->total <= $sender->current_balance) {
            $newarchive=new T_Archive();
            $newarchive->total_amount=(int)$request->total;
            $newarchive->un_number=(int)$request->un_number;
            $newarchive->status=$request->status;
            $newarchive->receiver_id=$request->receive;
            $newarchive->sender_id=$request->send;
            $newarchive->user_id=$request->user;
            $newarchive->deleted=0;
            $senderbalance=$sender->current_balance - $request->total;
            $receiverbalance=$request->total+$receiver->current_balance;
            $sender->update(['current_balance'=>$senderbalance]);
            $receiver->update(['current_balance'=>$receiverbalance]);
            $newarchive->save();
            return to_route( 'archive.index');
        }
        else{
            return 'cant do this ';
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(int $t_archive_id)
    {
        $t_archive=T_Archive::with(['t_point','user','receiver'])->find($t_archive_id);
        if(Gate::Authorize('view',$t_archive)){
            return view('archive.show',[
                'archive'=>$t_archive
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $t_archive_id)
    {   
        $archive=T_Archive::with(['t_point','user','receiver'])->find($t_archive_id);
        if(Gate::Authorize('updat',$archive)){
            $users=User::all();
            $points=Point::all();
            
            return view ('archive.update',[
                'archive'=>$archive,
                'points'=>$points,
                'users'=>$users
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,int $t_archive_id)
    {
        $archive=T_Archive::find($t_archive_id);
        $archive->total_amount=(int)$request->total;
        $archive->un_number=(int)$request->un_number;
        $archive->status=$request->status;
        $archive->receiver_id=$request->receive;
        $archive->sender_id=$request->send;
        $archive->user_id=$request->user;
        $archive->update();
        return to_route( 'archive.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $t_archive_id)
    {
        $archive=T_Archive::find($t_archive_id);
        if(Gate::Authorize('updat',$archive)){
            $archive->update(['deleted'=>1]);
            return to_route( 'archive.index');
        }
    }
}
