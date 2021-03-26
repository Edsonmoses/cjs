<?php

namespace App\Http\Livewire\Admin;

use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\Subcategory;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $description;
    public $regular_price;
    public $image;
    public $thurmbnail;
    public $subcategory_id;
    public $addItem;
    public $newimage;
    public $newthurmbnail;
    public $product_id;

    public function mount($product_slug)
    {
        $product = Product::where('slug',$product_slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->image = $product->image;
        $this->thurmbnail = $product->thurmbnail;
        $this->subcategory_id = $product->subcategory_id;
        $this->addItem = $product->addItem;
        $this->product_id = $product->id;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:products',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'newimage' => 'required|mimes:jpg,jpeg,png',
            'newthurmbnail' => 'required|mimes:jpg,jpeg,png',
            'subcategory_id' => 'required',
        ]);
    }

    public function updateProduct()
    {

        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:products',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'newimage' => 'required|mimes:jpg,jpeg,png',
            'newthurmbnail' => 'required|mimes:jpg,jpeg,png',
            'subcategory_id' => 'required',
        ]);
        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        if($this->newimage)
        {
        $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
        $this->newimage->storeAs('products',$imageName);
        $product->image = $imageName;
        }
        if($this->newthurmbnail)
        {
        $thumbName = Carbon::now()->timestamp.'.'.$this->newthurmbnail->extension();
        $this->newthurmbnail->storeAs('products',$thumbName);
        $product->thurmbnail = $thumbName;
        }
        $product->subcategory_id = $this->subcategory_id;
        $product->addItem = $this->addItem;
        $product->save();
        session()->flash('message','Product has been updated  successfully!');
    }


    public function render()
    {
        $subcategories = Subcategory::all();
        return view('livewire.admin.admin-edit-product-component',['subcategories'=>$subcategories])->layout('layouts.base');
    }
}
