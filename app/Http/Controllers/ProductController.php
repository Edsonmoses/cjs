<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Subcategory;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::latest()->paginate(10);

        return view('admin.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = subcategory::all();
        return view('admin.create',compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $slug = $request->slug;
        $description = $request->description;
        $regular_price = $request->regular_price;
        $image = $request->file('image');
        $subcategory_id = $request->subcategory_id;
        $addItem = $request->addItem;
        //$addPrice = $request->addPrice;

        $imageName = time().'.'.$image->extension();
        $image->move(public_path('assets/img/products'), $imageName);

        $product = new Product();
        $product->name = $name;
        $product->slug = $slug;
        $product->description = $description;
        $product->regular_price = $regular_price;
        $product->image = $imageName;
        $product->subcategory_id = $subcategory_id;
        $product->addItem = $addItem;
        //$product->addPrice = $addPrice;
        $product->save();

        return back()->with('success','Product created successfully.');

        /*$request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'regular_price' => 'required',
            'image' => 'required',
            'subcategory_id' => 'required',
        ]);
         $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('assets/img'), $imageName);

        Product::create($request->all());

        return redirect()->route('products.create')
                        ->with('success','Product created successfully.');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Subcategory::all();
        return view('admin.edit',compact('product'))->withCategories($categories);
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
        $name = $request->name;
        $slug = $request->slug;
        $description = $request->description;
        $regular_price = $request->regular_price;
        $image = $request->file('image');
        $subcategory_id = $request->subcategory_id;
        $addItem = $request->addItem;
        //$addPrice = $request->addPrice;

        $imageName = time().'.'.$image->extension();
        $image->move(public_path('assets/img/products'), $imageName);

        $product = Product::find($product->id);
        $product->name = $name;
        $product->slug = $slug;
        $product->description = $description;
        $product->regular_price = $regular_price;
        $product->image = $imageName;
        $product->subcategory_id = $subcategory_id;
        $product->addItem = $addItem;
        //$product->addPrice = $addPrice;
        $product->save();

        return redirect()->route('products.index')
                        ->with('success','Product updated successfully.');

       /* $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'regular_price' => 'required',
            'image' => 'required',
            'subcategory_id' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('products.create')
                        ->with('success','Product updated successfully');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
