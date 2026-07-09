/**
 * Silwasa Commerce Theme
 * AJAX Search
 */

document.addEventListener("DOMContentLoaded", function () {

    const overlay = document.getElementById("swc-search-overlay");
    const openButton = document.getElementById("swc-open-search");
    const openMobileButton = document.getElementById("swc-open-search-mobile");
    const closeButton = document.getElementById("swc-search-close");

    const input = document.getElementById("swc-search-input");

    const results = document.getElementById("swc-search-results");

    const loading = document.getElementById("swc-search-loading");

    const empty = document.getElementById("swc-search-empty");

    const popular = document.getElementById("swc-search-popular");

    if (!overlay || !openButton || !input) {
        return;
    }

    let timer = null;

    /*
    --------------------------------------------------------
    Open Search
    --------------------------------------------------------
    */

    function openSearch() {

        overlay.classList.remove("hidden");

        document.body.classList.add("overflow-hidden");

        setTimeout(function () {

            input.focus();

        }, 150);

    }

    /*
    --------------------------------------------------------
    Close Search
    --------------------------------------------------------
    */

    function closeSearch() {

        overlay.classList.add("hidden");

        document.body.classList.remove("overflow-hidden");

        input.value = "";

        results.innerHTML = "";

        loading.classList.add("hidden");

        empty.classList.add("hidden");

        popular.classList.remove("hidden");

    }

    /*
    --------------------------------------------------------
    Events
    --------------------------------------------------------
    */

    if (openButton) {

        openButton.addEventListener("click", function () {

            openSearch();

        });

    }

    if (openMobileButton) {

        openMobileButton.addEventListener("click", function () {

            openSearch();

        });

    }

    if (closeButton) {

        closeButton.addEventListener("click", function () {

            closeSearch();

        });

    }

    /*
    --------------------------------------------------------
    ESC Key
    --------------------------------------------------------
    */

    document.addEventListener("keydown", function (event) {

        if (event.key === "Escape") {

            closeSearch();

        }

    });

    /*
    --------------------------------------------------------
    CTRL + K
    --------------------------------------------------------
    */

    document.addEventListener("keydown", function (event) {

        if ((event.ctrlKey || event.metaKey) && event.key.toLowerCase() === "k") {

            event.preventDefault();

            openSearch();

        }

    });

    /*
    --------------------------------------------------------
    Click Outside
    --------------------------------------------------------
    */

    overlay.addEventListener("click", function (event) {

        if (event.target === overlay) {

            closeSearch();

        }

    });

    /*
    --------------------------------------------------------
    Popular Tags
    --------------------------------------------------------
    */

    document.querySelectorAll(".swc-search-tag").forEach(function (button) {

        button.addEventListener("click", function () {

            input.value = this.dataset.search;

            searchProducts(this.dataset.search);

        });

    });

    /*
    --------------------------------------------------------
    Debounce Input
    --------------------------------------------------------
    */

    input.addEventListener("keyup", function () {

        clearTimeout(timer);

        const keyword = this.value.trim();

        if (keyword.length < 3) {

            results.innerHTML = "";

            loading.classList.add("hidden");

            empty.classList.add("hidden");

            popular.classList.remove("hidden");

            return;

        }

        timer = setTimeout(function () {

            searchProducts(keyword);

        }, 300);

    });

    /*
    --------------------------------------------------------
    AJAX Search
    --------------------------------------------------------
    */

    function searchProducts(keyword) {

        popular.classList.add("hidden");

        loading.classList.remove("hidden");

        empty.classList.add("hidden");

        results.innerHTML = "";

        const formData = new FormData();

        formData.append("action", "swc_ajax_product_search");

        formData.append("keyword", keyword);

        formData.append("nonce", swc.nonce);

        fetch(swc.ajaxurl, {

            method: "POST",

            body: formData

        })

            .then(function (response) {

                return response.json();

            })

            .then(function (response) {

                loading.classList.add("hidden");

                if (!response.success) {

                    empty.classList.remove("hidden");

                    return;

                }

                if (response.data.html.trim() === "") {

                    empty.classList.remove("hidden");

                    results.innerHTML = "";

                    return;

                }

                results.innerHTML = response.data.html;

            })

            .catch(function () {

                loading.classList.add("hidden");

                empty.classList.remove("hidden");

            });

    }

});