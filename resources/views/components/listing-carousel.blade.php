@props(['images'])

<div class="space-y-6">
    @if($images->count() > 1)
        <div class="relative">
            <!-- Main Swiper -->
            <div class="main-swiper swiper select-none">
                <div class="swiper-wrapper">
                    @foreach ($images as $key => $image)
                        <div class="swiper-slide aspect-square {{ $key === 0 ? 'swiper-slide-active' : '' }}">
                            {{ $image->img()->attributes(['class' => 'rounded-lg object-cover w-full h-full pointer-events-none']) }}
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev swiper-button-disabled"></div>
                <div class="swiper-pagination">
                    @foreach ($images as $key => $image)
                        <span class="swiper-pagination-bullet {{ $key === 0 ? 'swiper-pagination-bullet-active' : '' }}"></span>
                    @endforeach
                </div>
            </div>
        </div>
        
        <!-- Thumbnail Swiper -->
        <div class="thumb-swiper swiper w-full select-none relative">
            <div class="swiper-wrapper gap-2 flex">
                @foreach ($images as $key => $image)
                    <div class="swiper-slide !w-24 cursor-pointer {{ $key === 0 ? 'swiper-slide-thumb-active' : '' }}">
                        {{ $image->img()->attributes(['class' => 'rounded-md aspect-square object-cover pointer-events-none']) }}
                    </div>
                @endforeach
            </div>
            <div class="thumb-button-prev absolute left-0 top-1/2 -translate-y-1/2 bg-black/30 rounded-full p-1 cursor-pointer z-10">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </div>
            <div class="thumb-button-next absolute right-0 top-1/2 -translate-y-1/2 bg-black/30 rounded-full p-1 cursor-pointer z-10">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </div>
        </div>
    @else
        <div class="relative aspect-square">
            @if ($images->first())
                {{ $images->first()->img()->attributes(['class' => 'rounded-lg object-cover w-full h-full']) }}
            @endif
        </div>
        
        <!-- Static Thumbnail -->
        <div class="w-full">
            @if ($images->first())
                <div class="!w-24">
                    {{ $images->first()->img()->attributes(['class' => 'rounded-md aspect-square object-cover']) }}
                </div>
            @endif
        </div>
    @endif
</div>

<style>
    .thumb-swiper .swiper-slide {
        opacity: 0.4 !important;
        transition: opacity 0.3s ease;
    }
    
    .thumb-swiper .swiper-slide-thumb-active {
        opacity: 1 !important;
    }

    /* Prevent Swiper from overriding the gap */
    .thumb-swiper .swiper-wrapper {
        gap: 0.5rem !important;
    }

    /* Navigation buttons */
    .swiper-button-next,
    .swiper-button-prev {
        color: white !important;
        background: rgba(0, 0, 0, 0.3);
        width: 2.5rem !important;
        height: 2.5rem !important;
        border-radius: 9999px;
    }

    .swiper-button-next:after,
    .swiper-button-prev:after {
        font-size: 1rem !important;
    }

    /* Pagination bullets */
    .swiper-pagination-bullet {
        background: white !important;
        opacity: 0.6;
    }

    .swiper-pagination-bullet-active {
        opacity: 1;
    }

    /* Add hover effect for thumbnail navigation */
    .thumb-button-prev,
    .thumb-button-next {
        opacity: 0;
        transition: opacity 0.2s ease;
    }

    .thumb-swiper:hover .thumb-button-prev,
    .thumb-swiper:hover .thumb-button-next {
        opacity: 1;
    }

    /* Add disabled state for navigation */
    .swiper-button-disabled {
        opacity: 0.35 !important;
        cursor: auto;
        pointer-events: none;
    }

    /* Add initial pagination bullet styles */
    .swiper-pagination {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
    }

    .swiper-pagination-bullet {
        width: 8px;
        height: 8px;
        display: inline-block;
        border-radius: 50%;
        background: white !important;
        opacity: 0.6;
        cursor: pointer;
    }

    .swiper-pagination-bullet-active {
        opacity: 1;
    }
</style>

@vite(['resources/js/listing-carousel.js']) 