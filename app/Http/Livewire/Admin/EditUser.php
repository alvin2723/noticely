<?php

namespace App\Http\Livewire\Admin;

use App\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EditUser extends Component
{
    public $userId, $name, $alamat, $phone, $division_id, $role_id,  $users;
    public function mount($id)
    {

        $this->users = User::find($id);
        $this->userId = $this->users->id;
        if ($this->users->hasRole('Staff')) {

            $data = DB::table('staff')
                ->where('staff.id_users', '=', $this->userId)->first();

            if ($data) {
                $this->name = $data->name;
                $this->alamat = $data->alamat;
                $this->phone = $data->phone;
                $this->division_id = $data->division_id;
                $this->role_id = $this->users->roles->pluck('id')->first();

                $supervisor = DB::table('supervisor')->where('division_id', '=', $this->division_id)->first();
            }
        } else if ($this->users->hasRole('Supervisor')) {
            $data = DB::table('supervisor')
                ->where('supervisor.id_users', '=', $this->userId)->first();

            if ($data) {
                $this->name = $data->name;
                $this->alamat = $data->alamat;
                $this->phone = $data->phone;
                $this->division_id = $data->division_id;
                $this->role_id = $this->users->roles->pluck('id')->first();
                $manager = DB::table('manager')->first();
            }
        } else if ($this->users->hasRole('Manager')) {

            $data = DB::table('manager')
                ->where('manager.id_users', '=', $this->userId)->first();

            if ($data) {

                $this->name = $data->name;
                $this->alamat = $data->alamat;
                $this->phone = $data->phone;
                $this->role_id = $this->users->roles->pluck('id')->first();
            }
        }
    }
    public function update()
    {

        $this->validate([
            'name'   => 'required',
            'alamat'   => 'required',
            'phone'   => 'required',
            'role_id'   => 'required',


        ]);

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

        //flash message
        session()->flash('message', 'Data Berhasil Diupdate.');

        //redirect
        return redirect()->route('admin.users');
    }
    public function render()
    {
        $roles = Role::all();
        $division = DB::table('division')->get();
        return view('livewire.admin.edit-user', [
            'division' => $division,
            'roles' => $roles
        ]);
    }
}
