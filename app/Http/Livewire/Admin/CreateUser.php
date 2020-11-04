<?php

namespace App\Http\Livewire\Admin;

use App\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateUser extends Component
{

    public function render()
    {
        $division = DB::table('division')->get();
        return view('livewire.admin.create-user', [
            'division' => $division
        ]);
    }
}
