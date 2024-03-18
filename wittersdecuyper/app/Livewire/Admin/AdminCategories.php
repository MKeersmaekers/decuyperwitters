<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminCategories extends Component
{

    use WithFileUploads;

    public $coverFile;

    // show/hide the modal
    public $showModal = false;
    public $showConfirmationModal = false;
    // array that contains the values for a new or updated version of the category
    public $newCategory = [
        'id' => null,
        'name' => null,
        'description' => null,
        'cover' => '/storage/images/category_images/no-cover.jpg',
    ];

    // validation rules (use the rules() method, not the $rules property)
    protected function rules()
    {
        return [
            'newCategory.name' => [
                'required',
                'regex:/^[A-Za-z0-9\s]+$/'
            ],
            'newCategory.description' => 'required',
            'coverFile' => 'image',
        ];
    }

    // validation attributes
    protected $validationAttributes = [
        'newCategory.name' => 'naam',
        'newCategory.description' => 'beschrijving',
    ];

    // set/reset $newCategory and validation
    public function setNewCategory(Category $category = null)
    {
        $this->resetErrorBag();
        if ($category) {
            $this->newCategory['id'] = $category->id;
            $this->newCategory['name'] = $category->name;
            $this->newCategory['description'] = $category->description;
            $this->newCategory['cover'] =
                Storage::disk('public')->exists('images/main_category_images/' . $category->name . '.jpg')
                ? '/storage/images/main_category_images/' . $category->name . '.jpg'
                : '/storage/images/category_images/no-cover.jpg';
        } else {
            $this->reset('newCategory');
        }
        $this->showModal = true;
    }

    // create a new category
    public function createCategory()
    {
        $this->validate();

        $coverPath = $this->coverFile->storeAs('images/main_category_images', $this->newCategory['name'] . '.jpg', 'public');

        $categories = Category::create([
            'name' => $this->newCategory['name'],
            'description' => $this->newCategory['description'],
            'cover' => $coverPath,
        ]);
        $this->showModal = false;
    }

    // update an existing category
    public function updateCategory(Category $category)
    {
        $this->validate();

        if ($this->coverFile) {
            $coverPath = $this->coverFile->storeAs('images/main_category_images', $this->newCategory['name'] . '.jpg', 'public');
            $this->newCategory['cover'] = $coverPath;
        }

        $category->update([
            'name' => $this->newCategory['name'],
            'description' => $this->newCategory['description'],
            'cover' => $this->newCategory['cover'],
        ]);
        $this->showModal = false;
    }

    // delete an existing category
    public function deleteCategory(Category $category)
    {
        $category = Category::find($this->newCategory['id']);

        // Check if the category has a cover image
        if (Storage::disk('public')->exists('images/main_category_images/' . $category->name . '.jpg')) {
          // Delete the cover image from the public folder
          Storage::disk('public')->delete('images/main_category_images/' . $category->name . '.jpg');
        }

        $category->delete();
    }

    public function toggleConfirmationModal(Category $category = null)
    {
        $this->resetErrorBag();
        if ($category) {
            $this->newCategory['id'] = $category->id;
            $this->newCategory['name'] = $category->name;
            $this->newCategory['description'] = $category->description;
            $this->newCategory['cover'] =
                Storage::disk('public')->exists('images/main_category_images/' . $category->name . '.jpg')
                ? '/storage/images/main_category_images/' . $category->name . '.jpg'
                : '/storage/images/category_images/no-cover.jpg';
        } else {
            $this->reset('newCategory');
        }
        $this->showConfirmationModal = true;
    }


    public function render()
    {
        $categories = Category::orderBy('id')->get();

        return view('livewire.admin.admin-categories', compact('categories'))
            ->layout('layouts.app');
    }
}
