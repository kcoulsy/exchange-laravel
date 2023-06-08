const filterForm = document.getElementById("filter-form");

filterForm?.addEventListener("submit", function (e) {
    e.preventDefault();

    const selectedConditions = document.querySelectorAll(
        'input[name="condition"]:checked'
    );

    const conditions = Array.from(selectedConditions)
        .map((condition) => condition.value)
        .join(",");

    const selectedCurrencies = document.querySelectorAll(
        'input[name="currency"]:checked'
    );

    const currencies = Array.from(selectedCurrencies)
        .map((currency) => currency.value)
        .join(",");

    const minPrice = document.getElementById("price_min").value;
    const maxPrice = document.getElementById("price_max").value;

    const hidePriceOnRequest = !document.getElementById("show_por").checked;

    const url = new URL(window.location.href);

    if (!!conditions) {
        url.searchParams.set("conditions", conditions);
    } else {
        url.searchParams.delete("conditions");
    }

    if (!!currencies) {
        url.searchParams.set("currencies", currencies);
    } else {
        url.searchParams.delete("currencies");
    }

    if (!!minPrice) {
        url.searchParams.set("price_min", minPrice);
    } else {
        url.searchParams.delete("price_min");
    }

    if (!!maxPrice) {
        url.searchParams.set("price_max", maxPrice);
    } else {
        url.searchParams.delete("price_max");
    }

    if (hidePriceOnRequest) {
        url.searchParams.set("hide_por", true);
    } else {
        url.searchParams.delete("hide_por");
    }

    window.location.href = url.toString();
});
