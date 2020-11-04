<div>
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Minute Of Meeting Report</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin_master">Home</a></li>
                <li class="breadcrumb-item active">Data MOM</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mt-2">
                <div class="card-header">
                    <h3 class="card-title col-md-10 col-sm-12 my-2 ">All Data MOM</h3>  
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTables" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                <th>MOM Title</th>
                                <th>Date MOM</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Status</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <td  class="py-5">{{$post->title_mom}}</td>
                                    <td  class="py-5">{{$post->date_mom}}</td>
                                    <td  class="py-5">{{$post->start_mom}}</td>
                                    <td  class="py-5">{{$post->end_mom}}</td>
                                    <td>
                                        @if($post->status == '2')
                                        <label class="badge badge-success">
                                            approved
                                        </label>
                                        
                                        @elseif($post->status == '1')
                                        <label class="badge badge-warning">
                                            waiting on approval
                                        </label>
                                        @else
                                        <label class="badge badge-danger">
                                            pending
                                        </label>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="p-2">
                                            <a href="{{ route('admin.view-mom', $post->id) }}" class="btn-sm btn-block btn-primary">View</a>
                                        </div>
                                        <div class="p-2">
                                            <button type="button" wire:click="destroy({{$post->id}})" class="btn-sm btn-block btn-danger">DELETE</button> 
                                        </div>
                                    
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $posts->links() }}
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>