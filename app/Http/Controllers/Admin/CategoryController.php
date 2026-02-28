<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use App\DataTables\CategoryDataTable;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
      return $dataTable->render('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        $data = new Category();
        $data->name = $request->name;
        $data->slug = Str::slug($request->name);
        $data->status = $request->status ?? 1;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/category'), $filename);
            $data->image = 'uploads/category/'.$filename;
        }

        $data->save();

        return redirect()->route('admin.categories.create')
            ->with('success','Category Added Successfully');
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
        $category = Category::findOrFail($id);
    return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $request->validate([
            'name' => ['required', 'max:200'],
            'status' => ['required']
        ]);

        $category = Category::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/category'), $filename);
            $category->image = 'uploads/category/'.$filename;
        }
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->save();

        return redirect()
    ->route('admin.categories.index')
    ->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $category = Category::findOrFail($id);
    $category->status = 0;
    $category->save();

    return redirect()
        ->route('admin.categories.index')
        ->with('success', 'Category Inactivated Successfully');
    }
}
