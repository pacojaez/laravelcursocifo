<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Bike::factory(200)->create();
        \App\Models\User::factory(20)->create();
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@larabikes.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'ciudad' => 'Terrassa',
            'provincia' => 'Barcelona',
            'nacimiento' => '2000-03-25',
            'telefono' => '606566636'
            ]);

            $this->call([
                RoleSeeder::class,
            ]);

            $users = User::all();
            $roles = Role::all();
            foreach( $users as $user){
                foreach($roles as $role){
                    if( rand(1,100) > 80)
                        $user->roles()->attach($role->id);
                }
            }
        \App\Models\Concesionario::factory(4)->create();



    }
}
