<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="card rounded shadow">
        <div class="card-body p-5">
            <form  wire:submit.prevent="store">
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
                    <label for="exampleFormControlInput2">Password:</label>
                    <input type="password" class="form-control" id="exampleFormControlInput2"  wire:model="password">
                    @error('password') <span class="text-danger">{{ $message }}</span>@enderror
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
                    <select id="role_id" wire:model="role_id" class="form-control">
                        <option value=''>Choose a Role</option>
                        @foreach($roles as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach   
                       
                    </select>
                </div>
               @if($this->role_id == '2' || $this->role_id == '3')
                <div class="form-group">
                    <label for="exampleFormControlInput3">Division:</label>
                    <select id="division_id" wire:model="division_id" class="form-control">
                        <option value=''>Choose a Division</option>
                        @foreach($division as $item)
                            <option value="{{$item->id}}">{{$item->division_name}}</option>
                        @endforeach
                    </select>
                </div>
                @endif
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
            
        </div>
    </div>
</div>
