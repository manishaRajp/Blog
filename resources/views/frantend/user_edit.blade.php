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
            </div>
        </div>
        <div class="col-md-9">
            <div class="contact-form">
                <div class="form-group">
                    <h1>
                        Edit User Profile
                    </h1>
                </div>
                <form class="forms-sample" method="post" action="{{ route('user_edit',auth()->user()->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <input type="hidden" name="id" value="{{auth()->user()->id }}">
                                <span class=" input-group-text" id="basic-addon1"> Username</span>
                            </div>
                            <input type="text" id="username" name="username" value="{{auth()->user()->name }}" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                            @error('username')
                            <p class="error">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Email</span>
                            </div>
                            <input type="text" id="email" name="email" value="{{auth()->user()->email }}" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                            @error('email')
                            <p class="error">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <input id="profile" type="file" class=" form-input w-full input @error('profile')  border-red-500 @enderror" name="profile" value="{{ old('profile') }}">
                        <img src="{{ auth()->user()->profile }}" alt="image" width="50" height="50" />
                        @error('profile')
                        <p class="error">
                            {{ 'Please select Image' }}
                        </p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif