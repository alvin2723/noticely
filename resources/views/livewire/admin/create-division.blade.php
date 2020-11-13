<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="card rounded shadow">
        <div class="card-body p-5">
            <form  wire:submit.prevent="store">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Division Name:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Employee Name" wire:model="division_name">
                    @error('division_name') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
            
        </div>
    </div>
</div>
