<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\MinuteOfMeeting;

class CreateMom extends Component
{
    public $title_mom, $date_mom, $start_mom,$end_mom, $objective_mom, $decision_made, $status='0';
    public function render()
    {
        return view('livewire.post.create-mom');
    }
    public function resetInputFields()
    {
    	$this->title_mom = '';
    	$this->date_mom = '';
    	$this->start_mom = '';
    	$this->end_mom = '';
    	$this->objective_mom = '';
    	$this->decision_made = '';
    }
    public function store()
    {
        
        $validatedDate = $this->validate([
            'title_mom' => 'required',
            'date_mom' => 'required',
            'start_mom' => 'required',
            'end_mom' => 'required',
            'objective_mom' => 'required',
            'decision_made' => 'required',
            
        ]);
        MinuteOfMeeting::create([
            'title_mom' =>$this->title_mom,
            'date_mom' =>$this->date_mom,
            'start_mom' => $this->start_mom,
            'end_mom' => $this->end_mom,
            'objective_mom' => $this->objective_mom,
            'decision_made' => $this->decision_made,
            'status' => $this->status
        ]);
        // session()->flash('message', 'Data Created Successfully.');

        $this->resetInputFields();
        return redirect()->to('/');

        // dd($validatedDate);
        
    }
}
