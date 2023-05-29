@props([
    'category' => null,
    'parent_category' => null,
    'sub_categories' => [],
    'conditions' => [],
    'currencies' => [],
    'selected_conditions' => [],
    'selected_currencies' => [],
    'price_min' => null,
    'price_max' => null,
    'hide_por' => false,
])
<div class="flex flex-col">
    @if (isset($parent_category))
        <a href="/{{ $parent_category->slug }}">{{ $parent_category->name }}</a>
    @elseif (isset($category))
        <a href="/view-all">View All</a>
    @endif

    @if (isset($category))
        <h3 class="text-xl mt-4">{{ $category->name }}
            {{ $listings->total() > 0 ? ' (' . $listings->total() . ')' : '' }}
        </h3>
    @endif

    <div class="bg-gray-200">
        <ul class="pl-2 max-h-52 overflow-y-auto">

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
    </div>
    <form id="filter-form" action="">

        <h2 class="text-xl font-bold mt-4">Filters</h2>
        <h3 class="mt-2">Conditions</h3>

        <div class="flex flex-col">
            @foreach ($conditions as $condition)
                <label for="condition_{{ $condition->id }}">
                    <input type="checkbox" name="condition" id="condition_{{ $condition->id }}"
                        value="{{ $condition->id }}"
                        {{ in_array($condition->id, $selected_conditions) ? 'checked="checked"' : '' }}>
                    {{ $condition->name }}
                </label>
            @endforeach
        </div>

        <h3 class="mt-4">Currencies</h3>

        <div class="flex flex-col">
            @foreach ($currencies as $currency)
                <label for="currency_{{ $currency->id }}">
                    <input type="checkbox" name="currency" id="currency_{{ $currency->id }}"
                        value="{{ $currency->id }}"
                        {{ in_array($currency->id, $selected_currencies) ? 'checked="checked"' : '' }}>
                    {{ $currency->name }}
                </label>
            @endforeach
        </div>

        <h3 class="mt-4">Price</h3>

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
