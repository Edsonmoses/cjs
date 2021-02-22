<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;
use App\Models\Subcategory;

class ProductDetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }
    public function render()
    {
        $product = Product::where('slug',$this->slug)->first();
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        $related_products = Product::where('subcategory_id',$product->subcategory_id)->inRandomOrder()->limit(6)->get();
        $subcategories = Subcategory::all();
        return view('livewire.product-details-component',['product'=>$product,'subcategories'=>$subcategories,'popular_products'=>$popular_products,'related_products'=>$related_products])->layout('layouts.base');
    }
}
