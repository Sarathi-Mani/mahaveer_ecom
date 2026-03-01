@extends('frontend.layouts.app')

@section('content')
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">ABOUT US</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
        <li class="breadcrumb-item active text-white">About Us</li>
    </ol>
</div>

<div class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-6 col-md-4 col-lg-2 border-start border-end wow fadeInUp" data-wow-delay="0.1s">
            <div class="p-4">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-sync-alt fa-2x text-primary"></i>
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
                    <i class="fab fa-telegram-plane fa-2x text-primary"></i>
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
                    <i class="fas fa-life-ring fa-2x text-primary"></i>
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
                    <i class="fas fa-credit-card fa-2x text-primary"></i>
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
                    <i class="fas fa-lock fa-2x text-primary"></i>
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
                    <i class="fas fa-blog fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">Online Service</h6>
                        <p class="mb-0">Free return products in 30 days</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-light py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="d-flex align-items-center justify-content-between border bg-white rounded p-4 h-100">
                    <div>
                        <p class="text-muted mb-3">EXPERIENCE</p>
                        <h3 class="text-primary mb-3">30+ Years of Excellence</h3>
                        <p class="mb-0">
                            With 30+ years' experience in the tiles and ceramics industry, we have a proven
                            track record of delivering quality while evolving with the latest market trends.
                            Understanding customer requirements and offering competitive pricing have been
                            our key success factors.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                <div class="d-flex align-items-center justify-content-between border bg-white rounded p-4 h-100">
                    <div>
                        <p class="text-muted mb-3">MISSION</p>
                        <h3 class="text-primary mb-3">Customer Satisfaction First</h3>
                        <p class="mb-0">
                            We strive to achieve complete customer satisfaction by building strong
                            relationships through value-added interactions, understanding customer needs,
                            and delivering quality within budget. We are proud to be the first
                            Kajaria Prima Plus showroom in Tamil Nadu.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid products pt-5">
    <div class="container products-mini py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 700px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius wow fadeInUp" data-wow-delay="0.1s">
                About Us
            </h4>
        </div>

        <div class="row align-items-center g-5">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="rounded overflow-hidden shadow">
                    <img src="{{ asset('frontend/assets/images/accord_kit_wall.jpg') }}" class="img-fluid w-100" alt="Mahaveer Ceramic World">
                </div>
            </div>

            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                <h3 class="mb-3 fw-bold text-dark">Mahaveer Ceramic World</h3>
                <p class="text-muted mb-3">
                    Being involved in this industry across generations and over three decades, the passion and
                    commitment to deliver the best solutions keeping in pace with the latest trends and designs
                    have always been an exciting challenge for us at <strong>Mahaveer Ceramic World</strong>.
                </p>
                <p class="text-muted mb-3">
                    Through our partnership as impeccable as <strong>Kajaria</strong>, we have enhanced our
                    capabilities to deliver quality with tailor-made solutions that cater to your taste,
                    requirements, and budget.
                </p>
                <p class="text-muted mb-4">
                    In addition, we also provide sanitary solutions through our partnership with
                    <strong>American Standard</strong> and <strong>Grohe</strong>, two of the world's best and
                    proven players in the segment.
                </p>
                <a href="{{ route('about.index') }}" class="btn btn-primary rounded-pill px-4 py-2">Read More</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid products productList overflow-hidden">
    <div class="container products-mini py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h4 class="text-primary border-bottom border-primary border-2 d-inline-block p-2 title-border-radius wow fadeInUp" data-wow-delay="0.1s">OUR PARTNERS</h4>
        </div>

        <div class="productList-carousel owl-carousel pt-4 wow fadeInUp" data-wow-delay="0.3s">
            <div class="productImg-carousel owl-carousel productList-item">
                <div class="productImg-item products-mini-item border">
                    <div class="row g-0">
                        <div class="col-5">
                            <div class="products-mini-img border-end h-100">
                                <img src="{{ asset('frontend/assets/images/brand/kajaria.webp') }}" class="img-fluid w-100 h-100" alt="Kajaria">
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="products-mini-content p-3">
                                <a href="{{ route('products.index') }}" class="d-block mb-2">Kajaria Ceramic - Your trusted choice for premium tiles.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="productImg-carousel owl-carousel productList-item">
                <div class="productImg-item products-mini-item border">
                    <div class="row g-0">
                        <div class="col-5">
                            <div class="products-mini-img border-end h-100">
                                <img src="{{ asset('frontend/assets/images/brand/Nexion.jpg') }}" class="img-fluid w-100 h-100" alt="Nexion">
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="products-mini-content p-3">
                                <a href="{{ route('products.index') }}" class="d-block mb-2">Nexion Tiles - Crafted for modern, sophisticated spaces.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="productImg-carousel owl-carousel productList-item">
                <div class="productImg-item products-mini-item border">
                    <div class="row g-0">
                        <div class="col-5">
                            <div class="products-mini-img border-end h-100">
                                <img src="{{ asset('frontend/assets/images/brand/american.jpg') }}" class="img-fluid w-100 h-100" alt="American Standard">
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="products-mini-content p-3">
                                <a href="{{ route('products.index') }}" class="d-block mb-2">American Standard - Quality you can rely on.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="productImg-carousel owl-carousel productList-item">
                <div class="productImg-item products-mini-item border">
                    <div class="row g-0">
                        <div class="col-5">
                            <div class="products-mini-img border-end h-100">
                                <img src="{{ asset('frontend/assets/images/brand/kohler.jpg') }}" class="img-fluid w-100 h-100" alt="Kohler">
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="products-mini-content p-3">
                                <a href="{{ route('products.index') }}" class="d-block mb-2">Kohler - Transforming spaces with timeless elegance.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="productImg-carousel owl-carousel productList-item">
                <div class="productImg-item products-mini-item border">
                    <div class="row g-0">
                        <div class="col-5">
                            <div class="products-mini-img border-end h-100">
                                <img src="{{ asset('frontend/assets/images/brand/auga.webp') }}" class="img-fluid w-100 h-100" alt="Auga">
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="products-mini-content p-3">
                                <a href="{{ route('products.index') }}" class="d-block mb-2">Auga - Elevating spaces with pure, modern design.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container pb-5">
        <div class="row g-4">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                <a href="javascript:void(0)">
                    <div class="bg-primary rounded position-relative">
                        <img src="{{ asset('frontend/assets/images/nexion-floor.jpg') }}" class="img-fluid w-100 rounded" alt="Floor Tiles">
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center rounded p-4" style="background: rgba(255, 255, 255, 0.5);">
                            <h3 class="display-5 text-primary">
                                Premium Floor <br>
                                <span>Tiles Collection</span>
                            </h3>

                            <p class="fs-4 text-muted">Durable • Stylish • Affordable</p>

                            <a href="{{ url('/contact') }}" class="btn btn-primary rounded-pill align-self-start py-2 px-4">Enquire Now</a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                <a href="javascript:void(0)">
                    <div class="text-center bg-primary rounded position-relative">
                        <img src="{{ asset('frontend/assets/images/nexion-floor.jpg') }}" class="img-fluid w-100" alt="Sale Banner">
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center rounded p-4" style="background: rgba(242, 139, 0, 0.5);">
                            <h2 class="display-2 text-secondary">SALE</h2>
                            <h4 class="display-5 text-white mb-4">Get UP To 50% Off</h4>
                            <a href="{{ url('/contact') }}" class="btn btn-secondary rounded-pill align-self-center py-2 px-4">Shop Now</a>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

