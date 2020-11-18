<?php

namespace App\Http\Livewire\Admin;

use App\User;
use App\Manager;
use App\Staff;
use App\Supervisor;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateUser extends Component
{
    public $name, $email, $password, $alamat, $phone, $role_id, $division_id, $user, $id_supervisor;

    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->alamat = '';
        $this->phone = '';
    }
    public function validateData()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'alamat' => 'required|min:6',
            'phone' => 'required|min:11',
            'role_id' => 'required',
            'division_id' => 'required',

        ]);
    }
    public function  createUser()
    {
        $this->users = User::create([
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $role = Role::findById($this->role_id);

        $this->users->assignRole([$role->id]);
    }
    public function createStaff()
    {

        $this->createUser();
        $data = Staff::orderby('id_staff', 'DESC')->first();
        $staff_id = $data->id_staff;
        $staff_id++;

        Staff::create([
            'id_staff' => $staff_id,
            'id_users' => $this->users->id,
            'id_supervisor' => $this->id_supervisor,
            'name' => $this->name,
            'division_id' => $this->division_id,
            'alamat' => $this->alamat,
            'phone' => '62' . $this->phone

        ]);
    }
    public function createSupervisor()
    {
        $this->createUser();


        $manager = Manager::where('division_id', $this->division_id)->first();
        $data = Supervisor::orderby('id_supervisor', 'DESC')->first();
        $supervisor_id = $data->id_supervisor;
        $supervisor_id++;

        Supervisor::create([
            'id_supervisor' => $supervisor_id,
            'id_users' => $this->users->id,
            'id_manager' => $manager->id_manager,
            'name' => $this->name,
            'division_id' => $this->division_id,
            'alamat' => $this->alamat,
            'phone' => '62' . $this->phone

        ]);
    }
    public function createManager()
    {
        $this->createUser();

        $data = Manager::orderby('id_manager', 'DESC')->first();
        $manager_id = $data->id_manager;
        $manager_id++;

        Manager::create([
            'id_manager' => $manager_id,
            'id_users' => $this->users->id,
            'division_id' => $this->division_id,
            'name' => $this->name,
            'alamat' => $this->alamat,
            'phone' => '62' . $this->phone

        ]);
    }
    public function store()
    {

        $this->validateData();

        if ($this->role_id == '2') {

            $this->createStaff();
            session()->flash('message', 'New Data Has Been Added');

            //redirect
            $this->resetInputFields();
            return redirect()->route('admin.users');
        } else if ($this->role_id == '3') {

            $this->createSupervisor();
            session()->flash('message', 'New Data Has Been Added');

            //redirect
            $this->resetInputFields();
            return redirect()->route('admin.users-supervisor');
        } else if ($this->role_id == '4') {

            $this->createManager();
            session()->flash('message', 'New Data Has Been Added');

            //redirect
            $this->resetInputFields();
            return redirect()->route('admin.users-manager');
        }
    }
    public function render()
    {
        $roles = Role::all();
        $division = DB::table('division')->get();
        $supervisor = Supervisor::all();

        return view('livewire.admin.create-user', compact('roles', 'division', 'supervisor'));
    }
}
