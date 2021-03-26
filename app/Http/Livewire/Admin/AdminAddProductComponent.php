<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\Subcategory;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
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

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
        $this->addItem = 0;
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
            'image' => 'required|mimes:jpg,jpeg,png',
            'thurmbnail' => 'required|mimes:jpg,jpeg,png',
            'subcategory_id' => 'required',
        ]);
    }

    public function addProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:products',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'image' => 'required|mimes:jpg,jpeg,png',
            'thurmbnail' => 'required|mimes:jpg,jpeg,png',
            'subcategory_id' => 'required',
        ]);
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('products',$imageName);
        $product->image = $imageName;
        $thumbName = Carbon::now()->timestamp.'.'.$this->thurmbnail->extension();
        $this->thurmbnail->storeAs('products',$thumbName);
        $product->thurmbnail = $thumbName;
        $product->subcategory_id = $this->subcategory_id;
        $product->addItem = $this->addItem;
        $product->save();
        session()->flash('message','Product has been created successfully!');
    }

    public function render()
    {
        $subcategories = Subcategory::all();
        return view('livewire.admin.admin-add-product-component',['subcategories'=>$subcategories])->layout('layouts.base');
    }
}
