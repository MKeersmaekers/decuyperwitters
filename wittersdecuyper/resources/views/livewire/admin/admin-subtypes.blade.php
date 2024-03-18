<div class="container mx-auto py-4">
    <x-admin.section class="mb-4 flex gap-2 justify-center">
        <div class="flex text-lg font-bold flex-1">
            Subtypes
        </div>
        <a href="/dashboard">
            <x-button>Terug naar dashboard</x-button>
        </a>
        <x-button wire:click="setNewSubType()">
            Nieuwe subtype
        </x-button>
    </x-admin.section>

    <x-admin.section>
        <table class="text-center w-full border border-gray-300">
            <colgroup>
                <col class="w-14">
                <col class="w-20">
                <col class="w-14">
                <col class="w-max">
                <col class="w-24">
                <col>
            </colgroup>
            <thead>
                <tr class="bg-gray-100 text-gray-700 [&>th]:p-2">
                    <th>#</th>
                    <th>Type</th>
                    <th>Naam</th>
                    <th class="text-left">Beschrijving</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($subtypes as $subtype)
                <tr wire:key="subtype_{{ $subtype->id }}" class="border-t border-gray-300">
                    <td class="p-2">{{ $subtype->id }}</td>
                    <td>{{ $subtype->type ? $subtype->type->name : 'No type' }}</td>
                    <td>{{ $subtype->name }}</td>
                    <td class="text-left">{{ $subtype->description }}</td>
                    <td>
                        <div class="border border-gray-300 rounded-md overflow-hidden m-2 grid grid-cols-2 h-10">
                            <button wire:click="setNewSubType({{ $subtype->id }})" class="text-gray-400 hover:text-sky-100 hover:bg-sky-500 transition border-r border-gray-300">
                                <x-phosphor-pencil-line-duotone class="inline-block w-5 h-5" />
                            </button>
                            <button x-data="" @click="$wire.toggleConfirmationModal({{ $subtype->id }})" class="text-gray-400 hover:text-red-100 hover:bg-red-500 transition">
                                <x-phosphor-trash-duotone class="inline-block w-5 h-5" />
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="border-t border-gray-300 p-4 text-center text-gray-500">
                        <div class="font-bold italic text-sky-800">Geen subtypes gevonden</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </x-admin.section>

    <x-dialog-modal id="subtypeModal" wire:model="showModal">
        <x-slot name="title">
            <h2>{{ is_null($newSubType['id']) ? 'Voeg een nieuw subtype toe' : 'Bewerk dit subtype' }}</h2>
        </x-slot>
        <x-slot name="content">
            @if ($errors->any())
            <x-admin.alert type="danger">
                <x-admin.list>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </x-admin.list>
            </x-admin.alert>
            @endif
            <x-label for="name" value="Type" />
            <div class="flex flex-row gap-2 mt-2">
                <x-input id="name" type="text" placeholder="Subtype" wire:model.defer="newSubType.name" class="flex-1" />
            </div>
            <div class="flex flex-row gap-4 mt-4">
                <div class="flex-1 flex-col gap-2">
                <x-label for="type_id" value="Type" class="mt-4"/>
                    <x-admin.form.select wire:model.defer="newSubType.type_id" id="type_id" class="block mt-1 w-full">
                        <option value="">Selecteer een type</option>
                        @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </x-admin.form.select>
                    <x-label for="Beschrijving" value="Beschrijving" class="mt-4" />
                    <x-admin.form.textarea id="Beschrijving" placeholder="Beschrijving" type="text" wire:model.defer="newSubType.description" class="mt-1 block w-full" />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button @click="show = false">Annuleer</x-secondary-button>
            @if(is_null($newSubType['id']))
            <x-button wire:click="createSubType()" wire:loading.attr="disabled" class="ml-2">Bewaar subtype
            </x-button>
            @else
            <x-button color="success" wire:click="updateSubType({{ $newSubType['id'] }})" wire:loading.attr="disabled" class="ml-2">Bewerk subtype
            </x-button>
            @endif
        </x-slot>
    </x-dialog-modal>

    <x-confirmation-modal wire:model="showConfirmationModal">
        <x-slot name="title">
            Verwijder subtype
        </x-slot>

        <x-slot name="content">
            Ben je zeker dat je dit subtype wilt verwijderen? Eenmaal verwijderd, is alle data hieromtrent verwijdert.
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="show = false" wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                Annuleer
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click="deleteSubType({{ $newSubType['id'] }})" @click="show = false">
                Verwijder subtype
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>