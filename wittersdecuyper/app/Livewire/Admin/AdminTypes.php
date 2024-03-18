<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Image;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminTypes extends Component
{    
    use WithFileUploads;

    public $coverFile;

    public $collectieFoto;

    public $loading = 'Please wait...';

    public $showConfirmationModal = false;

    public $selectedCategoryId = '%';

    public $categories;
    // show/hide the modal
    public $showModal = false;
    // array that contains the values for a new or updated version of the type
    public $newType = [
        'id' => null,
        'name' => null,
        'description' => null,
        'category_id' => null,
        'cover' => '/storage/images/category_images/no-cover.jpg',
        'images' => []
    ];

    // validation rules (use the rules() method, not the $rules property)
    protected function rules()
    {
        return [
            'newType.name' => 'required',
            'newType.category_id' => 'required|numeric|min:0',
            'newType.description' => 'required',
            'coverFile' => 'nullable|image',
            'collectieFoto.*' => 'image',
        ];
    }

    // validation attributes
    protected $validationAttributes = [
        'newType.name' => 'naam',
        'newType.category_id' => 'Categorie',
        'newType.description' => 'beschrijving',
        'newType.coverFile' => 'Cover foto',
        'newType.collectiefoto.*' => 'Collectie foto'
    ];

    // set/reset $newType and validation
    public function setNewType(Type $type = null)
    {
        $this->resetErrorBag();
        if ($type) {
            $this->newType['id'] = $type->id;
            $this->newType['name'] = $type->name;
            $this->newType['description'] = $type->description;
            $this->newType['category_id'] = $type->category_id;
            $this->newType['cover'] =
                Storage::disk('public')->exists('images/category_images/' . $type->name . '.jpg')
                ? '/storage/images/category_images/' . $type->name . '.jpg'
                : '/storage/images/category_images/no-cover.jpg';
            $this->newType['images'] = $type->images->pluck('path')->toArray();
        } else {
            $this->reset('newType');
        }
        $this->showModal = true;
    }

    // create a new type
    public function createType()
    {
        $this->validate();

        if ($this->coverFile) {
            $coverPath = $this->coverFile->storeAs('images/category_images', $this->newType['name'] . '.jpg', 'public');
        } else {
            // Use the default no-cover.png image if no cover file is provided
            $coverPath = '/storage/images/category_images/no-cover.png';
        }

        $typeFolder = 'images/type_images/' . $this->newType['name'];
        if (!Storage::disk('public')->exists($typeFolder)) {
            Storage::disk('public')->makeDirectory($typeFolder);
        }

        $type = Type::create([
            'name' => $this->newType['name'],
            'description' => $this->newType['description'],
            'category_id' => $this->newType['category_id'],
            'cover' => $coverPath,
        ]);

        if ($this->collectieFoto)
            // Create Image records for collectieFoto
            foreach ($this->collectieFoto as $image) {
                // Use the original name of the image
                $imageName = $image->getClientOriginalName();
                $imagePath = $image->storeAs($typeFolder, $imageName, 'public');
                Image::create([
                    'path' => '/storage/' . $imagePath,
                    'type_id' => $type->id,
                ]);
            }

        $this->showModal = false;
    }

    // update an existing type
    public function updateType(Type $type)
    {
        $this->validate();

        if ($this->coverFile) {
            $coverPath = $this->coverFile->storeAs('images/category_images', $this->newType['name'] . '.jpg', 'public');
            $this->newType['cover'] = $coverPath;
        }

        $typeFolder = 'images/type_images/' . $this->newType['name'];
        if (!Storage::disk('public')->exists($typeFolder)) {
            Storage::disk('public')->makeDirectory($typeFolder);
        }

        $type->update([
            'name' => $this->newType['name'],
            'description' => $this->newType['description'],
            'category_id' => $this->newType['category_id'],
            'cover' => $this->newType['cover'],
        ]);

        if ($this->collectieFoto)
            // Create Image records for collectieFoto
            foreach ($this->collectieFoto as $image) {
                // Generate a unique name for the image to avoid conflicts
                $imageName = $image->getClientOriginalName();
                $imagePath = $typeFolder . '/' . $imageName;

                // Check if the image already exists in the folder
                if (!Storage::disk('public')->exists($imagePath)) {
                    // If not, store the image
                    $image->storeAs($typeFolder, $imageName, 'public');
                    Image::create([
                        'path' => '/storage/' . $imagePath,
                        'type_id' => $type->id,
                    ]);
                }
            }

        $this->showModal = false;
    }

    // delete an existing type
    public function deleteType(Type $type)
    {
        $image = Type::find($this->newType['id']);

        // Check if the category has a cover image
        if (Storage::disk('public')->exists('images/category_images/' . $image->name . '.jpg')) {
            // Delete the cover image from the public folder
            Storage::disk('public')->delete('images/category_images/' . $image->name . '.jpg');
        }

        $typeFolder = 'images/type_images/' . $type->name;
        if (Storage::disk('public')->exists($typeFolder)) {
            Storage::disk('public')->deleteDirectory($typeFolder);
        }

        $type->delete();
    }

    public function toggleConfirmationModal(Type $type = null)
    {
        $this->resetErrorBag();
        if ($type) {
            $this->newType['id'] = $type->id;
            $this->newType['name'] = $type->name;
            $this->newType['description'] = $type->description;
            $this->newType['category_id'] = $type->category_id;
            $this->newType['cover'] =
                Storage::disk('public')->exists('images/category_images/' . $type->name . '.jpg')
                ? '/storage/images/category_images/' . $type->name . '.jpg'
                : '/storage/images/category_images/no-cover.jpg';
        } else {
            $this->reset('newType');
        }
        $this->showConfirmationModal = true;
    }

    public function deleteImage($imagePath)
    {
        // Assuming you have a method to find the image by its path
        $image = Image::where('path', $imagePath)->first();
        if ($image) {
            $correctedPath = str_replace('/storage', '', $imagePath);

            if (Storage::disk('public')->exists($correctedPath)) {
            // Delete the image file from storage
            Storage::disk('public')->delete($correctedPath);
            // Delete the image record from the database
            $image->delete();
            }

        }
    }


    // get all the categories from the database (runs only once)
    public function mount()
    {
        $this->categories = Category::orderBy('name')->withCount('types')->get();
    }

    public function render()
    {
        $allCategories = Category::has('types')->withCount('types')->get();
        $types = Type::has('category')->orderBy('category_id')->orderBy('id')
            ->where([
                ['category_id', 'like', $this->selectedCategoryId],
            ])
            ->get();

        return view('livewire.admin.admin-types', compact('types', 'allCategories'))
            ->layout('layouts.app');
    }
}
