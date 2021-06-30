@extends('admin.layout')
@section('main')
@section('title') Exams @endsection
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Exams</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('dashbord')}}">Home</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  @include('admin.inc.error')
  @include('admin.inc.massegas')

  <!-- new table -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Exams</h3>

              <div class="card-tools">
                
                <a href="{{url('dashbord/exam/create')}}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-modal">
                  Add exams
                </a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>ID </th>
                    <th>Name (en)</th>
                    <th>Name (ar)</th>
                    <th>Image</th>
                    <th>skill</th>
                    <th>Question #</th>
                    <th>Action</th>
                    <th>ِACTIVE</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($exams as $exam)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$exam->name('en')}}</td>
                    <td>{{$exam->name('ar')}}</td>
                    <td><img src="{{asset("uploads/$exam->img")}}" width="100px" /></td>
                    <td>{{$exam->skill->name('en')}}</td>
                      <td>{{$exam->question_no}}</td> 




                    <td>
                      @if($exam->active)
                      <span class="btn btn-success"> yes </span>
                      @else
                      <span class="btn btn-danger"> no </span>
                      @endif
                    </td>
                    <td>

                      <a href="{{url("dashbord/exam/edit/$exam->id")}}" class="btn btn-sm btn-primary" >
                        <i class="fas fa-edit"> </i>
                      </a>
                      <a href="{{url("dashbord/exam/show/$exam->id")}}" class="btn btn-sm btn-info" >
                        <i class="fas fa-eye"> </i>
                      </a>
                      <a href="{{url("dashbord/exam/show/$exam->id/questions")}}" class="btn btn-sm btn-success " >
                        <i class="fas fa-question"> </i>
                      </a>
                      <a href="{{url("dashbord/exam/delete/$exam->id")}}" class="btn btn-sm btn-danger ">
                        <i class="fas fa-trash"> </i>
                      </a>
                      <a href="{{url("dashbord/exam/toggle/$exam->id")}}" class="btn btn-sm btn-info ">
                        <i class="fas fa-toggle-on"> </i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

              {{$exams->links()}}
              <!-- next and previous -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->

    <!-- newwwwwwwwwwwwwwwww table -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->




<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  <div class="p-3">
    <h5>Title</h5>
    <p>Sidebar content</p>
  </div>
</aside>
<!-- /.control-sidebar -->



@endsection
<!-- بدل ما ارجع عالداتا بيس باخد الداتا من > button   -->
@section('js')

@endsection