/*
|--------------------------------------------------------------------------
| Product Action Templates
|--------------------------------------------------------------------------
*/

function getAddButtonHTML() {

    return `
        <button
            type="button"
            class="swc-product-add swc-btn swc-btn-outline swc-btn-sm w-full">

            ADD

        </button>
    `;

}

function getQuantityHTML(productId, quantity = 1) {

    return `
        <div
            class="swc-qty-wrapper w-full flex items-center justify-between border border-green-600 rounded overflow-hidden h-9"
            data-product-id="${productId}">

            <button
                type="button"
                class="swc-qty-minus w-full">

                −

            </button>

            <span
                class="swc-current-qty text-sm font-bold">

                ${quantity}

            </span>

            <button
                type="button"
                class="swc-qty-plus w-full">

                +

            </button>

        </div>
    `;

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

    const wrapper = addButton.closest(
        ".swc-product-action"
    );

    const productId = wrapper.dataset.productId;

    wrapper.innerHTML = getQuantityHTML(productId, 1);

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

            wrapper.innerHTML = getAddButtonHTML();

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