@extends('web.layout')
@section('title') contact @endsection
@section('main')



		<!-- Hero-area -->
		<div class="hero-area section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url(./img/page-background.jpg)"></div>
			<!-- /Backgound Image -->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<ul class="hero-area-tree">
							<li><a href="index.html">{{__('web.home')}}</a></li>
							<li>Contact</li>
						</ul>
						<h1 class="white-text">{{__('web.Get In Touch')}}</h1>

					</div>
				</div>
			</div>

		</div>
		<!-- /Hero-area -->

		<!-- Contact -->
		<div id="contact" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- contact form -->
					<div class="col-md-6">
						<div class="contact-form">
							<h4>Send A Message</h4>
							@include('web.inc.message'); 
							{{-- to show massagee --}}
							<form method="POST" action="{{url('conntat/massage/send')}}" >
								@csrf
								<input class="input" type="text" name="name" placeholder="{{__('web.Name')}}">
								<input class="input" type="email" name="email" placeholder="{{__('web.Email')}}">
								<input class="input" type="text" name="subject" placeholder="8">
								<textarea class="input" name="body" placeholder="{{__('web.Enter your Message')}}"></textarea>
								<button class="main-button icon-button pull-right">{{__('web.Send Message')}}</button>
							</form>
						</div>
					</div>
					<!-- /contact form -->

					<!-- contact information -->
					<div class="col-md-5 col-md-offset-1">
						<h4>Contact Information</h4>
						<ul class="contact-details">
							<li><i class="fa fa-envelope"></i>{{$sitt->email}}</li>
							<li><i class="fa fa-phone"></i>{{$sitt->phone}}</li>
						</ul>

					</div>
					<!-- contact information -->

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /Contact -->


@endsection
	
