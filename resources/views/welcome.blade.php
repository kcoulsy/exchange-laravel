<x-app-layout>
    <x-homepage.hero-carousel />

    <!-- Pass the popular listings to the popular-listings component -->
    <x-homepage.popular-listings :popularListings="$popularListings" />

    <!-- Pass the top-level categories to the category-links component -->
    <x-homepage.category-links :categories="$topLevelCategories" />

    <!-- Pass the latest listings to the recent-listings component -->
    <x-homepage.recent-listings :latestListings="$latestListings" />

    <x-homepage.why-us />
    <x-homepage.latest-news :latestNews="$latestNews" />
    <x-homepage.about-us />
</x-app-layout>
