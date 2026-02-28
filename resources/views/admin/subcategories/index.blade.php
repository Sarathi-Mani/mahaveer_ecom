@extends('admin.layouts.app')
@section('content')

<div class="container">
    <h2>SubCategory List</h2>

    <a href="{{ route('admin.subcategories.create') }}" class="btn btn-success mb-3">
        Add subcategory
    </a>

    {!! $dataTable->table(['class' => 'table table-bordered']) !!}
</div>

@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
