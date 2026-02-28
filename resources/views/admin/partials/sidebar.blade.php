<!--<aside class="w-64 bg-gray-900 text-white">
    <div class="p-4 text-xl font-bold">
        Admin Panel
    </div>

    <nav class="mt-4">
        <a href="{{ url('/admin/dashboard') }}"
           class="block px-4 py-2 hover:bg-gray-700">
            Dashboard
        </a>

        <a href="#"
           class="block px-4 py-2 hover:bg-gray-700">
            Users
        </a>

        <a href="#"
           class="block px-4 py-2 hover:bg-gray-700">
            Orders
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full text-left px-4 py-2 hover:bg-gray-700">
                Logout
            </button>
        </form>
    </nav>
</aside>-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="#">
          <span class="pt-1">Admin Page</span>
        </a>
      </div>
    </nav>
    <div
      class="offcanvas offcanvas-start sidebar-nav bg-dark"
      tabindex="-1" id="sidebar">
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3">
                CORE
              </div>
            </li>
            <li>
              <a href="{{ url('/admin/dashboard') }}" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="my-3"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-2">
                Add info
              </div>
            </li>
            <li>
              <a class="nav-link px-3" href="add_brand.php">
                <span class="me-2"><i class="bi bi-database-add"></i></span>
                <span>Add Brand</span>
              </a>
            </li>
            <li>
              <a href="{{ route('admin.categories.create') }}" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-database-add"></i></span>
                <span>Add Category</span>
              </a>
            </li>
            <li>
              <a href="add_product.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-database-add"></i></span>
                <span>Add Product</span>
              </a>
            </li>
            <!-- <li>
              <a href="bulk_upload.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-database-add"></i></span>
                <span>Bulk Upload</span>
              </a>
            </li> -->
            <li class="my-3"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-2">
                View info
              </div>
            </li>
            <li>
              <a class="nav-link px-3" href="brand_view.php">
                <span class="me-2"><i class="bi bi-card-list"></i></span>
                <span>View Brand</span>
              </a>
            </li>
            <li>
              <a href="category_view.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-card-list"></i></span>
                <span>View Category</span>
              </a>
            </li>
            <li>
              <a href="product_view.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-card-list"></i></span>
                <span>View Product</span>
              </a>
            </li>
            
             <li class="my-3"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-2">
                 Enquiry 
              </div>
            </li>
          
            <li>
              <a href="enquiry_details.php" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-card-list"></i></span>
                <span>Enquiry Details</span>
              </a>
            </li>
            
            
            
            
            <li class="my-3"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-2">
                Settings
              </div>
            </li>
            <!-- <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-key-fill"></i></span>
                <span>Change Password</span>
              </a>
            </li> -->
            <li>
              <a href="logout.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-box-arrow-left"></i></span>
                <span>Logout</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
