<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ShopActionController extends Controller
{
    public function wishlistIndex(): View
    {
        $items = DB::table('wishlists')
            ->join('products', 'wishlists.product_id', '=', 'products.id')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->where('wishlists.user_id', Auth::id())
            ->select(
                'products.id',
                'products.name',
                'products.slug',
                'products.price',
                'categories.name as category_name'
            )
            ->orderBy('wishlists.id', 'desc')
            ->paginate(10)
            ->withQueryString();

        $this->attachImages($items);

        return view('frontend.wishlist.index', [
            'items' => $items,
            'meta_title' => 'My Wishlist',
        ]);
    }

    public function wishlistStore(Request $request, Product $product): RedirectResponse|JsonResponse
    {
        Wishlist::firstOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
        ]);

        return $this->respond($request, 'Added to wishlist.', [
            'wishlisted' => true,
            'product_id' => $product->id,
        ]);
    }

    public function wishlistToggle(Request $request, Product $product): RedirectResponse|JsonResponse
    {
        $exists = Wishlist::query()
            ->where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->exists();

        if ($exists) {
            Wishlist::query()
                ->where('user_id', Auth::id())
                ->where('product_id', $product->id)
                ->delete();

            return $this->respond($request, 'Removed from wishlist.', [
                'wishlisted' => false,
                'product_id' => $product->id,
            ]);
        }

        Wishlist::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
        ]);

        return $this->respond($request, 'Added to wishlist.', [
            'wishlisted' => true,
            'product_id' => $product->id,
        ]);
    }

    public function wishlistDestroy(Request $request, Product $product): RedirectResponse|JsonResponse
    {
        Wishlist::query()
            ->where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->delete();

        return $this->respond($request, 'Removed from wishlist.', [
            'wishlisted' => false,
            'product_id' => $product->id,
        ]);
    }

    public function cartIndex(): View
    {
        $baseQuery = DB::table('cart_items')
            ->join('products', 'cart_items.product_id', '=', 'products.id')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->where('cart_items.user_id', Auth::id());

        $items = (clone $baseQuery)
            ->select(
                'products.id',
                'products.name',
                'products.slug',
                'products.price',
                'cart_items.quantity',
                'categories.name as category_name'
            )
            ->orderBy('cart_items.id', 'desc')
            ->paginate(10)
            ->withQueryString();

        $summary = (clone $baseQuery)
            ->selectRaw('COALESCE(SUM(cart_items.quantity), 0) as total_items')
            ->selectRaw('COALESCE(SUM(COALESCE(products.price, 0) * cart_items.quantity), 0) as sub_total')
            ->first();

        $this->attachImages($items);

        return view('frontend.cart.index', [
            'items' => $items,
            'totalItems' => (int) ($summary->total_items ?? 0),
            'subTotal' => (float) ($summary->sub_total ?? 0),
            'meta_title' => 'My Cart',
        ]);
    }

    public function cartStore(Request $request, Product $product): RedirectResponse|JsonResponse
    {
        $item = CartItem::query()
            ->where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($item) {
            $item->increment('quantity');
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return $this->respond($request, 'Added to cart.', [
            'carted' => true,
            'product_id' => $product->id,
        ]);
    }

    public function cartDestroy(Request $request, Product $product): RedirectResponse|JsonResponse
    {
        CartItem::query()
            ->where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->delete();

        return $this->respond($request, 'Removed from cart.', [
            'carted' => false,
            'product_id' => $product->id,
        ]);
    }

    public function wishlistMoveToCart(Request $request, Product $product): RedirectResponse|JsonResponse
    {
        CartItem::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $product->id],
            ['quantity' => 1]
        );

        Wishlist::query()
            ->where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->delete();

        return $this->respond($request, 'Moved to cart.', [
            'wishlisted' => false,
            'carted' => true,
            'product_id' => $product->id,
        ]);
    }

    private function attachImages($items): void
    {
        $ids = $items->pluck('id')->all();
        $images = [];

        if (!empty($ids)) {
            $rows = DB::table('product_images')
                ->whereIn('product_id', $ids)
                ->orderBy('id', 'asc')
                ->get(['product_id', 'image']);

            foreach ($rows as $row) {
                if (!isset($images[$row->product_id])) {
                    $images[$row->product_id] = $row->image;
                }
            }
        }

        foreach ($items as $item) {
            $item->image = $images[$item->id] ?? null;
        }
    }

    private function respond(Request $request, string $message, array $extra = []): RedirectResponse|JsonResponse
    {
        if ($request->expectsJson() || $request->ajax()) {
            $wishlistCount = DB::table('wishlists')->where('user_id', Auth::id())->count();
            $cartCount = DB::table('cart_items')->where('user_id', Auth::id())->sum('quantity');

            return response()->json(array_merge([
                'status' => 'success',
                'message' => $message,
                'wishlist_count' => (int) $wishlistCount,
                'cart_count' => (int) $cartCount,
            ], $extra));
        }

        return back()->with('success', $message);
    }
}
