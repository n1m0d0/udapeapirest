<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "admin";
        $user->email = "admin@conapes.com";
        $user->password = bcrypt("987412365");
        $user->save();

        $role = Role::findByName("Administrador", "api");
        $user->assignRole($role);

        $user = new User();
        $user->name = "supervisor";
        $user->email = "supervisor@conapes.com";
        $user->password = bcrypt("987412365");
        $user->save();

        $role = Role::findByName("Supervisor", "api");
        $user->assignRole($role);

        $user = new User();
        $user->name = "invitado";
        $user->email = "invitado@conapes.com";
        $user->password = bcrypt("987412365");
        $user->save();

        $role = Role::findByName("Invitado", "api");
        $user->assignRole($role);
    }
}
