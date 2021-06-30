@if(session('success'))
   <div class="alert alert-success">
       {{session('success')}}
   </div>
   {{-- to show session i crated in controller  --}}
@endif 

@if($errors->any())

<div class="alert alert-success">
    @foreach ($errors->all() as $e)
   <p>    {{$e}} </p>
    @endforeach
    {{-- to show error in contact controller  --}}
</div>
@endif