function addClass(e,l){var elements=document.querySelectorAll(e);for(var s=0;s<elements.length;s++)elements[s].classList.add(l)}function removeClass(e,l){var elements=document.querySelectorAll(e);for(var s=0;s<elements.length;s++)elements[s].classList.remove(l)}

document.addEventListener(
  "click",
  function (event) {

    // Mobile Toggle
    if (event.target.closest("#toggle-main-menu")) {
      if (!event.target.classList.contains("is-active")) {
          addClass("#toggle-main-menu,#mobile_menu_wrap,.overlay_menu_m", "is-active");
      }
    }

    if (event.target.closest("#close-mobile-menu,.overlay_menu_m")) {
      removeClass("#toggle-main-menu,#mobile_menu_wrap,.overlay_menu_m", "is-active");
    }




    // Sub menu Toggle
    // if (event.target.closest(".wrap-toggle-mobile")) {
    //
    //   if (event.target.parentNode.parentNode.classList.contains(".menu-item-has-children")) {
    //     event.target.parent().add("is-active-mobile");
    //
    //   }
    //   else {
    //     event.target.parent().classList.remove("is-active-mobile");
    //
    //   }
    // }

    // if (event.target.closest("#close-mobile-menu")) {
    //   removeClass("#toggle-main-menu,#mobile_menu_wrap,.overlay_menu_m", "is-active");
    // }
 //
 // if (event.target.closest(".wrap-toggle-mobile")) {
 //    event.target(this).parent().classList.toggle("is-active-mobile");
 //  }


  },
  false
);

new WOW().init();

jQuery(document).ready(function($) {

  $('.file_broken_btn').click(function() {
    $('.wrap-popup-broken').toggleClass('active');
    $('.wrap-popup-broken .ff-message-success').addClass('hide');
    var data_title = $(this).attr('title');
    var data_url  = $(this).attr('data-url');
     $('.broken_msg').val('Report broken file'+'\n\n'+'File name: '+data_title+'\n\n'+'URL: '+data_url);
  });



  $('.broken-form .btn-close').click(function(event) {
    $('.wrap-popup-broken').removeClass('active');
  });

  $('.broken-form .ff-btn-reset').click(function(event) {
    $('.broken-form input,.broken-form textarea').val('');
  });

  $('.ct .ff-btn-reset').click(function(event) {
    $('.ct input,.ct textarea').val('');
  });



  // setTimeout(function () {
  //   $('select#mec_sf_category_1654').val('28').change();
  //   $('.mec-totalcal-dailyview').trigger('click');
  // }, 2000);

  $('.footer-menu .widget_nav_menu .widget-title').append('<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="6 9 12 15 18 9"></polyline></svg>');

  $('.footer-menu .widget_nav_menu .widget-title').click(function(event) {
    var id = $(this).parent().attr('id');
    $('#'+id+'.widget_nav_menu ul').slideToggle('400');
  });

  $('.nav-sub-term-yp li').click(function (event) {
    var data = $(this).attr('data-id');
    var currentClick = $(this).attr('data-nav');

    $('.'+currentClick+' .content-post-tab-yp').removeClass('active');
    $('.'+currentClick+' .nav-sub-term-yp li').removeClass('active');

    $(this).addClass('active');
    $('.'+currentClick+' .content-post-tab-yp[data-id="' + data + '"]').addClass('active');

    $('.content-post-tab-yp .vc-post').removeClass('vdelayed');


    setTimeout(function () {
        $('.'+currentClick+' .content-post-tab-yp[data-id="' + data + '"] .vc-post').addClass('vdelayed');
    }, 1000);

    var selected = '.'+currentClick+' .btn-all_terms a';
    var selected_2 = '.'+currentClick+' .vc-view-more';
    var selected_3 = '.'+currentClick+' .read_more';

    if (currentClick == 'post-tab-ebook-v1') {
        $(selected+', '+selected_2+', '+selected_3).attr('href', '?go_ebook_terms='+data);
    }
    else {
        $(selected+', '+selected_2+', '+selected_3).attr('href', '?go_posts_terms='+data);
    }

  });



  $('.heateor_sss_sharing_ul a').click(function(e) {

    var isMobile = false; //initiate as false

    // device detection
    if (
      /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) ||
      /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(
        navigator.userAgent.substr(0, 4)
      )
    )
      isMobile = true;


    var winWidth = 560;
    var winHeight = 600;

    var winTop = screen.height / 2 - winHeight / 2;
    var winLeft = screen.width / 2 - winWidth / 2;


    e.preventDefault();
    link = $(this).attr('href');
    type = $(this).attr('title');


      if (!isMobile) {
            if (type == 'Facebook' || type == 'Twitter' || type == 'Line' ) {
                window.open(link, "social", "top=" + winTop + ",left=" + winLeft + ",toolbar=0,status=0,width=" + winWidth + ",height=" + winHeight);
            }
      }
      else {

        if (type == 'Facebook' || type == 'Twitter') {
            window.open(link, "social", "top=" + winTop + ",left=" + winLeft + ",toolbar=0,status=0,width=" + winWidth + ",height=" + winHeight);
        }

        if ( type == 'Line' ) {
          var url = "http://line.me/R/msg/text/?" + encodeURIComponent($('h1.entry-title').text()) + "%0d%0a" + encodeURIComponent(window.location.href);
            window.open(url, "social", "top=" + winTop + ",left=" + winLeft + ",toolbar=0,status=0,width=" + winWidth + ",height=" + winHeight);
        }

      }

  });

  // $('.sf-field-category select').select2();

  $('.btn_back').click(function(event) {
    window.history.back();
  });

  $('.but-2.reset-btn').attr('type', 'reset');
  $('.toggle-search svg').on('click', function() {
    $('.popup_search').addClass('active');
    $('.cancel-btn_search svg').addClass('active');
  });
  $('.cancel-btn_search svg').on('click', function() {
    $('.popup_search').removeClass('active');
    $('.cancel-btn_search svg').removeClass('active');
  });

  $('.wrap-toggle-mobile').click(function() {
  var parent_li = $(this).parent();
  parent_li.toggleClass('is-active-mobile');
  // $('.sub-menu').slideDown('400');
  });


  // $(".site-branding.white img.custom-logo").removeClass('active');


  $( ".color-box button.cbtn-1" ).click(function() {
      $(this).addClass('active');
      $( "body" ).addClass("vc-color_1");
      $( "body" ).removeClass("vc-color_2");
      $( "body" ).removeClass("vc-color_3");
      $( ".color-box .cbtn-2" ).removeClass("active");
      $( ".color-box .cbtn-3" ).removeClass("active");
      $(".site-branding").removeClass('active');
      $(".site-branding.white").removeClass('active');
       Cookies.set('boxColor', 'vc-color_1', { expires: 1, path: '/' });
    });
    $( ".color-box button.cbtn-2" ).click(function() {
      $(this).addClass('active');
      $( "body" ).addClass("vc-color_2");
      $( "body" ).removeClass("vc-color_1");
      $( "body" ).removeClass("vc-color_3");
      $( ".color-box .cbtn-1" ).removeClass("active");
      $( ".color-box .cbtn-3" ).removeClass("active");
      $(".site-branding").removeClass('active');
      // $(".site-branding.white").removeClass('active');
      Cookies.set('boxColor', 'vc-color_2', { expires: 1, path: '/' });
    });

    $( ".color-box button.cbtn-3" ).click(function() {
      $(this).addClass('active');
      $( "body" ).addClass('vc-color_3');
      $(".site-branding").addClass('active');
      $(".site-branding.white").addClass('active');
      $( "body" ).removeClass("vc-color_1");
      $( "body" ).removeClass("vc-color_2");
      $( ".color-box .cbtn-1" ).removeClass("active");
      $( ".color-box .cbtn-2" ).removeClass("active");
      Cookies.set('boxColor', 'vc-color_3', { expires: 1, path: '/' });
    });


  $('.button-size .sizeOne').click(function(event) {
      $('.button-size button').removeClass('active');
      $(this).addClass('active');
      $('body').addClass('vSize-1');
      $('body').removeClass('vSize-2');
      $('body').removeClass('vSize-3');
      Cookies.set('vSize', 'vSize-1', { expires: 1, path: '/' });
  });


  $('.button-size .sizeTwo').click(function(event) {
      $('.button-size button').removeClass('active');
      $(this).addClass('active');
      $('body').removeClass('vSize-1');
      $('body').addClass('vSize-2');
      $('body').removeClass('vSize-3');
     Cookies.set('vSize', 'vSize-2', { expires: 1, path: '/' });
  });

  $('.button-size .sizeThree').click(function(event) {
      $('.button-size button').removeClass('active');
      $(this).addClass('active');
      $('body').removeClass('vSize-1');
      $('body').removeClass('vSize-2');
      $('body').addClass('vSize-3');
      Cookies.set('vSize', 'vSize-3', { expires: 1, path: '/' });
  });



});
