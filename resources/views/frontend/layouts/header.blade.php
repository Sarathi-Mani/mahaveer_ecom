@php
    use Illuminate\Support\Facades\DB;

    // Active Brands
    $brands = DB::table('brands')
                ->where('status', 1)
                ->orderBy('name', 'ASC')
                ->get();

    // Active Categories
    $categories = DB::table('categories')
                    ->where('status', 1)
                    ->orderBy('name', 'ASC')
                    ->get();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $meta_title ?? 'Mahaveer Ceramic World' }}</title>
    <meta name="keywords" content="{{ $meta_keywords ?? '' }}">
    <meta name="description" content="{{ $meta_description ?? '' }}">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ $meta_title ?? 'Mahaveer Ceramic World' }}">
    <meta property="og:description" content="{{ $meta_description ?? '' }}">
    <meta property="og:image" content="{{ $og_image ?? '' }}">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- CSS -->
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/custom.css') }}" rel="stylesheet">

    <!-- JS -->
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>

<!-- ================= HEADER ================= -->

<div class="container-fluid px-5 py-3 header-bg">
    <div class="row align-items-center">

        <!-- Logo -->
        <div class="col-md-4 col-lg-3">
            <a href="{{ url('/') }}">
                <img src="{{ asset('frontend/assets/images/mcw-logo-new.png') }}" height="70">
            </a>
        </div>

        <!-- Search -->
        <div class="col-md-4 col-lg-6">
            <input type="text"
                   id="searchBox"
                   class="form-control rounded-pill"
                   placeholder="Search Looking For?"
                   autocomplete="off">
        </div>

        <!-- WhatsApp & Catalogue -->
        <div class="col-md-4 col-lg-3 text-end">
            <a href="https://wa.me/919840648777"
               target="_blank"
               class="btn btn-secondary rounded-pill">
                <i class="fab fa-whatsapp"></i> Chat
            </a>

            <a href="{{ asset('frontend/Brochure.pdf') }}"
               target="_blank"
               class="btn btn-secondary rounded-pill">
                Catalogue
            </a>
        </div>

    </div>
</div>

<!-- ================= NAVBAR ================= -->

<div class="container-fluid navbar-bg px-5">
    <nav class="navbar navbar-expand-lg navbar-light">

        <button class="navbar-toggler ms-auto"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
            <span class="fa fa-bars text-white"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">

            <div class="navbar-nav py-0">

                <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>

                <a href="{{ url('/products') }}" class="nav-item nav-link">
                    All Tiles
                </a>

                <!-- Category Dropdown -->
                <div class="nav-item dropdown">
                    <a href="#"
                       class="nav-link dropdown-toggle"
                       data-bs-toggle="dropdown">
                        Category
                    </a>

                    <div class="dropdown-menu">

                        @forelse($categories as $category)
                            <a href="{{ url('category/'.$category->slug) }}"
                               class="dropdown-item">
                                {{ $category->name }}
                            </a>
                        @empty
                            <a href="#" class="dropdown-item">
                                No Categories Found
                            </a>
                        @endforelse

                    </div>
                </div>

                <!-- Brands Dropdown -->
                <div class="nav-item dropdown">
                    <a href="#"
                       class="nav-link dropdown-toggle"
                       data-bs-toggle="dropdown">
                        Brands
                    </a>

                    <div class="dropdown-menu">

                        @forelse($brands as $brand)
                            <a href="{{ url('brand/'.$brand->id) }}"
                               class="dropdown-item">
                                {{ $brand->name }}
                            </a>
                        @empty
                            <a href="#" class="dropdown-item">
                                No Brands Found
                            </a>
                        @endforelse

                    </div>
                </div>

                <a href="{{ url('/about') }}" class="nav-item nav-link">Company</a>
                <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>

            </div>

            <!-- Contact Button -->
            <div class="navbar-nav ms-auto">
                <a href="tel:+919840648777"
                   class="btn btn-primary rounded-pill">
                    +91 98406 48777
                </a>
            </div>

        </div>
    </nav>
</div>