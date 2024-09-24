<x-app-layout>
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6">News</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($news as $article)
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <img src="{{ $article->getFirstMediaUrl('default', 'thumb') ?: '/placeholder.svg?height=200&width=400&text=' . urlencode($article->title) }}"
                            alt="{{ $article->title }}" width="400" height="200" class="rounded-t-lg"
                            style="aspect-ratio: 400 / 200; object-fit: cover;">
                    </div>
                    <div class="p-6">
                        <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight">
                            <a href="{{ route('news.show', $article->slug) }}">{{ $article->title }}</a>
                        </h3>
                        <p class="text-muted-foreground">{{ Str::limit(strip_tags($article->content), 150) }}</p>
                    </div>
                    <div class="flex items-center p-6">
                        <a href="{{ route('news.show', $article->slug) }}"
                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2">Read
                            More</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-6">
            {{ $news->links() }}
        </div>
    </div>
</x-app-layout>
