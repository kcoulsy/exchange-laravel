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

    <form id="filter-form" action="" class="pb-16">
        <x-filter-accordion title="Conditions">
            <div class="space-y-4">
                @foreach ($conditions as $condition)
                    <div class="flex items-center">
                        <label for="condition_{{ $condition->id }}" class="ml-3 text-sm text-gray-600">
                            <input id="condition_{{ $condition->id }}" name="condition" value="{{ $condition->id }}"
                                type="checkbox"
                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                {{ in_array($condition->id, $selected_conditions) ? 'checked="checked"' : '' }}>
                            {{ $condition->name }}
                        </label>
                    </div>
                @endforeach

            </div>
        </x-filter-accordion>
        <x-filter-accordion title="Currencies">
            <div class="space-y-4">
                @foreach ($currencies as $currency)
                    <div class="flex items-center">
                        <input id="currency_{{ $currency->id }}" name="currency" value="{{ $currency->id }}"
                            type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                            {{ in_array($currency->id, $selected_currencies) ? 'checked="checked"' : '' }}>
                        <label for="currency_{{ $currency->id }}"
                            class="ml-3 text-sm text-gray-600">{{ $currency->name }}</label>
                    </div>
                @endforeach
            </div>
        </x-filter-accordion>
        <x-filter-accordion title="Price">
            <div class="flex flex-col">
                <label class="mb-2 text-sm text-gray-600" for="price_min">Min</label>
                <x-input type="number" name="price_min" id="price_min" value="{{ $price_min }}" />

                <label class="mb-2 text-sm text-gray-600" for="price_max">Max</label>
                <x-input type="number" name="price_max" id="price_max" value="{{ $price_max }}" />

                <label for="show_por" class="my-2 text-sm text-gray-600 flex items-center">
                    <input type="checkbox" name="show_por" id="show_por" {{ $hide_por ? '' : 'checked="checked"' }}>
                    <span class="ml-2">
                        Show Price on Request listings
                    </span>
                </label>
            </div>
        </x-filter-accordion>

        <div class="flex w-full gap-2 mt-4">
            <button class="flex-1 bg-blue-500 hover:bg-blue-600 text-white text-sm py-1 px-1 rounded">
                Apply Filters
            </button>
            <a href="/{{ isset($category) ? $category->slug : 'view-all' }}"
                class="flex-1 bg-blue-500 hover:bg-blue-600 text-white text-sm py-1 px-1 rounded flex justify-center items-center">
                Clear Filters
            </a>
        </div>
    </form>
</div>
