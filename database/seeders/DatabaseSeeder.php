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

 }
}
