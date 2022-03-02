@extends('admin.layout.master')
@section('title','Dashboard')
@section('main')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 style="font-size:200%;" class="card-title"><b>User Change Password</b></h4>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
            @include('admin.flash_message')
            <form method="post" action="{{route('admin.changepass1')}}">
                @csrf
                <input type="hidden" class="form-control" value="{{$registration->id}}" id="id" name="id" placeholder="password">
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label @error('password') is-invalid @enderror">password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" value="" id="password" name="password" placeholder="password">
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label @error('new_password') is-invalid @enderror">New Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" value="" id="new_password" name="new_password" placeholder="Enter new pass">
                    </div>
                    @error('new_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label @error('confirm_password') is-invalid @enderror">Confirm password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" value="" id="confirm_password" name="confirm_password" placeholder="Enter confirm pass">
                    </div>
                    @error('confirm_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection