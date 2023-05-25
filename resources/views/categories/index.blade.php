<x-app-layout>
    <div class="container mx-auto flex">
        <div class="md:w-3/12 2xl:w-1/4 w-full">
            @if (isset($parent_category))
                <a href="/{{ $parent_category->slug }}">{{ $parent_category->name }}</a>
            @elseif (isset($category))
                <a href="/view-all">View All</a>
            @endif

            @if (isset($category))
                <h3 class="text-xl">{{ $category->name }}
                    {{ $listings->total() > 0 ? ' (' . $listings->total() . ')' : '' }}
                </h3>
            @endif

            <ul class="pl-2">

                @foreach ($sub_categories as $sub_category)
                    <li>
                        <a href="/{{ $sub_category->slug }}">{{ $sub_category->name }}{{ $sub_category->listings_count > 0 ? ' (' . $sub_category->listings_count . ')' : '' }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="md:w-9/12 2xl:w-3/4">
            {{ $listings->links() }}
            <div class="flex flex-col gap-4 mt-4">
                @foreach ($listings as $listing)
                    <div class="md:flex items-strech p-2 border-gray-50 rounded-md bg-gray-200">
                        <div class="md:w-3/12 2xl:w-1/4 w-full border-gray-50 rounded-md border overflow-hidden">
                            {{ $listing->getFirstMedia() }}
                        </div>
                        <div class="md:pl-3 md:w-9/12 2xl:w-3/4 flex flex-col">
                            <h4 class="text-xl leading-8 text-gray-800 md:pt-0 pt-4">{{ $listing->title }}</h4>
                            <p class="text-lg leading-8 text-gray-800 md:pt-0 pt-4">{{ $listing->subtitle }}</p>
                            <p class="text-xs leading-8 text-gray-600 pt-2">{{ $listing->model }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
