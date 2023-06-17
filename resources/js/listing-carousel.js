// core version + navigation, pagination modules:
import Swiper from "swiper/bundle";
// import Swiper and modules styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

const thumbSwiper = new Swiper(".thumb-swiper", {
    spaceBetween: 4,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
    slideActiveClass: "!opacity-100",
});

// init Swiper:
const swiper = new Swiper(".main-swiper", {
    pagination: {
        el: ".swiper-pagination",
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    scrollbar: {
        el: ".swiper-scrollbar",
    },
    thumbs: {
        swiper: thumbSwiper,
        slideThumbActiveClass: "!opacity-100",
    },
});
