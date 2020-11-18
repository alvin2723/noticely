<div>
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Notification Report</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Data Notification</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mt-2">
                <div class="card-header">
                    <h3 class="card-title col-md-10 col-sm-12 my-2 ">All Data Notification</h3>  
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTables" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                <th>Staff Name</th>
                                <th>MOM Title</th>
                                <th>Notif Type</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notification as $notif)
                                <tr>
                                    <td  class="py-5">{{$notif->name}}</td>
                                    <td  class="py-5">{{$notif->title_mom}}</td>
                                    <td  class="py-5">{{$notif->notif_type}}</td>
                                    <td>
                                        
                                        <div class="p-2">
                                            <button type="button" wire:click="notif({{$notif->id}})" class="btn-sm btn-block btn-primary">SEND NOTIF</button> 
                                        </div>
                                    
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $notification->links() }}
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>