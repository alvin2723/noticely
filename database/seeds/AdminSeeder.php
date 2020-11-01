<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => 'user4@gmail.com',
            'password' => bcrypt('notice123'),
        ]);
        $role = Role::findById(1);
        $user->assignRole([$role->id]);
    }
}
