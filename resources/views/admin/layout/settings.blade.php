@extends('admin.layout.master')
@section('title','Dashboard')
@section('main')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Admin Settings</h4>
            <hr>&nbsp;
            <form method="post" action="{{route('admin.changesetting')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" value="{{$setting->id}}" id="id" name="id" placeholder="password">
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label  @error('password') is-invalid @enderror"><b>logo</b></label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="logo" value=""name="logo">
                        <img src='{{asset("$setting->logo")}}' class="img-thumbnail @error('logo') is-invalid @enderror" width="150px" height="150px" alt="">
                        @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
               
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label  "><b>Website</b></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('website') is-invalid @enderror" value="{{$setting->website}}" id="website" name="website" placeholder="Enter new pass">
                        @error('website')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label "><b>Link 1</b></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('link_1') is-invalid @enderror" id="link_1" value="{{$setting->link_1}}" name="link_1" placeholder="Enter link 1">
                        @error('link_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label"><b>Link 2</b></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control  @error('link_2') is-invalid @enderror" id="link_2" value="{{$setting->link_2}}" name="link_2" placeholder="Enter confirm pass">
                        @error('link_2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label"><b>Link 3</b></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control  @error('link_3') is-invalid @enderror" id="link_3" value="{{$setting->link_3}}" name="link_3" placeholder="Enter confirm pass">
                        @error('link_3')
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