<?php

namespace App\Http\Livewire\Admin;

use App\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EditUser extends Component
{
    public $userId, $name, $user;
    public function mount($id)
    {

        $this->user = User::find($id);
    }
    public function update()
    {
        $this->validate([
            'name'   => 'required',

        ]);

        if ($this->userId) {

            $user = User::find($this->userId);

            if ($user) {
                $user->update([
                    'name'     => $this->name,
                ]);
            }
        }

        //flash message
        session()->flash('message', 'Data Berhasil Diupdate.');

        //redirect
        return redirect()->route('admin.users');
    }
    public function render()
    {
        if ($this->user->hasRole('Staff')) {
            $data = DB::table('staff')
                ->where('staff.id_users', '=', $this->user->id)->first();
            if ($data) {
                $this->name = $data->name;
            }
        }
        return view('livewire.admin.edit-user');
    }
}
