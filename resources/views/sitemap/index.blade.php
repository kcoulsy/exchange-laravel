<x-app-layout>

    <div class="container mx-auto p-4">

        <h1 class="text-4xl my-4">
            Sitemap
        </h1>
        <h2 class="text-2xl my-4">
            Categories
        </h2>
        <ul>
            @foreach ($categories as $category)
                {{-- @dd($category); --}}
                <li>
                    <a href="{{ route('categories.show', $category) }}">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
