<div class="container mx-auto py-4">
    <x-admin.section class="mb-4 flex gap-2 justify-center">
        <div class="flex text-lg font-bold flex-1">
            Categorieën
        </div>
        <a href="/dashboard">
            <x-button>Terug naar dashboard</x-button>
        </a>
        <x-button wire:click="setNewCategory()">
            Nieuwe categorie
        </x-button>
    </x-admin.section>

    <x-admin.section>
        <table class="text-center w-full border border-gray-300">
            <colgroup>
                <col class="w-14">
                <col class="w-20">
                <col class="w-20">
                <col class="w-max">
                <col class="w-24">
            </colgroup>
            <thead>
                <tr class="bg-gray-100 text-gray-700 [&>th]:p-2">
                    <th>#</th>
                    <th></th>
                    <th>Naam</th>
                    <th class="text-left">Beschrijving</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $categorie)
                <tr wire:key="categorie{{ $categorie->id }}" class="border-t border-gray-300">
                    <td class="p-2">{{ $categorie->id }}</td>
                    <td>
                        <img src="{{ $categorie->cover['url'] }}" alt="{{ $categorie->name }}" class="my-2 border object-cover">
                    </td>
                    <td>{{ $categorie->name }}</td>
                    <td class="text-left">{{ $categorie->description }}</td>
                    <td>
                        <div class="border border-gray-300 rounded-md overflow-hidden m-2 grid grid-cols-2 h-10">
                            <button wire:click="setNewCategory({{ $categorie->id }})" class="text-gray-400 hover:text-sky-100 hover:bg-sky-500 transition border-r border-gray-300">
                                <x-phosphor-pencil-line-duotone class="inline-block w-5 h-5" />
                            </button>
                            <button x-data="" @click="$wire.toggleConfirmationModal({{ $categorie->id }})" class="text-gray-400 hover:text-red-100 hover:bg-red-500 transition">
                                <x-phosphor-trash-duotone class="inline-block w-5 h-5" />
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="border-t border-gray-300 p-4 text-center text-gray-500">
                        <div class="font-bold italic text-sky-800">Geen categorieën gevonden</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </x-admin.section>

    <x-dialog-modal id="categoryModal" wire:model="showModal">
        <x-slot name="title">
            <h2>{{ is_null($newCategory['id']) ? 'Voeg een nieuwe categorie toe' : 'Bewerk deze categorie' }}</h2>
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
            <x-label for="name" value="Categorie" />
            <div class="flex flex-row gap-2 mt-2">
                <x-input id="name" type="text" placeholder="Categorie" wire:model.defer="newCategory.name" class="flex-1" />
            </div>
            <div class="flex flex-row gap-4 mt-4">
                <div class="flex-1 flex-col gap-2">

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload een foto</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" wire:model="coverFile" id="file_input" type="file">

                    <x-label for="Beschrijving" value="Beschrijving" class="mt-4" />
                    <x-admin.form.textarea id="Beschrijving" placeholder="Beschrijving" type="text" wire:model.defer="newCategory.description" class="mt-1 block w-full" />
                </div>
                <img src="{{ $newCategory['cover'] }}" alt="" class="mt-4 w-40 h-40 border border-gray-300 object-cover">
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button @click="show = false">Annuleer</x-secondary-button>
            @if(is_null($newCategory['id']))
            <x-button wire:click="createCategory()" wire:loading.attr="disabled" class="ml-2">Bewaar categorie
            </x-button>
            @else
            <x-button color="success" wire:click="updateCategory({{ $newCategory['id'] }})" wire:loading.attr="disabled" class="ml-2">Bewaar categorie
            </x-button>
            @endif
        </x-slot>
    </x-dialog-modal>

    <x-confirmation-modal wire:model="showConfirmationModal">
        <x-slot name="title">
            Verwijder categorie
        </x-slot>

        <x-slot name="content">
            Ben je zeker dat je deze categorie wilt verwijderen? Eenmaal verwijderd, is alle data hieromtrent verwijdert.
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="show = false" wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                Annuleer
            </x-secondary-button>

            <x-danger-button @click="show = false" class="ml-2" wire:click="deleteCategory({{ $categorie->id }})">
                Verwijder categorie
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>