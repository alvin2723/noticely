<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="card rounded shadow">
        <div class="card-body p-5">
            <form  wire:submit.prevent="store" class="row">
                <div class="form-group  col-sm-12 col-xs-12">
                    <label for="exampleFormControlInput1">Employee's Name:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Employee Name" wire:model="name" autofocus>
                    @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group  col-sm-12 col-xs-12">
                    <label for="exampleFormControlInput2">Email:</label>
                    <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="aj@gmail.com" wire:model="email" autofocus>
                    @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group  col-sm-12 col-xs-12">
                    <label for="exampleFormControlInput2">Password:</label>
                    <input type="password" class="form-control" id="exampleFormControlInput2"  wire:model="password" autofocus>
                    @error('password') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group  col-sm-12 col-xs-12">
                    <label for="exampleFormControlInput3">Address:</label>
                    <input type="text-area" class="form-control" id="exampleFormControlInput3" placeholder="Jl. Gatot Subroto" wire:model="alamat" autofocus>
                    @error('alamat') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group  col-sm-12 col-xs-12">
                    <label for="exampleFormControlInput3">Phone:</label>
                    <div class="input-group mb-2">
                      
                        <div class="input-group-prepend">
                          <div class="input-group-text">+62</div>
                        </div>
                        <input type="text" class="form-control" id="exampleFormControlInput3" placeholder="81231235678" wire:model="phone" autofocus>
                        @error('phone') <span class="text-danger">{{ $message }}</span>@enderror
                      </div>
                  
                    
                </div>
                <div class="form-group  col-sm-12 col-xs-12">
                    <label for="exampleFormControlInput3">Role:</label>
                    <select id="role_id" wire:model="role_id" class="form-control">
                        <option value=''>Choose a Role</option>
                        @foreach($roles as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach   
                       
                    </select>
                </div>
               @if($this->role_id == '2')
                <div class="form-group  col-sm-12 col-xs-12">
                    <label for="exampleFormControlInput3">Division:</label>
                    <select id="division_id" wire:model="division_id" class="form-control">
                        <option value=''>Choose a Division</option>
                        @foreach($division as $item)
                            <option value="{{$item->id}}">{{$item->division_name}}</option>
                        @endforeach
                    </select>
                </div>
               
                <div class="form-group  col-sm-12 col-xs-12">
                    <label for="exampleFormControlInput3">Supervisor:</label>
                    <select id="id_supervisor" wire:model="id_supervisor" class="form-control">
                        <option value=''>Choose a Supervisor</option>
                        @foreach($supervisor as $item)
                            @if($this->division_id ==  $item->division_id)
                            <option value="{{$item->id_supervisor}}">{{$item->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                @elseif($this->role_id == '3' | $this->role_id == '4')
                <div class="form-group  col-sm-12 col-xs-12">
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
