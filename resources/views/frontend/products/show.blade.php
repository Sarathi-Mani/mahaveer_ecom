@extends('frontend.layouts.app')

@section('content')
@php
    $fallbackImage = asset('frontend/assets/images/single.jpg');
    $gallery = collect($images ?? [])->filter()->values()->map(function ($img) {
        return asset($img);
    });
    if ($gallery->isEmpty()) {
        $gallery = collect([$fallbackImage, $fallbackImage, $fallbackImage, $fallbackImage]);
    }
    while ($gallery->count() < 4) {
        $gallery->push($gallery->first());
    }

    $mainImage = $gallery->get(0, $fallbackImage);
    $imageView1 = $gallery->get(1, $mainImage);
    $imageView2 = $gallery->get(2, $mainImage);
    $imageView3 = $gallery->get(3, $mainImage);
    $allDownloadImages = [$mainImage, $imageView1, $imageView2, $imageView3];
@endphp

<style>
.product-specifications {
    background: #fff;
    border: 1px solid #e9ecef;
    border-radius: 12px;
    padding: 16px;
}

.single-product .single-inner {
    padding: 12px;
}

.single-product .single-inner img {
    width: 100%;
    height: 420px;
    object-fit: cover;
}

.single-product .tab-content {
    background: #fff;
    border: 1px solid #e9ecef;
    border-radius: 10px;
    padding: 16px;
}

.single-product #productInquiryForm {
    width: 100%;
    margin-top: 8px;
}

.product-detail-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    align-items: center;
}

.product-detail-actions .btn {
    min-width: 150px;
}

@media (max-width: 767.98px) {
    .single-product .single-inner img {
        height: 280px;
    }

    .product-detail-actions .btn {
        width: 100%;
        min-width: 0;
    }
}
</style>

<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">{{ $product->name }}</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item text-white"><a href="{{ route('products.index') }}" class="text-white">Products</a></li>
        <li class="breadcrumb-item active text-white">{{ $product->name }}</li>
    </ol>
</div>

<div class="container-fluid shop py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-5 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="product-specifications mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-layer-group text-primary me-2 fa-lg"></i>
                        <h4 class="mb-0 text-dark">Related Categories</h4>
                    </div>

                    <div class="related-categories-list">
                        @forelse($relatedSubcategories as $subcategory)
                            @php
                                $isCurrent = (int) $subcategory->id === (int) $product->subcategory_id;
                            @endphp
                            <div class="category-item mb-2 p-2 rounded {{ $isCurrent ? 'active-category' : '' }}">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-folder text-secondary me-2"></i>
                                    <a href="{{ route('products.index', ['category' => $product->category_id, 'q' => $subcategory->name]) }}"
                                       class="text-dark text-decoration-none d-flex align-items-center w-100 {{ $isCurrent ? 'active-category' : '' }}">
                                        <span class="flex-grow-1">{{ $subcategory->name }}</span>
                                        @if($isCurrent)
                                            <span class="badge bg-primary ms-2">Current</span>
                                        @endif
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted mb-0">No related categories found.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="col-lg-7 col-xl-9 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-4 single-product">
                    <div class="col-xl-6">
                        <div class="single-carousel owl-carousel">
                            <div class="single-item" data-dot="<img class='img-fluid' src='{{ $mainImage }}' alt='{{ e($product->name) }}'>">
                                <div class="single-inner bg-light rounded">
                                    <img src="{{ $mainImage }}" class="img-fluid rounded" alt="{{ $product->name }}">
                                </div>
                            </div>
                            <div class="single-item" data-dot="<img class='img-fluid' src='{{ $imageView1 }}' alt='{{ e($product->name) }}'>">
                                <div class="single-inner bg-light rounded">
                                    <img src="{{ $imageView1 }}" class="img-fluid rounded" alt="{{ $product->name }}">
                                </div>
                            </div>
                            <div class="single-item" data-dot="<img class='img-fluid' src='{{ $imageView2 }}' alt='{{ e($product->name) }}'>">
                                <div class="single-inner bg-light rounded">
                                    <img src="{{ $imageView2 }}" class="img-fluid rounded" alt="{{ $product->name }}">
                                </div>
                            </div>
                            <div class="single-item" data-dot="<img class='img-fluid' src='{{ $imageView3 }}' alt='{{ e($product->name) }}'>">
                                <div class="single-inner bg-light rounded">
                                    <img src="{{ $imageView3 }}" class="img-fluid rounded" alt="{{ $product->name }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <h4 class="fw-bold mb-3">{{ $product->name }}</h4>
                        <p class="mb-3">Category: {{ $product->category_name ?? 'N/A' }}</p>
                        @if(!empty($product->brand_name))
                            <p class="mb-3">Brand: {{ $product->brand_name }}</p>
                        @endif

                        <h5 class="fw-bold mb-3">Contact for Price</h5>

                        <div class="d-flex mb-4">
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star"></i>
                        </div>

                        <div class="mb-3 product-detail-actions">
                            <a href="tel:+919840648777"
                               class="btn btn-primary rounded text-white py-2 px-4">
                                <i class="fas fa-phone-alt me-1"></i> Call
                            </a>

                            <a href="https://wa.me/919840648777"
                               class="btn btn-secondary rounded text-white py-2 px-4" target="_blank" rel="noopener">
                                <i class="fab fa-whatsapp me-1"></i> Chat
                            </a>

                            <button id="downloadAllImages"
                                class="btn btn-success rounded text-white py-2 px-4">
                                <i class="fas fa-download me-1"></i> Download Images
                            </button>
                        </div>
                        <div class="mb-3 d-flex flex-wrap gap-2">
                            @auth
                                @php
                                    $isMainWishlisted = in_array((int) $product->id, $wishlistProductIds ?? [], true);
                                @endphp
                                <form method="POST" action="{{ route('wishlist.toggle', ['product' => $product->id]) }}" data-ajax-action="true" data-action-type="wishlist" data-product-id="{{ $product->id }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-primary rounded-pill">
                                        <i class="{{ $isMainWishlisted ? 'fas text-danger' : 'far' }} fa-heart me-1"></i> Wishlist
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('cart.store', ['product' => $product->id]) }}" data-ajax-action="true" data-action-type="cart" data-product-id="{{ $product->id }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-dark rounded-pill">
                                        <i class="fas fa-shopping-cart me-1"></i> Add to Cart
                                    </button>
                                </form>
                            @else
                                <button class="btn btn-outline-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#authRequiredModal">
                                    <i class="far fa-heart me-1"></i> Wishlist
                                </button>
                                <button class="btn btn-outline-dark rounded-pill" data-bs-toggle="modal" data-bs-target="#authRequiredModal">
                                    <i class="fas fa-shopping-cart me-1"></i> Add to Cart
                                </button>
                            @endauth
                        </div>

                        <p class="mb-4">
                            @if(!empty($product->pro_description))
                                {{ \Illuminate\Support\Str::limit(strip_tags($product->pro_description), 180) }}
                            @else
                                Product description coming soon. Please contact us for more details.
                            @endif
                        </p>

                        <a href="{{ route('contact.index') }}" class="btn btn-primary border border-secondary rounded-pill px-4 py-2 mb-4 text-white">
                            <i class="fa fa-envelope me-2"></i> Inquire Now
                        </a>
                    </div>

                    <div class="col-lg-12">
                        <nav>
                            <div class="nav nav-tabs mb-3">
                                <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                        id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                        aria-controls="nav-about" aria-selected="true">Specifications</button>
                                <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                        id="nav-specs-tab" data-bs-toggle="tab" data-bs-target="#nav-specs"
                                        aria-controls="nav-specs" aria-selected="false">Description</button>
                            </div>
                        </nav>

                        <div class="tab-content mb-5">
                            <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-striped">
                                            <tbody>
                                                @if(!empty($product->category_name))
                                                    <tr><th>Category</th><td>{{ $product->category_name }}</td></tr>
                                                @endif
                                                @if(!empty($product->brand_name))
                                                    <tr><th>Brand</th><td>{{ $product->brand_name }}</td></tr>
                                                @endif
                                                @if(!empty($product->size))
                                                    <tr><th>Size</th><td>{{ $product->size }}</td></tr>
                                                @endif
                                                @if(!empty($product->thickness))
                                                    <tr><th>Thickness</th><td>{{ $product->thickness }}</td></tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-striped">
                                            <tbody>
                                                @if(!empty($product->color))
                                                    <tr><th>Color</th><td>{{ $product->color }}</td></tr>
                                                @endif
                                                @if(!empty($product->finish))
                                                    <tr><th>Finish</th><td>{{ $product->finish }}</td></tr>
                                                @endif
                                                @if(!empty($product->style))
                                                    <tr><th>Style</th><td>{{ $product->style }}</td></tr>
                                                @endif
                                                @if(!empty($product->series))
                                                    <tr><th>Series</th><td>{{ $product->series }}</td></tr>
                                                @endif
                                                @if(!empty($product->sku))
                                                    <tr><th>Model No</th><td>{{ $product->sku }}</td></tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="nav-specs" role="tabpanel" aria-labelledby="nav-specs-tab">
                                @if(!empty($product->pro_description))
                                    {!! $product->pro_description !!}
                                @else
                                    <p>Detailed product description will be available soon. For more information about {{ $product->name }}, please contact our sales team.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <form action="#" id="productInquiryForm">
                            @csrf
                            <h4 class="mb-4 fw-bold">Product Inquiry</h4>
                            <div class="row g-4">
                                <input type="hidden" name="product_name" value="{{ $product->name }}">

                                <div class="col-lg-6">
                                    <div class="border-bottom rounded">
                                        <input type="text" name="name" class="form-control border-0 me-4" placeholder="Your Name *" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="border-bottom rounded">
                                        <input type="email" name="email" class="form-control border-0" placeholder="Your Email *" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="border-bottom rounded">
                                        <input type="text" name="phone" class="form-control border-0" placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="border-bottom rounded my-4">
                                        <textarea name="message" class="form-control border-0" cols="30" rows="8"
                                                  placeholder="Your Inquiry About {{ $product->name }} *" spellcheck="false" required></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between py-3 mb-2">
                                        <button type="submit" class="btn btn-primary border border-secondary text-white rounded-pill px-4 py-3">
                                            Send Inquiry
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid related-product">
    <div class="container">
        <div class="mx-auto text-center pb-5" style="max-width: 700px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius wow fadeInUp"
                data-wow-delay="0.1s">Related Products</h4>
            <p class="wow fadeInUp" data-wow-delay="0.2s">Explore other products in the same category</p>
        </div>
        <div class="related-carousel owl-carousel pt-4">
            @forelse($relatedProducts as $relatedProduct)
                @php
                    $relatedImage = !empty($relatedProduct->image) ? asset($relatedProduct->image) : $fallbackImage;
                    $relatedKey = !empty($relatedProduct->slug) ? $relatedProduct->slug : \Illuminate\Support\Str::slug($relatedProduct->name);
                    $isRelatedWishlisted = in_array((int) $relatedProduct->id, $wishlistProductIds ?? [], true);
                @endphp
                <div class="related-item rounded">
                        <div class="related-item-inner border rounded">
                            <div class="related-item-inner-item">
                                <img src="{{ $relatedImage }}"
                                     class="img-fluid w-100 rounded-top"
                                     alt="{{ $relatedProduct->name }}">

                                <div class="product-top-actions">
                                    @auth
                                        <form method="POST" action="{{ route('wishlist.toggle', ['product' => $relatedProduct->id]) }}" data-ajax-action="true" data-action-type="wishlist" data-product-id="{{ $relatedProduct->id }}">
                                            @csrf
                                            <button type="submit" class="btn btn-light btn-sm rounded-circle" title="Wishlist">
                                                <i class="{{ $isRelatedWishlisted ? 'fas text-danger' : 'far' }} fa-heart"></i>
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('cart.store', ['product' => $relatedProduct->id]) }}" data-ajax-action="true" data-action-type="cart" data-product-id="{{ $relatedProduct->id }}">
                                            @csrf
                                            <button type="submit" class="btn btn-light btn-sm rounded-circle" title="Add to Cart">
                                                <i class="fas fa-shopping-cart"></i>
                                            </button>
                                        </form>
                                    @else
                                        <button class="btn btn-light btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#authRequiredModal" title="Wishlist">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="btn btn-light btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#authRequiredModal" title="Add to Cart">
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    @endauth
                                </div>

                            <div class="related-new bg-secondary">New</div>
                            <div class="related-details">
                                <a href="{{ route('products.show', ['slug' => $relatedKey]) }}">
                                    <i class="fa fa-eye fa-1x bg-secondary"></i>
                                </a>
                            </div>
                        </div>
                        <div class="text-center rounded-bottom p-4">
                            <a href="{{ route('products.show', ['slug' => $relatedKey]) }}">
                                {{ $relatedProduct->name }}
                            </a>
                            <small class="text-muted d-block">{{ $relatedProduct->category_name ?? 'N/A' }}</small>
                            <div class="mt-2">
                                <span class="text-primary fs-5">Contact for Price</span>
                            </div>
                        </div>
                    </div>
                    <div class="related-item-add border border-top-0 rounded-bottom text-center p-4 pt-0">
                        <div class="d-flex gap-2">
                            <a href="tel:+919840648777"
                               class="btn btn-success rounded-pill py-2 px-4 mb-2 w-50">
                                Call
                            </a>

                            <button class="btn btn-secondary rounded-pill py-2 px-4 mb-2 w-50"
                                    data-bs-toggle="modal"
                                    data-bs-target="#contactModal">
                                Contact
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>No related products found.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 overflow-hidden shadow-lg">
            <div class="position-relative" style="height:50px;">
                <button type="button"
                        class="btn-close position-absolute top-0 end-0 m-3"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                        style="z-index:10;">
                </button>
            </div>

            <div class="modal-body p-0">
                <div class="row g-0">
                    <div class="col-md-5 p-0">
                        <img src="{{ asset('frontend/assets/images/bg-3.jpg') }}"
                             alt="Showroom Image"
                             class="img-fluid h-100 w-100"
                             style="object-fit: cover;">
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
                                <label for="contactEmail" class="form-label small fw-bold text-uppercase">Email Address *</label>
                                <input type="email" class="form-control rounded-pill border-primary border-2" id="contactEmail" required>
                            </div>

                            <div class="mb-3">
                                <label for="contactPhone" class="form-label small fw-bold text-uppercase">Phone Number *</label>
                                <input type="tel" class="form-control rounded-pill border-primary border-2" id="contactPhone" required>
                            </div>

                            <div class="mb-3">
                                <label for="contactMessage" class="form-label small fw-bold text-uppercase">Project Details</label>
                                <textarea class="form-control border-primary border-2 rounded-3" id="contactMessage" rows="3" placeholder="Tell us about your project requirements, timeline, and any specific preferences..."></textarea>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    const toast = new bootstrap.Toast(document.getElementById('successToast'));
    toast.show();

    form.reset();
}

document.getElementById("downloadAllImages").addEventListener("click", function () {
    let productName = @json($product->name);
    productName = productName.replace(/[^a-zA-Z0-9]/g, "_");

    const images = @json($allDownloadImages);
    images.forEach((url, index) => {
        if (url && url.trim() !== "") {
            const link = document.createElement("a");
            link.href = url;
            link.download = productName + "_image_" + (index + 1) + ".jpg";
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    });
});

$("#productInquiryForm").on("submit", function(e) {
    e.preventDefault();

    $.ajax({
        url: @json(route('products.inquiry')),
        type: "POST",
        data: $(this).serialize(),
        dataType: "json",
        success: function(res) {
            if (res.status === "success") {
                Swal.fire({
                    icon: "success",
                    title: "Thank You!",
                    text: res.message,
                    confirmButtonColor: "#0A2463"
                });
                $("#productInquiryForm")[0].reset();
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error!",
                    text: res.message
                });
            }
        },
        error: function() {
            Swal.fire({
                icon: "error",
                title: "Server Error!",
                text: "Unable to submit enquiry right now."
            });
        }
    });
});
</script>
@endsection
