jQuery(document).ready(function($) {

      $(window).on('scroll',function(){
            stop = Math.round($(window).scrollTop());
            if (stop > 300) {
            $('.main-object,.mobile-object').addClass('fixed');
            } else {
            $('.main-object,.mobile-object').removeClass('fixed');
            }
      });



});
