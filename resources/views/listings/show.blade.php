<x-app-layout>

    <div class="container mx-auto">
        <div class="mb-4">
            <p>
                <a href="/{{ $category->slug }}">
                    Back to {{ $category->name }}
                </a>
            </p>
        </div>
        <h1>{{ $listing->title }}</h1>
    </div>

</x-app-layout>
