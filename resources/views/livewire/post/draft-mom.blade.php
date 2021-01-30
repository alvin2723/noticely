<div style="margin: 0">

    {{-- Nothing in the world is as soft and yielding as water. --}}
   
    <div class="col-md-9 col-sm-12">
        @foreach($posts as $post)
       
        <div class="card rounded shadow left-box p-md-4" >
            <div class="card-body">
                <div class="row">
                        @role('Staff')
                            @if($post->status == 1)
                            <div class="col-md-2 py-md-2 py-sm-3 text-danger text-center">
                                <i class="fas fa-times-circle fa-3x mb-2"></i><br>
                                Not Approved
                            </div>
                            @elseif($post->status == 0)
                                <div class="col-md-2 py-md-2 py-sm-3 text-warning text-center">
                                    <i class="fas fa-exclamation-circle fa-3x mb-2"></i>
                                    pending
                                </div>
                            @endif
                        @elserole('Supervisor')
                            @if($post->status == 0)
                            <div class="col-md-2 py-md-2 py-sm-3 text-primary text-center">
                                <i class="fas fa-spinner fa-3x mb-2"></i>
                                Waiting for Approval
                            </div>
                            @endif
                        @else
                            <div class="col-md-2 py-md-2 py-sm-3 text-primary text-center">
                                <i class="fas fa-spinner fa-3x mb-2"></i>
                                Waiting Last Approval
                            </div>
                        @endrole
                    <div class="col-md-10 col-sm-12">
                        <h3  class="text-capitalize">{{$post->title_mom}}</h3>
                        <p class="text-muted text-capitalize" style="font-size:16px">{{$post->objective_mom}}</p>
                        <div class="tag d-flex justify-content-between">
                            <div class="user-image">
                                <img src="{{ asset('image/person.png') }}" class="rounded-circle" alt="" style="width: 50px; height:50px">
                                <p class="m-3">Created by<span class="text-primary"> {{$post->name}}</span></p>
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
    
</div>
