@extends('admin.layout.master')
@section('title','Dashboard')
@section('main')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Show Data') }}
                    <a href="userlist" class="btn btn-danger float-right">Back</a>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('User Name  :') }}</label>
                        <div class="col-md-6">
                            <h5>{{$registration['name']}}</h5>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Email  :') }}</label>
                        <div class="col-md-6">
                            <h5>{{$registration['email']}}</h5>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Profile  :') }}</label>
                        <div class="col-md-6">
                            <h4> <img src={{$registration['profile']}} class="img-thumbnail" width="70px" height="70px" alt=""></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection