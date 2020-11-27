jQuery(function ($) {
    console.log('Carga child theme')

    // Carousel Latest Podcast
    $('.slick-podcast').slick({
        slidesToShow: 4,
        arrows: true,
        nextArrow: '<button type="button" class="slick-custom-arrow slick-custom-next"><i class="fas fa-chevron-right"></i></button>',
        prevArrow: '<button type="button" class="slick-custom-arrow slick-custom-prev"><i class="fas fa-chevron-left"></i></button>',
        autoplay: true,
        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 4,
                slidesToScroll: 4,
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
        ]
    });

    $old_link = $('#more-podcast-section .ox-pagination ul li a').attr('href');
    $new_link = $('#more-podcast-section .ox-pagination ul li a').attr('href', $old_link + "#more-podcast-section");

    $(".accordion-js").accordionjs();

    $('.slick-more-series').slick({
        slidesToShow: 4,
        arrows: true,
        nextArrow: '<button type="button" class="slick-custom-arrow slick-custom-next"><i class="fas fa-chevron-right"></i></button>',
        prevArrow: '<button type="button" class="slick-custom-arrow slick-custom-prev"><i class="fas fa-chevron-left"></i></button>',
        autoplay: true,
        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 4,
                slidesToScroll: 4,
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
        ]
    });
});