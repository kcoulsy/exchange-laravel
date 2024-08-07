<x-app-layout>

    <div class="container mx-auto">
        <div class="mb-4">
            <p>
                <a href="/{{ $category->slug }}">
                    Back to {{ $category->name }}
                </a>
            </p>
        </div>
        <div class="grid md:grid-cols-2 gap-6 lg:gap-12 items-start max-w-6xl px-4 mx-auto py-6">
            <div class="grid gap-4 md:gap-8">
                <div class="overflow-hidden w-full">
                    <!-- Slider main container -->
                    <div class="swiper main-swiper overflow-hidden w-full">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            @foreach ($listing->getMedia('images') as $image)
                                <div class="swiper-slide [&>img]:object-cover [&>img]:w-full [&>img]:h-full">
                                    {{ $image }}
                                </div>
                            @endforeach
                            ...
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>

                        <!-- If we need scrollbar -->
                        <div class="swiper-scrollbar"></div>
                    </div>

                    <div class="swiper thumb-swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            @foreach ($listing->getMedia('images') as $image)
                                <div class="swiper-slide opacity-40 w-1/4">{{ $image }}</div>
                            @endforeach
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
                <div class="grid gap-4">
                    <div class="grid gap-2">
                        <h1 class="text-3xl font-bold">{{ $listing->title }}</h1>
                        <p class="text-lg font-semibold text-primary">{{ $listing->subtitle }}</p>
                        <p class="text-xl font-bold text-primary">{{ $listing->currency->symbol }}{{ $listing->price }}
                            {{ $listing->currency->code }}</p>
                        <p class="text-muted-foreground">Posted {{ $listing->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="grid gap-2">
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div class="grid gap-1">
                                <span class="text-muted-foreground">Make</span>
                                <span class="font-medium">{{ $listing->brand }}</span>
                            </div>
                            <div class="grid gap-1">
                                <span class="text-muted-foreground">Model</span>
                                <span class="font-medium">{{ $listing->model }}</span>
                            </div>
                            <div class="grid gap-1">
                                <span class="text-muted-foreground">Year</span>
                                <span class="font-medium">To Add</span>
                            </div>
                            <div class="grid gap-1">
                                <span class="text-muted-foreground">Location</span>
                                <span class="font-medium">{{ $listing->location }}</span>
                            </div>
                        </div>
                        <div class="grid gap-1 border-t border-gray-300 pt-4 mt-4">
                            <p>
                                {{ $listing->description }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="grid gap-4 md:gap-8">
                </div>
            </div>
            <div class="grid gap-4 md:gap-8" data-id="70">
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-id="71" data-v0-t="card">
                    <div class="flex flex-col py-2 p-6" data-id="72">
                        <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight" data-id="73">
                            Contact Seller</h3>
                    </div>
                    <div class="p-6" data-id="74">
                        <div class="grid gap-4" data-id="75">
                            <div class="grid gap-2" data-id="76">
                                <div class="flex items-center gap-4" data-id="77"><span
                                        class="relative flex shrink-0 overflow-hidden rounded-full w-12 h-12 border"
                                        data-id="78"><img class="aspect-square h-full w-full" data-id="79"
                                            alt="{{ $listing->user->name }}"
                                            src="{{ $listing->user->profile_photo_url }}"></span>
                                    <div class="grid gap-1" data-id="81">
                                        <h3 class="font-medium" data-id="82">{{ $listing->user->name }}</h3>
                                        <div class="flex items-center gap-2 text-muted-foreground" data-id="83"><svg
                                                data-id="84" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="w-4 h-4">
                                                <line x1="2" x2="5" y1="12" y2="12">
                                                </line>
                                                <line x1="19" x2="22" y1="12" y2="12">
                                                </line>
                                                <line x1="12" x2="12" y1="2" y2="5">
                                                </line>
                                                <line x1="12" x2="12" y1="19" y2="22">
                                                </line>
                                                <circle cx="12" cy="12" r="7"></circle>
                                            </svg><span data-id="85">Los Angeles, CA TODO - add location to
                                                user</span></div>
                                    </div>
                                </div>

                            </div>
                            <form class="grid gap-4" data-id="89">
                                <div>
                                    <x-label for="name" value="{{ __('Your Name') }}" />
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        :value="old('name')" required autofocus autocomplete="username" />
                                </div>
                                <div>
                                    <x-label for="email" value="{{ __('Email') }}" />
                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        :value="old('email')" required autofocus autocomplete="username" />
                                </div>
                                <div>
                                    <x-label for="message" value="{{ __('Your Message') }}" />
                                    <x-textarea id="message" class="block mt-1 w-full" name="message"
                                        :value="old('message')" required autofocus autocomplete="message"
                                        placeholder="Enter your message" data-id="98" />
                                </div>
                                <x-button
                                    class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-11 rounded-md px-8"
                                    data-id="99">Send Message</x-button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-id="100"
                    data-v0-t="card">
                    <div class="flex flex-col space-y-1.5 p-6" data-id="101">
                        <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight"
                            data-id="102">More from this Seller</h3>
                    </div>
                    <div class="p-6" data-id="103">
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4" data-id="104">
                            @foreach ($listing->user->listingsWithCategory->where('id', '!=', $listing->id)->take(3) as $user_listing)
                                <a data-id="105" class="group relative overflow-hidden rounded-lg shadow-lg"
                                    href="{{ route('listings.show', ['category' => $user_listing->category, 'listing' => $user_listing]) }}">
                                    {{-- <img data-id="1" src="{{ $listing->getMedia('images')->first() }}"
                                        alt="{{ $user_listing->title }}" width="300" height="200"
                                        class="aspect-[3/2] object-cover w-full group-hover:opacity-50 transition-opacity"> --}}
                                    @if ($user_listing->getMedia('images')->first())
                                        {{ $user_listing->getMedia('images')->first()->img()->attributes(['class' => 'aspect-[3/2] object-cover w-full group-hover:opacity-50 transition-opacity']) }}
                                    @endif
                                    <div class="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/80 to-transparent p-4 text-white"
                                        data-id="2">
                                        <h3 class="text-lg font-medium" data-id="3">{{ $user_listing->title }}
                                        </h3>
                                        <p class="text-sm text-muted-foreground" data-id="4">
                                            {{ $listing->currency->symbol }}{{ $listing->price }}
                                            {{ $listing->currency->code }}
                                        </p>
                                    </div>
                                </a>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-id="108"
                    data-v0-t="card">
                    <div class="flex flex-col space-y-1.5 p-6" data-id="109">
                        <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight"
                            data-id="110">Similar Listings</h3>
                    </div>
                    <div class="p-6" data-id="111">
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4" data-id="112"><a data-id="113"
                                class="group relative overflow-hidden rounded-lg shadow-lg" href="#"><img
                                    data-id="13" src="/placeholder.svg" alt="Product Image" width="300"
                                    height="200"
                                    class="aspect-[3/2] object-cover w-full group-hover:opacity-50 transition-opacity">
                                <div class="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/80 to-transparent p-4 text-white"
                                    data-id="14">
                                    <h3 class="text-lg font-medium" data-id="15">2022 Toyota Corolla LE</h3>
                                    <p class="text-sm text-muted-foreground" data-id="16">$20,000</p>
                                </div>
                            </a><a data-id="114" class="group relative overflow-hidden rounded-lg shadow-lg"
                                href="#"><img data-id="17" src="/placeholder.svg" alt="Product Image"
                                    width="300" height="200"
                                    class="aspect-[3/2] object-cover w-full group-hover:opacity-50 transition-opacity">
                                <div class="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/80 to-transparent p-4 text-white"
                                    data-id="18">
                                    <h3 class="text-lg font-medium" data-id="19">2021 Honda Civic LX</h3>
                                    <p class="text-sm text-muted-foreground" data-id="20">$23,000</p>
                                </div>
                            </a><a data-id="115" class="group relative overflow-hidden rounded-lg shadow-lg"
                                href="#"><img data-id="21" src="/placeholder.svg" alt="Product Image"
                                    width="300" height="200"
                                    class="aspect-[3/2] object-cover w-full group-hover:opacity-50 transition-opacity">
                                <div class="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/80 to-transparent p-4 text-white"
                                    data-id="22">
                                    <h3 class="text-lg font-medium" data-id="23">2023 Nissan Sentra SV</h3>
                                    <p class="text-sm text-muted-foreground" data-id="24">$19,500</p>
                                </div>
                            </a></div>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
