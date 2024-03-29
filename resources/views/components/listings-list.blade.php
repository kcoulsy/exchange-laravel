@props(['listings'])
<div>
    {{ $listings->links() }}
</div>
<div class="flex flex-col gap-4 mt-4">
    @if (!count($listings))
        <div class="flex flex-col items-center justify-center">
            <p class="text-gray-600 text-lg">No listings found</p>
        </div>
    @endif
    @foreach ($listings as $listing)
        <a href="{{ $listing->getUrl() }}">
            <div class="md:flex items-strech p-2 border-gray-50 rounded-md bg-gray-200">
                <div class="md:w-3/12 2xl:w-1/4 w-full border-gray-50 rounded-md border overflow-hidden">

                    {{ $listing->getFirstMedia('images') }}
                </div>
                <div class="md:pl-3 md:w-9/12 2xl:w-3/4 flex flex-col">
                    <h4 class="text-xl leading-8 text-gray-800 md:pt-0 pt-4">
                        {{ $listing->title }}
                    </h4>
                    <p class="text-lg leading-8 text-gray-800 md:pt-0 pt-4">{{ $listing->subtitle }}</p>
                    <p class="text-xs leading-8 text-gray-600 pt-2">{{ $listing->model }}</p>
                </div>
                <p class="text-xs leading-8 text-gray-600 pt-2">
                    {{ $listing->is_por ? 'Price On Requst' : $listing->price }}</p>
            </div>
        </a>
    @endforeach
</div>
