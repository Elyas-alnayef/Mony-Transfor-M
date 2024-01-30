<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\T_ArchiveCollection;
use App\Http\Resources\T_ArchiveResource;
use App\Models\T_Archive;
use Illuminate\Http\Request;
use App\Models\Point;

class T_ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $archives=T_Archive::with('receiver','t_point','user')->get();
        return new T_ArchiveCollection($archives);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sender=Point::find($request->sender_id);
        $receiver=Point::find($request->receiver_id);

        if ((int)$request->total_amount <= $sender->current_balance) {
            $newarchive=new T_Archive();
            $newarchive->total_amount=(int)$request->total_amount;
            $newarchive->un_number=(int)$request->un_number;
            $newarchive->status=$request->status;
            $newarchive->receiver_id=$request->receiver_id;
            $newarchive->sender_id=$request->sender_id;
            $newarchive->user_id=$request->user_id;
            $newarchive->deleted=0;
            $senderbalance=$sender->current_balance - $request->total_amount;
            $receiverbalance=$request->total_amount+$receiver->current_balance;
            $sender->update(['current_balance'=>$senderbalance]);
            $receiver->update(['current_balance'=>$receiverbalance]);
            $newarchive->save();
            return new T_ArchiveResource($newarchive);
            
    }
}

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $archives=T_Archive::with('receiver','t_point','user')->find($id);
        return new T_ArchiveResource($archives);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $t_archive_id)
    {
        $archive=T_Archive::find($t_archive_id);
        $archive->total_amount=(int)$request->total_amount;
        $archive->un_number=(int)$request->un_number;
        $archive->status=$request->status;
        $archive->receiver_id=$request->receiver_id;
        $archive->sender_id=$request->sender_id;
        $archive->user_id=$request->user_id;
        $archive->update();
        return new T_ArchiveResource($archive);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $archive=T_Archive::find($id);
        $archive->update(['deleted'=>1]);
    }
}
