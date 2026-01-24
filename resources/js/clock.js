// Clock functionality

document.addEventListener('DOMContentLoaded', function () {
    const clockElement = document.getElementById('current-time');

    function updateClock() {
        const now = new Date();
        const options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        };
        clockElement.textContent = now.toLocaleDateString('pl-PL', options);
    }

    updateClock();
    setInterval(updateClock, 1000);
});