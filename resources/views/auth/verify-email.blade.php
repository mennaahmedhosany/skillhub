@extends('web.layout')
@section('title') emil verification  @endsection
@section('main')
<div class="alert alert-success"> 
    the massage was send pls cheack you emil  
</div>
<form method="POST" action="{{url('/email/verification-notification')}}" >
@csrf
    <button type="submit">resend Email </button> 
    {{-- resend password verification  --}}
</form>

@endsection