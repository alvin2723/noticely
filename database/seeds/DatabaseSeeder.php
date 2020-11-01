<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::create([
        //     'name'=> 'AdminBocah',
        //     'email'=>'user1@gmail.com',
        //     'password' => bcrypt('123456'),
        //     'alamat' => "Jambi",
        //     'phone' => '082281595022',
        //     'divisi' => 'IT',

        // ]);
        // $role = Role::findById(1);
        // $user->assignRole([$role->id]);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Staff']);
        Role::create(['name' => 'Supervisor']);
        Role::create(['name' => 'Manager']);
        // $this->call(UserSeeder::class);

    }
}
