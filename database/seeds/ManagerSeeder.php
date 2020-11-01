<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::create([

        //     'email' => 'user2@gmail.com',
        //     'password' => bcrypt('123456'),

        // ]);

        $user = DB::table('manager')->insert([
            'id_manager' => 'M01',
            'id_users' => '2',
            'name' => 'SOkap',
            'alamat' => "Jambi",
            'phone' => '082281595024',

        ]);
        // $role = Role::findById(4);
        // $user->assignRole([$role->id]);
    }
}
