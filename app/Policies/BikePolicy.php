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
        return $user->hasVerifiedEmail();
    }

    public function update( User $user, Bike $bike )
    {
        // return $user->id == $bike->user_id || $user->email == 'admin@larabikes.com';
        return $user->isOwner($bike) ||
                $user->hasRoles(['SUPERADMIN', 'ADMIN', 'SUPERVISOR']);
    }

    public function delete(User $user, Bike $bike)
    {
        // || $user->email == 'admin@larabikes.com';
        return $user->isOwner($bike) ||
                $user->hasRoles(['SUPERADMIN', 'ADMIN']);
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
