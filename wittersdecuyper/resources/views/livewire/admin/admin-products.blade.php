<div class="container mx-auto py-4">
    <x-admin.section class="mb-4 flex gap-2 justify-center">
        <div class="flex text-lg font-bold flex-1">
            Product
        </div>
        <a href="/dashboard">
            <x-button>Terug naar dashboard</x-button>
        </a>
        <x-button wire:click="setNewProduct()">
            Nieuwe product
        </x-button>
    </x-admin.section>

    <x-admin.section>
        <table class="text-center w-full border border-gray-300">
            <colgroup>
                <col class="w-14">
                <col class="w-20">
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
                    <th>Subtype</th>
                    <th>Naam</th>
                    <th class="text-left">Beschrijving</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                <tr wire:key="product_{{ $product->id }}" class="border-t border-gray-300">
                    <td class="p-2">{{ $product->id }}</td>
                    <td>{{ $product->subtype ? $product->subtype->type->name : 'Geen type' }}</td>
                    <td>{{ $product->subtype ? $product->subtype->name : 'Geen subtype' }}</td>
                    <td>{{ $product->name }}</td>
                    <td class="text-left">{{ $product->description }}</td>
                    <td>
                        <div class="border border-gray-300 rounded-md overflow-hidden m-2 grid grid-cols-2 h-10">
                            <button wire:click="setNewProduct({{ $product->id }})" class="text-gray-400 hover:text-sky-100 hover:bg-sky-500 transition border-r border-gray-300">
                                <x-phosphor-pencil-line-duotone class="inline-block w-5 h-5" />
                            </button>
                            <button x-data="" @click="$wire.toggleConfirmationModal({{ $product->id }})" class="text-gray-400 hover:text-red-100 hover:bg-red-500 transition">
                                <x-phosphor-trash-duotone class="inline-block w-5 h-5" />
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="border-t border-gray-300 p-4 text-center text-gray-500">
                        <div class="font-bold italic text-sky-800">Geen producten gevonden</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </x-admin.section>

    <x-dialog-modal id="productModal" wire:model="showModal">
        <x-slot name="title">
            <h2>{{ is_null($newProduct['id']) ? 'Voeg een nieuw product toe' : 'Bewerk dit product' }}</h2>
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
            <x-label for="name" value="Product" />
            <div class="flex flex-row gap-2 mt-2">
                <x-input id="name" type="text" placeholder="Product" wire:model.defer="newProduct.name" class="flex-1" />
            </div>
            <div class="flex flex-row gap-4 mt-4">
                <div class="flex-1 flex-col gap-2">
                <x-label for="subtype_id" value="Subtype" class="mt-4"/>
                    <x-admin.form.select wire:model.defer="newProduct.subtype_id" id="subtype_id" class="block mt-1 w-full">
                        <option value="">Selecteer een subtype</option>
                        @foreach($subtypes as $subtype)
                        <option value="{{ $subtype->id }}">{{ $subtype->type->name }} - {{ $subtype->name }}</option>
                        @endforeach
                    </x-admin.form.select>
                    <x-label for="Beschrijving" value="Beschrijving" class="mt-4" />
                    <x-admin.form.textarea id="Beschrijving" placeholder="Beschrijving" type="text" wire:model.defer="newProduct.description" class="mt-1 block w-full" />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button @click="show = false">Annuleer</x-secondary-button>
            @if(is_null($newProduct['id']))
            <x-button wire:click="createProduct()" wire:loading.attr="disabled" class="ml-2">Bewaar product
            </x-button>
            @else
            <x-button color="success" wire:click="updateProduct({{ $newProduct['id'] }})" wire:loading.attr="disabled" class="ml-2">Bewerk product
            </x-button>
            @endif
        </x-slot>
    </x-dialog-modal>

    <x-confirmation-modal wire:model="showConfirmationModal">
        <x-slot name="title">
            Verwijder product
        </x-slot>

        <x-slot name="content">
            Ben je zeker dat je dit product wilt verwijderen? Eenmaal verwijderd, is alle data hieromtrent verwijdert.
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="show = false" wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                Annuleer
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click="deleteProduct({{ $newProduct['id'] }})" @click="show = false">
                Verwijder product
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>