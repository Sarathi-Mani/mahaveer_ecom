@extends('admin.layouts.app')
@section('content')

<div class="container">
    <h2>Product List</h2>

    <a href="{{ route('admin.products.create') }}" class="btn btn-success mb-3">
        Add Product
    </a>

    {!! $dataTable->table(['class' => 'table table-bordered']) !!}
</div>

@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
