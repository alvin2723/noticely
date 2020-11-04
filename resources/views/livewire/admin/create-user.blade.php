<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="card rounded shadow">
        <div class="card-body p-5">
            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Employee's Name:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Employee Name" wire:model="name">
                    @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput2">Email:</label>
                    <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="aj@gmail.com" wire:model="email">
                    @error('email') <span class="text-danger">{{ $message }}</span>@enderror
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
                <div class="form-group">
                    <label for="exampleFormControlInput3">Role:</label>
                    <select class="form-control">
                        
                        <option value="1">Staff</option>
                        <option value="2">Supervisor</option>
                        <option value="3">Manager</option>
                    </select>
                </div>
               
                <div class="form-group">
                    <label for="exampleFormControlInput3">Division:</label>
                    <select class="form-control">
                        @foreach($division as $item)
                        
                        <option value="{{$item->id}}">IT</option>
                        
                    </select>
                </div>
                <button wire:click.prevent="store()" class="btn btn-success">Create</button>
            </form>
            
        </div>
    </div>
</div>
