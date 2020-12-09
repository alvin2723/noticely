<div style="margin: 0">
    <div class="col-md-9 col-sm-12">
        <div class="card rounded shadow p-md-5">
            <div class="card-body">
                <form>
                    <div class="form-group col-sm-12 col-xs-12">
                        <label for="exampleFormControlInput1">Title Minute of Meeting:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title" wire:model="title_mom" autofocus>
                        @error('title_mom') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group col-sm-12 col-xs-12">
                        <label for="date">Date Minute of Meeting:</label>
                        <input type="date" class="form-control" id="exampleFormControlInput2" placeholder="12/07/2020" wire:model="date_mom" autofocus>
                        @error('date_mom') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group form-row col-sm-12 col-xs-12">
                        <div class="col">
                            <label for="start">Start:</label>
                            <input type="time" class="form-control" id="exampleFormControlInput3" placeholder="08:00" wire:model="start_mom" autofocus>
                            @error('start_mom') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col">
                            <label for="end">End:</label>
                            <input type="time" class="form-control" id="exampleFormControlInput4" placeholder="08:00" wire:model="end_mom" autofocus>
                            @error('end_mom') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        
                    </div>
                    <div class="form-group col-sm-12 col-xs-12">
                        <label for="objective">Objective of Minute of Meeting:</label>
                        <textarea type="text" class="form-control" id="exampleFormControlInput5" wire:model="objective_mom" placeholder="Enter Objective..." autofocus></textarea>
                            @error('objective_mom') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group col-sm-12 col-xs-12">
                        <label for="decision">Decision Made:</label>
                        <textarea type="text" class="form-control" id="exampleFormControlInput6" wire:model="decision_made" placeholder="Enter Decision..." autofocus></textarea>
                            @error('decision_made') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    
                    <div class="form-group col-sm-12 col-xs-12">
                        <label for="attendee">Attendees:</label><br>
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
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        
                        </div>
                    </div>
                    
                    <button wire:click.prevent="store()" class="btn btn-success" onclick="modal();">Create</button>
                    <div class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content" style="width: 48px">
                                <span class="fa fa-spinner fa-spin fa-3x"></span>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
<script>
    function modal(){
       $('.modal').modal('show');
       setTimeout(function () {
       	console.log('hejsan');
       	$('.modal').modal('hide');
       }, 3000);
    }
</script>

