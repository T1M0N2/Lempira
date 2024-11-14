// script.js - Countdown Timer

// Countdown-Zieldatum: 1. Januar 2025, 00:00 Uhr
const countdownDate = new Date("January 1, 2025 00:00:00").getTime();

function updateCountdown() {
    const now = new Date().getTime();
    const distance = countdownDate - now;

    // Zeitberechnung
    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Anzeige im HTML
    document.getElementById("days").innerText = days.toString().padStart(2, '0');
    document.getElementById("hours").innerText = hours.toString().padStart(2, '0');
    document.getElementById("minutes").innerText = minutes.toString().padStart(2, '0');
    document.getElementById("seconds").innerText = seconds.toString().padStart(2, '0');

    // Countdown stoppen, wenn erreicht
    if (distance < 0) {
        clearInterval(countdownInterval);
        document.querySelector(".countdown").innerHTML = "<p>Wir sind jetzt live!</p>";
    }
}

// Countdown-Intervall alle Sekunde
const countdownInterval = setInterval(updateCountdown, 1000);
