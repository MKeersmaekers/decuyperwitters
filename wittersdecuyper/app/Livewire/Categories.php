<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Type;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
  use WithPagination;

  public $selectedCategory;
  public $categories;
  public $categoryName;

  public function mount($slug = null)
  {
    $this->categories = Category::get(); // Retrieve categories

    $category = Category::where('name', $slug)->first();

    // Check if current URL contains the 'dieren' slug
    if ($category) {
      $this->selectedCategory = $category->id;
      $this->categoryName = $category;
    } else {
      // Default or error handling
      $this->selectedCategory = 1;
      $this->categoryName = 'Dieren';
    }
  }

  public function render()
  {
    $types = Type::where('category_id', $this->selectedCategory);

    return view('livewire.categories', [
      'types' => $types->get(),
      'category' => $this->selectedCategory,
      'categoryName' => $this->categoryName
    ])
      ->layout('layouts.default-layout');
  }
}
