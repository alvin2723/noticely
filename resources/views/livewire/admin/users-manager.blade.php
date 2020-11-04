<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manager Report</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin_master">Home</a></li>
            <li class="breadcrumb-item active">Data Manager</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="row">
    <div class="col-12">
      <div class="card mt-2">
        <div class="card-header">
            <div class="row">
                <h3 class="card-title col-md-10 col-sm-12 my-2 ">All Data Manager</h3>
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
                      <th>Phone</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($manager as $user)
                      <tr>
                        <td  class="py-5">{{$user->name}}</td>
                        <td  class="py-5">{{$user->email}}</td>
                        <td  class="py-5">{{$user->alamat}}</td>
                        <td  class="py-5">{{$user->phone}}</td>
                        <td>
                            <div class="p-2 ">
                                <button wire:click="update({{ $user->id  }})" class="btn-sm btn-block btn-warning">Update</button>
                            </div>
                            <div class="p-2">
                                <button wire:click="delete({{ $user->id  }})" class="btn-sm btn-block btn-danger">Delete</button>
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
