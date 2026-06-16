document.addEventListener("DOMContentLoaded", function () {

    const slider = document.getElementById("brand-slider");

    if (!slider) {

        return;

    }

    const prev = document.getElementById("brand-prev");

    const next = document.getElementById("brand-next");

    const amount = 350;

    if (next) {

        next.addEventListener("click", function () {

            slider.scrollBy({

                left: amount,

                behavior: "smooth"

            });

        });

    }

    if (prev) {

        prev.addEventListener("click", function () {

            slider.scrollBy({

                left: -amount,

                behavior: "smooth"

            });

        });

    }

    let auto = setInterval(function () {

        if (

            slider.scrollLeft + slider.clientWidth >=

            slider.scrollWidth - 20

        ) {

            slider.scrollTo({

                left: 0,

                behavior: "smooth"

            });

        }

        else {

            slider.scrollBy({

                left: amount,

                behavior: "smooth"

            });

        }

    }, 3500);

    slider.addEventListener("mouseenter", function () {

        clearInterval(auto);

    });

});