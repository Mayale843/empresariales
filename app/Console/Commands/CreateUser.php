<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Spatie\Permission\Models\Role;

class CreateUser extends Command
{
    protected $signature = 'user:create {name} {email} {password} {role}';
    protected $description = 'Create a new user and assign a role';

    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = bcrypt($this->argument('password'));
        $role = $this->argument('role');

        // Crear el usuario
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        // Asignar rol
        $user->assignRole($role);

        $this->info("User {$name} created with role {$role}.");
    }
}

