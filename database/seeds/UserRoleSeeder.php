<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;
class UserRoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=> 'Bocah',
            'email'=>'user@gmail.com',
            'password' => bcrypt('123456'),
            'alamat' => "Jambi",
            'phone' => '082281595022',
            'divisi' => 'IT',

        ]);
        $role = Role::findById(2);
        $user->assignRole([$role->id]);
        // $this->call(UserSeeder::class);
        
    }
}
