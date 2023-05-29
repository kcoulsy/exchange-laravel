@props(['listings'])
<div>
    {{ $listings->links() }}
</div>
<div class="flex flex-col gap-4 mt-4">
    @foreach ($listings as $listing)
        <div class="md:flex items-strech p-2 border-gray-50 rounded-md bg-gray-200">
            <div class="md:w-3/12 2xl:w-1/4 w-full border-gray-50 rounded-md border overflow-hidden">
                {{ $listing->getFirstMedia() }}
            </div>
            <div class="md:pl-3 md:w-9/12 2xl:w-3/4 flex flex-col">
                <h4 class="text-xl leading-8 text-gray-800 md:pt-0 pt-4">
                    <a href="{{ $listing->getUrl() }}">
                        {{ $listing->title }}
                    </a>
                </h4>
                <p class="text-lg leading-8 text-gray-800 md:pt-0 pt-4">{{ $listing->subtitle }}</p>
                <p class="text-xs leading-8 text-gray-600 pt-2">{{ $listing->model }}</p>
            </div>
            <p class="text-xs leading-8 text-gray-600 pt-2">
                {{ $listing->is_por ? 'Price On Requst' : $listing->price }}</p>
        </div>
    @endforeach
</div>
