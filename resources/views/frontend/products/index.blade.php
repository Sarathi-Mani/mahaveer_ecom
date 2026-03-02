@extends('frontend.layouts.app')

@section('content')
@php
    $listingRoute = ($section ?? '') === 'accessories' ? 'accessories.index' : 'products.index';
@endphp
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">{{ $pageHeading ?? 'Shop Page' }}</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item text-white"><a href="{{ url('/') }}" class="text-white">Home</a></li>
        <li class="breadcrumb-item text-white">Pages</li>
        <li class="breadcrumb-item active text-white">Shop</li>
    </ol>
</div>

<div class="container-fluid px-0">
    <div class="row g-0 text-center">
        @php
            $services = [
                ['icon' => 'fa-sync-alt', 'title' => 'Free Return', 'desc' => '30 days money back guarantee!'],
                ['icon' => 'fa-telegram-plane', 'title' => 'Free Shipping', 'desc' => 'Free shipping on all order'],
                ['icon' => 'fa-life-ring', 'title' => 'Support 24/7', 'desc' => 'We support online 24 hrs a day'],
                ['icon' => 'fa-credit-card', 'title' => 'Receive Gift Card', 'desc' => 'Receive gift on all order $50+'],
                ['icon' => 'fa-lock', 'title' => 'Secure Payment', 'desc' => 'We Value Your Security'],
                ['icon' => 'fa-blog', 'title' => 'Online Service', 'desc' => 'Free return products in 30 days'],
            ];
        @endphp

        @foreach($services as $index => $service)
            <div class="col-6 col-md-4 col-lg-2 border-start border-end wow fadeInUp" data-wow-delay="{{ number_format(0.1 * ($index + 1), 1) }}s">
                <div class="p-4">
                    <div class="d-inline-flex align-items-center">
                        <i class="fas {{ $service['icon'] }} fa-2x text-secondary"></i>
                        <div class="ms-4 text-start">
                            <h6 class="text-uppercase mb-2">{{ $service['title'] }}</h6>
                            <p class="mb-0">{{ $service['desc'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="container-fluid shop py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="product-categories mb-4">
                    <h4>Filter by Brand</h4>
                    <ul class="list-unstyled">
                        @forelse($brandFilter as $brand)
                            <li>
                                <div class="categories-item d-flex justify-content-between align-items-center">
                                    <a href="{{ route($listingRoute, array_filter(['brand' => $brand->id, 'category' => $selectedCategory, 'section' => ($section ?? '') !== '' ? $section : null])) }}" class="text-dark {{ (int) $selectedBrand === (int) $brand->id ? 'fw-bold' : '' }}">
                                        <i class="fas fa-tag text-secondary me-2"></i>{{ $brand->name }}
                                    </a>
                                </div>
                            </li>
                        @empty
                            <li><small>No brands available</small></li>
                        @endforelse
                    </ul>
                </div>

                <div class="product-categories mb-4">
                    <h4>Filter by Category</h4>
                    <ul class="list-unstyled">
                        @forelse($categoryFilter as $category)
                            <li>
                                <div class="categories-item d-flex justify-content-between align-items-center">
                                    <a href="{{ route($listingRoute, array_filter(['brand' => $selectedBrand, 'category' => $category->id, 'section' => ($section ?? '') !== '' ? $section : null])) }}" class="text-dark {{ (int) $selectedCategory === (int) $category->id ? 'fw-bold' : '' }}">
                                        <i class="fas fa-layer-group text-secondary me-2"></i>{{ $category->name }}
                                    </a>
                                </div>
                            </li>
                        @empty
                            <li><small>No categories found</small></li>
                        @endforelse
                    </ul>
                </div>

                @if($selectedBrand || $selectedCategory)
                    <a href="{{ route($listingRoute, array_filter(['section' => ($section ?? '') !== '' ? $section : null])) }}" class="btn btn-outline-secondary btn-sm rounded-pill">
                        Clear filters
                    </a>
                @endif
            </div>

            <div class="col-lg-9 wow fadeInUp" data-wow-delay="0.1s">
                <div class="tab-content">
                    <div id="tab-5" class="tab-pane fade show p-0 active">
                        <div class="row g-4 product">
                            @forelse($products as $product)
                                @php
                                    $imageUrl = (!empty($product->image) && file_exists(public_path($product->image)))
                                        ? asset($product->image)
                                        : asset('frontend/assets/images/default.jpg');
                                    $isNew = !empty($product->created_at) && \Illuminate\Support\Carbon::parse($product->created_at)->gte(now()->subDays(30));
                                    $productKey = !empty($product->slug) ? $product->slug : \Illuminate\Support\Str::slug($product->name);
                                @endphp

                                <div class="col-lg-4 col-md-6 mb-5">
                                    <div class="product-item rounded wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="product-item-inner border rounded">
                                            <div class="product-item-inner-item">
                                                <img src="{{ $imageUrl }}" class="img-fluid w-100 rounded-top" alt="{{ $product->name }}">
                                                @if($isNew)
                                                    <div class="product-new">New</div>
                                                @endif
                                                <div class="product-details">
                                                    <a href="{{ route('products.show', ['slug' => $productKey]) }}">
                                                        <i class="fa fa-eye fa-1x"></i>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="text-center rounded-bottom p-4">
                                                <a href="{{ route($listingRoute, array_filter(['category' => $product->category_id, 'section' => ($section ?? '') !== '' ? $section : null])) }}" class="d-block mb-2">{{ $product->category_name ?? 'N/A' }}</a>
                                                <a href="{{ route('products.show', ['slug' => $productKey]) }}" class="d-block h5">{{ $product->name }}</a>
                                                <p class="mb-1">Size: <strong>{{ $product->size ?: 'N/A' }}</strong></p>
                                                <p class="mb-0">Thickness: <strong>{{ $product->thickness ?: 'N/A' }}</strong></p>
                                            </div>
                                        </div>

                                        <div class="product-item-add border border-top-0 rounded-bottom text-center p-4 pt-0">
                                            <div class="d-flex gap-2">
                                                <a href="tel:+919840648777" class="btn btn-success rounded-pill py-2 w-50">
                                                    <i class="fas fa-phone-alt me-1"></i> Call
                                                </a>
                                                <button class="btn btn-secondary rounded-pill py-2 w-50" data-bs-toggle="modal" data-bs-target="#contactModal">
                                                    Contact
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center"><p>No products available.</p></div>
                            @endforelse
                        </div>

                        @if($products->lastPage() > 1)
                            @php
                                $currentPage = $products->currentPage();
                                $lastPage = $products->lastPage();
                                $range = 2;
                                $showDots = false;
                                $query = request()->except('page');
                            @endphp

                            <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="pagination d-flex justify-content-center mt-5">
                                    @if($currentPage > 1)
                                        <a href="{{ route($listingRoute, array_merge($query, ['page' => $currentPage - 1])) }}" class="rounded">&laquo;</a>
                                    @endif

                                    @for($i = 1; $i <= $lastPage; $i++)
                                        @if($i === 1 || $i === $lastPage || ($i >= $currentPage - $range && $i <= $currentPage + $range))
                                            <a href="{{ route($listingRoute, array_merge($query, ['page' => $i])) }}" class="rounded {{ $i === $currentPage ? 'active' : '' }}">{{ $i }}</a>
                                            @php $showDots = true; @endphp
                                        @elseif($showDots)
                                            <span class="rounded px-2">...</span>
                                            @php $showDots = false; @endphp
                                        @endif
                                    @endfor

                                    @if($currentPage < $lastPage)
                                        <a href="{{ route($listingRoute, array_merge($query, ['page' => $currentPage + 1])) }}" class="rounded">&raquo;</a>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 overflow-hidden shadow-lg">
            <div class="position-relative" style="height:50px;">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close" style="z-index:10;"></button>
            </div>

            <div class="modal-body p-0">
                <div class="row g-0">
                    <div class="col-md-5 p-0">
                        <img src="{{ asset('frontend/assets/images/bg-3.jpg') }}" alt="Showroom Image" class="img-fluid h-100 w-100" style="object-fit: cover;">
                    </div>

                    <div class="col-md-7 p-4">
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="firstName" class="form-label small fw-bold text-uppercase">First Name *</label>
                                    <input type="text" class="form-control rounded-pill border-primary border-2" id="firstName" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label small fw-bold text-uppercase">Email Address *</label>
                                <input type="email" class="form-control rounded-pill border-primary border-2" id="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label small fw-bold text-uppercase">Phone Number *</label>
                                <input type="tel" class="form-control rounded-pill border-primary border-2" id="phone" required>
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label small fw-bold text-uppercase">Project Details</label>
                                <textarea class="form-control border-primary border-2 rounded-3" id="message" rows="3" placeholder="Tell us about your project requirements, timeline, and any specific preferences..."></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal-footer bg-light border-0">
                <button type="button" class="btn btn-secondary rounded-pill px-4" onclick="submitShowroomForm()" style="background: linear-gradient(135deg, #0d6efd 0%, #0dcaf0 100%); border: none;">
                    <i class="fas fa-calendar-check me-2"></i>Submit
                </button>
            </div>
        </div>
    </div>
</div>

<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fas fa-check-circle me-2"></i>Thank you! We'll contact you within 24 hours.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<script>
function submitShowroomForm() {
    const form = document.getElementById('contactForm');
    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }

    const modalElement = document.getElementById('contactModal');
    const modalInstance = bootstrap.Modal.getInstance(modalElement);
    if (modalInstance) {
        modalInstance.hide();
    }

    const toastElement = document.getElementById('successToast');
    const toast = new bootstrap.Toast(toastElement);
    toast.show();
    form.reset();
}
</script>
@endsection
