@extends('frontend.layouts.app')

@section('content')
<div class="container-fluid carousel bg-light px-0">
    <div class="row g-0 justify-content-end">
        <div class="col-12 col-lg-7 col-xl-9">
            <div class="header-carousel owl-carousel bg-light pb-5">
                <div class="row g-0 header-carousel-item align-items-center">
                    <div class="col-xl-6 carousel-img wow fadeInLeft" data-wow-delay="0.1s">
                        <img src="{{ asset('frontend/assets/images/carousel-2.jpg') }}" class="img-fluid w-100" alt="Image">
                    </div>
                    <div class="col-xl-6 carousel-content p-4">
                        <h4 class="text-uppercase fw-bold mb-4 wow fadeInRight" data-wow-delay="0.1s" style="letter-spacing: 3px;">Surround yourself in the unique beauty</h4>
                        <h1 class="display-3 text-capitalize mb-4 wow fadeInRight" data-wow-delay="0.3s">Welcome to Mahaveer Ceramic World</h1>
                        <a class="btn btn-secondary rounded-pill py-3 px-5 wow fadeInRight" data-wow-delay="0.7s" href="{{ route('contact.index') }}">Shop Now</a>
                    </div>
                </div>
                <div class="row g-0 header-carousel-item align-items-center">
                    <div class="col-xl-6 carousel-img wow fadeInLeft" data-wow-delay="0.1s">
                        <img src="{{ asset('frontend/assets/images/carousel-1.jpg') }}" class="img-fluid w-100" alt="Image">
                    </div>
                    <div class="col-xl-6 carousel-content p-4">
                        <h4 class="text-uppercase fw-bold mb-4 wow fadeInRight" data-wow-delay="0.1s" style="letter-spacing: 3px;">OUR FLOORS ARE DESIGNED</h4>
                        <h1 class="display-3 text-capitalize mb-4 wow fadeInRight" data-wow-delay="0.3s">TO LAST A LIFETIME</h1>
                        <p class="text-dark wow fadeInRight" data-wow-delay="0.5s">Reliable Flooring</p>
                        <a class="btn btn-secondary rounded-pill py-3 px-5 wow fadeInRight" data-wow-delay="0.7s" href="{{ route('contact.index') }}">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-5 col-xl-3 wow fadeInRight" data-wow-delay="0.1s">
            <div class="carousel-header-banner h-100">
                <img src="{{ asset('frontend/assets/images/nexion-floor.jpg') }}" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="Image">
                <div class="carousel-banner"></div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-6 col-md-4 col-lg-2 border-start border-end wow fadeInUp" data-wow-delay="0.1s">
            <div class="p-4">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-sync-alt fa-2x text-secondary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Free Return</h6>
                        <p class="mb-0">30 days money back guarantee!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.2s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fab fa-telegram-plane fa-2x text-secondary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Free Shipping</h6>
                        <p class="mb-0">Free shipping on all order</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.3s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-life-ring fa-2x text-secondary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Support 24/7</h6>
                        <p class="mb-0">We support online 24 hrs a day</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.4s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-credit-card fa-2x text-secondary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Receive Gift Card</h6>
                        <p class="mb-0">Recieve gift all over oder $50</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.5s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-lock fa-2x text-secondary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Secure Payment</h6>
                        <p class="mb-0">We Value Your Security</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.6s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-blog fa-2x text-secondary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Online Service</h6>
                        <p class="mb-0">Free return products in 30 days</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="container-fluid py-5 bg-light">
    <div class="container">
        <div class="row mt-5 pt-4 align-items-center">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                <img src="{{ asset('frontend/assets/images/bg-7.jpg') }}" class="img-fluid rounded shadow" alt="Our Company">
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                <h3 class="text-secondary mb-4">Why Choose Us?</h3>
                <p class="text-muted mb-4">With over 15 years of experience in the industry, we have established ourselves as a trusted partner for homeowners and professionals alike.</p>

                <div class="d-flex mb-3">
                    <div class="flex-shrink-0 bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="fas fa-award text-white"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="text-dark">Award-Winning Quality</h5>
                        <p class="text-muted mb-0">Recognized for excellence in product design and customer service.</p>
                    </div>
                </div>

                <div class="d-flex mb-3">
                    <div class="flex-shrink-0 bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="fas fa-shield-alt text-white"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="text-dark">Lifetime Warranty</h5>
                        <p class="text-muted mb-0">Confidence in our products with industry-leading warranty coverage.</p>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="flex-shrink-0 bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="fas fa-headset text-white"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="text-dark">24/7 Support</h5>
                        <p class="text-muted mb-0">Our customer service team is always available to assist you.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h4 class="text-secondary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius wow fadeInUp" data-wow-delay="0.1s">Our Philosophy</h4>
                <h2 class="display-6 fw-bold text-dark mb-3 wow fadeInUp" data-wow-delay="0.2s">Driving Excellence in Every Detail</h2>
                <p class="text-muted mb-0 wow fadeInUp" data-wow-delay="0.3s">Building the future of home solutions with innovation, quality, and customer-centric values</p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="bg-white rounded border p-4">
                    <div class="row text-center">
                        <div class="col-lg-3 col-6 mb-4">
                            <div class="d-flex flex-column align-items-center">
                                <div class="bg-secondary bg-opacity-3 rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                    <i class="fas fa-globe fa-2x text-white"></i>
                                </div>
                                <h3 class="text-secondary fw-bold mb-1">35+</h3>
                                <p class="text-muted mb-0">Countries Served</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mb-4">
                            <div class="d-flex flex-column align-items-center">
                                <div class="bg-success bg-opacity-3 rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                    <i class="fas fa-smile fa-2x text-white"></i>
                                </div>
                                <h3 class="text-success fw-bold mb-1">10K+</h3>
                                <p class="text-muted mb-0">Happy Customers</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mb-4">
                            <div class="d-flex flex-column align-items-center">
                                <div class="bg-warning bg-opacity-3 rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                    <i class="fas fa-cube fa-2x text-white"></i>
                                </div>
                                <h3 class="text-warning fw-bold mb-1">200+</h3>
                                <p class="text-muted mb-0">Products</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 mb-4">
                            <div class="d-flex flex-column align-items-center">
                                <div class="bg-info bg-opacity-3 rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                    <i class="fas fa-award fa-2x text-white"></i>
                                </div>
                                <h3 class="text-info fw-bold mb-1">15+</h3>
                                <p class="text-muted mb-0">Years Experience</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid product">
    <div class="container py-5">
        <div class="tab-class">
            <div class="row g-4">
                <div class="col-lg-4 text-start wow fadeInLeft" data-wow-delay="0.1s">
                    <h1>Our Products</h1>
                </div>
                <div class="col-lg-8 text-end wow fadeInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5" id="filterButtons">
                        <li class="nav-item mb-4"><a class="d-flex mx-2 py-2 rounded-pill active filter-btn" data-filter="all"><span class="text-dark" style="width: 130px;">All Products</span></a></li>
                        <li class="nav-item mb-4"><a class="d-flex py-2 mx-2 rounded-pill filter-btn" data-filter="new"><span class="text-dark" style="width: 130px;">New Arrivals</span></a></li>
                        <li class="nav-item mb-4"><a class="d-flex mx-2 py-2 rounded-pill filter-btn" data-filter="floor"><span class="text-dark" style="width: 130px;">Floor Tiles</span></a></li>
                        <li class="nav-item mb-4"><a class="d-flex mx-2 py-2 rounded-pill filter-btn" data-filter="wall"><span class="text-dark" style="width: 130px;">Wall Tiles</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @php
                            $cards = [
                                ['img' => 'image-4.jpg', 'cat' => 'Living Room', 'title' => 'Wall Tiles', 'classes' => 'filter-all filter-new filter-wall', 'badge' => 'New', 'eye_link' => route('products.index', ['section' => 'wall']), 'text_link' => route('products.index', ['section' => 'wall'])],
                                ['img' => 'image-5.jpg', 'cat' => 'Living Room', 'title' => 'Floor Tiles', 'classes' => 'filter-all filter-floor', 'badge' => 'sale', 'eye_link' => route('products.index', ['section' => 'floor']), 'text_link' => route('products.index', ['section' => 'floor'])],
                                ['img' => 'image-6.jpg', 'cat' => 'Bed Room', 'title' => 'Floor Tiles', 'classes' => 'filter-all filter-floor', 'badge' => '', 'eye_link' => route('products.index', ['section' => 'floor']), 'text_link' => route('products.index', ['section' => 'floor'])],
                                ['img' => 'image-7.jpg', 'cat' => 'Kitchen', 'title' => 'Floor Tiles', 'classes' => 'filter-all filter-new filter-floor', 'badge' => 'New', 'eye_link' => route('products.index', ['section' => 'floor']), 'text_link' => route('products.index', ['section' => 'floor'])],
                                ['img' => 'image-8.jpg', 'cat' => 'Commercial Space', 'title' => 'Floor Tiles', 'classes' => 'filter-all filter-floor', 'badge' => 'Sale', 'eye_link' => route('products.index', ['section' => 'floor']), 'text_link' => route('products.index', ['section' => 'floor'])],
                                ['img' => 'image-9.jpg', 'cat' => 'Commercial Space', 'title' => 'Wall Tiles', 'classes' => 'filter-all filter-wall', 'badge' => '', 'eye_link' => route('products.index', ['section' => 'wall']), 'text_link' => route('products.index', ['section' => 'wall'])],
                                ['img' => 'image-3.jpg', 'cat' => 'Living Room', 'title' => 'Wall Tiles', 'classes' => 'filter-all filter-new filter-wall', 'badge' => 'New', 'eye_link' => route('products.index', ['section' => 'wall']), 'text_link' => route('products.index', ['section' => 'wall'])],
                                ['img' => 'image-10.jpg', 'cat' => 'Outdoor', 'title' => 'Floor Tiles', 'classes' => 'filter-all filter-floor', 'badge' => 'Sale', 'eye_link' => route('products.index', ['section' => 'floor']), 'text_link' => route('products.index', ['section' => 'floor'])],
                            ];
                        @endphp
                        @foreach($cards as $i => $card)
                            <div class="col-md-6 col-lg-4 col-xl-3 mb-5 product-card {{ $card['classes'] }}">
                                <div class="product-item rounded wow fadeInUp" data-wow-delay="{{ number_format((($i % 4) + 1) * 0.2 - 0.1, 1) }}s">
                                    <div class="product-item-inner border rounded">
                                        <div class="product-item-inner-item">
                                            <img src="{{ asset('frontend/assets/images/' . $card['img']) }}" class="img-fluid w-100 rounded-top" alt="Image">
                                            @if($card['badge'] === 'New')
                                                <div class="product-new">New</div>
                                            @elseif($card['badge'] !== '')
                                                <div class="product-sale">{{ $card['badge'] }}</div>
                                            @endif
                                            <div class="product-details"><a href="{{ $card['eye_link'] }}"><i class="fa fa-eye fa-1x"></i></a></div>
                                        </div>
                                        <div class="text-center rounded-bottom p-4">
                                            <a href="{{ $card['text_link'] }}" class="d-block mb-2">{{ $card['cat'] }}</a>
                                            <a href="{{ $card['text_link'] }}" class="d-block h4">{{ $card['title'] }}</a>
                                        </div>
                                    </div>
                                    <div class="product-item-add border border-top-0 rounded-bottom text-center p-4 pt-0">
                                        <div class="d-flex gap-2">
                                            <a href="tel:+911234567890" class="btn btn-success rounded-pill py-2 w-50"><i class="fas fa-phone-alt me-1"></i> Call</a>
                                            <button class="btn btn-secondary rounded-pill py-2 w-50" data-bs-toggle="modal" data-bs-target="#contactModal">Contact</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row g-4 mt-2">
                <div class="col-lg-12 text-end wow fadeInRight" data-wow-delay="0.1s">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary btn-outline-light rounded-pill py-2 px-4 px-lg-3 mb-3 mb-md-3 mb-lg-0"><span class="text-white">View More</span></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid products productList overflow-hidden">
    <div class="container products-mini py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h4 class="text-secondary border-bottom border-primary border-2 d-inline-block p-2 title-border-radius wow fadeInUp" data-wow-delay="0.1s">Products</h4>
            <h4 class="mb-0 display-6 wow fadeInUp" data-wow-delay="0.3s">WHAT WE OFFER</h4>
        </div>
        <div class="productList-carousel owl-carousel pt-4 wow fadeInUp carousel-new" data-wow-delay="0.3s">
            @php
                $offers = [
                    ['Bedroom Tiles','Bedroom Wall Tiles', route('products.index', ['section' => 'wall']), route('products.index', ['section' => 'wall'])],
                    ['Bathroom Tiles','Bathroom Wall tiles', route('products.index', ['section' => 'wall']), route('products.index', ['section' => 'wall'])],
                    ['Wall Tiles','Kitchen Wall Tiles', route('products.index', ['section' => 'wall']), route('products.index', ['section' => 'wall'])],
                    ['Floor Tiles','Kitchen Floor Tiles', route('products.index', ['section' => 'floor']), route('products.index', ['section' => 'floor'])],
                ];
            @endphp
            @foreach($offers as $offer)
            <div class="productImg-carousel owl-carousel productList-item">
                <div class="productImg-item products-mini-item border">
                    <div class="row g-0">
                        <div class="col-5">
                            <div class="products-mini-img border-end h-100">
                                <img src="{{ asset('frontend/assets/images/image-3.jpg') }}" class="img-fluid w-100 h-100" alt="Image">
                                <div class="products-mini-icon rounded-circle bg-secondary"><a href="{{ $offer[2] }}"><i class="fa fa-eye fa-1x text-white"></i></a></div>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="products-mini-content p-3">
                                <a href="{{ $offer[3] }}" class="d-block mb-2">{{ $offer[0] }}</a>
                                <a href="{{ $offer[3] }}" class="d-block h4">{{ $offer[1] }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="products-mini-add border p-3">
                        <div class="d-flex justify-content-between align-items-center gap-3">
                            <a href="tel:+1234567890" class="btn btn-success border-secondary rounded-pill py-2 px-3 flex-fill text-center"><i class="fas fa-phone-alt me-2"></i> Call Now</a>
                            <button type="button" class="btn btn-secondary border-secondary rounded-pill py-2 px-3 flex-fill text-center" data-bs-toggle="modal" data-bs-target="#contactModal"><i class="fas fa-envelope me-2"></i> Contact</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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
                            <div class="row"><div class="col-md-12 mb-3"><label for="firstName" class="form-label small fw-bold text-uppercase">First Name *</label><input type="text" class="form-control rounded-pill border-primary border-2" id="firstName" required></div></div>
                            <div class="mb-3"><label for="email" class="form-label small fw-bold text-uppercase">Email Address *</label><input type="email" class="form-control rounded-pill border-primary border-2" id="email" required></div>
                            <div class="mb-3"><label for="phone" class="form-label small fw-bold text-uppercase">Phone Number *</label><input type="tel" class="form-control rounded-pill border-primary border-2" id="phone" required></div>
                            <div class="mb-3"><label for="message" class="form-label small fw-bold text-uppercase">Project Details</label><textarea class="form-control border-primary border-2 rounded-3" id="message" rows="3" placeholder="Tell us about your project requirements, timeline, and any specific preferences..."></textarea></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light border-0">
                <button type="button" class="btn btn-secondary rounded-pill px-4" onclick="submitShowroomForm()" style="background: linear-gradient(135deg, #0d6efd 0%, #0dcaf0 100%); border: none;"><i class="fas fa-calendar-check me-2"></i>Submit</button>
            </div>
        </div>
    </div>
</div>

<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body"><i class="fas fa-check-circle me-2"></i>Thank you! We'll contact you within 24 hours.</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<style>
.filter-btn { cursor: pointer; user-select: none; }
.filter-btn:hover { background-color: #0A2463; color: #fff; }
.filter-btn:hover span { color: #fff !important; }
.filter-btn.active { background-color: #0A2463; }
.filter-btn.active span { color: #fff !important; }
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".filter-btn");
    const products = document.querySelectorAll(".product-card");

    buttons.forEach(btn => {
        btn.addEventListener("click", function () {
            buttons.forEach(b => b.classList.remove("active"));
            this.classList.add("active");

            let filter = this.getAttribute("data-filter");
            products.forEach(card => {
                card.style.display = "none";
                if (filter === "all" || card.classList.contains("filter-" + filter)) {
                    card.style.display = "block";
                }
            });
        });
    });
});

function submitShowroomForm() {
    const firstName = document.getElementById('firstName').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    if (!firstName || !email || !message) {
        alert('Please fill in all required fields.');
        return;
    }

    const toast = new bootstrap.Toast(document.getElementById('successToast'));
    toast.show();

    const modal = bootstrap.Modal.getInstance(document.getElementById('contactModal'));
    if (modal) {
        modal.hide();
    }

    document.getElementById('contactForm').reset();
}
</script>
@endsection
