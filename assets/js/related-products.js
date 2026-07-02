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