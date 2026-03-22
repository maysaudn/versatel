document.addEventListener('DOMContentLoaded', function () {

    new Swiper('.team-carousel', {
        slidesPerView: 3,
        spaceBetween: 20,
        loop: true,

        breakpoints: {
            1024: { slidesPerView: 3 },
            768: { slidesPerView: 2 },
            480: { slidesPerView: 1 }
        }
    });

});

console.log('Swiper init loaded');

console.log('Team carousel JS loaded');