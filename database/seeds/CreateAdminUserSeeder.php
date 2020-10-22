<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
    }
}
