document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".team-swiper", {
      slidesPerView: 1,
      spaceBetween: 20,
  
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
  
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
  
      breakpoints: {
        768: {
          slidesPerView: 2,
        },
        992: {
          slidesPerView: 3,
        },
      },

      speed: 600,
      loop: true,
      grabCursor: true
    });
  });