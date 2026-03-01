<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Active Categories
        $categories = DB::table('categories')
                        ->where('status', 1)
                        ->orderBy('name', 'ASC')
                        ->get();

        // Active Brands
        $brands = DB::table('brands')
                    ->where('status', 1)
                    ->orderBy('name', 'ASC')
                    ->get();

        // Latest Products
        $products = DB::table('products')
                        ->where('status', 1)
                        ->orderBy('id', 'DESC')
                        ->limit(8)
                        ->get();

        return view('frontend.home', compact(
            'categories',
            'brands',
            'products'
        ));
    }
}