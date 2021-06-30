@extends('admin.layout')
@section('main')
@section('title') skills @endsection
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">skills</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('dashbord')}}">Home</a></li>
            <li class="breadcrumb-item active">Courses</li>
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
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All skils</h3>

              <div class="card-tools">
                
                <button href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-modal">
                  Add course
                </button>
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

                    <th>Action</th>


                  </tr>
                </thead>
                <tbody>
                  @foreach($skills as $skill)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$skill->name('en')}}</td>
                    <td>{{$skill->name('ar')}}</td>
                    <td><img src="{{asset("uploads/$skill->img")}}" width="100px" /></td>
                    <td>{{$skill->cat->name('en')}}</td>



                    <td>
                      @if($skill->active)
                      <span class="btn btn-success"> yes </span>
                      @else
                      <span class="btn btn-danger"> no </span>
                      @endif
                    </td>
                    <td>

                      <button class="btn btn-sm btn-info data-btn" data-id="{{$skill->id}}" data-name-en="{{$skill->name('en')}}" data-name-ar="{{$skill->name('ar')}}" data-img="{{$skill->img}}" data-cat-id="{{$skill->cat->id}}" data-toggle="modal" data-target="#edit-modal">
                        <i class="fas fa-edit"> </i>
                      </button>
                      <!-- get back for the carttttttttttttt-->
                      <a href="{{url("dashbord/skill/delete/$skill->id")}}" class="btn btn-sm btn-danger ">
                        <i class="fas fa-trash"> </i>
                      </a>
                      <a href="{{url("dashbord/skill/toggle/$skill->id")}}" class="btn btn-sm btn-info ">
                        <i class="fas fa-toggle-on"> </i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

              {{$skills->links()}}
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


<!-- Modal   from bootstap -->

<div class="modal fade" id="add-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add courses</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <div class="card-body">
          <form method="post" action="{{url('dashbord/skill/store')}}" enctype="multipart/form-data">
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
              <select class="custom-select form-control" name="cat_id">
                @foreach($cats as $cat)
                <option value="{{$cat->id}}"> {{$cat->name('en')}}

                </option>
                @endforeach
              </select>

            </div>



            <!--desc-->


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
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#add-modal">
          Add </button>
      </div>
      </form>

    </div>
  </div>
</div>



<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit courses</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body">
        <div class="card-body">
          <form method="post" action="{{url('dashbord/skill/update')}}" enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="id" id="edit-form-id" />
            <div class="form-group">
              <label for="exampleInputEmail1">Name (en) </label>
              <input type="text" name="name_en" class="form-control" id="edit-form-name-en">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Name (ar)</label>
              <input type="text" name="name_ar" class="form-control" id="edit-form-name-ar">
            </div>

            <div class="form-group">
              <label>Category</label>
              <select class="custom-select form-control" name="cat_id" id="edit-form-cat-id">
                @foreach($cats as $cat)
                <option value="{{$cat->id}}"> {{$cat->name('en')}}

                </option>
                @endforeach
              </select>
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
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary " data-toggle="modal" data-target="#edit-modal">
          edit </button>
      </div>
      </form>

    </div>
  </div>
</div>
</div>
@endsection
<!-- بدل ما ارجع عالداتا بيس باخد الداتا من > button   -->
@section('js')
<script>
  $('.data-btn').click(function() {
    let id = $(this).attr('data-id');
    let nameEn = $(this).attr('data-name-en');
    let nameAr = $(this).attr('data-name-ar');
    let catId = $(this).attr('data-cat-id');
    $('#edit-form-id').val(id);
    $('#edit-form-name-en').val(nameEn);
    $('#edit-form-name-ar').val(nameAr);
    $('#edit-form-cat-id').val(catId);
  })
</script>
@endsection