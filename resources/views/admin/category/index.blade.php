@extends('admin.layout.master')
@section('title','Dashboard')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
@endpush

@section('main')
<div class="main-panel">
  <div class="content-wrapper">
    <a href="{{route('admin.category.create')}}" class="btn btn-success float-right">Add Category</a>&nbsp;
    <div class="page-header">
      <h3 style="font-size:150%;"class="page-title">Tables </h3>
    </div>
    @include('admin.flash_message')
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 style="font-size:150%;" class="card-title">Category Table</h4>
            <section style="padding-top: 60px;">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap']) !!}
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- partial:../../partials/_footer.html -->
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright @2021 ELaunch Solution PVT. LTD. All Rights Reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">  <a href="https://www.elaunchinfotech.com/" target="_blank">Elaunch Solution pvt. ltd</a></span>
    </div>
  </footer>
  <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
@endsection

@push('js')
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="'vendor/datatables/buttons.server-side.js'"></script>
{!! $dataTable->scripts() !!}
@endpush