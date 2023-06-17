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
        <div class="w-1/3 h-60">
            <!-- Slider main container -->
            <div class="swiper main-swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($listing->getMedia('images') as $image)
                        <div class="swiper-slide [&>img]:object-cover [&>img]:w-full [&>img]:h-full">{{ $image }}
                        </div>
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

            <div class="swiper thumb-swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($listing->getMedia('images') as $image)
                        <div class="swiper-slide opacity-40 w-1/4">{{ $image }}</div>
                    @endforeach
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>

</x-app-layout>
