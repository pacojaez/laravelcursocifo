<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\Auth;

class UserController
{
    //
    public function index(){

        $users = User::with('roles')->orderBy('id', 'ASC')->withCount('bikes')->get();
        // $user = User::first();
        // foreach($user->roles as $role)
        //     dd($role);

        return view('users.list', [
            'users' => $users
        ]);
    }

    public function edit( Request $request, User $user )
    {
        // Método que solo comprueba si la moto pertenece al usuario:
        // if( Auth::id() != $bike->user_id )
        //     return view('errors.403');

        //Autorización con Policies:
        if(Auth::user()->cant('update', $user))
                return view('errors.403');

        $roles = Role::all();
        $userRoles = $user->roles;

        $notUserRoles = new Collection;

		 foreach ($roles as $item)
		 {
		     if ( ! $userRoles->contains($item->getKey()))
			 {
			     $notUserRoles->add($item);
			 }
		 }

        return view('users.edit', [
            'user'=>$user,
            'roles' => $roles,
            'notUserRoles' => $notUserRoles,
            'userRoles' => $userRoles
        ]);
    }

    public function update(  User $user, Request $request )
    {
        // logica que solo comprueba que el usuario y el user_id de la moto coinciden
        // if( Auth::id() != $bike->user_id )
        //     return view('errors.403');

        //Autorización con Policies:
        if(Auth::user()->cant('update', $user))
            return view('errors.403');

        //Autorizacion con Policies:
        //NO FUNCIONA SACANDO EL USUARIO DE LA RELACIÓN DEL MODELO
        // $user = $bike->user();
        // if( $user->cant('update',$bike))
        //             abort(401, 'No puedes editar esta moto');

        $request->validate([
            'name' =>'required|max:255',
            'email' =>'required|max:255',
            'ciudad' =>'required|max:255',
            'provincia' =>'required|max:255',
            'telefono' =>'required|max:255',
            'roles' =>'required',
        ]);
        $role = Role::find($request['roles']);
        $user->update($request->only('name', 'email', 'ciudad', 'provincia', 'telefono'));
        $user->roles()->save($role);

        return back()
                ->with('success' , "Usuario  $user->name actualizado correctamente");
    }

    public function removeRole(  Request $request )
    {
        $role = Role::find($request['role']);
        $request->user->roles->detach($role);

        return redirect()->back();
    }
}
