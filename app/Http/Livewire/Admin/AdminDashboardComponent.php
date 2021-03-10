<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $this->products = Product::all();
        return view('livewire.admin.admin-dashboard-component')->layout('layouts.base');
    }
}
