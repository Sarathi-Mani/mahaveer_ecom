@extends('admin.layouts.app')
@section('content')

<div class="container">
    <h2>Brand List</h2>

    <a href="{{ route('admin.brand.create') }}" class="btn btn-success mb-3">
        Add Brand
    </a>

    {!! $dataTable->table(['class' => 'table table-bordered']) !!}
</div>

@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
