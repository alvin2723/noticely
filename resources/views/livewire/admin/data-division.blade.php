<div>
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Staff Report</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Data Division</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mt-2">
                <div class="card-header">
                    <div class="row">
                        <h3 class="card-title col-md-10 col-sm-12 my-2 ">All Data Division</h3>
                        <div class="col-md-2 col-sm-12 ml-auto">
                        <a type="button"  href="{{route('admin.create-division')}}"class="btn btn-sm btn-block btn-primary"><i class="fas fa-plus m-2"></i>Add Division</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTables" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Division Name</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($division as $divisi)
                                    <tr>
                                        <td>{{$divisi->id}}</td>
                                        <td>{{$divisi->division_name}}</td>
                                        <td>
                                            <div class="p-2">
                                                <button wire:click="destroy({{$divisi->id}})" class="btn-sm btn-block btn-danger" >Delete</button>
                                            </div>
                                            
                                        </td>
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