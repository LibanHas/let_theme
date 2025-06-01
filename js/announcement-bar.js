document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".announcement-bar__swiper", {
      loop: true,
      speed: 1000,
      autoplay: {
        delay: 2500,
      },
      slidesPerView: 1,
      threshold: 50,
      breakpoints: {
        1280: {
          speed: 2250,
        }
      }
    });
  });
  