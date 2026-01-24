// Dark mode toggle functionality
document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('dark-mode-toggle2');
    const body = document.body;
    const navbar = document.querySelector('.navbar');

    // Function to update theme
    function updateTheme(isDark) {
        if (isDark) {
            body.setAttribute('data-bs-theme', 'dark');
            body.classList.add('dark');
            navbar.classList.remove('navbar-light', 'bg-white');
            navbar.classList.add('navbar-dark', 'bg-dark');
        } else {
            body.setAttribute('data-bs-theme', 'light');
            body.classList.remove('dark');
            navbar.classList.remove('navbar-dark', 'bg-dark');
            navbar.classList.add('navbar-light', 'bg-white');
        }
    }

    // Initial theme based on localStorage
/*     const savedTheme = localStorage.getItem('dark-mode');
    const initialDark = savedTheme === 'dark';
    updateTheme(initialDark); */

    toggleButton.bootstrapToggle();
    toggleButton.addEventListener('change', function () {
        const isDark = this.checked;
        updateTheme(isDark);
        localStorage.setItem('dark-mode', isDark ? 'dark' : 'light');
    });
});
