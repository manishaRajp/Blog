<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{asset('frontend/assest/css/style_user.css')}}" rel="stylesheet" />
@extends('frantend.layouts.master')
<!------ Include the above in your HEAD tag ---------->
@if(auth()->user())
<div class="container contact">
	<div class="row">
		<div class="col-md-3">
			<div class="contact-info">
				<a href="{{ route('home') }}"> <button class="btn trigger "><i class="fa fa-thermometer-full"></i> | Go to Home</button></a>
				<img src="{{ auth()->user()->profile }}" alt="image" width="200" height="200" />
				<h2> It's Me {{ auth()->user()->name }}</h2>
				<div class="form-group">
					<div class="dropright">
						<button type="button" class="dropdown-toggle  " style="border: none; color: orange; font-size:20px;" data-toggle="dropdown">
							Edit</button>
						<div class="dropdown-menu">
							<h5 class="dropdown-header">Action</h5>
							<a class="dropdown-item js_edit_comment" href="{{route('edit_profile',auth()->user()->id)}}">Edit</a>
							<a class="dropdown-item js_delete_comment" data-token="{{ csrf_token() }}">Delete</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="contact-form">
				<div class="form-group">
					<br>
					<h4>Me Blogger <span class=" trigger badge ">{{ auth()->user()->name }}</span></h4>
				</div>
				<div class="form-group">
					<hr>
					<h5> Email Address <span class="trigger badge ">{{ auth()->user()->email}}</span></h5>
				</div>
				<div class="form-group">
					<hr>
					@if(count($blogs))
					<h5>Writen By Me
						@foreach($blogs as $blog)
						<a href="{{route('home')}}"><span class="trigger badge ">{{$blog->title}}</span> </a>
						@endforeach
						@else
						<a href="{{route('create')}}">
							<h4> oppsss***no blog found</h4>
						</a>
						@endif
					</h5>
				</div>
				<hr>
				<div class="form-group">
					<h4> Blog image</h4>
					<hr>
					@foreach($blogs as $blog)
					<img src="{{asset('storage/profile/'.$blog->image)}}" class="rounded-circle float-left" width="100px" height="100px" alt="">
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endif