<x-app-layout>
    <div class="container mx-auto flex flex-col md:flex-row relative" x-data="{ filtersShownOnMobile: false }">
        <div class="top-0 left-0 z-30 w-full h-full bg-gray-950 opacity-50"
            :class="filtersShownOnMobile ? 'fixed' : 'hidden'"></div>
        <button :class="filtersShownOnMobile ? 'fixed' : 'hidden'" class="fixed left-4 top-4 z-40 bg-white"
            x-on:click="filtersShownOnMobile = !filtersShownOnMobile">
            Close
        </button>
        <button class="md:hidden" x-on:click="filtersShownOnMobile = !filtersShownOnMobile">
            Filters
        </button>
        <div class="fixed md:relative p-4 md:flex -right-full h-screen md:h-auto top-0 md:top-auto md:right-auto bg-white transform transition-all duration-200 ease-in-out md:w-3/12"
            :class="filtersShownOnMobile ? 'right-0 w-10/12 z-40' : ''">
            <x-listings-filter :parent_category="$parent_category ?? null" :category="$category ?? null" :sub_categories="$sub_categories" :conditions="$conditions" :currencies="$currencies"
                :selected_conditions="$selected_conditions" :selected_currencies="$selected_currencies" />
        </div>
        <div class="md:w-9/12 2xl:w-3/4 p-4">
            <x-listings-list :listings="$listings" />
        </div>
    </div>
</x-app-layout>
