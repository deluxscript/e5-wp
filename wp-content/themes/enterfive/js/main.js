var owl = $('.owl-carousel');
owl.owlCarousel({
    items:3,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        600:{
            items:1,
            nav:false
        },
        1000:{
            items:3,
            nav:false,
            loop:true
        }
    }
});

$('.slick-carousel').slick({
  dots: true,
  infinite: false,
  arrows: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 3,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
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
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

$(document).ready(function () {
  $('#productsCarouselXs').carousel({
      interval: 4000
  })
  $('#eventCarousel .item').each(function () {
      var next = $(this).next();
      if (!next.length) {
          next = $(this).siblings(':first');
      }
      next.children(':first-child').clone().appendTo($(this));

      if (next.next().length > 0) {
          next.next().children(':first-child').clone().appendTo($(this));
      }
      else {
          $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
      }

    //   if (next.next().next().length > 0) {
    //       next.next().next().children(':first-child').clone().appendTo($(this));
    //   }
    //   else {
    //       $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
    //   }

  });
});
