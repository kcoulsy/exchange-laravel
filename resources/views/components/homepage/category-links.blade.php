<div class="flex flex-wrap gap-2 container mx-auto justify-center mb-10">
    @foreach ($categories as $category)
        <a href="{{ route('categories.show', $category) }}" >
            <div class="px-4 py-4 border border-gray-300 rounded-md bg-blue-700 text-white font-semibold">
                {{ $category->name }}
            </div>
        </a>
    @endforeach
</div>
