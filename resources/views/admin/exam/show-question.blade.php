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
          <h1 class="m-0 text-dark">Show question </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('dashbord')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('dashbord/exam')}}">Exam</a></li>

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
              <h3 class="card-title">All Question</h3>

              
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th># </th>
                    <th>title </th>

                    <th>option 1</th>
                    <th>option 2</th>
                    <th>option 3</th>
                    <th>option 4</th>
                    <th>right ans</th>
                    <th>ِACTIVE</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($exam->questions as $que)
                  <tr> 
                    <td>{{$loop->iteration}}</td>
                    <td>{{$que->title}}</td>
                    <td>{{$que->option_1}}</td>
                    <td>{{$que->option_2}}</td>
                    <td>{{$que->option_3}}</td>
                    <td>{{$que->option_4}}</td>
                    <td>{{$que->right_ans}}</td>
                    <td>
                      @if($que->active)
                      <span class="btn btn-success"> yes </span>
                      @else
                      <span class="btn btn-danger"> no </span>
                      @endif
                  </td>
                   
 @endforeach}
              
                  </tr>
            
                </tbody>
              </table>
              <a href="{{url()->previous()}}" class="btn btn-sm btn-primary"> Back </a>
              <a href="{{url("dashbord/exam")}}" class="btn btn-sm btn-success"> Exam </a>
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