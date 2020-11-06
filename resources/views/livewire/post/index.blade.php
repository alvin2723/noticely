<div class="row flex-column-reverse flex-md-row"  style="margin: 0">

    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="col-lg-8 col-md-7 col-sm-12">
        @foreach($posts as $post)
        <div class="card rounded shadow">
            <div class="card-body p-5">
                <div class="row">
                    <div class="col-2">
                        sdfsdfsd
                    </div>
                    <div class="col-10">
                        <h2 class="h5">{{$post->title_mom}}</h2>
                        <p class="font-italic text-muted">{{substr($post->objective_mom, 0,  150)}}</p>
                        <div class="tag d-flex justify-content-between">
                            <div class="user-image">
                                <img src="{{ asset('image/1.png') }}" class="rounded-circle" alt="" style="width: 50px; height:50px">
                                <p class="m-3">sdffd</p>
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
        
        <a href="{{route('post.create-mom')}}" type="button" class="btn btn-primary btn-lg px-4"><i class="fas fa-plus" style="margin-right: 10px"></i>
            Create MoM</a>
    </div>
    
   
</div>
