<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a listing') }}
        </h2>
    </x-slot>
    <div class="py-12 container mx-auto">

        <livewire:create-listing-form />
    </div>
</x-app-layout>
