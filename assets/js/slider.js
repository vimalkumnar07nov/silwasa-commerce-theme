/**
 * Silwasa Commerce Theme
 * Hero Slider
 */

document.addEventListener("DOMContentLoaded", function () {

    const slider = document.getElementById("swc-hero-slider");

    if (!slider) {
        return;
    }

    const slides = slider.querySelectorAll(".swc-hero-slide");
    const dots = document.querySelectorAll(".swc-hero-dot");

    const prevBtn = document.getElementById("swc-hero-prev");
    const nextBtn = document.getElementById("swc-hero-next");

    let current = 0;
    let autoplay = null;

    //-------------------------------------------------------
    // Show Slide
    //-------------------------------------------------------

    function showSlide(index) {

        if (index >= slides.length) {
            index = 0;
        }

        if (index < 0) {
            index = slides.length - 1;
        }

        slides.forEach(function (slide) {

            slide.classList.add("hidden");
            slide.classList.remove("flex", "opacity-100");

        });

        dots.forEach(function (dot) {

            dot.classList.remove("w-8", "bg-white");
            dot.classList.add("w-2.5", "bg-white/50");

        });

        slides[index].classList.remove("hidden");
        slides[index].classList.add("flex", "opacity-100");

        if (dots[index]) {

            dots[index].classList.remove("w-2.5", "bg-white/50");
            dots[index].classList.add("w-8", "bg-white");

        }

        current = index;

    }

    //-------------------------------------------------------
    // Next
    //-------------------------------------------------------

    function nextSlide() {

        showSlide(current + 1);

    }

    //-------------------------------------------------------
    // Previous
    //-------------------------------------------------------

    function prevSlide() {

        showSlide(current - 1);

    }

    //-------------------------------------------------------
    // Autoplay
    //-------------------------------------------------------

    function startAutoplay() {

        stopAutoplay();

        autoplay = setInterval(function () {

            nextSlide();

        }, 5000);

    }

    function stopAutoplay() {

        if (autoplay) {

            clearInterval(autoplay);

        }

    }

    //-------------------------------------------------------
    // Buttons
    //-------------------------------------------------------

    if (nextBtn) {

        nextBtn.addEventListener("click", function () {

            nextSlide();
            startAutoplay();

        });

    }

    if (prevBtn) {

        prevBtn.addEventListener("click", function () {

            prevSlide();
            startAutoplay();

        });

    }

    //-------------------------------------------------------
    // Dots
    //-------------------------------------------------------

    dots.forEach(function (dot, index) {

        dot.addEventListener("click", function () {

            showSlide(index);
            startAutoplay();

        });

    });

    //-------------------------------------------------------
    // Pause on Hover
    //-------------------------------------------------------

    slider.addEventListener("mouseenter", stopAutoplay);

    slider.addEventListener("mouseleave", startAutoplay);

    //-------------------------------------------------------
    // Touch Swipe
    //-------------------------------------------------------

    let touchStartX = 0;
    let touchEndX = 0;

    slider.addEventListener("touchstart", function (e) {

        touchStartX = e.changedTouches[0].screenX;

    });

    slider.addEventListener("touchend", function (e) {

        touchEndX = e.changedTouches[0].screenX;

        const distance = touchEndX - touchStartX;

        if (Math.abs(distance) < 50) {
            return;
        }

        if (distance < 0) {

            nextSlide();

        } else {

            prevSlide();

        }

        startAutoplay();

    });

    //-------------------------------------------------------
    // Init
    //-------------------------------------------------------

    showSlide(0);

    startAutoplay();

});

/**
 * Category Slider
 */

document.addEventListener("DOMContentLoaded", function () {

    const slider = document.getElementById("swc-category-slider");

    const prev = document.getElementById("swc-category-prev");

    const next = document.getElementById("swc-category-next");

    if (!slider) {

        return;

    }

    const scrollValue = 320;

    if (next) {

        next.addEventListener("click", function () {

            slider.scrollBy({

                left: scrollValue,

                behavior: "smooth"

            });

        });

    }

    if (prev) {

        prev.addEventListener("click", function () {

            slider.scrollBy({

                left: -scrollValue,

                behavior: "smooth"

            });

        });

    }

});