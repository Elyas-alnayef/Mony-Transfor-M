<?php

namespace App\Policies;

use App\Models\Point;
use App\Models\T_Archive;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class T_ArchivePolicy
{

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $authuser, T_Archive $tArchive): bool
    {
        $sendpoint=$tArchive->sender_id;
        $receivepoint=$tArchive->receiver_id;

        if( $authuser->role== 'Admin'){
            return true;
        }elseif($sendpoint->manager_id==$authuser->id ){
            return true ;
        }elseif($receivepoint->manager_id==$authuser->id ){
            return true ;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $authuser): bool
    {
        if($authuser->role== 'Admin' or $authuser->role== 'Manager' ){
            return true;
        }else{
            return false ;
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $authuser, T_Archive $tArchive): bool
    {
        if( $authuser->role== 'Admin' or $authuser->role== 'Manager'){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $authuser, T_Archive $tArchive): bool
    {
        if( $authuser->role== 'Admin'){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, T_Archive $tArchive)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $authuser, T_Archive $tArchive)
    {
        if( $authuser->role== 'Admin'){
            return true;
        }else{
            return false;
        }
    }
}
