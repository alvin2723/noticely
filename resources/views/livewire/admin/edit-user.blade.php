<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="card rounded shadow">
        <div class="card-body p-5">
            <form  wire:submit.prevent="update">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Employee's Name:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Employee Name" wire:model="name">
                    @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput3">Address:</label>
                    <input type="text-area" class="form-control" id="exampleFormControlInput3" placeholder="Jl. Gatot Subroto" wire:model="alamat">
                    @error('alamat') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput3">Phone:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput3" placeholder="08123123" wire:model="phone">
                    @error('phone') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
               
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
            
        </div>
    </div>
</div>
