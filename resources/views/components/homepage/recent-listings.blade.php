<div class="container mx-auto mb-8">
    <h2 class="text-2xl font-bold mb-4">Recent Listings</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($latestListings as $listing)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <a href="{{ $listing->getUrl() }}">
                    <img class="w-full h-48 object-cover" src="{{ $listing->getFirstMediaUrl('images') }}"
                        alt="{{ $listing->title }}">
                    <div class="p-4 space-y-1">
                        <h3 class="text-lg font-semibold">{{ $listing->title }}</h3>
                        <p class="text-gray-600 text-sm">{{ $listing->subtitle }}</p>
                        @if (!$listing->is_por)
                            <p class="text-gray-800 font-bold">{{ $listing->price }} {{ $listing->currency->code }}</p>
                        @else
                            <p class="text-gray-800 font-bold">POA</p>
                        @endif
                        <p class="text-gray-500 text-sm">{{ $listing->category->name }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
