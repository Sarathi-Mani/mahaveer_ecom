@extends('frontend.layouts.app')

@section('content')
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">AWARDS</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
        <li class="breadcrumb-item active text-white">Awards</li>
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

<div class="container-fluid products pt-5">
    <div class="container products-mini py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 700px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius wow fadeInUp" data-wow-delay="0.1s">
                AWARDS
            </h4>
        </div>

        <div class="row align-items-center g-5">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="rounded overflow-hidden shadow">
                    <img src="{{ asset('frontend/assets/images/award.jpg') }}" class="img-fluid w-100" alt="Mahaveer Ceramic World">
                </div>
            </div>

            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                <h3 class="mb-3 fw-bold text-dark">Mahaveer Ceramic World</h3>

                <a href="javascript:void(0)" class="d-flex align-items-center justify-content-between border bg-white rounded p-4 mt-4 mb-4">
                    <div>
                        <p class="text-muted mb-3">Award For Excellent Performance in Kajaria Group</p>
                        <h4 class="display-7 text-secondary mb-0">2024-2025</h4>
                    </div>
                    <img src="{{ asset('frontend/assets/images/award-3.jpg') }}" class="img-fluid" alt="Award 1">
                </a>

                <a href="javascript:void(0)" class="d-flex align-items-center justify-content-between border bg-white rounded p-4">
                    <div>
                        <p class="text-muted mb-3">Award For Excellent Performance in Kajaria Group</p>
                        <h4 class="display-7 text-secondary mb-0">2024-2025</h4>
                    </div>
                    <img src="{{ asset('frontend/assets/images/award-2.jpg') }}" class="img-fluid" alt="Award 2">
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

