document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.querySelector('.hamburger-icon');
    const sideMenu = document.querySelector('.side-menu');
    const closeBtn = document.querySelector('.menu-close');
  
    if (menuToggle && sideMenu) {
      menuToggle.addEventListener('click', function () {
        const isOpen = sideMenu.classList.toggle('open');
        menuToggle.classList.toggle('open', isOpen);
      });
    }
  
    closeBtn?.addEventListener('click', () => {
      sideMenu?.classList.remove('open');
      menuToggle?.classList.remove('open');
    });
  });
  