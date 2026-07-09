document.addEventListener("DOMContentLoaded", function () {

    /*
    ------------------------------------
    Gallery Thumbnails
    ------------------------------------
    */

    document.querySelectorAll(".swc-gallery-thumb").forEach(function (thumb) {

        thumb.addEventListener("click", function () {

            const image = this.dataset.image;

            const main = document.getElementById(
                "swc-product-main-image"
            );

            if (main) {

                main.src = image;

            }

        });

    });

});


/*
------------------------------------
Description Accordion
------------------------------------
*/

const toggle = document.getElementById("swc-desc-toggle");

const content = document.getElementById("swc-desc-content");

if (toggle && content) {

    toggle.addEventListener("click", function () {

        content.classList.toggle("hidden");

    });

}

// Related Products Slider(this code is copied from related-products.js)
document.addEventListener("DOMContentLoaded", function () {

    const slider = document.getElementById(
        "swc-related-slider"
    );

    const next = document.getElementById(
        "swc-related-next"
    );

    const prev = document.getElementById(
        "swc-related-prev"
    );

    if (!slider) {
        return;
    }

    next?.addEventListener("click", function () {

        slider.scrollBy({
            left: 600,
            behavior: "smooth"
        });

    });

    prev?.addEventListener("click", function () {

        slider.scrollBy({
            left: -600,
            behavior: "smooth"
        });

    });

});