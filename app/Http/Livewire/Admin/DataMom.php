<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\MinuteOfMeeting;
use App\Attendee;
use App\Notif;

use Livewire\WithPagination;

class DataMom extends Component
{
    use WithPagination;
    public function destroy($postId)
    {

        $post = MinuteOfMeeting::find($postId);
        $attendee = Attendee::where('id_mom', $postId)->get();
        $notif = Notif::where('id_mom', $postId)->first();

        if ($post) {
            foreach ($attendee as $data) {
                if ($data) {
                    $data->delete();
                    if ($notif) {
                        $notif->delete();
                    }
                }
            }
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
