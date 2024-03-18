<?php

namespace App\Livewire\Admin;

use App\Models\Subtype;
use App\Models\Type;
use Livewire\Component;

class AdminSubtypes extends Component
{
    public $types;
    // show/hide the modal
    public $showModal = false;
    public $showConfirmationModal = false;
    // array that contains the values for a new or updated version of the subtype
    public $newSubType = [
        'id' => null,
        'name' => null,
        'description' => null,
        'type_id' => null,
    ];

    // validation rules (use the rules() method, not the $rules property)
    protected function rules()
    {
        return [
            'newSubType.name' => 'required',
            'newSubType.type_id' => 'required|numeric|min:0',
            'newSubType.description' => 'required',

        ];
    }

    // validation attributes
    protected $validationAttributes = [
        'newSubType.name' => 'naam',
        'newSubType.type_id' => 'type',
        'newSubType.description' => 'beschrijving',

    ];

    // set/reset $newSubType and validation
    public function setNewSubType(Subtype $subtype = null)
    {
        $this->resetErrorBag();
        if ($subtype) {
            $this->newSubType['id'] = $subtype->id;
            $this->newSubType['name'] = $subtype->name;
            $this->newSubType['description'] = $subtype->description;
            $this->newSubType['type_id'] = $subtype->type_id;
        } else {
            $this->reset('newSubType');
        }
        $this->showModal = true;
    }

    // create a new subtype
    public function createSubType()
    {
        $this->validate();

        $subtype = Subtype::create([
            'name' => $this->newSubType['name'],
            'description' => $this->newSubType['description'],
            'type_id' => $this->newSubType['type_id']
        ]);
        $this->showModal = false;
    }

    // update an existing subtype
    public function updateSubType(Subtype $subtype)
    {
        $this->validate();
        $subtype->update([
            'name' => $this->newSubType['name'],
            'description' => $this->newSubType['description'],
            'type_id' => $this->newSubType['type_id']
        ]);
        $this->showModal = false;
    }

    // delete an existing subtype
    public function deleteSubType(Subtype $subtype)
    {
        $subtype->delete();
    }

    public function toggleConfirmationModal(Subtype $subtype = null)
    {
        $this->resetErrorBag();
        if ($subtype) {
            $this->newSubType['id'] = $subtype->id;
            $this->newSubType['name'] = $subtype->name;
            $this->newSubType['description'] = $subtype->description;
            $this->newSubType['type_id'] = $subtype->type_id;
        } else {
            $this->reset('newSubType');
        }
        $this->showConfirmationModal = true;
    }

    // get all the types from the database (runs only once)
    public function mount()
    {
        $this->types = Type::orderBy('id')->get();
    }

    public function render()
    {
        $subtypes = Subtype::with('type')->orderBy('type_id')->orderBy('id')->get();

        return view('livewire.admin.admin-subtypes', compact('subtypes'))
            ->layout('layouts.app');
    }
}
