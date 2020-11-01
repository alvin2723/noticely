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
        // $user = User::create([
        //     'email' => 'user@gmail.com',
        //     'password' => bcrypt('123456'),
        // ]);

        $user = DB::table('staff')->insert([
            'id_staff' => 'S01',
            'id_users' => '1',
            'id_supervisor' => 'SP01',
            'name' => 'Jul',
            'alamat' => 'Jambi',
            'phone' => '0123123123',

        ]);
        // $role = Role::findById(2);
        // $user->assignRole([$role->id]);
        // $this->call(UserSeeder::class);

    }
}
