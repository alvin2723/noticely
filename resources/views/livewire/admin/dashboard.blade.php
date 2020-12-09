<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3 class="text-center">{{$users-1}}</h3>
                        <p class="text-center">User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('admin.users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
            <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3 class="text-center">{{$mom}}</h3>
                        <p class="text-center">Minute Of Meeting</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clipboard"></i>
                    </div>
                    <a href="{{route('admin.data-mom')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <!-- ./col -->
      </div>
    </div>
  </section>