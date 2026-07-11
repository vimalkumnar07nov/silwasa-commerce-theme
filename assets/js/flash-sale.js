document.addEventListener("DOMContentLoaded", function () {

    const countdown = document.getElementById("swc-flash-countdown");

    if (!countdown) return;

    const endDate = countdown.dataset.end;

    const target = new Date(endDate.replace(" ", "T"));

    function updateCountdown() {

        const now = new Date();

        const distance = target - now;

        if (distance <= 0) {

            const section = countdown.closest("section");

            if (section) {

                section.style.display = "none";

            }

            return;

        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));

        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("flash-days").textContent =
            String(days).padStart(2, "0 d");

        document.getElementById("flash-hours").textContent =
            String(hours).padStart(2, "0 h  ");

        document.getElementById("flash-minutes").textContent =
            String(minutes).padStart(2, "0 m  ");

        document.getElementById("flash-seconds").textContent =
            String(seconds).padStart(2, "0 s  ");
    }

    updateCountdown();

    setInterval(updateCountdown, 1000);

});