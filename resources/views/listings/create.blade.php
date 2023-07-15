<x-app-layout with_filament="true">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a listing') }}
        </h2>
    </x-slot>
    <div class="relative">
        <div class="py-12 container mx-auto">
            <livewire:create-listing-form />
        </div>
    </div>
</x-app-layout>
