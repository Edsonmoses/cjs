<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class CreateComponent extends Component
{
    public $products,$product_id,$name,$short_description,$description, $regular_price, $sale_price, $SKU, $stock_status, $featured, $quantity, $image, $category_id;
    public $isOpen = 0;

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();

    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->short_description = '';
        $this->description = '';
        $this->regular_price = '';
        $this->sale_price = '';
        $this->SKU = '';
        $this->stock_status = '';
        $this->featured = '';
        $this->quantity = '';
        $this->image = '';
        $this->category_id = '';
    }

    public function store()
    {

        $this->validate([

            'name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required',
            'sale_price' => 'required',
            'SKU' => 'required',
            'stock_status' => 'required',
            'featured' => 'required',
            'quantity' => 'required',
            'image' => 'required',
            'category_id' => 'required',

        ]);



        Product::updateOrCreate(['id' => $this->product_id], [

            'name' => $this->neme,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'regular_price' => $this->regular_price,
            'sale_price' => $this->sale_price,
            'SKU' => $this->SKU,
            'stock_status' => $this->stock_status,
            'featured' => $this->featured,
            'quantity' => $this->quantity,
            'image' => $this->image,
            'category_id' => $this->category_id,

        ]);



        session()->flash('message',

            $this->product_id ? 'Product Updated Successfully.' : 'Product Created Successfully.');



        $this->closeModal();

        $this->resetInputFields();

    }
    public function edit($id)
    {

        $product = Product::findOrFail($id);

        $this->product_id = $id;
        $this->name = $product->name;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->category_id = $product->category_id;



        $this->openModal();

    }

    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('message', 'Product Deleted Successfully.');
    }
    use WithPagination;
    public function render()
    {
        $this->products = Product::all();
        return view('livewire.create-component');
    }
}
