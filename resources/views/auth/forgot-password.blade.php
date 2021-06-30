@extends('web.layout')
@section('title')forget password  @endsection
@section('main')

<form method="POST" action="{{url('/forgot-password')}}">
    @csrf
    <input type="text" name="email" placeholder="enter you email plz"/>
  
    <input type="submit" />
</form>
 
    


@if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
@endif





@endsection