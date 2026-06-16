document.addEventListener("DOMContentLoaded", function () {

    const target = new Date();

    target.setHours(23);
    target.setMinutes(59);
    target.setSeconds(59);

    function updateTimer() {

        const now = new Date().getTime();

        const distance = target.getTime() - now;

        if (distance < 0) {

            return;

        }

        const hours = Math.floor(distance / (1000 * 60 * 60));

        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        const h = document.getElementById("flash-hours");

        const m = document.getElementById("flash-minutes");

        const s = document.getElementById("flash-seconds");

        if (h) h.innerHTML = String(hours).padStart(2, "0");

        if (m) m.innerHTML = String(minutes).padStart(2, "0");

        if (s) s.innerHTML = String(seconds).padStart(2, "0");

    }

    updateTimer();

    setInterval(updateTimer, 1000);

});