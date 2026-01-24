// Dark mode toggle functionality

document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('dark-mode-toggle');
    const body = document.body;
    const navbar = document.querySelector('.navbar');

    // Function to update theme
    function updateTheme(isDark) {
        if (isDark) {
            body.setAttribute('data-bs-theme', 'dark');
            body.classList.add('dark');
            navbar.classList.remove('navbar-light', 'bg-white');
            navbar.classList.add('navbar-dark', 'bg-dark');
            toggleButton.innerHTML = '<i class="bi bi-sun"></i>'; // Sun icon for light mode
        } else {
            body.setAttribute('data-bs-theme', 'light');
            body.classList.remove('dark');
            navbar.classList.remove('navbar-dark', 'bg-dark');
            navbar.classList.add('navbar-light', 'bg-white');
            toggleButton.innerHTML = '<i class="bi bi-moon"></i>'; // Moon icon for dark mode
        }
    }

    // Initial theme based on settings or localStorage
    let initialDark = false;
    if (window.userSettings && window.userSettings.theme) {
        initialDark = window.userSettings.theme === 'dark';
    } else {
        const savedTheme = localStorage.getItem('dark-mode');
        initialDark = savedTheme === 'dark';
    }
    updateTheme(initialDark);

    // Toggle event
    toggleButton.addEventListener('click', function () {
        const isDark = body.getAttribute('data-bs-theme') === 'dark';
        updateTheme(!isDark);
        localStorage.setItem('dark-mode', !isDark ? 'dark' : 'light');
    });
});