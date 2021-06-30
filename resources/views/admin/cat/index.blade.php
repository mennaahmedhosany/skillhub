@extends('admin.layout');
@section('title') Categury @endsection
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 
  <!-- /.content-header -->
  <!-- Main content -->
  @include('admin.inc.massegas')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Fixed Header Table</h3>
              <div class="card-tools">
              
                <button href="#" class="btn btn-primary" data-toggle="modal" data-target="#add-cat"> add new </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>name (en)</th>
                    <th>name (ar)</th>
                    <th>Active</th>
                    <th>Edit</th>
                    <th>Deleat</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($cats as $cat )
                  <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->name('en')}}</td>
                    <td>{{$cat->name('ar')}}</td>
                      @if($cat->active)
                       <td>  <span class="btn btn-success">yes</span></td>
                      @else
                     <td><span class="btn btn-danger">no</span></td>
                      @endif
                 <td><button  class="btn btn-sm btn-info data-btn" data-id="{{$cat->id}}" data-name-en="{{$cat->name('en')}}" data-name-ar="{{$cat->name('ar')}}" data-toggle="modal" data-target="#edit-cat"> 
                     <i class="fas fa-edit"></i> </button></td> 
                     <td><a href="{{url("dashbord/categury/delete/$cat->id")}}" class="btn btn-sm btn-danger"> 
                      <i class="fas fa-trash"></i></a></td>
                      <td><a href="{{url("dashbord/categury/toggle/$cat->id")}}" class="btn btn-sm btn-info"> 
                        <i class="fas fa-toggle-on"></i></a></td>
                  </tr> 
                     @endforeach 
                </tbody> 
              </table>
            </div> 
             {{$cats->links()}}
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>    
  <!-- /.content -->
</div> 
<!-- /.content-wrapper -->
 </div>
<!-- Control Sidebar -->
<aside clas0s="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  <div class="p-3">
    <h5>Title</h5>
    <p>Sidebar content</p>
  </div>
</aside>
<!-- Modal  insert -->
<div class="modal fade" id="add-cat" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="POST" action="{{url('dashbord/categury/store')}}">
          @csrf 
          <div class="box-body">
            <div class="form-group"> 
              @include('admin.inc.error')  
              </div>
            <div class="form-group">

              <label for="name">Name(en)</label>
              <input type="text" class="form-control" name="name_en" >
            </div>
            <div class="form-group">
              <label for="name">Name(ar)</label>
              <input type="text" class="form-control" name="name_ar" >
            </div>
          </div>
          <!-- /.box-body -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal ">Close</button>
        <button type="submit" class="btn btn-primary">add</button> 
      </div>
    </form>
   </div>
  </div>
</div>

 {{-- Edit Category --}}
 <div class="modal fade" id="edit-cat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form method="post" action="{{url('dashbord/categury/update')}}">
            @csrf
            <input type="hidden" name="id" id="edit-form-id" />
            <div class="form-group"> 
              @include('admin.inc.error')  
              </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Name (en) </label>
            <input type="text" name="name_en" class="form-control" id="edit-form-name-en" >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" >Name (ar)</label>
            <input type="text" name="name_ar" class="form-control" id="edit-form-name-ar">
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary data-btn " data-toggle="modal" >
           Edit </button>
      </div>
    </form>

    </div>
  </div>
</div>
<!-- /.control-sidebar -->
@section("scripts")
<script>
  $('.data-btn').click(function() {
    let id  = $(this).attr('data-id');
    let nameEn = $(this).attr('data-name-en');
    let nameAr = $(this).attr('data-name-ar');
    $('#edit-form-id').val(id);
    $('#edit-form-name-en').val(nameEn);
    $('#edit-form-name-ar').val(nameAr);
})
</script>

@endsection