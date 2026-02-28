<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;
use App\DataTables\BrandDataTable;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BrandDataTable $dataTable)
    {
      return $dataTable->render('admin.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands,name',
        ]);
        $data = new Brand();
        $data->name = $request->name;
        //$data->slug = Str::slug($request->name);
        $data->status = $request->status ?? 1;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/brand'), $filename);
            $data->logo = 'uploads/brand/'.$filename;
        }

        $data->save();

        return redirect()->route('admin.brand.create')
            ->with('success','Brand Added Successfully');
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
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
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

        $brand = Brand::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/brand'), $filename);
            $brand->logo = 'uploads/brand/'.$filename;
        }
        $brand->name = $request->name;
       // $brand->slug = Str::slug($request->name);
        $brand->status = $request->status;
        $brand->save();

        return redirect()
    ->route('admin.brand.index')
    ->with('success', 'Brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $brand = Brand::findOrFail($id);
    $brand->status = 0;
    $brand->save();

    return redirect()
        ->route('admin.brand.index')
        ->with('success', 'Brand Inactivated Successfully');
    }
}
