<?php

namespace App\Livewire\Category;

use App\Models\Subtype;
use App\Models\Type as ModelsType;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Types extends Component
{
    public $type;
    public $images = [];

    public function mount($name = null)
    {
        if ($name) {
            // get the selected type if its not null
            $this->type = ModelsType::where('name', $name)
                ->with(['subtypes' => function ($query) {
                    $query->with('products');
                }])
                ->with('images')
                ->first();
              
        }
    }


    public function render()
    {
        return view('livewire.category.types')
            ->layout('layouts.default-layout');
    }
}
