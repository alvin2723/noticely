<div>
   
    <div class="card rounded shadow">
        <div class="card-body p-5">
            <h3 class="pb-4">Minute of Meeting Details</h3>
            <div class="table-responsive mb-5">
                <table class="table table-hover border no-margin">
                    <tbody>
                        <tr class="text-center">
                            <td class="border-right blue-color"><h4>MOM Title</h4></td>
                            <td><h4>{{$data->title_mom}}</h4></td>
                            <td></td>
                            <td></td>
                            
                        </tr>
                        <tr class="text-center">
                            <td class="border-right blue-color"><h4>Date MOM</h4></td>
                            <td><h4>{{date('d-m-Y', strtotime($data->date_mom))}}</h4></td>
                            <td></td>
                            <td></td>
                        
                        </tr>
                        <tr class="text-center" style="">
                            <td class="border-right blue-color"><h4>Start</h4></td>
                            <td class="border-right"><h4>{{$data->start_mom}}</h4></td>
                            <td class="border-right blue-color"><h4>End</h4></td>
                            <td><h4>{{$data->end_mom}}</h4></td>
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
                                {{-- <th scope="col">#</th> --}}
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Email</th>
                                <th scope="col" class="text-center">Division</th>
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
