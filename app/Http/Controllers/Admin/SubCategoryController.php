<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\SubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::all();

        return view('admin.sub-categories.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.sub-categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SubCategory::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        session()->flash('success', 'Sub-Category created successfully!');

        return redirect(route('subcategories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $categories = Category::all();

        $subCategory = SubCategory::where('slug', $slug)->firstOrFail();

        return view('admin.sub-categories.create', compact('subCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $subCategory = SubCategory::where('slug', $slug)->firstOrFail();

        $data = $request->only(['name', 'slug', 'category_id']);

        $subCategory->update($data);

        session()->flash('success', 'Sub-Category updated successfully!');

        return redirect(route('subcategories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $subCategory = SubCategory::where('slug', $slug)->firstOrFail();

        if($subCategory->products->count() > 0) {
            session()->flash('error', 'Take a chill pill, this sub-category has some products!');

            return redirect(route('subcategories.index'));
        }

        $subCategory->delete();

        session()->flash('success', 'Sub-Category deleted successfully!');

        return redirect(route('subcategories.index'));
    }
}
