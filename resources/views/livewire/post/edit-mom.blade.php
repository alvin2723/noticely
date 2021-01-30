<div>
    <div class="card rounded shadow">
        <div class="card-body p-md-5">
            <form  wire:submit.prevent="update">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title Minute of Meeting:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title" wire:model="title_mom" autofocus>
                    @error('title_mom') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput2">Date Minute of Meeting:</label>
                    <input type="date" class="form-control" id="exampleFormControlInput2" placeholder="12/07/2020" wire:model="date_mom" value="date_mom" readonly>
                   
                </div>
                <div class="form-group form-row">
                    <div class="col">
                        <label for="exampleFormControlInput3">Start:</label>
                        <input type="time" class="form-control" id="exampleFormControlInput3" placeholder="08:00" wire:model="start_mom" readonly>
                       
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput4">End:</label>
                        <input type="time" class="form-control" id="exampleFormControlInput4" placeholder="08:00" wire:model="end_mom" readonly>
                      
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput5">Objective of Minute of Meeting:</label>
                    <textarea type="text" class="form-control" id="exampleFormControlInput5" wire:model="objective_mom" placeholder="Enter Objective..." autofocus></textarea>
                        @error('objective_mom') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput6">Decision Made:</label>
                    <textarea type="text" class="form-control" id="exampleFormControlInput6" wire:model="decision_made" placeholder="Enter Decision..." autofocus></textarea>
                        @error('decision_made') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                
                
                <button type="submit" class="btn btn-success">Edit</button>
            </form>
            
        </div>
    </div>
</div>
