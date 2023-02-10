jQuery(document).ready(function($) {

    $('span.btn-close').on('click',function(){
        $('.popup_search').removeClass('active');
    });

    var appended = false;
    $('.search-bar_ypx input.sf-input-text').keyup(function(){
        if($(this).val() == ''){
            $('.search-box-p .search-bar_ypx form ul li.sf-field-search label').append('');
        }else{
            if (!appended) {
                $('.search-box-p .search-bar_ypx form ul li.sf-field-search label').append('<span class="cancel btn-clear-c"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>');
            }
            appended = true;         
        }
      });


        $(".btn-clear-c").click(function() {
            if ($('.search-bar_ypx input.sf-input-text') !== "") {
                $('.search-bar_ypx input.sf-input-text').val('');
            }
        });

        // $(".search-bar_ypx input.sf-input-text").click(function() {
        //     if (this.value !== "") {
        //         this.value = '';
        //     }
        // });

        var text = $("h4.count-head span strong").text();
        $("span.word-t.word-f").text(text);
  });
