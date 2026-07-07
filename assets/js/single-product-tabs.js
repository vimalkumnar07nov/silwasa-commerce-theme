/*
-------------------------------------------------------
Product Accordion
-------------------------------------------------------
*/

document.addEventListener("click", function (event) {

    const button = event.target.closest(".swc-product-accordion");

    if (!button) {
        return;
    }

    const target = document.getElementById(
        "accordion-" + button.dataset.target
    );

    const isOpen = !target.classList.contains("hidden");

    /*
    Close all
    */

    document.querySelectorAll(".swc-product-content").forEach(function (content) {

        content.classList.add("hidden");

    });

    document.querySelectorAll(".swc-product-arrow").forEach(function (arrow) {

        arrow.classList.remove("rotate-180");

    });

    /*
    Open clicked
    */

    if (!isOpen) {

        target.classList.remove("hidden");

        button.querySelector(".swc-product-arrow")
            .classList.add("rotate-180");

    }

});