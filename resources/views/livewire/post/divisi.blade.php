<div>

    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="card rounded shadow left-box">
        <div class="card-header blue-color">
            <h2 class="text-center"> Our Division</h2>
        </div>
        <div class="card-body text-center">
          
                <div class="form-group">
                    <select id="division_id" wire:model="division_id" class="form-control">
                        <option value=''>Choose a Division</option>
                        @foreach($divisions as $item)
                            <option value="{{$item->id}}">{{$item->division_name}}</option>
                        @endforeach
                    </select>
                    
                </div>
                @foreach ($users as $data)
                    @if($this->division_id == $data->division_id)
                    <div class="row" style="margin-left:12%;margin-bottom:2rem">
                        <div class="one-person col-md-5 col-sm-12">
                            <div class="pic">
                                <img src="{{ asset('image/1.png') }}"  alt="" >
                            </div>
                            <div class="division-content">
                                <h4 class="person-name">{{$data->name}}</h4>
                                <span class="person-title"></span>
                            </div>
                            <ul class="social">
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="one-person col-md-5 col-sm-12" >
                            <div class="pic">
                        
                                <img src="{{ asset('image/1.png') }}"  alt="" >
                            </div>
                            <div class="division-content">
                                <h4 class="person-name"> sdfsdfsdf</h4>
                                <span class="person-title">sdfsdfsdf </span>
                            </div>
                            <ul class="social">
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>  
                        </div>                    
                    </div>
                    @endif
                @endforeach
                {{$users->links()}}
        </div>
       
           
    </div>
    
    
  
    {{-- <div class="col-lg-3 col-md-5 right-box">
        
        <a href="{{route('post.create-mom')}}" type="button" class="btn btn-primary btn-lg px-4"><i class="fas fa-plus" style="margin-right: 10px"></i>
            Create MoM</a>
    </div> --}}
    
   
</div>
