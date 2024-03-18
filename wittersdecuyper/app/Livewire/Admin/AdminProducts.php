<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use App\Models\Subtype;
use Livewire\Component;

class AdminProducts extends Component
{
    public $subtypes;
    // show/hide the modal
    public $showModal = false;
    public $showConfirmationModal = false;
    // array that contains the values for a new or updated version of the subtype
    public $newProduct = [
        'id' => null,
        'name' => null,
        'description' => null,
        'subtype_id' => null,
    ];

    // validation rules (use the rules() method, not the $rules property)
    protected function rules()
    {
        return [
            'newProduct.name' => [
                'required',
                'regex:/^[A-Za-z0-9\s]+$/'
            ],
            'newProduct.subtype_id' => 'required|numeric|min:0',
            'newProduct.description' => 'required',

        ];
    }

    // validation attributes
    protected $validationAttributes = [
        'newProduct.name' => 'naam',
        'newProduct.subtype_id' => 'subtype',
        'newProduct.description' => 'beschrijving',

    ];

    // set/reset $newProduct and validation
    public function setNewProduct(Product $product = null)
    {
        $this->resetErrorBag();
        if ($product) {
            $this->newProduct['id'] = $product->id;
            $this->newProduct['name'] = $product->name;
            $this->newProduct['description'] = $product->description;
            $this->newProduct['subtype_id'] = $product->subtype_id;
        } else {
            $this->reset('newProduct');
        }
        $this->showModal = true;
    }

    // create a new product
    public function createProduct()
    {
        $this->validate();

        $product = Product::create([
            'name' => $this->newProduct['name'],
            'description' => $this->newProduct['description'],
            'subtype_id' => $this->newProduct['subtype_id']
        ]);
        $this->showModal = false;
    }

    // update an existing record
    public function updateProduct(Product $product)
    {
        $this->validate();
        $product->update([
            'name' => $this->newProduct['name'],
            'description' => $this->newProduct['description'],
            'subtype_id' => $this->newProduct['subtype_id']
        ]);
        $this->showModal = false;
    }

    // delete an existing product
    public function deleteProduct(Product $product)
    {
        $product->delete();
    }

    public function toggleConfirmationModal(Product $product = null)
    {
        $this->resetErrorBag();
        if ($product) {
            $this->newProduct['id'] = $product->id;
            $this->newProduct['name'] = $product->name;
            $this->newProduct['description'] = $product->description;
            $this->newProduct['subtype_id'] = $product->subtype_id;
        } else {
            $this->reset('newProduct');
        }
        $this->showConfirmationModal = true;
    }

    // get all the subtypes from the database (runs only once)
    public function mount()
    {
        $this->subtypes = Subtype::with('type')->orderBy('id')->get();
    }

    public function render()
    {
        $products = Product::with('subtype.type')->orderBy('subtype_id')->orderBy('id')->get();

        return view('livewire.admin.admin-products', compact('products'))
            ->layout('layouts.app');
    }
}
