<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class AwardsController extends Controller
{
    public function index()
    {
        return view('frontend.awards', [
            'meta_title' => 'Awards | Mahaveer Ceramic World',
            'meta_keywords' => 'mahaveer awards, kajaria award, tiles showroom awards',
            'meta_description' => 'Awards and recognitions received by Mahaveer Ceramic World for excellent performance.',
        ]);
    }
}

