<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Subcategory;

class SubcategoryComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $subcategory_slug;

    public function mount($subcategory_slug)
    {
        $this->sorting = "default";
        $this->pagesize = 20;
        $this->subcategory_slug = $subcategory_slug;
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }
    use WithPagination;
    public function render()
    {
        $subcategory = Subcategory::where('slug',$this->subcategory_slug)->first();
        $subcategory_id = $subcategory->id;
        $subcategory_name = $subcategory->name;
        $subcategory_image = $subcategory->image;
        $subcategory_featured = $subcategory->featured;

        if($this->sorting=='date')
        {
            $products = Product::where('subcategory_id',$subcategory_id)->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        elseif($this->sorting=="price")
        {
            $products = Product::where('subcategory_id',$subcategory_id)->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        elseif($this->sorting=="price-desc")
        {
            $products = Product::where('subcategory_id',$subcategory_id)->orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else{
            $products = Product::where('subcategory_id',$subcategory_id)->paginate($this->pagesize);
        }
        $subcategories = Subcategory::all();
        return view('livewire.subcategory-component',['products'=> $products,'subcategories'=>$subcategories, 'subcategory_name'=>$subcategory_name,'subcategory_image'=>$subcategory_image,'subcategory_featured'=>$subcategory_featured])->layout("layouts.base");
    }
}
