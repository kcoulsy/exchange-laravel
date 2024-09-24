    <div x-data="{ currentSlide: 0, interval: null }" x-init="interval = setInterval(() => { currentSlide = (currentSlide === 4) ? 0 : currentSlide + 1 }, 5000)" @mouseover="clearInterval(interval)"
        @mouseleave="interval = setInterval(() => { currentSlide = (currentSlide === 4) ? 0 : currentSlide + 1 }, 5000)"
        class="relative h-[400px] mb-12 rounded-lg overflow-hidden container mx-auto" data-id="2">
        <template
            x-for="(image, index) in [
            { img: 'assets/homepage/welding782x200.jpg', alt: 'Promo Sell used machinery advert.', caption: 'Welcome to Exchange Machines' },
            { img: 'assets/homepage/ringRoller782x200.jpg', alt: 'Promo Rent used machinery advert.', caption: 'Find the right machinery for your needs' },
            { img: 'assets/homepage/doubleRollFormer782x200.jpg', alt: 'Promo Rent used machinery advert.', caption: 'Easy to list, easy to sell' },
            { img: 'assets/homepage/sevenStationEngelDecoiler782x200.jpg', alt: 'Promo Rent used machinery advert.', caption: 'Listing is free for a limited time, get started today' },
            { img: 'assets/homepage/dormac300Lathe782x200.jpg', alt: 'Promo Rent used machinery advert.', caption: 'Can\'t find what you need? Contact us' }
        ]"
            :key="index">
            <div x-show="currentSlide === index" class="absolute inset-0 transition-opacity duration-500"
                x-transition:enter="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="opacity-100"
                x-transition:leave-end="opacity-0">
                <img :src="image.img" :alt="image.alt" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center" data-id="4">
                    <h1 class="text-4xl md:text-6xl font-bold text-white text-center" data-id="5"
                        x-text="image.caption"></h1>
                </div>
            </div>
        </template>
        <button @click="currentSlide = (currentSlide === 0) ? 4 : currentSlide - 1"
            class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 p-2 rounded-full">‹</button>
        <button @click="currentSlide = (currentSlide === 4) ? 0 : currentSlide + 1"
            class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 p-2 rounded-full">›</button>
    </div>
