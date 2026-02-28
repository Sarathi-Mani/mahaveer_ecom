<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\ProductDataTable;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImages;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
       return $dataTable->render('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
      return view('admin.products.create',compact('categories','subcategories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'title' => ['required'],
            'keywords' => ['required'],
            'sku' => ['required'],
            'description' => ['required'],
            'brand' => ['required'],
            'category' => ['required'],
            'subcategory' => ['required'],
            'price' => ['required'],
            'stock' => ['required'],
            'pro_description' => ['required'],

        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->status = $request->status ?? 1;
        $product->title = $request->title;
        $product->sku=$request->sku;
        $product->keywords = $request->keywords;
        $product->meta_description = $request->description;
        $product->brand_id  = $request->brand;
        $product->category_id  = $request->category;
        $product->subcategory_id  = $request->subcategory;
        $product->price  = $request->price;
        $product->stock  = $request->stock;
        $product->pro_description  = $request->pro_description;
        $product->color = $request->color ?? ' ';
        $product->finish = $request->finish ?? ' ';
        $product->style = $request->style ?? ' ';
        $product->thickness = $request->thickness ?? ' ';
         $product->size = $request->size ?? ' ';
          $product->series = $request->series ?? ' ';
          $product->save();
          $uploadedImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {

                $destinationPath = public_path('uploads/products');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }

                $fileName = time().'_'.$image->getClientOriginalName();
                $image->move($destinationPath, $fileName);

                $uploadedImages[] = [
                    'image_path' => 'uploads/products/'.$fileName
                ];

               
                ProductImages::create([
                    'product_id' => $product->id,
                    'image'           => 'uploads/products/'.$fileName,
                ]);
            }
        }

        return redirect()
    ->route('admin.products.index')
    ->with('success', 'Product Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
