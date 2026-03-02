@extends('frontend.layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="mb-2">Verify OTP</h3>
                    <p class="text-muted">OTP sent to +91 {{ $mobile }}</p>

                    @if(session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif

                    <form method="POST" action="{{ route('member.verify-otp.submit') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="otp" class="form-label">Enter OTP</label>
                            <input type="text" class="form-control @error('otp') is-invalid @enderror" id="otp" name="otp" maxlength="6" placeholder="6 digit OTP" required>
                            @error('otp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Verify & Login</button>
                    </form>

                    <p class="mt-3 mb-0">
                        Change mobile?
                        <a href="{{ route('member.login') }}">Back to login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
