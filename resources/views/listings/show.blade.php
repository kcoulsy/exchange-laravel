<x-app-layout>

    <div class="container mx-auto">
        <div class="mb-4">
            <p>
                <a href="/{{ $category->slug }}">
                    Back to {{ $category->name }}
                </a>
            </p>
        </div>
        <h1>{{ $listing->title }}</h1>
        {{-- @dd($listing->getMedia('images')) --}}
        @foreach ($listing->getMedia('images') as $image)
            {{ $image }}
        @endforeach
        <!-- Slider main container -->
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach ($listing->getMedia('images') as $image)
                    <div class="swiper-slide">{{ $image }}</div>
                @endforeach
                ...
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>
    </div>

</x-app-layout>
