@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="container mt-3">
      @if(session('success'))
      <div class="alert alert-danger alert-dismissible fade show " role="alert">
                    {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
   
@endif
        <h2>Edit Category</h2>
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
    @method('PUT')
    <div class="mb-3">
                            <label>Preview</label>
                            <br>
                            <img width="200" src="{{asset($category->image)}}" alt="">
                        </div>
          <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" value="{{ $category->name }}" id="category" placeholder="Category" name="name">
            <div id="error1" style="color:red"></div>
          </div>
          <div class="mb-3">
            <label for="category" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" placeholder="Category" name="image">
            <div id="error1" style="color:red"></div>
          </div>
          <div class="mb-3">
            <label for="category" class="form-label">Status</label>
            <select class="form-control" id="status" placeholder="Category" name="status">
                <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
            <div id="error1" style="color:red"></div>
          </div>
          <button type="submit" onclick="return validation_Category()" name="save" class="btn btn-primary">Submit</button>
        </form>
      </div>
@endsection