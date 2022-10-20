<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'ciudad',
        'provincia',
        'telefono',
        'nacimiento',
        'first_bike_created'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * RELATION WITH BIKES
     *
     */
    public function bikes(){
        return $this->hasMany(Bike::class);
    }

    /**
     * RELATION WITH ROLES
     *
     */
    public function roles(){
        return $this->belongsToMany(Role::class, 'role_user');
    }

    /**
     * Roles not asigned to user
     *
     * @param User $user
     * @return void
     */
    public function notUserRoles( User $user){
        return $this->belongsToMany(Role::class)
                    ->wherePivotNotIn('user_id', [$user->id]);
    }

    /**
     * Roles not asigned to user
     *
     * @param User $user
     * @return void
     */
    public function remainingRoles( ){

        $roles = Role::all();
        $userRoles = $this->roles;
        return $roles->diff($userRoles);
    }

    /**
     * Method para comprobar si el usuario tiene un rol concreto dentro de un array
     */
    public function hasRoles( string|array $rolesNames ): bool
    {
        if(!is_array($rolesNames))
            $rolesNames = [ $rolesNames];

        foreach( $this->roles as $role){
            if(in_array($role->role, $rolesNames) )
            return TRUE;
        }

        return FALSE;
    }

    /**
     * METODO PARA CONMPROBAR SI EL USUARIO ES PROPIETARIO DE LA MOTO
     */
    public function isOwner( Bike $bike ){
        return $this->id == $bike->user_id;
    }
}
