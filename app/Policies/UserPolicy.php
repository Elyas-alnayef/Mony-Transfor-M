<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class UserPolicy
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
    public function view(User $authuser,User $toshowuser):bool
    {
        if( $authuser->id==$toshowuser->id or $authuser->role=='Admin' ){
            return true;
        }else{
            return false ;
        }
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user):bool
    {
        if ($user->role == 'Admin' or $user->role == 'Manager' ) {
            return true ;
        }else{
            return false ;
        }
        
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model)
    {
        if ($user->role == 'Admin' or $user->role == 'Manger' ) {
            return true ;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model)
    {
        if ($user->role == 'Admin') {
            return true ;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
