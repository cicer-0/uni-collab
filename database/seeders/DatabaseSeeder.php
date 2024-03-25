<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Project;
use App\Models\Form;
use App\Models\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Crear Roles
        DB::table('Roles')->insert([
            'RoleName' => 'Admin',
            'Description' => 'Administrador del sistema',
        ]);
        DB::table('Roles')->insert([
            'RoleName' => 'Usuario',
            'Description' => 'Usuario regular',
        ]);
        // Crear Usuarios
        foreach (range(1, 10) as $index) {
            DB::table('Users')->insert([
                'Username' => $faker->userName,
                'Password' => bcrypt('password'),
                'Email' => $faker->email,
                'DateCreated' => $faker->dateTimeThisYear(),
            ]);
        }
        // Asignar Roles a Usuarios
        $users = User::all();
        foreach ($users as $user) {
            $roleId = $faker->randomElement([1, 2]); // IDs de Roles existentes
            DB::table('UserRoles')->insert([
                'UserId' => $user->id,
                'RoleId' => $roleId,
            ]);
        }

        // Crear Proyectos
        foreach (range(1, 5) as $index) {
            DB::table('Projects')->insert([
                'UserId' => $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]), // IDs de Usuarios existentes
                'ProjectName' => $faker->sentence(3),
                'Status' => $faker->randomElement(['En Proceso', 'Completado', 'Pendiente']),
                'ProjectOwner' => $faker->name,
                'Faculty' => $faker->company,
                'ResearchArea' => $faker->word,
                'ResearchLine' => $faker->word,
                'NumMembers' => $faker->numberBetween(1, 10),
                'Description' => $faker->paragraph,
            ]);
        }

        // Crear Formularios
        $projects = Project::all();
        foreach ($projects as $project) {
            DB::table('Forms')->insert([
                'ProjectId' => $project->id,
                'MicrosoftFormLink' => $faker->url,
            ]);
        }

        // Crear Solicitudes
        foreach (range(1, 10) as $index) {
            DB::table('Requests')->insert([
                'ProjectId' => $faker->randomElement([1, 2, 3, 4, 5]), // IDs de Proyectos existentes
                'UserId' => $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]), // IDs de Usuarios existentes
                'RequestStatus' => $faker->randomElement(['Aprobado', 'Pendiente', 'Rechazado']),
            ]);
        }
    }
}
