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
            <li class="breadcrumb-item"><a href="{{url('dashbord/exam')}}">Exam</a></li>
            <li class="breadcrumb-item"><a href="">{{$exam->name('en')}}</a></li>
            <li class="breadcrumb-item active"></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  @include('admin.inc.error')
  @include('admin.inc.massegas')
  <!-- newwwwwwwwwwwwwwwww table -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">exam Details </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table table-sm">
                <tr>
                  <th>name (en)</th>
                  <th>{{$exam->name('en')}}</th>
                </tr>
                <tr>
                  <th>name (ar)</th>
                  <th>{{$exam->name('ar')}}</th>
                </tr>
                <tr>
                  <th>Description (EN)</th>
                  <th>{{$exam->desc('ar')}}</th>
                </tr>
                <tr>
                  <th>Skill</th>
                  <th>{{$exam->skill}}</th>
                </tr>
                <tr>
                  <th>َquestion #</th>
                  <th>{{$exam->question_no}}</th>
                </tr>
                <tr>
                  <th>َActive </th>
                  <th>   @if($exam->active)
                    <span class="btn btn-success"> yes </span>
                    @else
                    <span class="btn btn-danger"> no </span>
                    @endif</th>
                </tr>
            </table>
            <a href="{{url()->previous()}}" class="btn btn-sm btn-primary"> Back </a>
          <a href="{{url("dashbord/exam/show/$exam->id/questions")}}" class="btn btn-sm btn-success"> Enter Questions </a>
          </div>
          

          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
<!-- بدل ما ارجع عالداتا بيس باخد الداتا من > button   -->
@section('js')
@endsection