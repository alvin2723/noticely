<?php

namespace App\Http\Livewire\Admin;

use App\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EditUser extends Component
{
    public $userId, $name, $alamat, $phone,  $users;

    public function getData($data)
    {
        $this->name = $data->name;
        $this->alamat = $data->alamat;
        $this->phone = $data->phone;
    }
    public function validateData()
    {
        $this->validate([
            'name'   => 'required',
            'alamat'   => 'required',
            'phone'   => 'required',

        ]);
    }

    public function mount($id)
    {
        $this->users = User::find($id);
        $this->userId = $this->users->id;
        if ($this->users->hasRole('Staff')) {

            $data = DB::table('staff')
                ->where('staff.id_users', '=', $this->userId)->first();
            $this->getData($data);
        } else if ($this->users->hasRole('Supervisor')) {
            $data = DB::table('supervisor')
                ->where('supervisor.id_users', '=', $this->userId)->first();
            $this->getData($data);
        } else {

            $data = DB::table('manager')
                ->where('manager.id_users', '=', $this->userId)->first();

            $this->getData($data);
        }
    }
    public function update()
    {
        $this->validateData();

        if ($this->userId) {

            $user = User::find($this->userId);
            if ($this->users->hasRole('Staff')) {
                DB::table('staff')
                    ->where('id_users', $user->id)
                    ->update([
                        'name' => $this->name,
                        'alamat' => $this->alamat,
                        'phone' => $this->phone,
                    ]);

                //flash message
                session()->flash('message', 'Data Updated.');

                //redirect
                return redirect()->route('admin.users');
            } else if ($this->users->hasRole('Supervisor')) {
                DB::table('supervisor')
                    ->where('id_users', $user->id)
                    ->update([
                        'name' => $this->name,
                        'alamat' => $this->alamat,
                        'phone' => $this->phone,
                    ]);

                //flash message
                session()->flash('message', 'Data Updated.');

                //redirect
                return redirect()->route('admin.users-supervisor');
            } else {

                DB::table('manager')
                    ->where('id_users', $user->id)
                    ->update([
                        'name' => $this->name,
                        'alamat' => $this->alamat,
                        'phone' => $this->phone,

                    ]);
                //flash message
                session()->flash('message', 'Data Updated.');

                //redirect
                return redirect()->route('admin.users-manager');
            }
        }
    }
    public function render()
    {

        return view('livewire.admin.edit-user');
    }
}
