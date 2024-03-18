<!-- <nav class="container flex items-center justify-between p-4 mx-auto">
    <div class="flex items-center">
        <a href="{{ route('home') }}">
            <img src="{{ asset('storage/images/static/decuyperwitters.png') }}" alt="Home" class="w-1/2">
        </a>
        <a class="hidden text-lg font-medium sm:block" href="{{ route('home') }}">
            De Cuyper - Witters
        </a>
    </div>
    <div class="flex gap-4 sm:gap-16">
        <x-dropdown width="48">
            <x-slot name="trigger">
                <div class="inline-flex items-center px-1 pt-1 font-medium leading-5 text-gray-500 transition duration-150 ease-in-out border-b-2 border-transparent cursor-pointer text-md hover:text-green-600 hover:border-green-600 focus:outline-none focus:text-green-600 focus:border-green-600">
                    <a href="{{ route('Categorie') }}">Categorieën</a>
                </div>
            </x-slot>
            <x-slot name="content">
                @foreach ($NavbarCategories as $category)
                <x-dropdown-link href="{{ route('Categorie', ['slug' => $category->name]) }}">{{ $category->name }}</x-dropdown-link>
                @endforeach
            </x-slot>
        </x-dropdown>
        <x-nav-link href="{{ route('Contact') }}" :active="request()->routeIs('Contact')">
            Contact
        </x-nav-link>
    </div>
</nav> -->



<nav class="bg-white border-gray-200 dark:border-gray-600 dark:bg-gray-900">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('storage/images/static/decuyperwitters.png') }}" class="h-16" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">De Cuyper - Witters</span>
        </a>
        <button data-collapse-toggle="mega-menu-full" type="button" class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mega-menu-full" aria-expanded="false">
            <span class="sr-only">Open menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div id="mega-menu-full" class="items-center justify-between hidden w-full font-medium md:flex md:w-auto md:order-1">
            <ul class="flex flex-col p-4 mt-4 border rounded-lg md:p-0 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ route('home') }}" class="{{ request()->is('/') ? 'text-green-500':'' }} block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-green-500 md:p-0 dark:text-white md:dark:hover:text-green-500 dark:hover:bg-gray-700 dark:hover:text-green-500 md:dark:hover:bg-transparent dark:border-gray-700" aria-current="page">Home</a>
                </li>
                <li>
                    <button id="mega-menu-full-dropdown-button" data-collapse-toggle="mega-menu-full-dropdown" class="{{ request()->routeIs('Categorie', 'Types') ? 'text-green-500':'' }} flex items-center justify-between w-full px-3 py-2 text-gray-900 rounded md:w-auto hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-600 md:p-0 dark:text-white md:dark:hover:text-green-500 dark:hover:bg-gray-700 dark:hover:text-green-500 md:dark:hover:bg-transparent dark:border-gray-700">Categorieën <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg></button>
                </li>

                <li>
                    <a href="{{ route('Contact') }}" class="{{ request()->is('Contact') ? 'text-green-500':'' }} block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-500 dark:hover:bg-gray-700 dark:hover:text-green-500 md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                </li>
            </ul>
        </div>
    </div>
    <div id="mega-menu-full-dropdown" class="hidden mt-1 border-gray-200 shadow-sm bg-gray-50 md:bg-white border-y dark:bg-gray-800 dark:border-gray-600">
        <a href="{{ route('Categorie') }}" class="{{ request()->routeIs('Categorie', 'Types') ? 'text-green-500':'' }} flex justify-center text-3xl mt-4 px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-500 dark:hover:bg-gray-700 dark:hover:text-green-500 md:dark:hover:bg-transparent dark:border-gray-700">Categorieën</a>

        <div class="grid max-w-screen-xl px-4 py-5 mx-auto text-gray-900 dark:text-white sm:grid-cols-2 md:px-6">
            <!-- de categoreis variable zijn hier defined: app\Providers\AppServiceProvider.php -->
            @foreach ($NavbarCategories as $category)
            <div>
                <a href="{{ route('Categorie', ['slug' => $category->name]) }}" class="block p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                    <div class="font-semibold">{{ $category->name }}</div>
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ strtok($category->description, '.') }}</span>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</nav>