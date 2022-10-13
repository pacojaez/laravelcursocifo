<?php

namespace App\Policies;

use App\Models\Bike;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BikePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return TRUE;
    }

    public function view(User $user, Bike $bike)
    {
        return TRUE;
    }

    public function create(User $user)
    {
        return TRUE;
    }

    public function update( User $user, Bike $bike )
    {
        return $user->id == $bike->user_id || $user->email == 'admin@larabikes.com';
    }

    public function delete(User $user, Bike $bike)
    {
        return $user->id == $bike->user_id || $user->email == 'admin@larabikes.com';
    }

    public function restore(User $user, Bike $bike)
    {
        //
    }

    public function forceDelete( User $user )
    {
        // El SUPERADMIN es el único con capcidad de borrar motos
        return $user->email == 'admin@larabikes.com';
    }
}
