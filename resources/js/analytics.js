import Cookies from "js-cookie";

window.getShouldShowCookieBanner = function () {
    console.log("getShouldShowCookieBanner");
    return Cookies.get("cookie_consent") === undefined;
};

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
    const gtId = import.meta.env.VITE_GOOGLE_TAG_ID;
    const clarityId = import.meta.env.VITE_MS_CLARITY_ID;

    const newScript = document.createElement("script");
    newScript.type = "text/javascript";
    newScript.setAttribute("async", "true");
    newScript.setAttribute(
        "src",
        "https://www.googletagmanager.com/gtag/js?id=" + gtId
    );
    document.documentElement.firstChild.appendChild(newScript);

    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag("js", new Date());

    gtag("config", gtId);

    (function (c, l, a, r, i, t, y) {
        c[a] =
            c[a] ||
            function () {
                (c[a].q = c[a].q || []).push(arguments);
            };
        t = l.createElement(r);
        t.async = 1;
        t.src = "https://www.clarity.ms/tag/" + i;
        y = l.getElementsByTagName(r)[0];
        y.parentNode.insertBefore(t, y);
    })(window, document, "clarity", "script", clarityId);
}

if (Cookies.get("cookie_consent") === "all") {
    setupAnalytics();
}
