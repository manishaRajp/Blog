@extends('admin.layout.master')
@section('title','Dashboard')
@section('main')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">About Us</h4>
            <hr>&nbsp;
            <form method="post" action="{{route('admin.about_update')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" value="{{$cms->id}}" id="id" name="id" placeholder="password">

                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label  "><b>Title</b></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{$cms->title}}" id="title" name="title" placeholder="Enter new pass">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label  "><b>Description</b></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('description') is-invalid @enderror" value="{{$cms->description}}" id="description" name="description" placeholder="Enter new pass">
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label  @error('password') is-invalid @enderror"><b>image</b></label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="image" value=""name="image">
                        <img src='{{$cms->image}}' class="img-thumbnail @error('image') is-invalid @enderror" width="150px" height="150px" alt="">
                        @error('image')
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