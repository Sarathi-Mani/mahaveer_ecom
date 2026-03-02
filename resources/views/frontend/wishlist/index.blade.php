@extends('frontend.layouts.app')

@section('content')
<style>
.checkout-wrap {
    background: #f5f5f6;
}

.checkout-card {
    background: #fff;
    border: 1px solid #d9d9e3;
    border-radius: 10px;
    overflow: hidden;
}

.checkout-item-body {
    display: flex;
    gap: 14px;
    padding: 14px;
}

.checkout-item-image {
    width: 72px;
    height: 72px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #ececf2;
}

.checkout-item-title {
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 4px;
}

.checkout-item-meta {
    color: #4b5563;
    margin-bottom: 4px;
}

.checkout-item-footer {
    border-top: 1px solid #e5e7eb;
    padding: 10px 14px;
    display: flex;
    justify-content: space-between;
    color: #374151;
}

.wishlist-card {
    position: relative;
}

.wishlist-top-icons {
    position: absolute;
    top: 12px;
    right: 12px;
    z-index: 5;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.wishlist-top-icons .btn {
    width: 36px;
    height: 36px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0;
}
</style>
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">My Wishlist</h1>
</div>

<div class="container-fluid checkout-wrap py-5">
<div class="container py-2">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($items->isEmpty())
        <div class="text-center py-5">
            <h5>No wishlist items yet.</h5>
            <a href="{{ route('products.index') }}" class="btn btn-primary rounded-pill mt-3">Browse Products</a>
        </div>
    @else
        <div class="row g-4 align-items-start">
            <div class="col-lg-8">
                <h4 class="mb-3">Product Details</h4>
                <div class="d-flex flex-column gap-3">
            @foreach($items as $item)
                @php
                    $image = !empty($item->image) ? asset($item->image) : asset('frontend/assets/images/default.jpg');
                    $key = !empty($item->slug) ? $item->slug : \Illuminate\Support\Str::slug($item->name);
                @endphp
                <div class="checkout-card wishlist-card" data-card-product="{{ $item->id }}">
                        <div class="wishlist-top-icons">
                            <form method="POST" action="{{ route('wishlist.toggle', ['product' => $item->id]) }}" data-ajax-action="true" data-action-type="wishlist" data-product-id="{{ $item->id }}" data-remove-card="true">
                                @csrf
                                <button type="submit" class="btn btn-danger rounded-circle" title="Wishlist">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </form>
                            <form method="POST" action="{{ route('wishlist.move_to_cart', ['product' => $item->id]) }}" data-ajax-action="true" data-action-type="move-to-cart" data-product-id="{{ $item->id }}" data-remove-card="true">
                                @csrf
                                <button type="submit" class="btn btn-dark rounded-circle" title="Add to Cart">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </form>
                        </div>
                        <div class="checkout-item-body">
                            <img src="{{ $image }}" alt="{{ $item->name }}" class="checkout-item-image">
                            <div class="flex-grow-1">
                                <a href="{{ route('products.show', ['slug' => $key]) }}" class="checkout-item-title text-decoration-none d-inline-block">
                                    {{ \Illuminate\Support\Str::limit($item->name, 60) }}
                                </a>
                                <div class="checkout-item-meta">{{ $item->category_name ?? 'N/A' }}</div>
                                <div class="checkout-item-meta">Ready to order</div>
                                <div class="d-flex gap-2 mt-2">
                                    <a href="{{ route('cart.index') }}" class="btn btn-primary btn-sm rounded-pill px-3">Buy Now</a>
                                    <a href="tel:+919840648777" class="btn btn-success btn-sm rounded-pill px-3">Call</a>
                                    <a href="{{ route('contact.index', ['product' => $item->name]) }}" class="btn btn-secondary btn-sm rounded-pill px-3">Contact</a>
                                </div>
                            </div>
                        </div>
                        <div class="checkout-item-footer">
                            <span>Saved in Wishlist</span>
                            <span>Free Delivery</span>
                        </div>
                </div>
            @endforeach
                </div>
                @if($items->lastPage() > 1)
                    <div class="mt-4">
                        {{ $items->onEachSide(1)->links() }}
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
</div>
@endsection
