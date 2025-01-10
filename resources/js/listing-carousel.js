// core version + navigation, pagination modules:
import Swiper from "swiper/bundle";
// import Swiper and modules styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "swiper/css/bundle";  // Import all Swiper styles

// Wait for DOM to be loaded
document.addEventListener('DOMContentLoaded', () => {
    const slides = document.querySelectorAll('.swiper-slide');
    
    if (slides.length > 1) {
        
        // Initialize thumbnail swiper first
        const thumbSwiper = new Swiper(".thumb-swiper", {
            
            slidesPerView: "auto",
            freeMode: true,
            watchSlidesProgress: true,
            slideActiveClass: "!opacity-100",
            navigation: {
                nextEl: ".thumb-button-next",
                prevEl: ".thumb-button-prev",
            },
        });

        // Initialize main swiper
        const mainSwiper = new Swiper(".main-swiper", {
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                type: "bullets",
                clickable: true,
            },
            thumbs: {
                swiper: thumbSwiper,
            },
        });
    }
});
