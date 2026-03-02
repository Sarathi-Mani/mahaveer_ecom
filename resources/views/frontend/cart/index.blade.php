@extends('frontend.layouts.app')

@section('content')
<style>
.checkout-wrap {
    background: #f8f9fa;
}

.checkout-card {
    background: #fff;
    border: 1px solid #e6e6e6;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 14px rgba(10, 36, 99, 0.06);
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
    color: #0A2463;
    margin-bottom: 4px;
}

.checkout-item-meta {
    color: #4b5563;
    margin-bottom: 4px;
}

.checkout-item-action {
    color: #dc3545;
    font-weight: 600;
    text-decoration: none;
    border: 0;
    background: transparent;
    padding: 0;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.checkout-item-footer {
    border-top: 1px solid #e5e7eb;
    padding: 10px 14px;
    display: flex;
    justify-content: space-between;
    color: #374151;
}

.price-box {
    background: #fff;
    border: 1px solid #e6e6e6;
    border-radius: 12px;
    padding: 18px;
    box-shadow: 0 4px 14px rgba(10, 36, 99, 0.06);
}

.continue-btn {
    background: #0A2463;
    color: #fff;
    border: 0;
    border-radius: 8px;
    width: 100%;
    padding: 10px 14px;
    font-weight: 600;
}

.continue-btn:hover {
    background: #021b52;
    color: #fff;
}
</style>
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">My Cart</h1>
</div>

<div class="container-fluid checkout-wrap py-5">
<div class="container py-2">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($items->isEmpty())
        <div class="text-center py-5">
            <h5>Your cart is empty.</h5>
            <a href="{{ route('products.index') }}" class="btn btn-primary rounded-pill mt-3">Browse Products</a>
        </div>
    @else
        @php
            $totalItems = isset($totalItems) ? (int) $totalItems : (int) $items->sum('quantity');
            $subTotal = isset($subTotal) ? (float) $subTotal : (float) $items->sum(function ($item) {
                $price = is_numeric($item->price) ? (float) $item->price : 0;
                return $price * (int) $item->quantity;
            });
            $discount = 0;
            $orderTotal = max($subTotal - $discount, 0);
        @endphp
        <div class="row g-4 align-items-start">
            <div class="col-lg-8">
                <h4 class="mb-3">Product Details</h4>
                <div class="d-flex flex-column gap-3">
            @foreach($items as $item)
                @php
                    $image = !empty($item->image) ? asset($item->image) : asset('frontend/assets/images/default.jpg');
                    $key = !empty($item->slug) ? $item->slug : \Illuminate\Support\Str::slug($item->name);
                    $linePrice = (is_numeric($item->price) ? (float) $item->price : 0) * (int) $item->quantity;
                @endphp
                <div class="checkout-card" data-card-product="{{ $item->id }}">
                    <div class="checkout-item-body">
                        <img src="{{ $image }}" alt="{{ $item->name }}" class="checkout-item-image">
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start gap-2">
                                <a href="{{ route('products.show', ['slug' => $key]) }}" class="checkout-item-title text-decoration-none">
                                    {{ \Illuminate\Support\Str::limit($item->name, 54) }}
                                </a>
                                <span class="fw-semibold">Rs {{ number_format($linePrice, 0) }}</span>
                            </div>
                            <div class="checkout-item-meta">{{ $item->category_name ?? 'N/A' }}</div>
                            <div class="checkout-item-meta">Qty: {{ $item->quantity }}</div>
                            <div class="d-flex gap-2 mt-2">
                                <a href="tel:+919840648777" class="btn btn-success btn-sm rounded-pill px-3">Call</a>
                                <a href="{{ route('contact.index', ['product' => $item->name]) }}" class="btn btn-secondary btn-sm rounded-pill px-3">Contact</a>
                            </div>
                            <form method="POST" action="{{ route('cart.destroy', ['product' => $item->id]) }}" class="mt-2" data-ajax-action="true" data-action-type="cart-remove" data-product-id="{{ $item->id }}" data-remove-card="true">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="checkout-item-action">
                                    <i class="fas fa-times-circle"></i> Remove
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="checkout-item-footer">
                        <span>Sold by: Mahaveer Ceramic World</span>
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
            <div class="col-lg-4">
                <div class="price-box">
                    <h4 class="mb-3">Price Details ({{ $totalItems }} Items)</h4>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Product Price</span>
                        <span>+ Rs {{ number_format($subTotal, 0) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2 text-success">
                        <span>Total Discounts</span>
                        <span>- Rs {{ number_format($discount, 0) }}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between fw-bold mb-3">
                        <span>Order Total</span>
                        <span>Rs {{ number_format($orderTotal, 0) }}</span>
                    </div>
                    <a href="{{ route('contact.index') }}" class="continue-btn d-inline-flex justify-content-center text-decoration-none">
                        Continue
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
</div>
@endsection
