<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact', [
            'meta_title' => 'Contact Us | Mahaveer Ceramic World',
            'meta_keywords' => 'contact mahaveer ceramic world, tiles showroom chennai',
            'meta_description' => 'Get in touch with Mahaveer Ceramic World for tiles and sanitary solutions.',
        ]);
    }

    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['required', 'string', 'max:30'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Please fill all required fields correctly.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $name = trim((string) $request->name);
        $email = trim((string) $request->email);
        $phone = trim((string) $request->phone);
        $message = trim((string) $request->message);

        try {
            DB::table('enquiries')->insert([
                'firstname' => $name,
                'email' => $email,
                'phoneno' => $phone,
                'message' => $message,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
            $safeEmail = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
            $safePhone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
            $safeMessage = nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8'));

            $adminEmail = 'kalaivani@brokenglass.co.in';
            $adminSubject = 'New Enquiry - Mahaveer Ceramic World';
            $adminMessage = "
            <html><head><title>New Contact Enquiry</title></head><body>
                <div style='background:#f4f4f4;padding:20px;font-family:Segoe UI,Arial,sans-serif;'>
                    <div style='background:#fff;border-radius:10px;max-width:600px;margin:20px auto;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.1);'>
                        <div style='background:#0A2463;color:#fff;padding:15px 25px;font-size:20px;font-weight:bold;'>New Enquiry Received</div>
                        <div style='padding:25px;color:#333;'>
                            <p><strong>Name:</strong> {$safeName}</p>
                            <p><strong>Email:</strong> {$safeEmail}</p>
                            <p><strong>Phone:</strong> {$safePhone}</p>
                            <p><strong>Message:</strong><br>{$safeMessage}</p>
                            <p><strong>Submitted on:</strong> " . now()->format('Y-m-d H:i:s') . "</p>
                        </div>
                    </div>
                </div>
            </body></html>";

            $userSubject = 'Thank You for Contacting Mahaveer Ceramic World';
            $userMessage = "
            <html><head><title>Thank You for Contacting Us</title></head><body>
                <div style='background:#f3f4f6;padding:20px;font-family:Segoe UI,Arial,sans-serif;'>
                    <div style='background:#fff;border-radius:10px;max-width:600px;margin:20px auto;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.08);'>
                        <div style='background:#b85c0a;color:#fff;padding:15px 25px;font-size:20px;font-weight:bold;'>Thank You for Contacting Us</div>
                        <div style='padding:25px;color:#333;'>
                            <p>Hi <strong>{$safeName}</strong>,</p>
                            <p>Thank you for reaching out to <strong>Mahaveer Ceramic World</strong>! Our team has received your enquiry and will get back to you soon.</p>
                            <p><strong>Your Details:</strong></p>
                            <p>Email: {$safeEmail}<br>Phone: {$safePhone}</p>
                            <p><strong>Your Message:</strong><br>{$safeMessage}</p>
                            <p><a href='https://mahaveerceramicworld.com' style='display:inline-block;background:#b85c0a;color:#fff;padding:10px 15px;border-radius:6px;text-decoration:none;'>Visit Our Website</a></p>
                        </div>
                    </div>
                </div>
            </body></html>";

            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8\r\n";

            $adminHeaders = $headers .
                "From: {$safeEmail}\r\n" .
                "Reply-To: {$safeEmail}\r\n" .
                "BCC: rajselvarani14@gmail.com\r\n";

            $userHeaders = $headers .
                "From: Mahaveer Ceramic World <no-reply@mahaveerceramicworld.com>\r\n" .
                "Reply-To: no-reply@mahaveerceramicworld.com\r\n" .
                "BCC: rajselvarani14@gmail.com\r\n";

            @mail($adminEmail, $adminSubject, $adminMessage, $adminHeaders);
            @mail($email, $userSubject, $userMessage, $userHeaders);

            return response()->json([
                'status' => 'success',
                'message' => 'Thank you for contacting us! A confirmation email has been sent.',
            ]);
        } catch (\Exception $e) {
            Log::error('Contact enquiry insert failed', [
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'There was an error sending your message. Please try again.',
            ], 500);
        }
    }
}
