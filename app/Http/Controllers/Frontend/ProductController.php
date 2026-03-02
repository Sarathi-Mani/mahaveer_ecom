<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function show(string $slug)
    {
        $decodedName = Str::of(urldecode($slug))->replace('-', ' ')->toString();

        $product = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->leftJoin('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
            ->where('products.status', 1)
            ->where('brands.status', 1)
            ->where(function ($query) use ($slug, $decodedName) {
                $query->where('products.slug', $slug)
                    ->orWhereRaw('LOWER(products.name) = ?', [Str::lower($decodedName)]);
            })
            ->select(
                'products.*',
                'categories.name as category_name',
                'categories.slug as category_slug',
                'subcategories.name as subcategory_name',
                'brands.name as brand_name'
            )
            ->first();

        if (!$product) {
            abort(404);
        }

        $images = DB::table('product_images')
            ->where('product_id', $product->id)
            ->orderBy('id', 'asc')
            ->pluck('image')
            ->toArray();

        $relatedProducts = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->leftJoin('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
            ->where('products.status', 1)
            ->where('brands.status', 1)
            ->where('products.id', '!=', $product->id)
            ->where(function ($query) use ($product) {
                if (!empty($product->subcategory_id)) {
                    $query->where('products.subcategory_id', $product->subcategory_id);
                } else {
                    $query->where('products.category_id', $product->category_id);
                }
            })
            ->select(
                'products.*',
                'categories.name as category_name',
                'subcategories.name as subcategory_name',
                'brands.name as brand_name'
            )
            ->orderBy('products.id', 'desc')
            ->limit(5)
            ->get();

        $relatedSubcategories = DB::table('subcategories')
            ->where('status', 1)
            ->where('category_id', $product->category_id)
            ->orderBy('name', 'asc')
            ->get(['id', 'name']);

        // Attach first image for related products
        $relatedIds = $relatedProducts->pluck('id')->all();
        $relatedImages = [];
        if (!empty($relatedIds)) {
            $imageRows = DB::table('product_images')
                ->whereIn('product_id', $relatedIds)
                ->orderBy('id', 'asc')
                ->get(['product_id', 'image']);
            foreach ($imageRows as $row) {
                if (!isset($relatedImages[$row->product_id])) {
                    $relatedImages[$row->product_id] = $row->image;
                }
            }
        }
        foreach ($relatedProducts as $item) {
            $item->image = $relatedImages[$item->id] ?? null;
        }

        $wishlistProductIds = [];
        $cartProductIds = [];
        if (Auth::check() && Schema::hasTable('wishlists') && Schema::hasTable('cart_items')) {
            $wishlistProductIds = DB::table('wishlists')
                ->where('user_id', Auth::id())
                ->pluck('product_id')
                ->map(fn ($id) => (int) $id)
                ->toArray();
            $cartProductIds = DB::table('cart_items')
                ->where('user_id', Auth::id())
                ->pluck('product_id')
                ->map(fn ($id) => (int) $id)
                ->toArray();
        }

        return view('frontend.products.show', [
            'product' => $product,
            'images' => $images,
            'relatedProducts' => $relatedProducts,
            'relatedSubcategories' => $relatedSubcategories,
            'wishlistProductIds' => $wishlistProductIds,
            'cartProductIds' => $cartProductIds,
            'meta_title' => $product->title ?: $product->name,
            'meta_keywords' => $product->keywords ?: ($product->name . ' tiles, ceramic'),
            'meta_description' => $product->meta_description ?: ('Best price for ' . $product->name),
        ]);
    }

    public function submitInquiry(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['required', 'string', 'max:30'],
            'message' => ['required', 'string', 'max:5000'],
            'product_name' => ['nullable', 'string', 'max:255'],
        ]);

        try {
            $message = $validated['message'];
            if (!empty($validated['product_name'])) {
                $message = 'Product: ' . $validated['product_name'] . "\n\n" . $message;
            }

            DB::table('enquiries')->insert([
                'firstname' => $validated['name'],
                'email' => $validated['email'],
                'phoneno' => $validated['phone'],
                'message' => $message,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Thank you. Your inquiry has been submitted successfully.',
            ]);
        } catch (\Throwable $e) {
            Log::error('Product inquiry insert failed', [
                'exception' => $e->getMessage(),
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Unable to submit inquiry right now. Please try again.',
            ], 500);
        }
    }

    public function accessories(Request $request)
    {
        $request->merge([
            'section' => 'accessories',
        ]);

        return $this->index($request);
    }

    public function index(Request $request)
    {
        $selectedBrand = (int) $request->get('brand', 0);
        $selectedCategory = (int) $request->get('category', 0);
        $searchQuery = trim((string) $request->get('q', ''));
        $section = strtolower((string) $request->get('section', ''));

        // Sidebar brand list
        $brandFilter = DB::table('brands')
            ->where('status', 1)
            ->orderBy('name', 'asc')
            ->get(['id', 'name']);

        // Sidebar category list
        $categoryFilter = DB::table('categories')
            ->where('status', 1)
            ->orderBy('name', 'asc')
            ->get(['id', 'name']);

        // Base query for products
        $productsQuery = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->where('products.status', 1)
            ->where('brands.status', 1)
            ->select(
                'products.*',
                'categories.name as category_name',
                'categories.slug as category_slug',
                'brands.name as brand_name'
            )
            ->orderBy('products.id', 'desc');

        if ($selectedBrand > 0) {
            $productsQuery->where('products.brand_id', $selectedBrand);
        }

        if ($selectedCategory > 0) {
            $productsQuery->where('products.category_id', $selectedCategory);
        }

        if ($searchQuery !== '') {
            $productsQuery->where('products.name', 'like', '%' . $searchQuery . '%');
        }

        $keywords = $this->getSectionKeywords($section);
        if (!empty($keywords)) {
            $productsQuery->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->orWhere('categories.name', 'like', '%' . $word . '%')
                        ->orWhere('categories.slug', 'like', '%' . $word . '%');
                }
            });
        }

        $products = $productsQuery->paginate(10)->withQueryString();

        // Attach first image for each product (simple way, no subquery)
        $productIds = $products->pluck('id')->toArray();
        $imagesByProduct = [];

        if (!empty($productIds)) {
            $images = DB::table('product_images')
                ->whereIn('product_id', $productIds)
                ->orderBy('id', 'asc')
                ->get(['product_id', 'image']);

            foreach ($images as $image) {
                if (!isset($imagesByProduct[$image->product_id])) {
                    $imagesByProduct[$image->product_id] = $image->image;
                }
            }
        }

        foreach ($products as $product) {
            $product->image = $imagesByProduct[$product->id] ?? null;
        }

        $wishlistProductIds = [];
        $cartProductIds = [];
        if (Auth::check() && Schema::hasTable('wishlists') && Schema::hasTable('cart_items')) {
            $wishlistProductIds = DB::table('wishlists')
                ->where('user_id', Auth::id())
                ->pluck('product_id')
                ->map(fn ($id) => (int) $id)
                ->toArray();
            $cartProductIds = DB::table('cart_items')
                ->where('user_id', Auth::id())
                ->pluck('product_id')
                ->map(fn ($id) => (int) $id)
                ->toArray();
        }

        $pageHeading = $this->getPageHeading($section);

        return view('frontend.products.index', [
            'products' => $products,
            'brandFilter' => $brandFilter,
            'categoryFilter' => $categoryFilter,
            'selectedBrand' => $selectedBrand,
            'selectedCategory' => $selectedCategory,
            'searchQuery' => $searchQuery,
            'section' => $section,
            'pageHeading' => $pageHeading,
            'wishlistProductIds' => $wishlistProductIds,
            'cartProductIds' => $cartProductIds,
        ]);
    }

    public function suggestions(Request $request)
    {
        $query = trim((string) $request->get('query', ''));

        if (mb_strlen($query) < 2) {
            return response('');
        }

        $products = DB::table('products')
            ->where('status', 1)
            ->where('name', 'like', '%' . $query . '%')
            ->select('name')
            ->distinct()
            ->orderBy('name', 'ASC')
            ->limit(8)
            ->get();

        if ($products->isEmpty()) {
            return response('<div class="p-2 text-muted small">No results found</div>');
        }

        $html = '';
        foreach ($products as $product) {
            $name = e($product->name);
            $url = route('products.index', ['q' => $product->name]);
            $html .= '<a href="' . e($url) . '" class="d-block px-3 py-2 text-dark border-bottom small">' . $name . '</a>';
        }

        return response($html);
    }

    private function getSectionKeywords(string $section): array
    {
        if ($section === 'wall') {
            return ['wall'];
        }

        if ($section === 'floor') {
            return ['floor'];
        }

        if ($section === 'accessories') {
            return ['accessor', 'sanitary', 'faucet'];
        }

        return [];
    }

    private function getPageHeading(string $section): string
    {
        if ($section === 'accessories') {
            return 'Accessories';
        }

        if ($section === 'floor') {
            return 'Floor Tiles';
        }

        if ($section === 'wall') {
            return 'Wall Tiles';
        }

        return 'Shop Page';
    }
}

