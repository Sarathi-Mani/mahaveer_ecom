<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\SubcategoryDataTable;
use Illuminate\Support\Str;
use App\Models\Subcategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubcategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.subcategories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $categories = Category::all();
       return view('admin.subcategories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'category' => ['required'],
            'name' => ['required', 'max:200', 'unique:subcategories,name'],
            'status' => ['required']
        ]);
        $subCategory = new Subcategory();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/subcategory'), $filename);
            $subCategory->image = 'uploads/subcategory/'.$filename;
        }

        $subCategory->category_id = $request->category;
        $subCategory->name = $request->name;
        $subCategory->slug = Str::slug($request->name);
        $subCategory->status = $request->status;
        $subCategory->save();
        return redirect()->route('admin.subcategories.create')
            ->with('success','Subcategory Added Successfully');
            
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
         $categories = Category::all();
       $subcategory = Subcategory::findOrFail($id);
    return view('admin.subcategories.edit', compact('subcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $request->validate([
            'category' => ['required'],
            'name' => ['required', 'max:200', 'unique:subcategories,name'],
            'status' => ['required']
        ]);
         $subcategory = Subcategory::findOrFail($id);
         if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/subcategory'), $filename);
            $subcategory->image = 'uploads/subcategory/'.$filename;
        }
        $subcategory->category_id = $request->category;
        $subcategory->name = $request->name;
        $subcategory->slug = Str::slug($request->name);
        $subcategory->status = $request->status;
        $subcategory->save();
        return redirect()->route('admin.subcategories.index')
            ->with('success','Subcategory updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Subcategory = Subcategory::findOrFail($id);
    $Subcategory->status = 0;
    $Subcategory->save();

    return redirect()
        ->route('admin.subcategories.index')
        ->with('success', 'SubCategory Inactivated Successfully');
    }
}
