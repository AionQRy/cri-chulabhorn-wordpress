jQuery(document).ready(function ($) {
  $('.nav-sub-term-yp li').click(function (event) {
    var data = $(this).attr('data-id');
		var currentClick = $(this).attr('data-nav');

    $('.'+currentClick+' .content-post-tab-yp').removeClass('active');
		$('.'+currentClick+' .nav-sub-term-yp li').removeClass('active');

    $(this).addClass('active');
    $('.'+currentClick+' .content-post-tab-yp[data-id="' + data + '"]').addClass('active');
  });

  $('.bottom_banner_nav li').click(function (event) {
    var data = $(this).attr('data-id');
		var currentClick = $(this).attr('data-nav');

    $('.content_bottom_banner').removeClass('active');
		$('.bottom_banner_nav li').removeClass('active');

    $(this).addClass('active');
    $('.content_bottom_banner[data-id="' + data + '"]').addClass('active');
  });

  	$('.category_data').change(function(event) {
  		var category_data = $('.category_data option:selected').text();
  		$('.type-hide').val(category_data);
  	});
});


var galleryTop = new Swiper('.gallery-top', {
  spaceBetween: 0,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  loop: true,
  loopedSlides: 4,
  autoHeight: true,
  // breakpoints: {
  //   640: {
  //     loopedSlides: 4,
  //     // slidesPerView: 2,
  //     // spaceBetween: 20,
  //   },
  //   768: {
  //     loopedSlides: 4,
  //     // slidesPerView: 4,
  //     // spaceBetween: 40,
  //   },
  //   1024: {
  //     loopedSlides: 4,
  //     // slidesPerView: 5,
  //     // spaceBetween: 50,
  //   }
  // }
});
var galleryThumbs = new Swiper('.gallery-thumbs', {
  spaceBetween: 0,
  centeredSlides: true,
  slidesPerView: 'auto',
  touchRatio: 0.2,
  slideToClickedSlide: true,
  loop: true,
  loopedSlides: 4,
  autoHeight: true,
  // breakpoints: {
  //   640: {
  //     loopedSlides: 2,
  //     // slidesPerView: 2,
  //     // spaceBetween: 20,
  //   },
  //   768: {
  //     loopedSlides: 3,
  //     // slidesPerView: 4,
  //     // spaceBetween: 40,
  //   },
  //   1024: {
  //     loopedSlides: 4,
  //     // slidesPerView: 5,
  //     // spaceBetween: 50,
  //   },
  // }
});
galleryTop.controller.control = galleryThumbs;
galleryThumbs.controller.control = galleryTop;
