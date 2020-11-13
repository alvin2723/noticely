<div>
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Supervisor Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Data Supervisor</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
  </div>
  <div class="row">
    <div class="col-md-12">
      <nav class="navbar navbar-expand navbar-light">
        <div class="card-header p-1">
          <ul class="navbar-nav">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('admin.users')}}" class="nav-link active">Staff</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="{{route('admin.users-supervisor')}}" class="nav-link">Supervisor</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('admin.users-manager')}}" class="nav-link">Manager</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="row">
        <div class="col-12">
          <div class="card mt-2">
            <div class="card-header">
                <div class="row">
                    <h3 class="card-title col-md-10 col-sm-12 my-2 ">All Data Supervisor</h3>
                    <div class="col-md-2 col-sm-12 ml-auto">
                      <a type="button"  href="{{route('admin.create-user')}}" class="btn btn-sm btn-block btn-primary"><i class="fas fa-plus m-2"></i>Add User</a>
                    </div>
                  </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <table id="dataTables" class="table table-bordered table-striped text-center">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Division</th>
                          <th>Phone</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($supervisor as $user)
                          <tr>
                            <td  class="py-5">{{$user->name}}</td>
                            <td  class="py-5">{{$user->email}}</td>
                            <td  class="py-5">{{$user->alamat}}</td>
                            <td  class="py-5">{{$user->division_name}}</td>
                            <td  class="py-5">{{$user->phone}}</td>
                            <td>
                                <div class="p-2 ">
                                  <a href="{{route('admin.edit-user', $user->id)}}" class="btn-sm btn-block btn-warning">Update</a>
                                </div>
                                <div class="p-2">
                                    <button wire:click="destroy({{$user->id}})" class="btn-sm btn-block btn-danger">Delete</button>
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
  </div>
</div>