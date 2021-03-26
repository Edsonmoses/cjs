<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\Subcategory;

class CategoryMenuComponent extends Component
{
    public $sorting;
    public $pagesize;

    public $min_price;
    public $max_price;

    public $category_slug;

    public function mount($category_slug)
    {
        $this->sorting = "default";
        $this->pagesize = 20;

        $this->min_price = 1;
        $this->max_price = 1000;

        $this->category_slug = $category_slug;

    }

    use WithPagination;
    public function render()
    {
        $category = Category::where('slug',$this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;


        if($this->sorting=='date')
        {
            $subcategory = Subcategory::where('category_id',$category_id)->whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        elseif($this->sorting=="price")
        {
            $subcategory = Subcategory::where('category_id',$category_id)->whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        elseif($this->sorting=="price-desc")
        {
            $subcategory = Subcategory::where('category_id',$category_id)->whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else{
            $subcategory = Subcategory::where('category_id',$category_id)->paginate($this->pagesize);
        }
        $categories = Category::all();
        return view('livewire.category-menu-component',['subcategory'=> $subcategory,'categories'=>$categories, 'category_name'=>$category_name])->layout("layouts.base");
    }
}
