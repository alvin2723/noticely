<div class="row flex-column-reverse flex-md-row"  style="margin: 0">

    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="col-lg-8 col-md-7  col-sm-12 ">
        @foreach($posts as $post)
        <div class="card rounded shadow">
            <div class="card-body p-5">
                <div class="row">
                   
                        @role('Staff')
                            @if($post->status == '0')
                                <label class="badge text-warning col-md-2 py-5">
                                    pending
                                </label>
                            @elseif($post->status=='1')
                                <label class="badge text-danger col-md-2 py-5">
                                    Not Approved
                                </label>
                            @endif
                        @elserole('Supervisor')
                            <label class="badge text-warning text-center col-md-2 py-5">
                                Waiting for <br>
                                Supervisor Approval
                            </label>
                        @else
                            <label class="badge text-primary col-md-2 py-5">
                                Waiting for Manager Approval
                            </label>
                        @endrole
                    
                    <div class="col-md-10 col-sm-12">
                        <h2 class="h5">{{$post->title_mom}}</h2>
                        <p class="font-italic text-muted">{{$post->objective_mom}}</p>
                        <div class="tag d-flex justify-content-between">
                            <div class="user-image">
                                <img src="{{ asset('image/1.png') }}" class="rounded-circle" alt="" style="width: 50px; height:50px">
                                <p class="m-3">sdffd</p>
                            </div>
                            <div>
                                <a href="{{route('post.draft-detail-mom', $post->id)}}" type="button" class="btn btn-primary text-right px-4 btn-detail"><span>Details</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
    
  
    <div class="col-lg-4 col-md-5 order-sm-1 col-sm-12 right-box ">
        
        <a href="{{route('post.create-mom')}}" type="button" class="btn btn-primary btn-lg px-4"><i class="fas fa-plus" style="margin-right: 10px"></i>
            Create MoM</a>
    </div>
    
   
</div>
