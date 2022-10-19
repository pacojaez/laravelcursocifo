<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role',
        'description'
    ];

    public $guarded = [];

    /**
     * RELATION WITH USERS
     *
     */
    public function users(){
        return $this->belongsToMany(User::class, 'role_user');
    }

    /**
     * Roles not asigned to user
     *
     * @param User $user
     * @return void
     */
    public function notUserRoles( User $user){
        // return $this->belongsToMany(User::class)
        //         ->wherePivotNotIn('user_id', $user->id);
        // return Role::wherePivotNotIn('user_id', [$user->id])->get();
    }

}
