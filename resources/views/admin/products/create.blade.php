@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')

@section('content')


  <div class="container mt-3">
      
        <h2>Add Product</h2>
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
          <div class="mb-3 mt-3">
            <label for="product">Product Name</label>
            <input type="text" class="form-control" id="name" placeholder="Product Name" name="name" >
            <div id="error1" style="color:red"></div>
          </div>
		  <div class="mb-3 mt-3">
            <label for="product">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Title" name="title" >
            <div id="titleerror1" style="color:red"></div>
          </div>
		  <div class="mb-3 mt-3">
            <label for="product">Keywords</label>
            <input type="text" class="form-control" id="keywords" placeholder="Keywords" name="keywords" >
            <div id="keywordserror1" style="color:red"></div>
          </div>
		  <div class="mb-3 mt-3">
            <label for="product">Description</label>
            <textarea type="text" class="form-control" id="description" placeholder="Description" name="description" ></textarea>
            <div id="descriptionerror1" style="color:red"></div>
          </div>
          <div class="mb-3 mt-3">
            <label for="brand" class="form-label">Brand Name</label>
            <select name="brand" class="form-control brand" id="brand">
                <option value="">Select</option>
                              @foreach ($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                              @endforeach
                   
            </select>
            <div id="error2" style="color:red"></div>
          </div>
          <div class="mb-3 mt-3">
            <label for="category" class="form-label">Category Name</label>
            <select name="category" class="form-control category" id="category">
               <option value="">Select</option>
                              @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
                
            </select>
            <div id="error3" style="color:red"></div>
          </div>
          <div id="form1">

          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Sub category</label>
            <select name="subcategory" class="form-control category" id="subcategory">
                <option value="">Select</option>
                              @foreach ($subcategories as $subcategory)
                                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                              @endforeach
            </select>
            <div id="error4" style="color:red"></div>
          </div>
<div class="mb-3">
            <label for="image_1" class="form-label">SKU </label>
            <input class="form-control" type="text" id="sku" name="sku">
           
          </div>
          <div class="mb-3">
            <label for="image_1" class="form-label">price(sq.ft)</label>
            <input class="form-control" type="text" id="price" name="price">
           
          </div>
          <div class="mb-3">
            <label for="image_1" class="form-label">Color</label>
            <input class="form-control" type="text" id="color" name="color">
           
          </div>

          <div class="mb-3">
            <label for="image_1" class="form-label">Finish</label>
            <input class="form-control" type="text" id="finish" name="finish">
           
          </div>

          <div class="mb-3">
            <label for="image_1" class="form-label">Style</label>
            <input class="form-control" type="text" id="style" name="style">
           
          </div>
          <div class="mb-3">
            <label for="image_1" class="form-label">Thickness</label>
            <input class="form-control" type="text" id="thickness" name="thickness">
           
          </div>
          <div class="mb-3">
            <label for="image_1" class="form-label">Size</label>
            <input class="form-control" type="text" id="size" name="size">
           
          </div>
          <div class="mb-3">
            <label for="image_1" class="form-label">Series</label>
            <input class="form-control" type="text" id="series" name="siseriesze">
           
          </div>
<div class="mb-3">
            <label for="image_1" class="form-label">stock</label>
           <select name="stock" class="form-control brand" id="stock">
                <option value="1">Yes</option>
               <option value="0">No</option>    
            </select>
           
          </div>
          <div id="image-wrapper">
    <div class="row g-2 mb-2 align-items-end image-row">
        <!-- Image Input -->
        <div class="col-12 col-md-10">
            <label class="form-label">Product Images</label>
            <input type="file" name="images[]" class="form-control">
        </div>

        <!-- Plus Button -->
        <div class="col-12 col-md-2 d-flex justify-content-md-center">
            <button type="button" class="btn btn-success add-image w-100">
                <!--<i class="fa fa-plus"></i>-->Add More
            </button>
        </div>
    </div>
</div>
          <div class="mb-3">
            <label for="desc_one" class="form-label">Product Description</label>
            <textarea class="summernote" id="summernote" name="pro_description">
            </textarea>
            <div id="error5" style="color:red"></div>
          </div>
          <div class="mb-3">
            <label for="category" class="form-label">Status</label>
            <select class="form-control" id="status" placeholder="Category" name="status">
                <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
            <div id="error1" style="color:red"></div>
          </div>
          <button type="submit" name="save" onclick="return validation()" class="btn btn-primary">Submit</button>
        </form>
      </div>
   <script>
document.addEventListener('click', function(e) {

    // ADD NEW IMAGE FIELD
    if(e.target.closest('.add-image')) {
        let wrapper = document.getElementById('image-wrapper');

        let html = `
        <div class="row g-2 mb-2 align-items-end image-row">
            <div class="col-12 col-md-10">
                <label class="form-label">Product Image</label>
                <input type="file" name="images[]" class="form-control">
            </div>
            <div class="col-12 col-md-2 d-flex justify-content-md-center">
                <button type="button" class="btn btn-danger remove-image w-100">
                    Remove
                </button>
            </div>
        </div>`;

        wrapper.insertAdjacentHTML('beforeend', html);
    }

    // REMOVE IMAGE FIELD
    if(e.target.closest('.remove-image')) {
        e.target.closest('.image-row').remove();
    }

});
</script>
    @endsection