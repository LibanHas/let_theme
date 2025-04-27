

document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.querySelector('.hamburger-icon');
    const sideMenu = document.querySelector('.side-menu');

    // Check if elements are available before adding event listeners
    if (menuToggle && sideMenu) {
        menuToggle.addEventListener('click', function () {
            sideMenu.classList.toggle('open');  // Toggle the side menu
            menuToggle.classList.toggle('open'); // Add/remove the open class on hamburger for animation
        });
    }
});
