<section class="mb-12 container mx-auto">
    <h2 class="text-3xl font-bold mb-6">Popular Listings</h2>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        @foreach ($popularListings as $listing)
            <a href="{{ $listing->getUrl() }}" class="rounded-lg border bg-card text-card-foreground shadow-sm hover:shadow-md transition-shadow duration-300" data-v0-t="card">
                <div class="flex flex-col space-y-1.5 p-6">
                    <img class="w-full h-48 object-cover" src="{{ $listing->getFirstMediaUrl('images') }}"
                        alt="{{ $listing->title }}">
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-semibold leading-none tracking-tight">
                        {{ $listing->title }}</h3>
                    @if (!$listing->is_por)
                        <p class="text-gray-800 font-bold">{{ $listing->price }} {{ $listing->currency->code }}</p>
                    @else
                        <p class="text-gray-800 font-bold">POA</p>
                    @endif
                    <p class="text-gray-500 text-sm">{{ $listing->category->name }}</p>
                </div>
            </a>
        @endforeach
    </div>
</section>
