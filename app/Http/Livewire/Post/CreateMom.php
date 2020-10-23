<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;

class CreateMom extends Component
{
    public function render()
    {
        return view('livewire.post.create-mom');
    }
    public function store()
    {

        $validatedDate = $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        dd($validatedDate);
    }
}
