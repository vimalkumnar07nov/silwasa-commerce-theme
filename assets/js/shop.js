/*
|--------------------------------------------------------------------------
| Silwasa Commerce Theme
| Premium AJAX Shop
|--------------------------------------------------------------------------
*/

document.addEventListener("DOMContentLoaded", function () {

    const grid = document.getElementById("swc-product-grid");

    if (!grid) {
        return;
    }

    window.swcAjax = {

        ajaxUrl:
            typeof swc_ajax !== "undefined"
                ? swc_ajax.ajax_url
                : "",
        nonce:
            typeof swc_ajax !== "undefined"
                ? swc_ajax.nonce
                : ""
    };

    const state = {

        categories: [],
        brands: [],
        price: 500,
        stock: false,
        sale: false,
        sort: "menu_order",
        page: 1

    };

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    function showLoading() {

        grid.style.opacity = ".4";

    }

    function hideLoading() {

        grid.style.opacity = "1";

    }

    function updatePriceText() {

        const value = document.getElementById("swc-price-value");

        if (value) {

            value.innerHTML = "$" + state.price;

        }

    }

    /*
    |--------------------------------------------------------------------------
    | Collect Filters
    |--------------------------------------------------------------------------
    */

    function collectFilters() {

        state.categories = [];

        document.querySelectorAll(".swc-filter-category:checked")
            .forEach(function (item) {

                state.categories.push(item.value);

            });

        state.brands = [];

        document.querySelectorAll(".swc-filter-brand:checked")
            .forEach(function (item) {

                state.brands.push(item.value);

            });

        const price = document.getElementById("swc-price-range");

        if (price) {

            state.price = price.value;

        }

        const stock = document.getElementById("swc-stock-filter");

        if (stock) {

            state.stock = stock.checked;

        }

        const sale = document.getElementById("swc-sale-filter");

        if (sale) {

            state.sale = sale.checked;

        }

        const sort = document.getElementById("swc-sort");

        if (sort) {

            state.sort = sort.value;

        }

    }

    /*
    |--------------------------------------------------------------------------
    | Active Filters
    |--------------------------------------------------------------------------
    */

    function renderActiveFilters() {

        const wrapper =
            document.getElementById("swc-active-filters");

        const list =
            document.getElementById("swc-active-filter-list");

        if (!wrapper || !list) {

            return;

        }

        list.innerHTML = "";

        let total = 0;

        state.categories.forEach(function (item) {

            total++;

            list.innerHTML +=
                '<span class="rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-700">' +
                item +
                "</span>";

        });

        state.brands.forEach(function (item) {

            total++;

            list.innerHTML +=
                '<span class="rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-700">' +
                item +
                "</span>";

        });

        if (state.stock) {

            total++;

            list.innerHTML +=
                '<span class="rounded-full bg-slate-100 px-4 py-2 text-sm font-semibold">In Stock</span>';

        }

        if (state.sale) {

            total++;

            list.innerHTML +=
                '<span class="rounded-full bg-red-100 px-4 py-2 text-sm font-semibold text-red-700">On Sale</span>';

        }

        if (total > 0) {

            wrapper.classList.remove("hidden");

        } else {

            wrapper.classList.add("hidden");

        }

    }

    /*
    |--------------------------------------------------------------------------
    | Browser URL
    |--------------------------------------------------------------------------
    */

    function updateUrl() {

        const params = new URLSearchParams();

        if (state.categories.length) {

            params.set(
                "category",
                state.categories.join(",")
            );

        }

        if (state.brands.length) {

            params.set(
                "brand",
                state.brands.join(",")
            );

        }

        if (state.stock) {

            params.set("stock", "1");

        }

        if (state.sale) {

            params.set("sale", "1");

        }

        params.set("price", state.price);

        params.set("sort", state.sort);

        history.replaceState(

            {},

            "",

            window.location.pathname +
            "?" +
            params.toString()

        );

    }

    /*
    |--------------------------------------------------------------------------
    | Events
    |--------------------------------------------------------------------------
    */

    document.addEventListener("change", function () {

        collectFilters();

        updatePriceText();

        renderActiveFilters();

        updateUrl();

        if (typeof loadProducts === "function") {

            loadProducts();

        }

    });

    const clearButton =
        document.getElementById("swc-clear-filters");

    if (clearButton) {

        clearButton.addEventListener("click", function () {

            document.querySelectorAll(

                ".swc-filter-category,.swc-filter-brand"

            ).forEach(function (checkbox) {

                checkbox.checked = false;

            });

            const stock =
                document.getElementById("swc-stock-filter");

            if (stock) {

                stock.checked = false;

            }

            const sale =
                document.getElementById("swc-sale-filter");

            if (sale) {

                sale.checked = false;

            }

            const price =
                document.getElementById("swc-price-range");

            if (price) {

                price.value = 500;

            }

            const sort =
                document.getElementById("swc-sort");

            if (sort) {

                sort.value = "menu_order";

            }

            collectFilters();

            updatePriceText();

            renderActiveFilters();

            updateUrl();

            if (typeof loadProducts === "function") {

                loadProducts();

            }

        });

    }

    /*
    |--------------------------------------------------------------------------
    | Global
    |--------------------------------------------------------------------------
    */

    window.swcShop = {

        state,

        showLoading,

        hideLoading,

        collectFilters,

        renderActiveFilters

    };

    collectFilters();

    renderActiveFilters();

    updatePriceText();

});

/*
|--------------------------------------------------------------------------
| AJAX Product Loader
|--------------------------------------------------------------------------
*/

async function loadProducts(page = 1) {

    if (!window.swcShop) {

        return;

    }

    const grid = document.getElementById("swc-product-grid");

    if (!grid) {

        return;

    }

    swcShop.showLoading();

    grid.innerHTML = skeletonProducts();

    const formData = new FormData();

    formData.append("action", "swc_ajax_shop");

    formData.append(

        "nonce",

        window.swcAjax.nonce

    );

    formData.append("page", page);

    formData.append(
        "categories",
        JSON.stringify(swcShop.state.categories)
    );

    formData.append(
        "brands",
        JSON.stringify(swcShop.state.brands)
    );

    formData.append(
        "price",
        swcShop.state.price
    );

    formData.append(
        "stock",
        swcShop.state.stock ? 1 : 0
    );

    formData.append(
        "sale",
        swcShop.state.sale ? 1 : 0
    );

    formData.append(
        "sort",
        swcShop.state.sort
    );

    try {

        const response = await fetch(

            window.swcAjax.ajaxUrl,

            {

                method: "POST",

                body: formData

            }

        );

        const result = await response.json();

        if (result.success) {

            updateGrid(result.data);

        }

        else {

            showEmpty();

        }

    }

    catch (error) {

        console.log(error);

        showError();

    }

    finally {

        swcShop.hideLoading();

    }

}

/*
|--------------------------------------------------------------------------
| Update Product Grid
|--------------------------------------------------------------------------
*/

function updateGrid(data) {

    const grid = document.getElementById(

        "swc-product-grid"

    );

    if (!grid) {

        return;

    }

    if (data.total === 0 || data.products === "") {

        showEmpty();

        return;

    }

    grid.innerHTML = data.products;

    const count = document.getElementById(

        "swc-product-count"

    );

    if (count) {

        count.innerHTML =

            data.total +

            " Products Found";

    }

}

/*
|--------------------------------------------------------------------------
| Empty State
|--------------------------------------------------------------------------
*/

function showEmpty() {

    const grid = document.getElementById(

        "swc-product-grid"

    );

    if (!grid) {

        return;

    }

    grid.innerHTML =

        '<div class="col-span-full py-24 text-center">' +

        '<div class="text-7xl mb-6">🛒</div>' +

        '<h2 class="text-3xl font-black mb-3">No products found</h2>' +

        '<p class="text-slate-500">Try another filter.</p>' +

        '</div>';

}

/*
|--------------------------------------------------------------------------
| Error State
|--------------------------------------------------------------------------
*/

function showError() {

    const grid = document.getElementById(

        "swc-product-grid"

    );

    if (!grid) {

        return;

    }

    grid.innerHTML =

        '<div class="col-span-full py-24 text-center">' +

        '<div class="text-6xl mb-4">⚠️</div>' +

        '<h2 class="text-3xl font-black mb-3">Something went wrong</h2>' +

        '<button onclick="loadProducts()" class="mt-6 bg-green-600 text-white px-6 py-3 rounded-xl">Retry</button>' +

        '</div>';

}

/*
|--------------------------------------------------------------------------
| Loading Skeleton
|--------------------------------------------------------------------------
*/

function skeletonProducts() {

    let html = "";

    for (let i = 0; i < 8; i++) {

        html +=

            '<div class="animate-pulse rounded-3xl bg-white p-4 border border-slate-200">' +

            '<div class="aspect-square rounded-2xl bg-slate-200"></div>' +

            '<div class="mt-5 h-4 rounded bg-slate-200"></div>' +

            '<div class="mt-3 h-4 w-3/4 rounded bg-slate-200"></div>' +

            '<div class="mt-6 h-10 rounded-xl bg-slate-200"></div>' +

            '</div>';

    }

    return html;

}

/*
|--------------------------------------------------------------------------
| Pagination
|--------------------------------------------------------------------------
*/

document.addEventListener(

    "click",

    function (event) {

        const page = event.target.closest(

            ".page-numbers"

        );

        if (!page) {

            return;

        }

        event.preventDefault();

        const href = page.getAttribute(

            "href"

        );

        if (!href) {

            return;

        }

        const url = new URL(

            href,

            window.location.origin

        );

        const currentPage =

            url.searchParams.get("paged") || 1;

        loadProducts(currentPage);

        window.scrollTo({

            top: 0,

            behavior: "smooth"

        });

    }

);

/*
|--------------------------------------------------------------------------
| Grid Switch
|--------------------------------------------------------------------------
*/

document.querySelectorAll(

    ".swc-grid-view"

).forEach(function (button) {

    button.addEventListener(

        "click",

        function () {

            document.querySelectorAll(

                ".swc-grid-view"

            ).forEach(function (item) {

                item.classList.remove(

                    "bg-green-600",

                    "text-white"

                );

            });

            this.classList.add(

                "bg-green-600",

                "text-white"

            );

            const grid = document.getElementById(

                "swc-product-grid"

            );

            if (!grid) {

                return;

            }

            grid.className =

                "grid gap-4";

            const cols =

                this.dataset.grid;

            if (cols === "2") {

                grid.classList.add(

                    "grid-cols-2"

                );

            }

            if (cols === "3") {

                grid.classList.add(

                    "grid-cols-2",

                    "lg:grid-cols-3"

                );

            }

            if (cols === "4") {

                grid.classList.add(

                    "grid-cols-2",

                    "md:grid-cols-3",

                    "xl:grid-cols-4"

                );

            }

        }

    );

});

/*
|--------------------------------------------------------------------------
| Auto Init
|--------------------------------------------------------------------------
*/

loadProducts();