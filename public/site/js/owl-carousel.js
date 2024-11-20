$('#top-products').owlCarousel({
    items: 4,
    loop: true,
    dots: false,
    nav: true,
    navText: ['<i class="fa-solid fa-chevron-left"></i>',
            '<i class="fa-solid fa-chevron-right"></i>'],
    autoplay: true,
    autoplayTimeout: 3000,
    responsive: {
        0: {
            items: 1
        },
        640: {
            items: 2
        },
        768: {
            items: 2
        },
        1025: {
            items: 4
        }
    }
    
});

$('#blog-news').owlCarousel({
    items: 4,
    margin: 20,
    loop: true,
    dots: false,
    nav: true,
    navText: ['<i class="fa-solid fa-chevron-left"></i>',
    '<i class="fa-solid fa-chevron-right"></i>'],
    autoplay: true,
    autoplayTimeout: 3000,
    responsive: {
        0: {
            items: 1
        },
        640: {
            items: 2
        },
        768: {
            items: 2
        },
        1025: {
            items: 4
        }
    }
    
});