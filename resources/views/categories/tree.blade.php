<x-app-layout>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6">All Categories</h1>
        <div class="category-tree">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($topLevelCategories as $category)
                    <div class="mb-4">
                        <a href="{{ route('categories.show', $category->slug) }}" class="font-bold">
                            {{ $category->name }}
                            <span
                                class="text-sm text-gray-600">({{ $category->listings_count + $category->recursive_listings_count }}
                                listings)</span>
                        </a>
                        @if (isset($groupedCategories[$category->id]))
                            <ul class="mt-2 space-y-1">
                                @foreach ($groupedCategories[$category->id] as $childCategory)
                                    <li>
                                        <a href="{{ route('categories.show', $childCategory->slug) }}" class="text-sm">
                                            {{ $childCategory->name }}
                                            <span
                                                class="text-xs text-gray-600">({{ $childCategory->listings_count + $childCategory->recursive_listings_count }}
                                                listings)</span>
                                        </a>
                                        @if (isset($groupedCategories[$childCategory->id]))
                                            <ul class="ml-4 mt-1 space-y-1">
                                                @foreach ($groupedCategories[$childCategory->id] as $grandChildCategory)
                                                    <li>
                                                        <a href="{{ route('categories.show', $grandChildCategory->slug) }}"
                                                            class="text-xs">
                                                            {{ $grandChildCategory->name }}
                                                            <span
                                                                class="text-xs text-gray-600">({{ $grandChildCategory->listings_count + $grandChildCategory->recursive_listings_count }}
                                                                listings)</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
