@extends('admin.layouts.app')
@section('content')

<div class="container">
    <h2>Category List</h2>

    <a href="{{ route('admin.categories.create') }}" class="btn btn-success mb-3">
        Add Category
    </a>

    {!! $dataTable->table(['class' => 'table table-bordered']) !!}
</div>

@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
