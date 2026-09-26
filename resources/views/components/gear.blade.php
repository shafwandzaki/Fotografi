@props(['gear'])

<section id="gear" class="mb-32 min-h-screen px-4 py-16 font-sans text-white sm:px-8 lg:px-16">
    <div class="mx-auto mt-14 max-w-6xl">
        <h1 class="mb-4 text-center text-3xl font-bold sm:text-4xl md:text-5xl">Gear</h1>
        <p class="mx-auto mb-12 max-w-md text-center font-inter text-sm text-gray-400 sm:mb-16 sm:text-base">
            Berikut ini adalah beberapa gear yang saya gunakan untuk membuat karya fotografi saya
        </p>

        <div class="reveal-group grid grid-cols-2 gap-3 sm:gap-4 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($gear as $gears)
                <x-card-gear :gears="$gears" />
            @endforeach
        </div>
    </div>
</section>