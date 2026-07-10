/**
 * Silwasa Commerce Theme
 * Reusable Carousel
 */

document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll(".swc-carousel").forEach(function (carousel) {

        const track = carousel.querySelector(".swc-carousel-track");

        if (!track) return;

        // const wrapper = carousel.parentElement;
        const wrapper = carousel.closest(".relative");

        const prev = wrapper.querySelector(".swc-carousel-prev");
        const next = wrapper.querySelector(".swc-carousel-next");

        function getScrollAmount() {

            const item = track.querySelector(".swc-carousel-item");

            if (!item) return 300;

            const gap = 16;

            return item.offsetWidth + gap;

        }

        if (next) {

            next.addEventListener("click", function () {

                carousel.scrollBy({

                    left: getScrollAmount() * 3,

                    behavior: "smooth"

                });

            });

        }

        if (prev) {

            prev.addEventListener("click", function () {

                carousel.scrollBy({

                    left: -getScrollAmount() * 3,

                    behavior: "smooth"

                });

            });

        }

        carousel.addEventListener("scroll", updateArrows);

        updateArrows();

        /*
        -----------------------------------------
        Mouse Drag
        -----------------------------------------
        */

        let isDown = false;
        let startX = 0;
        let scrollLeft = 0;

        carousel.addEventListener("mousedown", function (e) {

            isDown = true;

            carousel.classList.add("cursor-grabbing");

            startX = e.pageX;

            scrollLeft = carousel.scrollLeft;

        });

        carousel.addEventListener("mouseleave", function () {

            isDown = false;

            carousel.classList.remove("cursor-grabbing");

        });

        carousel.addEventListener("mouseup", function () {

            isDown = false;

            carousel.classList.remove("cursor-grabbing");

        });

        carousel.addEventListener("mousemove", function (e) {

            if (!isDown) return;

            e.preventDefault();

            const walk = (e.pageX - startX) * 1.5;

            carousel.scrollLeft = scrollLeft - walk;

        });

        // update arrows on scroll

        function updateArrows() {

            if (!prev || !next) return;

            const maxScroll = carousel.scrollWidth - carousel.clientWidth;

            if (carousel.scrollLeft <= 5) {

                prev.style.opacity = "0";
                prev.style.pointerEvents = "none";

            } else {

                prev.style.opacity = "1";
                prev.style.pointerEvents = "auto";

            }

            if (carousel.scrollLeft >= maxScroll - 5) {

                next.style.opacity = "0";
                next.style.pointerEvents = "none";

            } else {

                next.style.opacity = "1";
                next.style.pointerEvents = "auto";

            }

        }


    });

});