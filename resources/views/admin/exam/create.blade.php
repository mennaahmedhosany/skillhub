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
                        <h1 class="m-0 text-dark">Add  question (strp 1)</h1>
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
                    <form method="post" action="{{ url('dashbord/exam/store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name (en) </label>
                            <input type="text" name="name_en" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Name (ar)</label>
                            <input type="text" name="name_ar" class="form-control" />
                        </div>
                        <!-- category-->
                        <div class="form-group">
                            <label>Category</label>
                            <select class="custom-select form-control" name="skill_id">
                                @foreach ($skills as $skill)
                                    <option value="{{ $skill->id }}"> {{ $skill->name('en') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!--desc-->
                        <div class="form-group">
                            <label for="exampleInputEmail1">desc AR (en) </label>
                            <input type="text" name="desc_en" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Desc En</label>
                            <input type="text" name="desc_ar" class="form-control" />
                        </div>

                        <!-- file-->
                        <div class="form-group">
                            <label>Img</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="img" class="custom-file-input">
                                    <label class="custom-file-label">Choose File</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">difficulty</label>
                            <input type="text" name="difficulty" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">duration_mins </label>
                            <input type="text" name="duration_mins" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">question_no</label>
                            <input type="text" name="question_no" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Active </label>
                            <input type="text" name="active" class="form-control" />
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
