<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $link;
    public $image;
    public $status;


    public function mount()
    {
        $this->status = 0;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'link' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'status' => 'required',
        ]);
    }

    public function addSlide()
    {
        $this->validate([
            'title' => 'required',
            'link' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'status' => 'required',
        ]);

        $slider = new HomeSlider();
        $slider->title = $this->title;
        $slider->link = $this->link;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('sliders',$imageName);
        $slider->image = $imageName;
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message','Slide has been created successfully!');

    }

    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.base');
    }
}
