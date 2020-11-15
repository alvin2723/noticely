<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Division;
use App\User;
use App\Staff;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Divisi extends Component
{
    public $division_id;
    use WithPagination;

    public function render()
    {
        $divisions = Division::all();
        $users = DB::table('staff')->join('division', 'division.id', '=', 'staff.division_id')->select('staff.*', 'division.division_name')->where('division_id', $this->division_id)->paginate(2);


        return view('livewire.post.divisi', compact('divisions', 'users'));
    }
}
