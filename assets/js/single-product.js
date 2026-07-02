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

/*
|--------------------------------------------------------------------------
| Silwasa Add Button
|--------------------------------------------------------------------------
*/

document.addEventListener("click", function (event) {

    const addButton = event.target.closest(".swc-product-add");

    if (!addButton) {
        return;
    }

    const productId = addButton.dataset.productId;

    // const wrapper = document.getElementById(
    //     "swc-product-action"
    // );

    const wrapper = addButton.closest(
        ".swc-product-action"
    );

    wrapper.innerHTML = `
        <div
            class="swc-qty-wrapper flex items-center justify-between border border-green-600 rounded-xl overflow-hidden h-12"
            data-product-id="${productId}">

            <button
                type="button"
                class="swc-qty-minus w-12 h-full text-xl font-bold">

                −

            </button>

            <span
                class="swc-current-qty font-bold">

                1

            </span>

            <button
                type="button"
                class="swc-qty-plus w-12 h-full text-xl font-bold">

                +

            </button>

        </div>
    `;

    const formData = new FormData();

    formData.append("action", "swc_add_to_cart");

    formData.append("nonce", swc_ajax.nonce);

    formData.append("product_id", productId);

    formData.append("quantity", 1);

    fetch(
        swc_ajax.ajax_url,
        {
            method: "POST",
            body: formData
        }
    )
    .then(response => response.json())
    .then(response => {

        if (response.success) {

            refreshMiniCart(response.data);

        }

    });

});

/*
|--------------------------------------------------------------------------
| Silwasa Quantity Controls
|--------------------------------------------------------------------------
*/

document.addEventListener("click", function (event) {

    /*
    ------------------------------------------------
    PLUS
    ------------------------------------------------
    */

    const plus = event.target.closest(".swc-qty-plus");

    if (plus) {

        event.preventDefault();

        const wrapper = plus.closest(".swc-qty-wrapper");

        const qtyElement = wrapper.querySelector(".swc-current-qty");

        let qty = parseInt(qtyElement.textContent);

        qty++;

        qtyElement.textContent = qty;

        const productId = wrapper.dataset.productId;

        updateProductCart(productId, qty);

    }

    /*
    ------------------------------------------------
    MINUS
    ------------------------------------------------
    */

    const minus = event.target.closest(".swc-qty-minus");

    if (minus) {

        event.preventDefault();

        const wrapper = minus.closest(".swc-qty-wrapper");

        const qtyElement = wrapper.querySelector(".swc-current-qty");

        let qty = parseInt(qtyElement.textContent);

        qty--;

        const productId = wrapper.dataset.productId;

        if (qty < 1) {

            removeProductFromCart(productId);

            wrapper.outerHTML = `
                <button
                    type="button"
                    class="swc-product-add w-full h-12 rounded-xl bg-green-600 text-white font-bold"
                    data-product-id="${productId}">
                    ADD
                </button>
            `;

            return;

        }

        qtyElement.textContent = qty;

        updateProductCart(productId, qty);

    }

});

/*
|--------------------------------------------------------------------------
| Update Product Quantity
|--------------------------------------------------------------------------
*/

function updateProductCart(productId, quantity) {

    const formData = new FormData();

    formData.append(
        "action",
        "swc_update_single_product_qty"
    );

    formData.append(
        "nonce",
        swc_ajax.nonce
    );

    formData.append(
        "product_id",
        productId
    );

    formData.append(
        "quantity",
        quantity
    );

    fetch(
        swc_ajax.ajax_url,
        {
            method: "POST",
            body: formData
        }
    )
    .then(response => response.json())
    .then(response => {

        if (!response.success) {
            return;
        }

        if (typeof refreshMiniCart === "function") {

            refreshMiniCart(response.data);

        }

    });

}

/*
|--------------------------------------------------------------------------
| Remove Product From Cart
|--------------------------------------------------------------------------
*/

function removeProductFromCart(productId) {

    updateProductCart(
        productId,
        0
    );

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