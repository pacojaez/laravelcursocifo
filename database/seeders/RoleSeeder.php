<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Role::factory()->create([
            'role' => 'SuperAdmin',
            'description' => 'Superpoderes'
        ]);
        \App\Models\Role::factory()->create([
            'role' => 'admin',
            'description' => 'Casi Superpoderes'
        ]);
        \App\Models\Role::factory()->create([
            'role' => 'supervisor',
            'description' => 'Supervisa el trabajo de los demás'
        ]);
        \App\Models\Role::factory()->create([
            'role' => 'invitado',
            'description' => 'Ninguna opción de gestion'
        ]);
        \App\Models\Role::factory()->create([
            'role' => 'capataz',
            'description' => 'Capaz de casi todo'
        ]);
        \App\Models\Role::factory()->create([
            'role' => 'coordinador',
            'description' => 'Coordina las operaciones del personal'
        ]);
        \App\Models\Role::factory()->create([
            'role' => 'gestor',
            'description' => 'Encargado de gestionar dependencias'
        ]);
        \App\Models\Role::factory()->create([
            'role' => 'responsable',
            'description' => 'Responsable de area'
        ]);

    }
}
