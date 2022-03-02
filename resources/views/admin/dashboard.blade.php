@extends('admin.layout.master')
@section('title','Dashboard')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                <h1 class="display-3"><b>Welcome! Hello, {{Auth::guard('admin')->user()->name}}</b></h1>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright @2021 ELaunch Solution PVT. LTD. All Rights Reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">  <a href="https://www.elaunchinfotech.com/" target="_blank">Elaunch Solution pvt. ltd</a></span>
    </div>
  </footer>
    <!-- partial -->
</div>
@endsection
