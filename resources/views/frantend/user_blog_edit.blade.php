  <link href="{{asset('frontend/assest/css/style_user.css')}}" rel="stylesheet" />
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  @extends('frantend.layouts.master')


  <!------ Include the above in your HEAD tag ---------->
  <div class="container contact">
      <div class="row">
          <div class="col-md-3">
              <div class="contact-info">
                  <img src="{{ auth()->user()->profile }}" alt="image" width="200" height="200" />
              </div>
          </div>
          <div class="col-md-9">
              <div class="contact-form">
                  <div class="form-group">
                      <h4 style="font-size:200%;" class="card-title">Edit Blog</h4>
                      <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                  </div>
                  <form class="forms-sample" method="post" action="{{ route('submit_edit_blog',$blog_edit->slug)}}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label for="password" class="col-sm-3 col-form-label">Category</label>
                          <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                              @foreach ($catagory as $value)
                              <option value="{{ $value->id }}" {{ old('category_id', isset($blogs->category_id) ? $blogs->category_id : '') == $value->id ? 'selected' : '' }}>{{$value->name}}</option>
                              @endforeach
                          </select>
                          @error('category_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="" class="col-sm-5 col-form-label">Title</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Username" value="{{$blog_edit->title}}">
                              @error('title')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Description</label>
                          <div class="col-sm-9">
                              <textarea class="ckeditor form-control form-control @error('description') is-invalid @enderror" name="description" id="description">{{$blog_edit->description}}</textarea>
                              @error('description')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 col-form-label ">Image</label>
                          <div class="col-sm-9">
                              <input type="file" id="image" name="image" value="{{$blog_edit->image}}" class="form-control @error('image') is-invalid @enderror">
                              <img src="{{asset('storage/profile/'.$blog_edit['image'])}}" class="rounded-circle float-left" width="100px" height="100px" alt="">
                              @error('image')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                      </div>
                      <br>
                      <br>
                      <br>
                      <br>
                      <div>
                          <button type="submit" class="btn btn-primary mr-2">Submit</button>
                          <button class="btn btn-light">Cancel</button>
                      </div>
                      <a href="{{ route('home') }}">Go to Home </a>
                  </form>
              </div>
          </div>
      </div>
  </div>

  @push('js')
  <script>
      $(document).ready(function() {
          $('.ckeditor').ckeditor();
      });
  </script>
  @endpush
