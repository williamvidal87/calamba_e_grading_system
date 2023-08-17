<div><!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ count($Students) }}</h3>

              <p>Students</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            @if(Auth::user()->rule_id==1)
            <a href="admin-student-table" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            @endif
            @if(Auth::user()->rule_id==2)
            <a href="teacher-student-table" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            @endif
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ count($Subjects) }}</h3>

              <p>Subjects</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            @if(Auth::user()->rule_id==1)
            <a href="admin-subject-table" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            @endif
            @if(Auth::user()->rule_id==2)
            <a href="teacher-subject-table" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            @endif
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ count($Teachers) }}</h3>

              <p>Teacher</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            @if(Auth::user()->rule_id==1)
            <a href="admin-teacher-table" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            @endif
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ count($Admin) }}</h3>

              <p>Admin</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            @if(Auth::user()->rule_id==1)
            <a href="admin-admin-table" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            @endif
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
</div>
