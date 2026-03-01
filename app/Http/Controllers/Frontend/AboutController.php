<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        return view('frontend.about', [
            'meta_title' => 'About Us | Mahaveer Ceramic World',
            'meta_keywords' => 'about mahaveer ceramic world, tiles showroom, chennai tiles',
            'meta_description' => 'Learn about Mahaveer Ceramic World, our experience, mission, and trusted tile and sanitary partners.',
        ]);
    }
}

