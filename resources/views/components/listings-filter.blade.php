@props([
    'category' => null,
    'parent_category' => null,
    'sub_categories' => [],
    'listings' => null,
    'conditions' => [],
    'currencies' => [],
    'selected_conditions' => [],
    'selected_currencies' => [],
    'price_min' => null,
    'price_max' => null,
    'hide_por' => false,
])
<div class="flex flex-col w-full">
    {{-- @if (isset($parent_category))
        <a href="/{{ $parent_category->slug }}">{{ $parent_category->name }}</a>
    @elseif (isset($category))
        <a href="/view-all">View All</a>
    @endif --}}

    <ul role="list"
        class="space-y-4 border-b border-gray-200 pb-6 text-sm font-medium text-gray-900 max-h-52 overflow-y-auto">
        @foreach ($sub_categories as $sub_category)
            @if ($sub_category->recursive_listings_count > 0)
                <li>
                    <a href="/{{ $sub_category->slug }}">{{ $sub_category->name }}
                        ({{ $sub_category->recursive_listings_count }})
                    </a>
                </li>
            @endif
        @endforeach

    </ul>

    <form id="filter-form" action="">
        <div x-data="{ open: true }" class="border-b border-gray-200 py-6">
            <h3 class="-my-3 flow-root">
                <button type="button" x-description="Expand/collapse section button"
                    class="flex w-full items-center justify-between py-3 text-sm text-gray-400 hover:text-gray-500"
                    aria-controls="filter-section-0" @click="open = !open" aria-expanded="true"
                    x-bind:aria-expanded="open.toString()">
                    <span class="font-medium text-gray-900">Conditions</span>
                    <span class="ml-6 flex items-center">
                        <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state."
                            x-show="!(open)" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                            style="display: none;">
                            <path
                                d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z">
                            </path>
                        </svg>
                        <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state."
                            x-show="open" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </button>
            </h3>
            <div class="pt-6" x-description="Filter section, show/hide based on section state." id="filter-section-0"
                x-show="open">
                <div class="space-y-4">
                    @foreach ($conditions as $condition)
                        <div class="flex items-center">
                            <label for="condition_{{ $condition->id }}" class="ml-3 text-sm text-gray-600">
                                <input id="condition_{{ $condition->id }}" name="color[]" value="purple" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                    {{ in_array($condition->id, $selected_conditions) ? 'checked="checked"' : '' }}>
                                {{ $condition->name }}
                            </label>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        <div x-data="{ open: true }" class="border-b border-gray-200 py-6">
            <h3 class="-my-3 flow-root">
                <button type="button" x-description="Expand/collapse section button"
                    class="flex w-full items-center justify-between py-3 text-sm text-gray-400 hover:text-gray-500"
                    aria-controls="filter-section-0" @click="open = !open" aria-expanded="true"
                    x-bind:aria-expanded="open.toString()">
                    <span class="font-medium text-gray-900">Currencies</span>
                    <span class="ml-6 flex items-center">
                        <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state."
                            x-show="!(open)" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                            style="display: none;">
                            <path
                                d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z">
                            </path>
                        </svg>
                        <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state."
                            x-show="open" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </button>
            </h3>
            <div class="pt-6" x-description="Filter section, show/hide based on section state." id="filter-section-0"
                x-show="open">
                <div class="space-y-4">
                    @foreach ($currencies as $currency)
                        <div class="flex items-center">
                            <input id="currency_{{ $currency->id }}" name="color[]" value="purple" type="checkbox"
                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                {{ in_array($currency->id, $selected_currencies) ? 'checked="checked"' : '' }}>
                            <label for="currency_{{ $currency->id }}"
                                class="ml-3 text-sm text-gray-600">{{ $currency->name }}</label>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        <h3 class="my-4 text-sm text-gray-900">Price</h3>

        <div class="flex flex-col">
            <label for="price_min">Min</label>
            <input type="number" name="price_min" id="price_min"
                class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                value="{{ $price_min }}">

            <label for="price_max">Max</label>
            <input type="number" name="price_max" id="price_max"
                class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                value="{{ $price_max }}">

            <label for="show_por" class="mt-1">
                <input type="checkbox" name="show_por" id="show_por" {{ $hide_por ? '' : 'checked="checked"' }}>
                Show Price on Request listings
            </label>
        </div>

        <div class="flex w-full gap-2 mt-4">
            <button class="flex-1 bg-blue-500 hover:bg-blue-600 text-white text-sm font-bold py-1 px-1 rounded">
                Apply Filters
            </button>
            <a href="/{{ isset($category) ? $category->slug : 'view-all' }}"
                class="flex-1 bg-blue-500 hover:bg-blue-600 text-white text-sm font-bold py-1 px-1 rounded flex justify-center items-center">
                Clear Filters
            </a>
        </div>
    </form>
</div>
