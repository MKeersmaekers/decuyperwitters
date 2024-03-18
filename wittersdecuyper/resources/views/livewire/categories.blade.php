<div>
    <div class="relative w-full">
        <!-- Carousel wrapper -->
        <div class="w-full bg-cover bg-center" style="height:32rem; background-image: url('../storage/images/static/12699097_Group happy farmers keeping cow and poultry.jpg');">
            <div class="flex items-center justify-center h-full w-full bg-gray-900 bg-opacity-50">
                <div class="text-center mt-16">
                    <h1 class="text-white text-3xl font-bold uppercase md:text-3xl">{{ $categoryName->name }}</h1>
                    <blockquote class="text-white font-semibold text-center my-4 max-w-xl">
                        {{ $categoryName->description }}
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto p-2 m-4 ">
        @if ($types->first())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-8 place-items-center">
            @foreach ($types as $type)
            <a href="{{ route('Types', ['slug' => $categoryName->name, 'name' => $type->name]) }}" class="transform transition-transform duration-300 hover:scale-95 hover:shadow-lg relative grid h-[20rem] w-full flex-col items-end justify-center overflow-hidden rounded-xl bg-white bg-clip-border text-center text-gray-700">
                <div class="absolute inset-0 m-0 h-full w-full overflow-hidden rounded-none bg-transparent bg-cover bg-clip-border bg-center text-gray-700 shadow-none" style="background-image: url('{{ $type->cover['url'] }}');">
                    <div class="absolute inset-0 w-full h-full to-bg-black-10 bg-gradient-to-t from-black/80 via-black/50"></div>
                </div>
                <div class="relative p-6 px-6 md:px-12">
                    <h2 class="mb-6 font-sans text-2xl md:text-2xl lg:text-2xl font-medium leading-[1.5] tracking-normal text-white antialiased">
                        {{ $type->name }}
                    </h2>
                </div>
            </a>
            @endforeach
        </div>
        @else
        <p class="text-center text-xl">Er zijn momenteel nog geen types voor deze categorie.</p>
        @endif
    </div>
</div>