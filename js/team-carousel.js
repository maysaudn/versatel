// document.addEventListener('DOMContentLoaded', function () {

//     new Swiper('.team-carousel', {
//         slidesPerView: 3,
//         spaceBetween: 20,
//         loop: true,

//         breakpoints: {
//             1024: { slidesPerView: 3 },
//             768: { slidesPerView: 2 },
//             480: { slidesPerView: 1 }
//         }
//     });

// });

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