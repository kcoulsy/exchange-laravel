@props(['title'])
<div x-data="{ open: true }" class="border-b border-gray-200 py-6">
    <h3 class="-my-3 flow-root">
        <button type="button" x-description="Expand/collapse section button"
            class="flex w-full items-center justify-between py-3 text-sm text-gray-400 hover:text-gray-500"
            aria-controls="filter-section-0" @click="open = !open" aria-expanded="true"
            x-bind:aria-expanded="open.toString()">
            <span class="font-medium text-gray-900">{{ $title }}</span>
            <span class="ml-6 flex items-center">
                <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state."
                    x-show="!(open)" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;">
                    <path
                        d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z">
                    </path>
                </svg>
                <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state."
                    x-show="open" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                        clip-rule="evenodd"></path>
                </svg>
            </span>
        </button>
    </h3>
    <div class="pt-6" x-description="Filter section, show/hide based on section state." id="filter-section-0"
        x-show="open">
        {{ $slot }}
    </div>
</div>
