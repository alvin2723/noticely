<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\MinuteOfMeeting;
use Livewire\WithPagination;

class DataMom extends Component
{
    use WithPagination;
    public function destroy($postId)
    {

        $post = MinuteOfMeeting::find($postId);

        if ($post) {
            $post->delete();
        }

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('admin.data-mom');
    }
    public function render()
    {
        $post = MinuteOfMeeting::latest()->paginate(5);
        return view('livewire.admin.data-mom', [
            'posts' => $post
        ]);
    }
}
