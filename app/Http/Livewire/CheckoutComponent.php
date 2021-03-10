<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Subcategory;

class CheckoutComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $category_slug;

    public function mount($category_slug)
    {
        $this->sorting = "default";
        $this->pagesize = 4;
        $this->category_slug = $category_slug;
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message',' Item added in Cart');
        return redirect()->route('product.cart');
    }

    use WithPagination;
    public function render()
    {
        $category = Category::where('slug',$this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;
        if($this->sorting=='date')
        {
            $subcategories = Subcategory::where('category_id',$category_id)->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        elseif($this->sorting=="price")
        {
            $subcategories = Subcategory::where('category_id',$category_id)->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        elseif($this->sorting=="price-desc")
        {
            $subcategories = Subcategory::where('category_id',$category_id)->orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else{
            $subcategories = Subcategory::where('category_id',$category_id)->paginate($this->pagesize);
        }
        $categories = Category::all();
        return view('livewire.checkout-component',['subcategories'=>$subcategories, 'categories'=>$categories, 'category_name'=>$category_name])->layout("layouts.base");
    }
}
