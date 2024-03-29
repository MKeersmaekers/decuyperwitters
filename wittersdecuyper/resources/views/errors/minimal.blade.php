<x-default-layout>
    <div class="my-10">
        <x-slot name="title"></x-slot>
        <main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
            <div class="text-center">
                <p class="text-base font-semibold text-indigo-600">@yield('code')</p>
                <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">@yield('message')</h1>
                <p class="mt-6 text-base leading-7 text-gray-600">Sorry, we konden de pagina die je zocht niet vinden.</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="{{ route('home') }}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Home</a>
                    <a href="#" onclick="window.history.back();" class="text-sm font-semibold text-gray-900">Terug</a>
                </div>
            </div>
        </main>
        
    </div>

</x-default-layout>