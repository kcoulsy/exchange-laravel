import "./bootstrap";
import autocomplete from "autocompleter";
import Alpine from "alpinejs";
import focus from "@alpinejs/focus";
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

var countries = [
    { label: "United Kingdom", value: "UK" },
    { label: "United States", value: "US" },
];

var input = document.getElementById("global-search");

autocomplete({
    input: input,
    disableAutoSelect: true,
    debounceWaitMs: 200,
    fetch: function (text, update) {
        fetch("/api/global-search?query=" + text).then(function (response) {
            response.json().then(function (data) {
                const searchData = [
                    ...data.categories.map((category) => {
                        return {
                            label: category.name,
                            value: `/${category.slug}`,
                            group: "Categories",
                        };
                    }),
                    ...data.listings.map((listing) => {
                        return {
                            label: listing.title,
                            value: `/${listing.category.slug}/${listing.slug}`,
                            group: "Listings",
                        };
                    }),
                ];

                update(searchData);
            });
        });
    },
    render: function (item, currentValue, ...args) {
        const div = document.createElement("a");
        div.textContent = item.label;
        div.setAttribute("href", item.value);
        div.classList.add(
            "block",
            "bg-gray-100",
            "p-2",
            "cursor-pointer",
            "hover:bg-blue-200",
            "group-[.selected]:bg-blue-200",
            "aria-selected:bg-blue-200"
        );
        return div;
    },
    renderGroup: function (groupName, currentValue) {
        var div = document.createElement("div");
        div.textContent = groupName;
        div.classList.add("bg-gray-200", "p-2", "border", "border-gray-100");
        return div;
    },
    onSelect: function (item, ...x) {
        window.location.href = item.value;
    },
});
