jQuery(document).ready(function($) {

        $('.heateor_sss_sharing_ul a').click(function(e) {
          var data_id = $(this).parent().parent().parent().attr('data-id');
          var data = {
              data_id: data_id,
              action: 'count_shared_ajax'
          };
          jQuery.ajax({
              type: 'POST',
              url: count_shared_object.ajax_url,
              data: data,
              success: function (msg) {
                  console.log(msg);
              },
              dataType: 'html'
          });

        });
});
