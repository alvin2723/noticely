<div class="row flex-column-reverse flex-md-row"  style="margin: 0">
    <div class="col-lg-8 col-md-7">
        <div class="card rounded shadow">
            <div class="card-body p-5">
                <h3 class="pb-4">Minute of Meeting Details</h3>
                <div class="table-responsive mb-5">
                    <table class="table table-hover border no-margin">
                        <tbody>
                            <tr class="text-center">
                                <td class="border-right blue-color"><h4>MOM Title</h4></td>
                                <td class=>{{$data->title_mom}}</td>
                                <td></td>
                                <td></td>
                                
                            </tr>
                            <tr class="text-center">
                                <td class="border-right blue-color"><h4>Date MOM</h4></td>
                                <td>{{$data->date_mom}}</td>
                                <td></td>
                                <td></td>
                            
                            </tr>
                            <tr class="text-center" style="">
                                <td class="border-right blue-color"><h4>Start</h4></td>
                                <td class="border-right">{{$data->start_mom}}</td>
                                <td class="border-right blue-color"><h4>End</h4></td>
                                <td>{{$data->end_mom}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            
                <div class="card">
                    <div class="card-header blue-color">
                        <h4>Objective MOM</h4>
                    </div>
                    <div class="card-body">
                        <p>{{$data->objective_mom}}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header blue-color">
                        <h4>Decision Made</h4>
                    </div>
                    <div class="card-body">
                        <p>{{$data->decision_made}}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header blue-color">
                        <h4>Attendees</h4>
                    </div>
                    <div class="card-body" style="padding: 0;">
                        <div class="table-responsive">
                            <table class="table table-border table-hover  no-margin">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-center">Name</th>
                                    <th scope="col" class="text-center">Email</th>
                                    <th scope="col" class="text-center">Division</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($attendee as $item)
                                    <tr>
                                        {{-- <th scope="row">{{$loop->index}}</th> --}}
                                        <td class="text-center">{{$item->name}}</td>
                                        <td class="text-center">{{$item->email}}</td>
                                        <td class="text-center">{{$item->division_name}}</td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
        
    </div>
    
    <div class="col-lg-4 col-md-5 right-box">
        <div class="card rounded shadow">
            @role('Staff')
                @if($data->created_note == '1')
                    <div class="card-header blue-color">
                        
                        <h4  class="text-center">Notes For Change :</h4>
                    </div>
                @endif
            @else
                <div class="card-header blue-color">
                    <h4 class="text-center">Will You Approve This MOM?</h4>
                </div>
            @endrole
            
            <div class="card-body">
                @role('Staff')
                    @if($data->created_note == '1')
                        <p class="py-2 text-danger" style="font-size: 20px">{{$note->note_desc}}</p>
                        
                        <a href="{{ route('post.edit-mom', $data->id) }}" type="button" class="btn btn-block btn-success" style="margin:0">Edit MOM</a>
                    @else
                        <h4 class="py-2 text-center text-warning">Waiting for Approval</h4>
                    @endif
                @elserole('Supervisor')
                    <div class="row">
                        <div class="col-6 p-2">
                            <button wire:click="approve()" type="button" class="btn btn-block btn-lg btn-success">APPROVE</button>
                        </div>
                        <div class="col-6 p-2">
                            <button type="button" class="btn btn-block btn-lg btn-outline-success" data-toggle="modal" data-target="#exampleModalCenter">
                                DECLINE
                            </button>
                            
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-6 p-2">
                            <button type="button" class="btn btn-block btn-lg btn-outline-success" data-toggle="modal" data-target="#exampleModalApprove">APPROVE</button>
                        </div>
                        <div class="col-6 p-2">
                            <button type="button" class="btn btn-block btn-lg btn-outline-success" data-toggle="modal" data-target="#exampleModalApprove">
                                DECLINE
                            </button>
                            
                        </div>
                    </div>          
                @endrole
            </div>
        </div>
        
    </div>
    
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="exampleModalCenter"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLongTitle">Note for Change:</h5>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Notes:</label>
                            <input type="text-area" class="form-control" id="exampleFormControlInput1" placeholder="notes" wire:model="notes_mom">
                            @error('notes_mom') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                        <button wire:click.prevent="store_note()" type="submit" class="btn btn-primary">Create Note</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="exampleModalApprove"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLongTitle">Send Notification of Approval to Staff</h5>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Select:</label>
                                <div class="form-check">
                                    <label class="form-check-label" for="radio1">
                                        <input type="radio" class="form-check-input" id="radio1" wire:model="notif" name="notif" value="email">Email
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label" for="radio2">
                                        <input type="radio" class="form-check-input" id="radio2" 
                                        wire:model="notif" name="notif" value="wa" >WhatsApp
                                    </label>
                                </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button wire:click.prevent="approve()" type="submit" class="btn btn-primary">Send Notif</button>
                        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.livewire.on('userStore', () => {
            $('#exampleModal').modal('hide');
        });
    </script>
</div>
