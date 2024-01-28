<?php

namespace App\Policies;

use App\Models\Point;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PointPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $authuser, Point $point): bool
    {
        if( $authuser->role== 'Admin'){
            return true;
        }elseif($point->manager_id==$authuser->id ){
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
        if( $authuser->role== 'Admin'){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $authuser, Point $point): bool
    {
        if( $authuser->role== 'Admin'){
            return true;
        }elseif($point->manager_id==$authuser->id ){
            return true ;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $authuser, Point $point): bool
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
    public function restore(User $user, Point $point)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $authuser, Point $point): bool
    {
        if( $authuser->role== 'Admin'){
            return true;
        }else{
            return false;
        }
    }
}
