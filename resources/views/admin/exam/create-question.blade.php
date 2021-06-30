@extends('admin.layout')
@section('main')
    @section('title') add exam @endsection
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add question (strp 2)</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashbord') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{ url('dashbord/exams') }}">exams</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        @include('admin.inc.error')
        @include('admin.inc.massegas')

        <!-- table -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add exam</h3>

                           
                            </div>
                            <!-- /.card-header -->

                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
            <div class="modal-body">
                <div class="card-body">
                    <form method="post" action="{{ url("dashbord/exam/edit/$exam_id") }}" enctype="multipart/form-data">
                        @csrf
                        @for ($i = 0 ; $i <= $question_no; $i++ )
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Question {{$i}} </label>

                            <label for="exampleInputEmail1">title </label>
                            <input type="textarea" name="title[]" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">option_1</label>
                            <input type="text" name="option_1[]" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">option_2</label>
                            <input type="text" name="option_2[]" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">option_3</label>
                            <input type="text" name="option_3[]" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">option_4</label>
                            <input type="text" name="option_4[]" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">right_ans</label>
                            <input type="number" name="right_ans" class="form-control" />
                        </div>
                        
                 @endfor
                 <hr>
            </div>
        </div>
    
               
            </div>
            <div class="modal-footer">
                <a href="{{url()->previous()}}" class="btn btn-secondary" data-dismiss="modal">Back</a>
                <button type="submit" class="btn btn-primary"  >
                    Add </button>
            </div>
            </form>

        </div>
    </div>


    <!-- newwwwwwwwwwwwwwwww table -->

    <!-- /.content -->

    <!-- /.content-wrapper -->
