<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $role = Role::create(['name' => 'admin']);
        $role1 = Role::create(['name' => 'writer']);

        $contraseña = "123456789";
        $user = new User([
            "email" => "admin@correoaiep.cl",
            "password" => Hash::make($contraseña),
            "name" => "Administrador1",
        ]);
        $user->saveOrFail();
        $user->assignRole('admin');

        $category = new Category([
            'title' => 'Sin categoria',
            'slug' => 'uncategorized'
        ]);
        $category->saveOrFail();
    }
}

//php artisan migrate --seed