<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user)
    {
        // El SUPERADMIN es el único con capcidad de ver listados de usuarios
        // return $user->email == 'admin@larabikes.com';
        return $user->hasRoles(['SUPERADMIN', 'ADMIN']);
    }

    public function create(User $user)
    {
        return $user->hasRoles(['SUPERADMIN', 'ADMIN']);
    }

    public function update(User $user )
    {
        // El SUPERADMIN es el único con capcidad de ver listados de usuarios
        // return $user->email == 'admin@larabikes.com';
        return $user->hasRoles(['SUPERADMIN']);
    }

    public function delete(User $user, User $model)
    {
        return $user->hasRoles(['SUPERADMIN']);
    }

    public function restore(User $user, User $model)
    {
        //
    }

    public function forceDelete(User $user, User $model)
    {
        //
    }
}
