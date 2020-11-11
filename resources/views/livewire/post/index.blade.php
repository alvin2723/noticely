<div class="row flex-column-reverse flex-md-row"  style="margin: 0">

    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="col-lg-8 col-md-7 col-sm-12">
       
        @foreach($posts as $post)
        <div class="card rounded shadow post-card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 py-md-5 py-sm-2 text-success">
                        sdfsdfsd
                    </div>
                    <div class="col-md-10">
                        <h3 style="text-transform: capitalize;">{{$post->title_mom}}</h3>
                        <p class="font-italic text-muted">{{substr($post->objective_mom, 0,  100)}}</p>
                        <div class="tag d-flex justify-content-between">
                            <div class="user-image">
                                <img src="{{ asset('image/1.png') }}" class="rounded-circle" alt="" style="width: 50px; height:50px">
                                <p class="m-3">{{$post->name}}</p>
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
    
  
    <div class="col-lg-4 col-md-5 col-sm-12 right-box">
        @role('Staff')
        <a href="{{route('post.create-mom')}}" type="button" class="btn btn-primary btn-lg px-4 btn-create">
           <span> CREATE MOM</span></a>
        @endrole
    </div>
    
   
</div>
