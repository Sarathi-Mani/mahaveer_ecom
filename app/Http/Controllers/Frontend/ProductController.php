<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $selectedBrand = $request->integer('brand');
        $selectedCategory = $request->integer('category');

        $brandFilter = DB::table('brands as b')
            ->leftJoin('products as p', function ($join) {
                $join->on('p.brand_id', '=', 'b.id')
                    ->where('p.status', '=', 1);
            })
            ->where('b.status', 1)
            ->select('b.id', 'b.name', DB::raw('COUNT(p.id) as products_count'))
            ->groupBy('b.id', 'b.name')
            ->orderBy('b.name', 'ASC')
            ->get();

        $categoryFilter = DB::table('categories as c')
            ->leftJoin('products as p', function ($join) {
                $join->on('p.category_id', '=', 'c.id')
                    ->where('p.status', '=', 1);
            })
            ->where('c.status', 1)
            ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as products_count'))
            ->groupBy('c.id', 'c.name')
            ->orderBy('c.name', 'ASC')
            ->get();

        $productsQuery = DB::table('products as p')
            ->leftJoin('categories as c', 'p.category_id', '=', 'c.id')
            ->leftJoin('brands as b', 'p.brand_id', '=', 'b.id')
            ->where('p.status', 1)
            ->where('b.status', 1)
            ->select(
                'p.*',
                'c.name as category_name',
                'c.slug as category_slug',
                'b.name as brand_name'
            )
            ->selectSub(function ($query) {
                $query->from('product_images')
                    ->select('image')
                    ->whereColumn('product_id', 'p.id')
                    ->orderBy('id', 'ASC')
                    ->limit(1);
            }, 'image')
            ->orderBy('p.id', 'DESC');

        if ($selectedBrand > 0) {
            $productsQuery->where('p.brand_id', $selectedBrand);
        }

        if ($selectedCategory > 0) {
            $productsQuery->where('p.category_id', $selectedCategory);
        }

        $products = $productsQuery->paginate(9)->withQueryString();

        return view('frontend.products.index', [
            'products' => $products,
            'brandFilter' => $brandFilter,
            'categoryFilter' => $categoryFilter,
            'selectedBrand' => $selectedBrand,
            'selectedCategory' => $selectedCategory,
        ]);
    }
}

