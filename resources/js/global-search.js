import autocomplete from "autocompleter";

const input = document.getElementById("global-search");
const mobileInput = document.getElementById("global-search-mobile");

setup(input);
setup(mobileInput);

function setup(input) {
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
                                group: "Category",
                            };
                        }),
                        ...data.listings.map((listing) => {
                            return {
                                label: listing.title,
                                value: `/${listing.category.slug}/${listing.slug}`,
                                group: "Listing",
                            };
                        }),
                    ];

                    update(searchData);
                });
            });
        },
        render: function (item, currentValue, ...args) {
            console.log({ item, currentValue, args });
            const div = document.createElement("a");
            div.textContent = `${item.group} - ${item.label}`;
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
            // div.textContent = groupName;
            // div.classList.add(
            //     "bg-gray-200",
            //     "p-2",
            //     "border",
            //     "border-gray-100"
            // );
            return div;
        },
        onSelect: function (item, ...x) {
            window.location.href = item.value;
        },
    });
}
