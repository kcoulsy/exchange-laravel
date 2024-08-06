<div>
    
<form wire:submit="create">
    {{ $this->form }}

    <button type="submit"
        class="mt-4 bg-blue-500 hover:bg-blue-600 text-white text-sm font-bold py-2 px-2 rounded cursor-pointer">
        Create Listing
    </button>
</form>

    <x-filament-actions::modals />
</div>
