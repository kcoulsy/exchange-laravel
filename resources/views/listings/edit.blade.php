<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update listing') }}
        </h2>
    </x-slot>
    <div class="py-12 container mx-auto">
        <livewire:edit-listing-form :listing="$listing" />
    </div>
</x-app-layout>
