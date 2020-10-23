<div>
    <div class="card rounded shadow" style="margin-right:22%">
        <div class="card-body p-5">
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
                <div class="form-group">
                    
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
                <button wire:click.prevent="store()" class="btn btn-success">Create</button>
            </form>
            
        </div>
    </div>
</div>
