@extends('frontend.layouts.app')

@section('content')
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Contact Us</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
        <li class="breadcrumb-item active text-white">Contact</li>
    </ol>
</div>

<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
            <div class="row g-4">
                <div class="col-12">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
                        <h4 class="text-primary border-bottom border-primary border-2 d-inline-block pb-2">Get in touch</h4>
                        <p class="mb-5 fs-5 text-dark">We are here for you! how can we help, We are here for you!</p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h5 class="text-primary wow fadeInUp" data-wow-delay="0.1s">Let's Connect</h5>
                    <h1 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.3s">Send Your Message</h1>
                    <p class="mb-4 wow fadeInUp" data-wow-delay="0.5s">
                        Have questions, suggestions, or feedback? We'd love to hear from you! Fill out the form below and our team will get back to you as soon as possible.
                    </p>

                    <form id="contactForm">
                        @csrf
                        <div class="row g-4 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone">
                                    <label for="phone">Your Phone</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" style="height: 160px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100 py-3" id="submitBtn">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="h-100 rounded">
                        <iframe class="rounded w-100" style="height: 100%;"
                            src="https://www.google.com/maps?q=Mahaveer%20Ceramic%20World%2C%20Vanagaram%2C%20Chennai&output=embed"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="row g-4 align-items-center justify-content-center">
                        <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="rounded p-4">
                                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4" style="width: 70px; height: 70px;">
                                    <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h4>Address</h4>
                                    <p class="mb-2">No 106/B, Chethiyar Agaram Road, Vanagaram, Chennai - 600077</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="rounded p-4">
                                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4" style="width: 70px; height: 70px;">
                                    <i class="fas fa-envelope fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h4>Mail Us</h4>
                                    <p class="mb-2">rohit@mahaveerceramicworld.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="rounded p-4">
                                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4" style="width: 70px; height: 70px;">
                                    <i class="fa fa-phone-alt fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h4>Telephone</h4>
                                    <p class="mb-2">+91 98406 48777</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content success-modal-content border-0 shadow">
            <div class="modal-header success-modal-header text-white border-0">
                <h5 class="modal-title d-flex align-items-center gap-2" id="successModalLabel">
                    <span class="success-icon-wrap"><i class="fas fa-check"></i></span>
                    Message Sent
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body success-modal-body">
                <p class="mb-1 fw-semibold text-primary">Thank you for contacting Mahaveer Ceramic World.</p>
                <p id="successMessage" class="mb-0 text-muted">Your message has been sent successfully!</p>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="errorModalLabel">Error!</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="errorMessage">There was an error sending your message. Please try again.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="validationErrorModal" tabindex="-1" aria-labelledby="validationErrorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title" id="validationErrorModalLabel">Validation Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="validationErrorMessage">Please fill in all required fields correctly.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<style>
.form-control.error {
    border: 1px solid #dc3545 !important;
}

.success-modal-content {
    border-radius: 14px;
    overflow: hidden;
}

.success-modal-header {
    background: linear-gradient(135deg, #0A2463 0%, #0f3b9d 100%);
}

.success-icon-wrap {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background-color: #b85c0a;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
}

.success-modal-body {
    background: #f8f9fd;
}
</style>

<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#contactForm').on('submit', function(e) {
        e.preventDefault();

        $('#contactForm input, #contactForm textarea').removeClass('error');

        let isValid = true;
        const errorFields = [];
        const name = $('#name').val().trim();
        const email = $('#email').val().trim();
        const phone = $('#phone').val().trim();
        const message = $('#message').val().trim();

        if (name === '') {
            $('#name').addClass('error');
            errorFields.push('Name');
            isValid = false;
        }
        if (email === '' || !isValidEmail(email)) {
            $('#email').addClass('error');
            errorFields.push('Valid Email');
            isValid = false;
        }
        if (phone === '') {
            $('#phone').addClass('error');
            errorFields.push('Phone');
            isValid = false;
        }
        if (message === '') {
            $('#message').addClass('error');
            errorFields.push('Message');
            isValid = false;
        }

        if (!isValid) {
            $('#validationErrorMessage').text('Please fill in the following required fields: ' + errorFields.join(', '));
            new bootstrap.Modal(document.getElementById('validationErrorModal')).show();
            return false;
        }

        const submitBtn = $('#submitBtn');
        const originalText = submitBtn.html();
        submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Sending...');
        submitBtn.prop('disabled', true);

        $.ajax({
            url: "{{ route('contact.submit') }}",
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#successMessage').text(response.message);
                    new bootstrap.Modal(document.getElementById('successModal')).show();
                    $('#contactForm')[0].reset();
                    $('#contactForm input, #contactForm textarea').removeClass('error');
                } else {
                    $('#errorMessage').text(response.message || 'There was an error sending your message. Please try again.');
                    new bootstrap.Modal(document.getElementById('errorModal')).show();
                }
            },
            error: function(xhr) {
                let messageText = 'An error occurred while sending your message. Please try again.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    messageText = xhr.responseJSON.message;
                }
                $('#errorMessage').text(messageText);
                new bootstrap.Modal(document.getElementById('errorModal')).show();
            },
            complete: function() {
                submitBtn.html(originalText);
                submitBtn.prop('disabled', false);
            }
        });
    });

    $('#contactForm input, #contactForm textarea').on('input', function() {
        $(this).removeClass('error');
    });

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
});
</script>
@endsection
