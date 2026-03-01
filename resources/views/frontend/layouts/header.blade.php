@php
    use Illuminate\Support\Facades\DB;

    $brands = DB::table('brands')
        ->where('status', 1)
        ->orderBy('name', 'ASC')
        ->get();

    $categories = DB::table('categories')
        ->where('status', 1)
        ->orderBy('name', 'ASC')
        ->get();

    $wallCategories = $categories->filter(function ($category) {
        $name = strtolower($category->name);
        $slug = strtolower($category->slug);
        return str_contains($name, 'wall') || str_contains($slug, 'wall');
    })->values();

    $floorCategories = $categories->filter(function ($category) {
        $name = strtolower($category->name);
        $slug = strtolower($category->slug);
        return str_contains($name, 'floor') || str_contains($slug, 'floor');
    })->values();

    $accessoriesCategories = $categories->filter(function ($category) {
        $name = strtolower($category->name);
        $slug = strtolower($category->slug);
        return str_contains($name, 'accessor') || str_contains($slug, 'accessor')
            || str_contains($name, 'sanitary') || str_contains($slug, 'sanitary')
            || str_contains($name, 'faucet') || str_contains($slug, 'faucet');
    })->values();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $meta_title ?? 'Mahaveer Ceramic World' }}</title>
    <meta name="keywords" content="{{ $meta_keywords ?? '' }}">
    <meta name="description" content="{{ $meta_description ?? '' }}">

    <meta property="og:title" content="{{ $meta_title ?? 'Mahaveer Ceramic World' }}">
    <meta property="og:description" content="{{ $meta_description ?? '' }}">
    <meta property="og:image" content="{{ $og_image ?? '' }}">
    <meta property="og:url" content="{{ url()->current() }}">

    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/custom.css') }}" rel="stylesheet">

    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<div class="container-fluid px-5 py-3 header-bg">
    <div class="row gx-0">
        <div class="col-md-4 col-lg-3 text-center text-lg-start">
            <div class="d-inline-flex align-items-center">
                <a href="{{ url('/') }}" class="navbar-brand p-0">
                    <img src="{{ asset('frontend/assets/images/mcw-logo-new.png') }}" alt="MCW Logo" style="height:70px;">
                </a>
            </div>
        </div>

        <div class="col-md-4 col-lg-6 d-flex align-items-center justify-content-center search-container">
            <div class="position-relative ps-4 w-100" style="max-width: 600px;">
                <div class="d-flex border rounded-pill position-relative">
                    <input class="form-control w-100 py-2" type="text" id="searchBox" placeholder="Search Looking For?" autocomplete="off">
                    <div id="suggestion-box" class="position-absolute bg-white w-100 rounded shadow" style="top: 50px; left: 0; z-index: 1000; display:none;"></div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-3 d-flex align-items-center justify-content-lg-end justify-content-center icon-container">
            <div class="d-inline-flex align-items-center gap-2">
                <a href="https://wa.me/919840648777" target="_blank" class="btn btn-secondary btn-outline-light rounded-pill py-2 px-4 px-lg-3 mb-3 mb-md-3 mb-lg-0">
                    <i class="fab fa-whatsapp me-2 fs-5 text-white"></i>
                    <span class="text-white">Chat</span>
                </a>

                <a href="{{ asset('frontend/Brochure.pdf') }}" target="_blank" class="btn btn-secondary rounded-pill py-2 px-4 px-lg-3 mb-3 mb-md-3 mb-lg-0">
                    <i class="fas fa-book me-2 fs-5 text-white"></i>
                    <span class="text-white">Catalogue</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid nav-bar p-0">
    <div class="row gx-0 navbar-bg px-5 align-items-center">
        <div class="col-12 col-lg-12">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a href="{{ url('/') }}" class="navbar-brand d-block d-lg-none">
                    <img src="{{ asset('frontend/assets/images/mcw-logo-new.png') }}" alt="MCW Logo" style="width:160px; height:90px;">
                </a>

                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars fa-1x text-white"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav py-0">
                        <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                        <a href="{{ route('products.index') }}" class="nav-item nav-link">All Tiles</a>
                        <a href="{{ route('products.index', ['section' => 'floor']) }}" class="nav-item nav-link">Floor Tiles</a>
                        <a href="{{ route('products.index', ['section' => 'wall']) }}" class="nav-item nav-link">Wall Tiles</a>
                        <a href="{{ route('products.index', ['section' => 'accessories']) }}" class="nav-item nav-link">Accessories</a>

                        <div class="nav-item dropdown megamenu">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
                            <div class="dropdown-menu m-0 p-4 megamenu-content">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6 class="megamenu-title">WALL TILES</h6>
                                        <ul class="megamenu-list list-unstyled">
                                            @forelse($wallCategories as $category)
                                                <li class="megamenu-list-item">
                                                    <a class="megamenu-list-link" href="{{ route('products.index', ['category' => $category->id]) }}">
                                                        {{ $category->name }}
                                                    </a>
                                                </li>
                                            @empty
                                                <li class="megamenu-list-item"><span class="megamenu-list-link">No categories found</span></li>
                                            @endforelse
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="megamenu-title">FLOOR TILES</h6>
                                        <ul class="megamenu-list list-unstyled">
                                            @forelse($floorCategories as $category)
                                                <li class="megamenu-list-item">
                                                    <a class="megamenu-list-link" href="{{ route('products.index', ['category' => $category->id]) }}">
                                                        {{ $category->name }}
                                                    </a>
                                                </li>
                                            @empty
                                                <li class="megamenu-list-item"><span class="megamenu-list-link">No categories found</span></li>
                                            @endforelse
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="megamenu-title">SANITARY WARE &amp; FAUCETS</h6>
                                        <ul class="megamenu-list list-unstyled">
                                            @forelse($accessoriesCategories as $category)
                                                <li class="megamenu-list-item">
                                                    <a class="megamenu-list-link" href="{{ route('products.index', ['category' => $category->id]) }}">
                                                        {{ $category->name }}
                                                    </a>
                                                </li>
                                            @empty
                                                <li class="megamenu-list-item"><span class="megamenu-list-link">No categories found</span></li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Brands</a>
                            <div class="dropdown-menu m-0">
                                @forelse($brands as $brand)
                                    <a href="{{ route('products.index', ['brand' => $brand->id]) }}" class="dropdown-item">{{ $brand->name }}</a>
                                @empty
                                    <a href="#" class="dropdown-item">No Brands Found</a>
                                @endforelse
                            </div>
                        </div>

                        <a href="{{ url('/about') }}" class="nav-item nav-link">Company</a>
                        <a href="{{ url('/awards') }}" class="nav-item nav-link">Awards</a>
                        <a href="{{ url('/contact') }}" class="nav-item nav-link me-2">Contact</a>
                    </div>

                    <div class="navbar-nav ms-auto">
                        <a href="tel:+919840648777" class="btn btn-primary rounded-pill py-2 px-4 px-lg-3">
                            <i class="fa fa-mobile-alt me-2"></i> +91 98406 48777
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchBox = document.getElementById('searchBox');
    const suggestionBox = document.getElementById('suggestion-box');

    if (!searchBox || !suggestionBox) {
        return;
    }

    const examples = [
        'Search bathroom wall tiles...',
        'Search kitchen floor tiles...',
        'Search glossy finish tiles...',
        'Search outdoor anti-skid tiles...',
        'Search living room vitrified tiles...'
    ];

    let i = 0;
    let charIndex = 0;
    let isDeleting = false;

    function typePlaceholder() {
        const current = examples[i];
        searchBox.placeholder = isDeleting
            ? current.substring(0, charIndex--)
            : current.substring(0, charIndex++);

        if (!isDeleting && charIndex === current.length) {
            isDeleting = true;
            setTimeout(typePlaceholder, 1200);
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            i = (i + 1) % examples.length;
            setTimeout(typePlaceholder, 300);
        } else {
            setTimeout(typePlaceholder, isDeleting ? 50 : 100);
        }
    }

    typePlaceholder();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    });

    $('#searchBox').on('keyup', function (event) {
        const query = $(this).val().trim();

        if (event.key === 'Enter' && query.length > 0) {
            window.location.href = "{{ route('products.index') }}" + '?q=' + encodeURIComponent(query);
            return;
        }

        if (query.length > 1) {
            $.ajax({
                url: "{{ route('search.suggestions') }}",
                type: 'POST',
                data: { query: query },
                success: function (data) {
                    suggestionBox.innerHTML = data;
                    suggestionBox.style.display = 'block';
                },
                error: function () {
                    suggestionBox.style.display = 'none';
                }
            });
        } else {
            suggestionBox.style.display = 'none';
        }
    });

    document.addEventListener('click', function (event) {
        if (!event.target.closest('#searchBox') && !event.target.closest('#suggestion-box')) {
            suggestionBox.style.display = 'none';
        }
    });
});
</script>
