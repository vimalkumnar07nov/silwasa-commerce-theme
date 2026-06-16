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