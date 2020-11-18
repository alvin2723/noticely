<div class="row flex-column-reverse flex-md-row"  style="margin: 0">

    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="col-md-7 col-sm-12">
       
        @foreach($posts as $post)
        <div class="card rounded shadow left-box p-md-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 py-md-2 py-sm-2 text-success px-0 text-center" style="margin: 0">
                        <span style="font-size:28px">{{$post->count_attendee}}</span> <br>
                        <span class="text-left">Attendees</span>
                    </div>
                    <div class="col-md-10">
                        <h3 style="text-transform: capitalize;">{{$post->title_mom}}</h3>
                        <p class="font-italic text-muted">{{substr($post->objective_mom, 0,  100)}}</p>
                        <div class="tag d-flex justify-content-between">
                            <div class="user-image">
                                <img src="{{ asset('image/person.png') }}" class="rounded-circle" alt="" style="width: 50px; height:50px">
                                <p class="m-3">Created by<span class="text-primary"> {{$post->name}}</span></p>
                            </div>
                            <div>
                                <a href="{{route('post.detail-mom', $post->id)}}" type="button" class="btn btn-primary text-right px-4 btn-detail"><span>Details</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach        
    </div>
    
  
    <div class="col-md-4 col-sm-12 right-box">
        @role('Staff')
        <a href="{{route('post.create-mom')}}" type="button" class="btn btn-primary btn-lg btn-create" >
           <span><p>CREATE MOM</p></span></a>
        <div class="card rounded shadow">
            <div class="card-header blue-color">
                <h4 class="text-center">Online Staff</h4>
            </div>
            <div class="card-body row px-lg-5 px-md-3">
                @foreach($users as $user)
                    @if($user->isOnline())
                        <h5 class="col-md-8 text-primary">{{$user->name}}</h5>
                        <div class="col-md-4"><label class="badge badge-success">
                            online
                        </label></div>

                    @endif
                @endforeach
            </div>
        </div>
        @else
        <div class="card rounded shadow">
            <div class="card-header blue-color">
                <h4 class="text-center">Online Staff</h4>
            </div>
            <div class="card-body row px-5">
                @foreach($users as $user)
                    @if($user->isOnline())
                        <h5 class="col-md-8 text-primary">{{$user->name}}</h5>
                        <div class="col-md-4"><label class="badge badge-success">
                            online
                        </label></div>

                    @endif
                @endforeach
            </div>
        </div>
        @endrole
        
    </div>
    
   
</div>
