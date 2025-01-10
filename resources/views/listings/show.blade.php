<x-app-layout>
    <div class="container mx-auto py-8">
        <div class="mb-4">
            <a href="/{{ $category->slug }}" class="font-semibold">
                Back to {{ $category->name }}
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Left Column - Images -->
            <x-listing-carousel :images="$listing->getMedia('images')" />

            <!-- Right Column - Details -->
            <div class="space-y-4">
                <div class="space-y-4 bg-white p-4 rounded-lg border shadow-sm">
                    <h1 class="text-2xl font-bold">{{ $listing->title }}</h1>
                    <p class="text-3xl font-semibold text-green-600">
                        {{ $listing->currency->symbol }}{{ $listing->price }} {{ $listing->currency->code }}
                    </p>
                    <p class="text-gray-600">Posted {{ $listing->created_at->diffForHumans() }}</p>
                </div>

                <!-- Seller Card -->
                <div class="rounded-lg border bg-white text-card-foreground shadow-sm">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold mb-2">Seller Information</h2>
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="font-medium">{{ $listing->user->name }}</span>
                        </div>
                        <p class="text-sm text-gray-600">Member since: {{ $listing->user->created_at->format('M Y') }}</p>
                        <p class="text-sm text-gray-600">Location: {{ $listing->location }}</p>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="rounded-lg border bg-white text-card-foreground shadow-sm">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-4">Contact Seller</h2>
                        <form class="space-y-4">
                            <div>
                                <x-label for="name" value="{{ __('Name') }}" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            </div>
                            <div>
                                <x-label for="email" value="{{ __('Email') }}" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                            </div>
                            <div>
                                <x-label for="message" value="{{ __('Message') }}" />
                                <x-textarea id="message" class="block mt-1 w-full" name="message" rows="4" required />
                            </div>
                            <x-button class="w-full">
                                Send Message
                            </x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Description and Details Section -->
        <div class="space-y-4 mt-4">
            <section class="rounded-lg border bg-white text-card-foreground shadow-sm p-4">
                <h2 class="text-2xl font-bold mb-4">Description</h2>
                <p class="text-gray-700">{{ $listing->description }}</p>
            </section>

            <!-- Additional sections for specifications, etc. can be added here -->
            <section class="rounded-lg border bg-white text-card-foreground shadow-sm p-4">
                <h2 class="text-2xl font-bold mb-4">Specifications</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-2">
                    <div class="bg-gray-50 p-3 rounded border border-gray-200"><span class="font-semibold">Stock:</span> 6956</div>
                    <div class="bg-gray-50 p-3 rounded border border-gray-200"><span class="font-semibold">Manufacturer:</span> Accurpress</div>
                    <div class="bg-gray-50 p-3 rounded border border-gray-200"><span class="font-semibold">Model:</span> 717512</div>
                    <div class="bg-gray-50 p-3 rounded border border-gray-200"><span class="font-semibold">Age:</span> 1997</div>
                    <div class="bg-gray-50 p-3 rounded border border-gray-200"><span class="font-semibold">Bed and Ram Length:</span> 144"</div>
                    <div class="bg-gray-50 p-3 rounded border border-gray-200"><span class="font-semibold">Distance Between Housings:</span> 124"</div>
                    <div class="bg-gray-50 p-3 rounded border border-gray-200"><span class="font-semibold">Max Tonnage Capacity:</span> 175 TONS</div>
                    <div class="bg-gray-50 p-3 rounded border border-gray-200"><span class="font-semibold">Approach / Bend Speed:</span> 90 IPM / 24 IPM</div>
                    <div class="bg-gray-50 p-3 rounded border border-gray-200"><span class="font-semibold">Return Speed:</span> 180 IPM</div>
                    <div class="bg-gray-50 p-3 rounded border border-gray-200"><span class="font-semibold">Stroke Length:</span> 8"</div>
                    <div class="bg-gray-50 p-3 rounded border border-gray-200"><span class="font-semibold">Throat:</span> 10"</div>
                    <div class="bg-gray-50 p-3 rounded border border-gray-200"><span class="font-semibold">Shut Height - Ram Up Stroke Down:</span> 6"</div>
                    <div class="bg-gray-50 p-3 rounded border border-gray-200"><span class="font-semibold">Backgauge X-Axis Travel:</span> 30"</div>
                    <div class="bg-gray-50 p-3 rounded border border-gray-200"><span class="font-semibold">Drive Motor:</span> 20 HP</div>
                </div>
            </section>
            @php
                $otherListings = $listing->user->listingsWithCategory->where('id', '!=', $listing->id)->take(3);

            @endphp
            @if($otherListings->isNotEmpty())
            <section class="rounded-lg border bg-white text-card-foreground shadow-sm">
                <div class="flex flex-col space-y-1.5 p-6">
                    <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight">More from this Seller</h3>
                </div>
                <div class="p-6">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($otherListings as $user_listing)
                            <a class="group relative overflow-hidden rounded-lg shadow-lg h-48" href="{{ route('listings.show', ['category' => $user_listing->category, 'listing' => $user_listing]) }}">
                                @if ($user_listing->getMedia('images')->first())
                                    {{ $user_listing->getMedia('images')->first()->img()->attributes(['class' => 'aspect-[3/2] object-cover w-full h-full group-hover:opacity-50 transition-opacity']) }}
                                @endif
                                <div class="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/80 to-transparent p-4 text-white">
                                    <h3 class="text-lg font-medium">{{ $user_listing->title }}</h3>
                                    <p class="text-sm text-muted-foreground">
                                        {{ $listing->currency->symbol }}{{ $listing->price }}
                                        {{ $listing->currency->code }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
            @endif

            <section class="rounded-lg border bg-white text-card-foreground shadow-sm">
                <div class="flex flex-col space-y-1.5 p-6">
                    <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight">Similar Listings</h3>
                </div>
                <div class="p-6">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <a class="group relative overflow-hidden rounded-lg shadow-lg" href="#">
                            <img src="/placeholder.svg" alt="Product Image" width="300" height="200" class="aspect-[3/2] object-cover w-full group-hover:opacity-50 transition-opacity">
                            <div class="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/80 to-transparent p-4 text-white">
                                <h3 class="text-lg font-medium">2022 Toyota Corolla LE</h3>
                                <p class="text-sm text-muted-foreground">$20,000</p>
                            </div>
                        </a>
                        <a class="group relative overflow-hidden rounded-lg shadow-lg" href="#">
                            <img src="/placeholder.svg" alt="Product Image" width="300" height="200" class="aspect-[3/2] object-cover w-full group-hover:opacity-50 transition-opacity">
                            <div class="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/80 to-transparent p-4 text-white">
                                <h3 class="text-lg font-medium">2021 Honda Civic LX</h3>
                                <p class="text-sm text-muted-foreground">$23,000</p>
                            </div>
                        </a>
                        <a class="group relative overflow-hidden rounded-lg shadow-lg" href="#">
                            <img src="/placeholder.svg" alt="Product Image" width="300" height="200" class="aspect-[3/2] object-cover w-full group-hover:opacity-50 transition-opacity">
                            <div class="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/80 to-transparent p-4 text-white">
                                <h3 class="text-lg font-medium">2023 Nissan Sentra SV</h3>
                                <p class="text-sm text-muted-foreground">$19,500</p>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
