@php
    use Illuminate\Support\Facades\DB;

    // Active Brands (limit 10)
    $brands = DB::table('brands')
                ->where('status', 1)
                ->orderBy('name', 'ASC')
                ->limit(10)
                ->get();

    // Wall Categories
    $wallCategories = DB::table('categories')
                        ->where('status', 1)
                        ->where('slug', 'like', '%wall%')
                        ->get();

    // Floor Categories
    $floorCategories = DB::table('categories')
                        ->where('status', 1)
                        ->where('slug', 'like', '%floor%')
                        ->get();
@endphp


<!-- ================= Floating Chat Widget ================= -->

<div id="chat-widget" class="position-fixed p-3" style="z-index:1055; bottom:80px; right:15px;">

    <!-- Toggle Button -->
    <button id="chat-toggle"
            class="btn btn-secondary rounded-circle shadow d-flex align-items-center justify-content-center"
            style="width:60px; height:60px;">
        <i class="fas fa-comments fs-4"></i>
    </button>

    <!-- Chat Box -->
    <div id="chat-box" class="card border-0 shadow-lg mt-2"
         style="width:330px; border-radius:15px; display:none;">

        <div class="card-body text-center p-4 position-relative">

            <button id="chat-close"
                    class="btn btn-light btn-sm position-absolute top-0 end-0 m-2 rounded-circle shadow-sm">
                <i class="fas fa-times text-danger"></i>
            </button>

            <img src="{{ asset('frontend/assets/images/mcw-logo-new.png') }}"
                 class="img-fluid mb-3"
                 style="width:160px; height:90px; object-fit:contain;">

            <h5 class="fw-bold">Mahaveer Ceramic World</h5>
            <p class="text-muted small">
                We are here to help you! Call or chat to connect with us right away.
            </p>

            <div id="action-section" class="d-flex justify-content-center gap-4 mt-3">
                <button id="call-btn"
                        class="btn btn-primary rounded-circle"
                        style="width:50px;height:50px;">
                    <i class="fa fa-phone-alt text-white"></i>
                </button>

                <button id="enquiry-btn"
                        class="btn btn-primary rounded-circle"
                        style="width:50px;height:50px;">
                    <i class="fa fa-comment text-white"></i>
                </button>
            </div>

            <!-- Enquiry Form -->
            <form id="enquiry-form"
                  class="mt-4 text-start"
                  method="POST"
                  action="#"
                  style="display:none;">
                @csrf

                <input type="text" name="name" class="form-control mb-2" placeholder="Your Name" required>
                <input type="email" name="email" class="form-control mb-2" placeholder="Your Email" required>
                <input type="text" name="phone" class="form-control mb-2" placeholder="Your Phone" required>
                <textarea name="message" rows="2" class="form-control mb-2" placeholder="Your Message" required></textarea>

                <button type="submit" class="btn btn-primary w-100">
                    Send Enquiry
                </button>
            </form>

        </div>
    </div>
</div>


<!-- ================= Footer ================= -->

<div class="container-fluid footer py-5">
    <div class="container py-5">

        <div class="row g-5 mb-5">

            <!-- About -->
            <div class="col-lg-3">
                <img src="{{ asset('frontend/assets/images/mcw-logo-new.png') }}"
                     style="height:90px;" class="mb-4">

                <p>
                    Mahaveer Ceramic World is an authorised Kajaria Ceramic Tiles dealer in Chennai,
                    providing premium wall and floor ceramic tile collections.
                </p>
            </div>

            <!-- Brands -->
            <div class="col-lg-3">
                <h4 class="text-white mb-4">Brands</h4>

                @forelse($brands as $brand)
                    <a href="{{ url('brand/'.$brand->id) }}" class="d-block mb-2">
                        <i class="fas fa-angle-right me-2"></i>
                        {{ $brand->name }}
                    </a>
                @empty
                    <p class="text-light">No brands available</p>
                @endforelse
            </div>

            <!-- Wall Categories -->
            <div class="col-lg-3">
                <h4 class="text-white mb-4">Wall Tiles Category</h4>

                @forelse($wallCategories as $category)
                    <a href="{{ url('category/'.$category->slug) }}" class="d-block mb-2">
                        <i class="fas fa-angle-right me-2"></i>
                        {{ $category->name }}
                    </a>
                @empty
                    <p class="text-light">No categories found</p>
                @endforelse
            </div>

            <!-- Floor Categories -->
            <div class="col-lg-3">
                <h4 class="text-white mb-4">Floor Tiles Category</h4>

                @forelse($floorCategories as $category)
                    <a href="{{ url('category/'.$category->slug) }}" class="d-block mb-2">
                        <i class="fas fa-angle-right me-2"></i>
                        {{ $category->name }}
                    </a>
                @empty
                    <p class="text-light">No categories found</p>
                @endforelse
            </div>

        </div>


        
<div class="row g-4 rounded" style="background-color: #021B52;">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="rounded p-4">
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                            style="width: 70px; height: 70px;">
                            <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                        </div>
                        <div>
                            <h4 class="text-white">Address</h4>
                            <p class="mb-2">No 106/B, Chethiyar Agaram Road, Vanagaram, Chennai - 600077</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="rounded p-4">
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                            style="width: 70px; height: 70px;">
                            <i class="fas fa-envelope fa-2x text-primary"></i>
                        </div>
                        <div>
                            <h4 class="text-white">Mail Us</h4>
                            <p class="mb-2">rohit@mahaveerceramicworld.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="rounded p-4">
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                            style="width: 70px; height: 70px;">
                            <i class="fa fa-phone-alt fa-2x text-primary"></i>
                        </div>
                        <div>
                            <h4 class="text-white">Mobile</h4>
                            <p class="mb-2">+91 98406 48777</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="rounded p-4">
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                            style="width: 70px; height: 70px;">
                            <i class="fab fa-firefox-browser fa-2x text-primary"></i>
                        </div>
                        <div class="social-links">
          <a href="https://wa.me/919840648777" target="_blank" rel="noopener"><i class="bi bi-whatsapp"></i></a>
          <a href="https://www.facebook.com/profile.php?id=61569118905669" target="_blank" rel="noopener"><i class="bi bi-facebook"></i></a>
          <a href="https://www.instagram.com/mahaveerceramicworld/" target="_blank" rel="noopener"><i class="bi bi-instagram"></i></a>
          <a href="https://www.youtube.com/@mahaveerceramic9280" target="_blank" rel="noopener"><i class="bi bi-youtube"></i></a>
          <a href="https://x.com/CeramicMahaveer" target="_blank" rel="noopener"><i class="bi bi-twitter"></i></a>
        </div>
                    </div>
                </div>
            </div>

    </div>
</div>


<!-- ================= Copyright ================= -->

<div class="container-fluid copyright py-4">
    <div class="container d-flex justify-content-between text-white">
        <div>
            © {{ date('Y') }} Mahaveer Ceramic World. All Rights Reserved.
        </div>
        <div>
            Designed By
            <a href="http://brokenglass.co.in"
               target="_blank"
               class="text-white">
                Brokenglass Designs
            </a>
        </div>
    </div>
</div>


<!-- ================= Scripts ================= -->

<script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>


<!-- Chat JS -->
<script>
document.addEventListener("DOMContentLoaded", function () {

    const chatToggle = document.getElementById("chat-toggle");
    const chatBox = document.getElementById("chat-box");
    const chatClose = document.getElementById("chat-close");
    const callBtn = document.getElementById("call-btn");
    const enquiryBtn = document.getElementById("enquiry-btn");
    const enquiryForm = document.getElementById("enquiry-form");
    const actionSection = document.getElementById("action-section");

    chatToggle.addEventListener("click", () => {
        chatBox.style.display =
            chatBox.style.display === "block" ? "none" : "block";
    });

    chatClose.addEventListener("click", () => {
        chatBox.style.display = "none";
        enquiryForm.style.display = "none";
        actionSection.style.display = "flex";
    });

    callBtn.addEventListener("click", () => {
        window.location.href = "tel:+919840648777";
    });

    enquiryBtn.addEventListener("click", () => {
        actionSection.style.display = "none";
        enquiryForm.style.display = "block";
    });

});
</script>