<div class="row flex-column-reverse flex-md-row"  style="margin: 0">
    <div class="col-lg-8 col-md-7">
        <div class="card rounded shadow">
            <div class="card-body p-5">
                <h3 class="pb-4">Minute of Meeting Details</h3>
                <div class="table-responsive mb-5">
                    <table class="table table-hover border no-margin">
                        <tbody>
                            <tr class="text-center">
                                <td class="border-right blue-color"><h4>MOM Title</h4></td>
                                <td class=>{{$data->title_mom}}</td>
                                <td></td>
                                <td></td>
                                
                            </tr>
                            <tr class="text-center">
                                <td class="border-right blue-color"><h4>Date MOM</h4></td>
                                <td>{{$data->date_mom}}</td>
                                <td></td>
                                <td></td>
                            
                            </tr>
                            <tr class="text-center" style="">
                                <td class="border-right blue-color"><h4>Start</h4></td>
                                <td class="border-right">{{$data->start_mom}}</td>
                                <td class="border-right blue-color"><h4>End</h4></td>
                                <td>{{$data->end_mom}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            
                <div class="card">
                    <div class="card-header blue-color">
                        <h4>Objective MOM</h4>
                    </div>
                    <div class="card-body">
                        <p>{{$data->objective_mom}}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header blue-color">
                        <h4>Decision Made</h4>
                    </div>
                    <div class="card-body">
                        <p>{{$data->decision_made}}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header blue-color">
                        <h4>Attendees</h4>
                    </div>
                    <div class="card-body" style="padding: 0;">
                        <div class="table-responsive">
                            <table class="table table-border table-hover  no-margin">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Division</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($attendee as $item)
                                    <tr>
                                        {{-- <th scope="row">{{$loop->index}}</th> --}}
                                        <td class="text-center">{{$item->name}}</td>
                                        <td class="text-center">{{$item->email}}</td>
                                        <td class="text-center">{{$item->division_name}}</td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
        
    </div>
    
    <div class="col-lg-4 col-md-5 right-box">
        <div class="card rounded shadow">
            @role('Staff')
            @if($data->status == '1')
            <div class="card-header blue-color">
                   
                <h4  class="text-center">Notes For Change :</h4>
            </div>
            @endif
            @else
            <div class="card-header blue-color">
                <h4 class="text-center">Will You Approve This MOM?</h4>
            </div>
            @endrole
            
            <div class="card-body">
                @role('Staff')
                    @if($data->status == '1')
                        <p class="py-2" style="font-size: 16px">sdfsdfsfsdfsdf</p>
                        <a href="{{route('post.edit-mom',$data->id)}}" type="button" class="btn btn-block btn-lg btn-success">Edit MOM</a>
                    @else
                        <h4 class="py-2 text-center text-primary">Waiting for Approval</h4>
                    @endif
                @else
                    <div class="row">
                        <div class="col-6 p-2">
                            <a href="" type="button" class="btn btn-block btn-lg btn-success">APPROVE</a>
                        </div>
                        <div class="col-6 p-2">
                            <a href="" type="button" class="btn btn-block btn-lg btn-secondary">DECLINE</a>
                        </div>
                    </div>
                
                @endrole
            </div>
        </div>
        
    </div>
    {{-- <div class="col-lg-4 col-md-5 right-box">
        <div class="card p-3">
            <div class="card-body">
                <h4 class="text-center">Will You Approve This MOM?</h4>
                <div class="row mt-4">
                    <div class="col-6 text-center">
                        <a href="{{route('post.create-mom')}}" type="button" class="btn btn-primary btn-sm p-2">
                            Approve MOM</a>
                    </div>
                    <div class="col-6 text-center">
                        <a href="{{route('post.create-mom')}}" type="button" class="btn btn-primary btn-sm p-2">
                            Reject MOM</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div> --}}
</div>
