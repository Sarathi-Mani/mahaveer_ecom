<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MobileOtpCode;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;

class MobileAuthController extends Controller
{
    public function showRegisterForm(): View
    {
        return view('frontend.auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string'],
        ]);

        $mobile = $this->normalizeIndianMobile($request->mobile);

        if ($mobile === null) {
            return back()
                ->withInput()
                ->withErrors(['mobile' => 'Please enter a valid 10-digit mobile number.']);
        }

        if (User::where('mobile', $mobile)->exists()) {
            return back()
                ->withInput()
                ->withErrors(['mobile' => 'Mobile number already registered. Please login.']);
        }

        User::create([
            'name' => $request->name,
            'mobile' => $mobile,
            'email' => $mobile.'@mcw.local',
            'password' => Hash::make(Str::random(24)),
        ]);

        $otp = $this->storeOtp($mobile);

        $request->session()->put('member_auth_mobile', $mobile);

        return redirect()
            ->route('member.verify-otp')
            ->with('status', 'OTP sent successfully. For now, test OTP is: '.$otp);
    }

    public function showLoginForm(): View
    {
        return view('frontend.auth.login');
    }

    public function sendLoginOtp(Request $request): RedirectResponse
    {
        $request->validate([
            'mobile' => ['required', 'string'],
        ]);

        $mobile = $this->normalizeIndianMobile($request->mobile);

        if ($mobile === null) {
            return back()
                ->withInput()
                ->withErrors(['mobile' => 'Please enter a valid 10-digit mobile number.']);
        }

        if (!User::where('mobile', $mobile)->exists()) {
            return back()
                ->withInput()
                ->withErrors(['mobile' => 'Mobile number not registered. Please register first.']);
        }

        $otp = $this->storeOtp($mobile);

        $request->session()->put('member_auth_mobile', $mobile);

        return redirect()
            ->route('member.verify-otp')
            ->with('status', 'OTP sent successfully. For now, test OTP is: '.$otp);
    }

    public function showVerifyOtpForm(Request $request): RedirectResponse|View
    {
        $mobile = $request->session()->get('member_auth_mobile');

        if (!$mobile) {
            return redirect()->route('member.login');
        }

        return view('frontend.auth.verify-otp', ['mobile' => $mobile]);
    }

    public function verifyOtp(Request $request): RedirectResponse
    {
        $request->validate([
            'otp' => ['required', 'digits:6'],
        ]);

        $mobile = $request->session()->get('member_auth_mobile');

        if (!$mobile) {
            return redirect()->route('member.login');
        }

        $record = MobileOtpCode::query()
            ->where('mobile', $mobile)
            ->where('otp_code', $request->otp)
            ->where('expires_at', '>=', now())
            ->first();

        if (!$record) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
        }

        $user = User::where('mobile', $mobile)->first();

        if (!$user) {
            return redirect()->route('member.register')->withErrors([
                'mobile' => 'User not found. Please register.',
            ]);
        }

        MobileOtpCode::where('mobile', $mobile)->delete();
        $request->session()->forget('member_auth_mobile');

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended(route('home'));
    }

    private function normalizeIndianMobile(string $mobile): ?string
    {
        $digits = preg_replace('/\D+/', '', $mobile);

        if (str_starts_with($digits, '91') && strlen($digits) === 12) {
            $digits = substr($digits, 2);
        }

        if (strlen($digits) !== 10) {
            return null;
        }

        return $digits;
    }

    private function storeOtp(string $mobile): string
    {
        $otp = (string) random_int(100000, 999999);

        MobileOtpCode::updateOrCreate(
            ['mobile' => $mobile],
            [
                'otp_code' => $otp,
                'expires_at' => now()->addMinutes(5),
            ]
        );

        return $otp;
    }
}
