  <div class="v-search-events">
     <label for="event-s" class="event-ss">
       <input type="text" name="event-s" id="event-s" placeholder="<?php yp_text('พิมพ์คำค้นหา...','Search...'); ?>">
       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
     </label>
     <label for="event-view" class="event-views">
        <select name="event-view" id="event-view">
         <option value="monthly" <?php if (!empty($_GET['type']) && $_GET['type'] == 'monthly') { echo "selected";  } ?>><?php yp_text('มุมมองแบบรายเดือน','Monthly view'); ?></option>
         <option value="weekly" <?php if (!empty($_GET['type']) && $_GET['type'] == 'weekly') { echo "selected";  } ?>><?php yp_text('มุมมองแบบรายสัปดาห์','Weekly view'); ?></option>
         <option value="daily" <?php if (!empty($_GET['type']) && $_GET['type'] == 'daily') { echo "selected";  } ?>><?php yp_text('มุมมองแบบรายวัน','Daily view'); ?></option>
         <option value="list" <?php if (!empty($_GET['type']) && $_GET['type'] == 'list') { echo "selected";  } ?>><?php yp_text('มุมมองแบบรายการ','List view'); ?></option>
       </select>
     </label>
  </div>
  <?php $actual_link = get_home_url().'/events'; ?>


  <script type="text/javascript">
    jQuery(document).ready(function($) {

      $(document).on('keypress',function(e) {
        if(e.which == 13) {
            var text = $('#event-s').val();
            // if (text != '') {
              $('.mec-text-input-search input[type="search"]').change();
              $('.fc-findEvents-button').trigger('click');
            // }
        }
    });


      $('#event-s').keyup(function(event) {
        var text = $(this).val();
        $('.mec-text-input-search input[type="search"],.mec-gCalendar-search-text-wrap input[type=text]').val(text);
      });

      $('.event-ss svg').click(function(event) {
        $('.mec-text-input-search input[type="search"]').change();
        $('.fc-findEvents-button').trigger('click');
      });

      $('#event-view').change(function(event) {
        var data = $(this).val();
        $('.title-cat li').removeClass('active');
        $('.title-cat li[data-id="0"]').addClass('active');
        $('.mec-totalcal-view span[data-skin="'+data+'"]').trigger('click');

         if (data != 'monthly') {
          window.location.replace("<?php echo $actual_link; ?>/?type="+data);
        }
        else if (data == 'monthly') {
          window.location.replace("<?php echo $actual_link; ?>");
        }
      });

      <?php if (!empty($_GET['type'])): ?>
      $('.title-cat li').click(function(event) {
           var data = $(this).attr('data-id');
           $('.title-cat li').removeClass('active');
           $(this).toggleClass('active');
           // $('.mec-dropdown-search select option').val(data);
           // $('.mec-dropdown-search select').val(data).change();
           if (data == '0') {
             $('.mec-dropdown-search select').val('').change();
           }
           else {
             $('.mec-dropdown-search ul.list li[data-value="'+data+'"]').trigger('click');
           }
      });
      <?php else: ?>
      $('.title-cat li').click(function(event) {
           var data = $(this).attr('data-id');
           $('.title-cat li').removeClass('active');
           $(this).toggleClass('active');
           // $('.mec-dropdown-search select option').val(data);
           // $('.mec-dropdown-search select').val(data).change();
           if (data == '0') {
             $('.mec-dropdown-search select').val('').change();
           }
           else {
             $('.mec-gCalendar-filters-wrap .nice-select .list li[data-value="'+data+'"]').trigger('click');
             $('button.fc-findEvents-button').trigger('click');
           }
      });

      <?php endif; ?>


    });
  </script>
