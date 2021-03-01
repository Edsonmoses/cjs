<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;

class ImageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function store(Request $request)
    {
        $thurmbnail = $request->file('thurmbnail');
        $imageName = time().'.'.$thurmbnail->extension();
        $thurmbnail->move(public_path('assets/img/products'), $imageName);

        $product = new Product();
        $product->thurmbnail = $imageName;
        $product->save();

        return back()->with('success','Product created successfully.');
    }

    public function update(Request $request, Product $product)
    {
        $thurmbnail = $request->file('thurmbnail');

        $imageName = time().'.'.$thurmbnail->extension();
        $thurmbnail->move(public_path('assets/img/products'), $imageName);

        $product = Product::find($product->id);
        $product->thurmbnail = $imageName;
        $product->save();

        return redirect()->route('products.index')
                        ->with('success','Product updated successfully.');
    }

    public function storeSub(Request $request)
    {

        $featured = $request->file('featured');

        $imageName = time().'.'.$featured->extension();
        $featured->move(public_path('assets/img/subcategory'), $imageName);

        $subcategory = new Subcategory();
        $subcategory->featured = $imageName;
        $subcategory->save();

        return back()->with('success','Subcategory created successfully.');

    }

    public function subUpdate(Request $request, Subcategory $subcategory)
    {

        $featured = $request->file('featured');

        $imageName = time().'.'.$featured->extension();
        $featured->move(public_path('assets/img/subcategory'), $imageName);

        $subcategory = Subcategory::find($subcategory->id);
        $subcategory->featured = $imageName;
        $subcategory->save();

        return redirect()->route('subcategory.index')
                        ->with('success','Subcategory updated successfully');

    }
}
