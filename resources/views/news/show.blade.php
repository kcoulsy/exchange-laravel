<x-app-layout>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold">{{ $news->title }}</h1>
        <p class="text-sm text-gray-500">By {{ $news->user->name }} on {{ $news->created_at->format('F j, Y') }}</p>
        <div class="mt-4">
            {!! $news->content !!}
        </div>
    </div>
</x-app-layout>
