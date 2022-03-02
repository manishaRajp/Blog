@extends('admin.layout.master')
@section('title','Dashboard')
@section('main')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 style="font-size:200%;" class="card-title">Select Category</h4>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
            <div class="form-group">
              <form method="post" action="{{route('admin.category.update', $categories->id)}}">
                @csrf
                @method('PUT')
                <select class="js-example-basic-single" style="width:100%" name="name">
                <option value="">{{$categories->name}}</option>
                  <option value="Fitnes">Fitnes</option>
                  <option value="Happy Life">Happy Life</option>
                  <option value="Fasion Tips">Fasion Tips</option>
                  <option value="Food">Food</option>
                  <option value="Adventure">Adventure</option>
                  <option value="Art">Art</option>
                  <option value="Acedamic">Acedamic</option>
                  <option value="Career">Career</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </button>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- partial:partials/_footer.html -->
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
    </div>
  </footer>
</div>
<!-- partial -->

@endsection