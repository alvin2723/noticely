<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;

class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::create([
        //     'email' => 'user1@gmail.com',
        //     'password' => bcrypt('123456'),

        // ]);

        $user = DB::table('supervisor')->insert([
            'id_supervisor' => 'SP01',
            'id_users' => '3',
            'id_manager' => 'M01',
            'alamat' => "Jambi",
            'name' => 'Julsa',
            'phone' => '082281595030',

        ]);
        // $role = Role::findById(3);
        // $user->assignRole([$role->id]);
    }
}
