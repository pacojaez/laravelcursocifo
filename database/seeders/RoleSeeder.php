<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Role::factory()->create([
            'role' => 'SUPERADMIN',
            'description' => 'Superpoderes'
        ]);
        \App\Models\Role::factory()->create([
            'role' => 'ADMIN',
            'description' => 'Casi Superpoderes'
        ]);
        \App\Models\Role::factory()->create([
            'role' => 'SUPERVISOR',
            'description' => 'Supervisa el trabajo de los demás'
        ]);
        \App\Models\Role::factory()->create([
            'role' => 'INVITADO',
            'description' => 'Ninguna opción de gestion'
        ]);
        \App\Models\Role::factory()->create([
            'role' => 'CAPATAZ',
            'description' => 'Capaz de casi todo'
        ]);
        \App\Models\Role::factory()->create([
            'role' => 'COORDINADOR',
            'description' => 'Coordina las operaciones del personal'
        ]);
        \App\Models\Role::factory()->create([
            'role' => 'GESTOR',
            'description' => 'Encargado de gestionar dependencias'
        ]);
        \App\Models\Role::factory()->create([
            'role' => 'RESPONSABLE',
            'description' => 'Responsable de area'
        ]);

    }
}
