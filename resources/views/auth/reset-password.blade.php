@extends('web.layout')
@section('title')reset-password  @endsection
@section('main')
<form method="POST" action="{{url('reset-password')}}">
    @csrf
    <input type="hidden" name="token" vlaue="{{request()->route('token')}}">
    <input type="email " name="email"  value="{{$request->email}}" placeholder="enter you email plz">
    <input type="password " name="password" placeholder="enter you password plz">
    <input type="submit" >
</form>







@endsection