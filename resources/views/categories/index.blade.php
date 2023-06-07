<x-app-layout>

    <div class="container mx-auto flex flex-col relative" x-data="{ filtersShownOnMobile: false }">
        <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-16">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900">
                @if (isset($category))
                    {{ $category->name }}
                    {{ $listings->total() > 0 ? ' (' . $listings->total() . ')' : '' }}
                @else
                    View All
                @endif
            </h1>

        </div>
        <div class="top-0 left-0 z-30 w-full h-full bg-gray-950 opacity-50"
            :class="filtersShownOnMobile ? 'fixed' : 'hidden'"></div>
        <button :class="filtersShownOnMobile ? 'fixed' : 'hidden'" class="fixed left-4 top-4 z-40 bg-white"
            x-on:click="filtersShownOnMobile = !filtersShownOnMobile">
            Close
        </button>
        <button class="md:hidden" x-on:click="filtersShownOnMobile = !filtersShownOnMobile">
            Filters
        </button>

        <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
            <div class="fixed md:relative p-4 md:flex -right-full h-screen md:h-auto top-0 md:top-auto md:right-auto transform transition-all duration-200 ease-in-out"
                :class="filtersShownOnMobile ? 'right-0 w-10/12 z-40' : ''">
                <x-listings-filter :listings="$listings ?? null" :parent_category="$parent_category ?? null" :category="$category ?? null" :sub_categories="$sub_categories"
                    :conditions="$conditions" :currencies="$currencies" :selected_conditions="$selected_conditions" :selected_currencies="$selected_currencies" />
            </div>

            <!-- Product grid -->
            <div class="lg:col-span-3">
                <x-listings-list :listings="$listings" />
            </div>
        </div>

    </div>
</x-app-layout>
