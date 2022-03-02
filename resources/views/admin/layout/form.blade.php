@extends('admin.layout.master')
@section('title','Dashboard')
@section('main')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Select Category</h4>
            <div class="form-group">
              <select class="js-example-basic-single" style="width:100%">
                <option value="AL">Fitnes</option>
                <option value="WY">Happy Life</option>
                <option value="AM">Fasion Tips</option>
                <option value="CA">Food</option>
                <option value="RU">Adventure</option>
                <option value="RU">Art</option>
                <option value="RU">Acedamic</option>
                <option value="RU">Career</option>
              </select>
            </div>
            <a class="nav-link" href="create">
            <button type="submit" class="btn btn-primary mb-2">Next</button>
            </a>
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