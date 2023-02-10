jQuery(document).ready(function($) {

    $('.vitem-download-list a').click(function() {
      var data_id = $(this).attr('data-id');
      var data_pid  = $(this).attr('data-pid');

      var data = {
          action: 'count_click_ajax',
          file_id: data_id,
          data_pid: data_pid,
          data_type: 'file_download_yp'
      };
      jQuery.ajax({
          type: 'POST',
          url: count_click_object.ajax_url,
          data: data,
          success: function (msg) {
              console.log(msg);
          },
          dataType: 'html'
      });
    });



});
