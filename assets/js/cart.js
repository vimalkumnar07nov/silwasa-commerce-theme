/**
 * Silwasa Commerce Theme
 * Premium Mini Cart
 */

document.addEventListener("DOMContentLoaded", function () {

    const cartDrawer = document.getElementById("swc-mini-cart");
    const cartOverlay = document.getElementById("swc-mini-cart-overlay");

    const openDesktop = document.getElementById("swc-open-cart");
    const openMobile = document.getElementById("swc-open-cart-mobile");

    const closeButton = document.getElementById("swc-close-cart");
    const continueButton = document.getElementById("swc-continue-shopping");

    if (!cartDrawer || !cartOverlay) {
        return;
    }

    /*
    ------------------------------------
    Open Cart
    ------------------------------------
    */

    function openCart() {

        cartOverlay.classList.remove("hidden");

        cartDrawer.classList.remove("translate-x-full");

        document.body.classList.add("overflow-hidden");

    }

    /*
    ------------------------------------
    Close Cart
    ------------------------------------
    */

    function closeCart() {

        cartDrawer.classList.add("translate-x-full");

        document.body.classList.remove("overflow-hidden");

        setTimeout(function () {

            cartOverlay.classList.add("hidden");

        }, 300);

    }

    /*
    ------------------------------------
    Desktop Button
    ------------------------------------
    */

    if (openDesktop) {

        openDesktop.addEventListener("click", function (event) {

            event.preventDefault();

            openCart();

        });

    }

    /*
    ------------------------------------
    Mobile Button
    ------------------------------------
    */

    if (openMobile) {

        openMobile.addEventListener("click", function (event) {

            event.preventDefault();

            openCart();

        });

    }

    /*
    ------------------------------------
    Close Button
    ------------------------------------
    */

    if (closeButton) {

        closeButton.addEventListener("click", function () {

            closeCart();

        });

    }

    /*
    ------------------------------------
    Continue Shopping
    ------------------------------------
    */

    if (continueButton) {

        continueButton.addEventListener("click", function () {

            closeCart();

        });

    }

    /*
    ------------------------------------
    Click Overlay
    ------------------------------------
    */

    cartOverlay.addEventListener("click", function () {

        closeCart();

    });

    /*
    ------------------------------------
    ESC Key
    ------------------------------------
    */

    document.addEventListener("keydown", function (event) {

        if (event.key === "Escape") {

            closeCart();

        }

    });

});