<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact us') }}
        </h2>
    </x-slot>
    <div class="py-12 container mx-auto">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <livewire:contact-form />
    </div>
</x-app-layout>
