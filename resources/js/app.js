import Alpine from "alpinejs";
import Focus from "@alpinejs/focus";
import FormsAlpinePlugin from "../../vendor/filament/forms/dist/module.esm";
import NotificationsAlpinePlugin from "../../vendor/filament/notifications/dist/module.esm";
import "./global-search";
import "./filters";
import Cookies from "js-cookie";

Alpine.plugin(Focus);
Alpine.plugin(FormsAlpinePlugin);
Alpine.plugin(NotificationsAlpinePlugin);

window.Alpine = Alpine;

Alpine.start();

window.allowCookies = function () {
    console.log("allowCookies");
    Cookies.set("cookie_consent", "all", { expires: 365 });
    setupAnalytics();
};

window.denyCookies = function () {
    console.log("denyCookies");
    Cookies.set("cookie_consent", "essential", { expires: 365 });
};

function setupAnalytics() {
    console.log("setupAnalytics");

    const newScript = document.createElement("script");
    newScript.type = "text/javascript";
    newScript.setAttribute("async", "true");
    newScript.setAttribute(
        "src",
        "https://www.googletagmanager.com/gtag/js?id=G-4T5JJW71G4"
    );
    document.documentElement.firstChild.appendChild(newScript);

    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag("js", new Date());

    gtag("config", "G-4T5JJW71G4");
}

if (Cookies.get("cookie_consent") === "all") {
    setupAnalytics();
}
