@extends('frontend.layouts.app')

@section('content')

<!-- ================= Carousel Start ================= -->


<!-- ================= Services Section ================= -->

<div class="container-fluid px-0">
    <div class="row g-0 text-center">

        @php
            $services = [
                ['icon' => 'fa-sync-alt', 'title' => 'Free Return', 'desc' => '30 days money back guarantee!'],
                ['icon' => 'fa-telegram-plane', 'title' => 'Free Shipping', 'desc' => 'Free shipping on all order'],
                ['icon' => 'fa-life-ring', 'title' => 'Support 24/7', 'desc' => 'We support online 24 hrs a day'],
                ['icon' => 'fa-credit-card', 'title' => 'Gift Card', 'desc' => 'Receive gift on orders $50+'],
                ['icon' => 'fa-lock', 'title' => 'Secure Payment', 'desc' => 'We value your security'],
                ['icon' => 'fa-blog', 'title' => 'Online Service', 'desc' => 'Free returns in 30 days'],
            ];
        @endphp

        @foreach($services as $service)
            <div class="col-6 col-md-4 col-lg-2 border">
                <div class="p-4">
                    <i class="fas {{ $service['icon'] }} fa-2x text-secondary"></i>
                    <h6 class="text-uppercase mt-3">{{ $service['title'] }}</h6>
                    <p class="mb-0 small">{{ $service['desc'] }}</p>
                </div>
            </div>
        @endforeach

    </div>
</div>

<!-- ================= Why Choose Us ================= -->

<section class="container-fluid py-5 bg-light">
    <div class="container">

        <div class="row align-items-center">
            <div class="col-lg-6">
                <img src="{{ asset('frontend/assets/images/bg-7.jpg') }}"
                     class="img-fluid rounded shadow">
            </div>

            <div class="col-lg-6">
                <h3 class="text-secondary mb-4">Why Choose Us?</h3>

                <p class="text-muted mb-4">
                    With over 15 years of experience, we have established ourselves
                    as a trusted partner for homeowners and professionals.
                </p>

                <ul class="list-unstyled">
                    <li class="mb-3">
                        <i class="fas fa-award text-secondary me-2"></i>
                        Award-Winning Quality
                    </li>
                    <li class="mb-3">
                        <i class="fas fa-shield-alt text-secondary me-2"></i>
                        Lifetime Warranty
                    </li>
                    <li>
                        <i class="fas fa-headset text-secondary me-2"></i>
                        24/7 Support
                    </li>
                </ul>

            </div>
        </div>

    </div>
</section>

<!-- ================= Our Philosophy ================= -->

<section class="container-fluid py-5 bg-light">
    <div class="container text-center">

        <h4 class="text-secondary mb-3">Our Philosophy</h4>
        <h2 class="fw-bold mb-3">Driving Excellence in Every Detail</h2>
        <p class="text-muted mb-5">
            Building the future of home solutions with innovation,
            quality, and customer-centric values.
        </p>

        <div class="row">

            <div class="col-lg-3 col-6 mb-4">
                <h3 class="text-secondary fw-bold">35+</h3>
                <p>Countries Served</p>
            </div>

            <div class="col-lg-3 col-6 mb-4">
                <h3 class="text-success fw-bold">10K+</h3>
                <p>Happy Customers</p>
            </div>

            <div class="col-lg-3 col-6 mb-4">
                <h3 class="text-warning fw-bold">200+</h3>
                <p>Products</p>
            </div>

            <div class="col-lg-3 col-6 mb-4">
                <h3 class="text-info fw-bold">15+</h3>
                <p>Years Experience</p>
            </div>

        </div>

    </div>
</section>

@endsection