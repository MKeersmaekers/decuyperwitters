<div class="container mx-auto py-4">
    <div class="fixed top-8 left-1/2 -translate-x-1/2 z-50 animate-pulse" wire:loading>
        <x-admin.preloader class="bg-lime-700/60 text-white border border-lime-700 shadow-2xl">
            {{ $loading }}
        </x-admin.preloader>
    </div>
    <x-admin.section class="mb-4 flex gap-2 justify-center">
        <div class="flex text-lg font-bold flex-1">
            Types
        </div>
        <div class="col-span-5 md:col-span-2 lg:col-span-2">
            <x-label for="selectedCategoryId" value="Categorie" />
            <x-admin.form.select id="selectedCategoryId" wire:model.debounce.500ms="selectedCategoryId" class="block mt-1 w-full">
                <option value="%">Alle categorieën</option>
                @foreach ($allCategories as $c)
                <option value="{{ $c->id }}">
                    {{ $c->name }} ({{ $c->types_count }})
                </option>
                @endforeach
            </x-admin.form.select>
        </div>


        <x-button>
            <a href="/dashboard">Terug naar dashboard</a>
        </x-button>


        <x-button wire:click="setNewType()">
            Nieuwe type
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
                    <th></th>
                    <th>Categorie</th>
                    <th>Naam</th>
                    <th class="text-left">Beschrijving</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($types as $type)
                <tr wire:key="type_{{ $type->id }}" class="border-t border-gray-300">
                    <td class="p-2">{{ $type->id }}</td>
                    <td>
                        <img src="{{ $type->cover['url'] }}" alt="{{ $type->name }}" class="my-2 border object-cover">
                    </td>
                    <td>{{ $type->category ? $type->category->name : 'No Category' }}</td>
                    <td>{{ $type->name }}</td>
                    <td class="text-left">{{ $type->description }}</td>
                    <td>
                        <div class="border border-gray-300 rounded-md overflow-hidden m-2 grid grid-cols-2 h-10">
                            <button wire:click="setNewType({{ $type->id }})" class="text-gray-400 hover:text-sky-100 hover:bg-sky-500 transition border-r border-gray-300">
                                <x-phosphor-pencil-line-duotone class="inline-block w-5 h-5" />
                            </button>
                            <button x-data="" @click="$wire.toggleConfirmationModal({{ $type->id }})" class="text-gray-400 hover:text-red-100 hover:bg-red-500 transition">
                                <x-phosphor-trash-duotone class="inline-block w-5 h-5" />
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="border-t border-gray-300 p-4 text-center text-gray-500">
                        <div class="font-bold italic text-sky-800">Geen types gevonden</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </x-admin.section>

    <x-dialog-modal id="typeModal" wire:model="showModal">
        <x-slot name="title">
            <h2>{{ is_null($newType['id']) ? 'Voeg een nieuw type toe' : 'Bewerk dit type' }}</h2>
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
                <x-input id="name" type="text" placeholder="Type" wire:model.defer="newType.name" class="flex-1" />
            </div>
            <div class="flex flex-row gap-4 mt-4">
                <div class="flex-1 flex-col gap-2">
                    <x-label for="category_id" value="Categorie" class="mt-4" />
                    <x-admin.form.select wire:model.defer="newType.category_id" id="category_id" class="block mt-1 w-full">
                        <option value="">Selecteer een categorie</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </x-admin.form.select>
                    <label class="block m-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload een cover foto</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" wire:model="coverFile" id="file_input" type="file">

                    <label class="block m-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Upload meerdere collectie fotos</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" wire:model="collectieFoto" id="multiple_files" type="file" multiple>
                    <x-label for="Beschrijving" value="Beschrijving" class="mt-4" />
                    <x-admin.form.textarea id="Beschrijving" placeholder="Beschrijving" type="text" wire:model.defer="newType.description" class="mt-1 block w-full" />
                    @if ($newType['images'])
                    <div class="p-4 my-4 bg-white shadow-md rounded-lg">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($newType['images'] as $imagePath)
                            <div class="flex flex-wrap m-auto">
                                <div class="w-full p-4">
                                    <img alt="gallery" class="block max-h-56 rounded-lg object-cover object-center" src="{{ asset($imagePath) }}" />
                                    <button wire:click="deleteImage('{{ $imagePath }}')" wire:confirm="Wil je deze afbeelding zeker verwijderen?" class="text-red-500 hover:text-red-700">Delete</button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                </div>
                <img src="{{ $newType['cover'] }}" alt="" class="mt-4 w-40 h-40 border border-gray-300 object-cover">
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button @click="show = false">Annuleer</x-secondary-button>
            @if(is_null($newType['id']))
            <x-button wire:click="createType()" wire:loading.attr="disabled" class="ml-2">Bewaar type
            </x-button>
            @else
            <x-button color="success" wire:click="updateType({{ $newType['id'] }})" wire:loading.attr="disabled" class="ml-2">Bewerk type
            </x-button>
            @endif
        </x-slot>
    </x-dialog-modal>

    <x-confirmation-modal wire:model="showConfirmationModal">
        <x-slot name="title">
            Verwijder type
        </x-slot>

        <x-slot name="content">
            Ben je zeker dat je dit type wilt verwijderen? Eenmaal verwijderd, is alle data hieromtrent verwijdert.
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="show = false" wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                Annuleer
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click="deleteType({{ $newType['id'] }})" @click="show = false">
                Verwijder type
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

</div>