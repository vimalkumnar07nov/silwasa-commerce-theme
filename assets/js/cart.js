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

/*
|--------------------------------------------------------------------------
| AJAX Add To Cart
|--------------------------------------------------------------------------
*/

document.addEventListener("click", function (e) {

    const button = e.target.closest(".swc-add-cart");

    if (!button) {
        return;
    }

    e.preventDefault();

    const productId = button.dataset.productId;

    button.disabled = true;
    button.textContent = "Adding...";

    const formData = new FormData();

    formData.append("action", "swc_add_to_cart");
    formData.append("nonce", swc_ajax.nonce);
    formData.append("product_id", productId);
    formData.append("quantity", 1);

    fetch(swc_ajax.ajax_url, {

        method: "POST",

        body: formData

    })

    .then(response => response.json())

    .then(response => {

        if (!response.success) {

            button.disabled = false;
            button.textContent = "+ Add";

            return;

        }

        refreshMiniCart(response.data);

        button.textContent = "Added ✓";

        setTimeout(() => {

            button.disabled = false;

            button.textContent = "+ Add";

        }, 1000);

    });

});

/*
|--------------------------------------------------------------------------
| AJAX Quantity & Remove
|--------------------------------------------------------------------------
*/

document.addEventListener("click", function (event) {

    /*
    ------------------------------------------------
    PLUS
    ------------------------------------------------
    */

    const plus = event.target.closest(".swc-cart-plus");

    if (plus) {

        event.preventDefault();

        const item = plus.closest(".swc-mini-cart-item");

        const qtyElement = item.querySelector(".swc-cart-qty");

        let qty = parseInt(qtyElement.textContent);

        qty++;

        updateCart(item.dataset.cartKey, qty);

    }

    /*
    ------------------------------------------------
    MINUS
    ------------------------------------------------
    */

    const minus = event.target.closest(".swc-cart-minus");

    if (minus) {

        event.preventDefault();

        const item = minus.closest(".swc-mini-cart-item");

        const qtyElement = item.querySelector(".swc-cart-qty");

        let qty = parseInt(qtyElement.textContent);

        qty--;

        if (qty < 1) {

            qty = 0;

        }

        updateCart(item.dataset.cartKey, qty);

    }

    /*
    ------------------------------------------------
    REMOVE
    ------------------------------------------------
    */

    const remove = event.target.closest(".swc-remove-item");

    if (remove) {

        event.preventDefault();

        removeCartItem(remove.dataset.cartKey);

    }

});


/*
|--------------------------------------------------------------------------
| Update Cart
|--------------------------------------------------------------------------
*/

function updateCart(cartKey, quantity) {

    const data = new FormData();

    data.append("action", "swc_update_cart_quantity");

    data.append("nonce", swc_ajax.nonce);

    data.append("cart_key", cartKey);

    data.append("quantity", quantity);

    fetch(swc_ajax.ajax_url, {

        method: "POST",

        body: data

    })

    .then(response => response.json())

    .then(response => {

        if (response.success) {

            refreshMiniCart(response.data);

        }

    });

}


/*
|--------------------------------------------------------------------------
| Remove Item
|--------------------------------------------------------------------------
*/

function removeCartItem(cartKey) {

    const data = new FormData();

    data.append("action", "swc_remove_cart_item");

    data.append("nonce", swc_ajax.nonce);

    data.append("cart_key", cartKey);

    fetch(swc_ajax.ajax_url, {

        method: "POST",

        body: data

    })

    .then(response => response.json())

    .then(response => {

        if (response.success) {

            refreshMiniCart(response.data);

        }

    });

}


/*
|--------------------------------------------------------------------------
| Refresh UI
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Refresh Mini Cart
|--------------------------------------------------------------------------
*/

function refreshMiniCart(data) {

    if (!data || !data.mini_cart) {
        return;
    }

    const parser = new DOMParser();

    const html = parser.parseFromString(
        data.mini_cart,
        "text/html"
    );

    /*
    ----------------------------------------
    Replace Entire Cart Content
    ----------------------------------------
    */

    const newItems = html.querySelector("#swc-mini-cart-items");
    const oldItems = document.querySelector("#swc-mini-cart-items");

    if (newItems && oldItems) {

        oldItems.innerHTML = newItems.innerHTML;

    }

    /*
    ----------------------------------------
    Total
    ----------------------------------------
    */

    const newTotal = html.querySelector("#swc-mini-cart-total");
    const oldTotal = document.querySelector("#swc-mini-cart-total");

    if (newTotal && oldTotal) {

        oldTotal.innerHTML = newTotal.innerHTML;

    }

    /*
    ----------------------------------------
    Header Count
    ----------------------------------------
    */

    const count = document.getElementById("swc-cart-count");

    if (count) {

        count.innerHTML = data.count + " Items";
        console.log("Header Count Updated:", data.count + " Items");

    }

    /*
    ----------------------------------------
    Header Total
    ----------------------------------------
    */

    const headerTotal = document.getElementById("swc-cart-total");

    if (headerTotal) {

        headerTotal.innerHTML = data.total;

    }

    /*
    ----------------------------------------
    Mobile Badge
    ----------------------------------------
    */

    const badge = document.getElementById("swc-mobile-cart-count");

    if (badge) {

        badge.textContent = data.count;

        if (parseInt(data.count) > 0) {

            badge.classList.remove("hidden");

        } else {

            badge.classList.add("hidden");

        }

    }

}

// function refreshMiniCart(data) {

//     const parser = new DOMParser();

//     const html = parser.parseFromString(

//         data.mini_cart,

//         "text/html"

//     );

//     /*
//     ----------------------------------------
//     Drawer
//     ----------------------------------------
//     */

//     const newItems = html.querySelector("#swc-mini-cart-items");

//     const oldItems = document.querySelector("#swc-mini-cart-items");

//     if (newItems && oldItems) {

//         oldItems.innerHTML = newItems.innerHTML;

//     }

//     /*
//     ----------------------------------------
//     Total
//     ----------------------------------------
//     */

//     const newTotal = html.querySelector("#swc-mini-cart-total");

//     const oldTotal = document.querySelector("#swc-mini-cart-total");

//     if (newTotal && oldTotal) {

//         oldTotal.innerHTML = newTotal.innerHTML;

//     }

//     /*
//     ----------------------------------------
//     Header Cart
//     ----------------------------------------
//     */

//     const headerCount = document.querySelector("#swc-cart-count");

//     if (headerCount) {

//         headerCount.innerHTML = data.count + " Items";

//     }

//     const headerTotal = document.querySelector("#swc-cart-total");

//     if (headerTotal) {

//         headerTotal.innerHTML = data.total;

//     }

//     /*
//     ----------------------------------------
//     Mobile Badge
//     ----------------------------------------
//     */

//     const mobileBadge = document.querySelector("#swc-mobile-cart-count");

//     if (mobileBadge) {

//         mobileBadge.innerHTML = data.count;

//     }

// }