<div class="container mx-auto">

    <!-- Title section, conditional check if the type exists -->
    <div>
        @if($type)
        <!-- If there are images, split it up with the caroussel  -->
        <div class="p-12 m-4 bg-white border border-gray-200 rounded-lg shadow text-center grid grid-cols-2 gap-2 divide-x-2">
            <!-- if no images, use the full width of the page for the type section -->

            <div class="">
                <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900">{{ $type->name }}</h5>
                <p class=" text-sm font-semibold text-gray-500 ">{{ $type->description }}</p>
            </div>

            <div class="flex flex-col items-center">
                <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900">Contact</h5>
                <p class="items-center text-sm font-semibold text-gray-500 ">Meer info nodig?
                    Neem telefonisch contact met ons op, op het nummer 
                    <a class="inline-flex items-center font-semibold text-green-600 underline underline-offset-2" href="tel:015/23.32.37">015/23.32.37</a> 
                    
                    of stuur een bericht via de
                    <a href="{{ route('Contact') }}" class="inline-flex items-center font-semibold text-green-600 underline underline-offset-2">
                        contactpagina
                        <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </p>
            </div>

        </div>

        <div class="m-4 lg:grid lg:grid-cols-2 gap-8">

            <div class="container mx-auto">
                @foreach ($type->subtypes as $sub)
                <!-- Wrap each table in a div -->
                <div class="my-4">
                    <div class="relative overflow-x-auto shadow-md rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 rounded-lg shadow-md" aria-label="Products">

                            <!-- Subtype title and description -->
                            <caption class="p-5 text-lg font-bold text-left rtl:text-right text-gray-900 bg-white ">
                                {{ $sub->name }}
                                <p class="mt-1 text-sm font-semibold text-gray-500 ">{{ $sub->description }}</p>
                            </caption>

                            <!-- Heading -->
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Product
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Beschrijving
                                    </th>
                                </tr>
                            </thead>

                            <!-- Body, get each product in a subtype -->
                            <tbody>
                                @foreach ($sub->products as $product)
                                <tr class="bg-white border-b  hover:bg-gray-50 ">
                                    <td class="pl-4 py-4 font-bold text-gray-900">
                                        {{ $product->name }}
                                    </td>

                                    <!-- Check if the product has a description, else show placeholder text -->
                                    <td class="px-6 py-4 font-semibold text-gray-900 ">
                                        @if (isset($product->description) && $product->description != '')
                                        {{ $product->description }}
                                        @else

                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                @endforeach
            </div>

            @if ($type->images)
            <div class="p-4 my-4 bg-white shadow-md rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
                    @foreach ($type->images as $image)
                    <div class="flex flex-wrap m-auto">
                        <div class="w-full p-4">
                            <img alt="gallery" class="block max-h-56 rounded-lg object-cover object-center" src="{{ $image->path }}" />
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            @endif

        </div>

        <!-- If the type doesn't exist yet -->
        @else
        <h1 class="text-3xl text-center">Deze categorie is er nog niet.</h1>
        @endif
    </div>
</div>