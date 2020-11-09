<div>
    <div class="card rounded shadow p-3">
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title Minute of Meeting:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title" wire:model="title_mom">
                    @error('title_mom') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput2">Date Minute of Meeting:</label>
                    <input type="date" class="form-control" id="exampleFormControlInput2" placeholder="12/07/2020" wire:model="date_mom">
                    @error('date_mom') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group form-row">
                    <div class="col">
                        <label for="exampleFormControlInput3">Start:</label>
                        <input type="time" class="form-control" id="exampleFormControlInput3" placeholder="08:00" wire:model="start_mom">
                        @error('start_mom') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput4">End:</label>
                        <input type="time" class="form-control" id="exampleFormControlInput4" placeholder="08:00" wire:model="end_mom">
                        @error('end_mom') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput5">Objective of Minute of Meeting:</label>
                    <textarea type="text" class="form-control" id="exampleFormControlInput5" wire:model="objective_mom" placeholder="Enter Objective..."></textarea>
                        @error('objective_mom') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput6">Decision Made:</label>
                    <textarea type="text" class="form-control" id="exampleFormControlInput6" wire:model="decision_made" placeholder="Enter Decision..."></textarea>
                        @error('decision_made') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                
                <div class="form-group">
                    <label for="exampleFormControlInput6">Attendees:</label><br>
                    <div class="accordion" id="accordionExample">
                        @foreach($division as $divisi)
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne">{{$divisi->division_name}}</button>									
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    @foreach($user as $item)
                                        @if($item->division_id == $divisi->id)

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="defaultCheck1" wire:model="attendees.{{$item->id_staff}}">
                                                <label class="form-check-label" for="defaultCheck1">
                                                {{$item->name}}
                                                </label>
                                                {{-- <input class="form-check-input" type="checkbox" id="defaultCheck1" wire:model="attendees.saa">
                                                <label class="form-check-label" for="defaultCheck1">
                                                Default checkbox
                                                </label> --}}
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    
                    </div>
                      
                    {{-- <textarea type="text" class="form-control" id="exampleFormControlInput6" wire:model="attendees" placeholder="Enter Decision..."></textarea> --}}
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput7">Send to :</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="defaultCheck1" wire:model="notif.email">
                        <label class="form-check-label mr-5" for="defaultCheck1">
                            EMAIL
                        </label>
                        <input class="form-check-input" type="checkbox" id="defaultCheck2" wire:model="notif.wa">
                        <label class="form-check-label" for="defaultCheck2">
                            WHATSAPP
                        </label>
                    </div>
                </div>
                {{-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal">Create</button> --}}
                
                <button wire:click.prevent="store()" class="btn btn-success">Create</button>
            </form>
            
        </div>
    </div>
</div>
