@extends('admin.layout.master')
@section('title','Dashboard')
@section('main')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 style="font-size:200%;" class="card-title">Add Blog</h4>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
            <form method="post" action="{{route('admin.blogs.update', $blogs->slug)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input id="shortlink" type="hidden" class="form-control @error('id') is-invalid @enderror" name="shortlink" value="{{$blogs['shortlink']}}" autocomplete="name" autofocus>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Category</label>
                    <div class="col-md-6">
                        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                            @foreach ($categories as $value)
                            <option value="{{ $value->id }}" {{ old('category_id', isset($blogs->category_id) ? $blogs->category_id : '') == $value->id ? 'selected' : '' }}>{{$value->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-3 col-form-label">Title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{$blogs['title']}}" id="title" name="title" placeholder="Username">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <textarea class="ckeditor form-control @error('description') is-invalid @enderror" value="" name="description" id="description">{!! $blogs->description !!}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image" class="col-sm-3 col-form-label">image</label>
                    <div class="col-sm-9">
                        <input type="file" id="image" value="{{$blogs['image']}}" name="image" multiple>
                        <img src="{{asset('storage/profile/'.$blogs['image'])}}" class="img-thumbnail @error('image') is-invalid @enderror" width="70px" height="70px" alt="">
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
@push('js')
<script type="text/javascript"></script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>

@endpush