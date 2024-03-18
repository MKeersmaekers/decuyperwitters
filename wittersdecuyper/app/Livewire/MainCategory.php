<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class MainCategory extends Component
{
    public function render()
    {
        $category = Category::get();

        return view('livewire.main-category', compact('category'))
        ->layout('layouts.default-layout');
    }
}
