<?php

namespace App\Http\Controllers\Admin;

use App\Photo;
use App\Product;
use App\Category;
use App\SubCategory;
use App\ProductAttribute;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Product\CreateProductRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        return $this->middleware('verifyCategoryCount')->only('create', 'update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $subCategories = SubCategory::all();

        return view('admin.products.create', compact('categories', 'subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        // dd($request->all());
        
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'code' => $request->code,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'slug' => Str::slug($request->name),
        ]);

        foreach ($request->images as $photo) {
            $name = Str::random(14);

            $extension = $photo->getClientOriginalExtension();

            $image = Image::make($photo)->fit(1200, 1200)->encode($extension);

            Storage::disk('public')->put($path = "products/{$product->id}/{$name}.{$extension}", (string) $image);

            $photo = Photo::create([
                'images' => $path,
                'product_id' => $product->id,
            ]);
        }

        $attributeValues = $request->attribute_value;

        $product->attributes()->createMany(
            collect($request->attribute_name)
                ->map(function ($name, $index) use ($attributeValues) {
                    return [
                        'attribute_name' => $name,
                        'attribute_value' => $attributeValues[$index],
                    ];
                })
        );

        session()->flash('success', "$request->name added successfully.");

        return redirect(route('products.index'));


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
    public function edit(Product $product)
    {
        $categories = Category::all();

        $subCategories = SubCategory::all();

        return view('admin.products.create', compact('product', 'categories', 'subCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required',
        ]);

        $data = $request->only(['name', 'code', 'description', 'price', 'category_id', 'sub_category_id', 'quantity', 'meta_description', 'meta_keywords']);

        $product->update($data);

        if($request->hasFile('images')) {

            foreach ($request->images as $photo) {
                $name = Str::random(14);

                $extension = $photo->getClientOriginalExtension();

                $image = Image::make($photo)->fit(1200, 1200)->encode($extension);

                Storage::disk('public')->put($path = "products/{$product->id}/{$name}.{$extension}", (string) $image);

                $photo = Photo::create([
                    'images' => $path,
                    'product_id' => $product->id,
                ]);
            }
        }

        $attributeValues = $request->attribute_value;

        $product->attributes()->createMany(
            collect($request->attribute_name)
                ->map(function ($name, $index) use ($attributeValues) {
                    return [
                        'attribute_name' => $name,
                        'attribute_value' => $attributeValues[$index],
                    ];
                })
        );

        session()->flash('success', "$product->name updated successfully.");

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // delete all product images
        $allImages = $product->photos;

        foreach ($allImages as $key => $img) {
            Storage::disk('public')->delete($img->images);
        }

        $product->photos()->delete();
        //delete product
        $product->delete();

        session()->flash('success', "$product->name deleted successfully.");

        return redirect(route('products.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyImage($id)
    {
        $image = Photo::find($id);

        Storage::disk('public')->delete($image->images);

        $image->delete();

        session()->flash('success', "Image deleted successfully.");

        return redirect()->back();
    }
}
