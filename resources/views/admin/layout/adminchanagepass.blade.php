@extends('admin.layout.master')
@section('title','Dashboard')
@section('main')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        
        <div class="card-body">
            <h4 class="card-title">Change Password</h4>
            <hr>&nbsp;
            @include('admin.flash_message')
            <form method="post" action="{{route('admin.changepassadmin')}}">
                @csrf
                <input type="hidden" class="form-control" value="{{$admins->id}}" id="id" name="id" placeholder="password">
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label  @error('password') is-invalid @enderror">password</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="password" name="password" placeholder="password">
                    </div>
                </div>
                @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label  @error('new_password') is-invalid @enderror">New Password</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="new_password" name="new_password" placeholder="Enter new pass">
                        @error('new_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label @error('confirm_password') is-invalid @enderror">Confirm password</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter confirm pass">
                        @error('confirm_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection