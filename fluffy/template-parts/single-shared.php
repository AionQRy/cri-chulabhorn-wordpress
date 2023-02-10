<script src="<?php echo get_template_directory_uri(); ?>/js/clipboard.min.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    var clipboard = new ClipboardJS('.copy_this');
    clipboard.on('success', function(e) {
      $('.copy_this span').html('<i class="fas fa-check"></i> <?php yp_text('คัดลอกแล้ว','Copied'); ?>');

      setTimeout(function () { $('#created_link').select(); }, 100);
      setTimeout(function () {
            $('.embedded-iframe').removeClass('active');
      }, 300);
      setTimeout(function () {
        $('.copy_this span').html('<?php yp_text('คัดลอกโค้ด','Copy'); ?>');
      }, 500);
      e.clearSelection();
    });

    $('.get_embed').click(function(event) {
      $('.embedded-iframe').toggleClass('active');
    });

  });
</script>
<?php if ($_GET['type'] == 'embed'): ?>
  <style media="screen">
    .main-header,footer.footer-yp,.bottom_banner,.single_sidebar,.vpost_title,.yp_breadcrumb,.wrap-tag-shared,html #wpadminbar{
      display: none!important;
    }
    .single .entry-content {
    border: 0;
    }
    html {
    margin: 0!important;
      }
      .yp_single_content {
          padding: 20px;
      }
    .single .main-content .content-left {
    width: 100%;
    padding: 0 20px;
  }
  </style>
<?php endif; ?>
<div class="left-share" data-id="<?php echo get_the_ID(); ?>">
    <h4><?php yp_text('แชร์','Share this') ?></h4>
    <div class="shared-embedded-wrap">
      <button class="get_embed">Embed <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg></button>
      <div class="embedded-iframe">
        <textarea name="name" id="created_link" rows="8" cols="80"><iframe src="<?php echo home_url(); ?>/?p=<?php echo get_the_ID(); ?>&type=embed" style="width: 100%;height: 500px;border: 2px solid #dfdfdf;!important" ></textarea>
        <button class="btn copy_this" data-clipboard-target="#created_link">
          <span><?php yp_text('คัดลอกโค้ด','Copy'); ?></span>
        </button>
      </div>
    </div>
    <?php echo do_shortcode('[Sassy_Social_Share]'); ?>
</div>
