@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h4>Dashboard</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-3">
            <div class="card bg-primary text-white h-100">
              <div class="card-body py-5">Brand Count: 10</div>
              <a href="brand_view.php" style="text-decoration:none;color:white;">
                <div class="card-footer d-flex">
                  View Details
                  <span class="ms-auto">
                    <i class="bi bi-chevron-right"></i>
                  </span>
                </div>
              </a>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card bg-warning text-white h-100">
              <div class="card-body py-5">Category Count: 10</div>
              <a href="category_view.php" style="text-decoration:none;color:white;">
                <div class="card-footer d-flex">
                  View Details
                  <span class="ms-auto">
                    <i class="bi bi-chevron-right"></i>
                  </span>
                </div>
              </a>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card bg-success text-white h-100">
              <div class="card-body py-5">Product Count: 10</div>
              <a href="product_view.php" style="text-decoration:none;color:white;">
                <div class="card-footer d-flex">
                  View Details
                  <span class="ms-auto">
                    <i class="bi bi-chevron-right"></i>
                  </span>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    
@endsection
