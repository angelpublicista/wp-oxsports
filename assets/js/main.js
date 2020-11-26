jQuery(function ($) {
    console.log('Carga child theme')

    // Carousel Latest Podcast
    $('.slick-podcast').slick({
        slidesToShow: 4,
        arrows: true,
        nextArrow: '<button type="button" class="slick-custom-arrow slick-custom-next"><i class="fas fa-chevron-right"></i></button>',
        prevArrow: '<button type="button" class="slick-custom-arrow slick-custom-prev"><i class="fas fa-chevron-left"></i></button>',
        autoplay: true
    });

    $old_link = $('#more-podcast-section .ox-pagination ul li a').attr('href');
    $new_link = $('#more-podcast-section .ox-pagination ul li a').attr('href', $old_link + "#more-podcast-section");

    $(".accordion-js").accordionjs();

    $('.ox-more-series').slick({
        slidesToShow: 4,
        arrows: true,
        nextArrow: '<button type="button" class="slick-custom-arrow slick-custom-next"><i class="fas fa-chevron-right"></i></button>',
        prevArrow: '<button type="button" class="slick-custom-arrow slick-custom-prev"><i class="fas fa-chevron-left"></i></button>',
        autoplay: true
    });
});