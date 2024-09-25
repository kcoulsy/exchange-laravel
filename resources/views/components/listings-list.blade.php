@props(['listings'])
<div>
    {{ $listings->onEachSide(2)->links() }}
</div>
<div class="flex flex-col gap-4 mt-4">
    @if (!count($listings))
        <div class="flex flex-col items-center justify-center">
            <p class="text-gray-600 text-lg">No listings found</p>
        </div>
    @endif
    @foreach ($listings as $listing)
        <a href="{{ $listing->getUrl() }}">
            <div class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden" data-id="22"
                data-v0-t="card">
                <div class="p-0" data-id="23">
                    <div class="flex flex-col md:flex-row" data-id="24">
                        <div class="relative w-full md:w-1/3 aspect-video" data-id="25">
                            @if ($listing->hasMedia('images'))
                                {{ $listing->getFirstMedia('images')->img()->attributes(['class' => 'object-cover w-full h-full', 'alt' => $listing->title]) }}
                            @else
                                <img src="{{ asset('assets/images/placeholder-310x220.png') }}"
                                    class="object-cover w-full h-full" alt="Placeholder image">
                            @endif
                            <div class="absolute top-2 right-2 bg-white rounded-full p-1" data-id="27">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-camera w-4 h-4"
                                    data-id="28">
                                    <path
                                        d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z">
                                    </path>
                                    <circle cx="12" cy="13" r="3"></circle>
                                </svg>
                                <span class="text-xs" data-id="29">{{ $listing->getMedia('images')->count() }}</span>
                            </div>
                        </div>
                        <div class="p-4 flex-1" data-id="30">
                            <h2 class="text-xl font-semibold" data-id="31">{{ $listing->title }}</h2>
                            <p class="text-muted-foreground" data-id="32">{{ $listing->subtitle }}</p>
                            <div class="mt-2 space-y-1" data-id="33">
                                <p data-id="34"><span class="font-semibold" data-id="35">Make:</span>
                                    {{ $listing->brand->name }}</p>
                                <p data-id="36"><span class="font-semibold" data-id="37">Model:</span>
                                    {{ $listing->model }}</p>
                                <p class="flex items-center" data-id="38">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-map-pin w-4 h-4 mr-1" data-id="39">
                                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    {{ $listing->location }}
                                </p>
                            </div>
                            <div class="mt-4 flex justify-between items-center" data-id="40">
                                <p class="text-2xl font-bold flex items-center" data-id="41">
                                    {{ $listing->currency->symbol }}
                                    {{ $listing->is_por ? 'Price On Request' : $listing->price }}
                                </p>
                                <div class="flex items-center text-muted-foreground" data-id="43">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-file-text w-4 h-4 mr-1" data-id="44">
                                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                        <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                        <path d="M10 9H8"></path>
                                        <path d="M16 13H8"></path>
                                        <path d="M16 17H8"></path>
                                    </svg>
                                    <span class="text-sm" data-id="45">Docs available</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
</div>
