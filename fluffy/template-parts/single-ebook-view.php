<?php
      if (get_field('ebook_file')) {
        echo do_shortcode('[dflip source="'.get_field('ebook_file')['url'].'"]');
  ?>
  <div class="wrap-all-list ebook">
    <div class="file-btn">
      <a target="_blank" href="<?php echo get_field('ebook_file')['url']; ?>" class="btn-file-download">
        <?php yp_text('ดาวน์โหลด','Download'); ?>
      <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polyline points="8 12 12 16 16 12"></polyline><line x1="12" y1="8" x2="12" y2="16"></line></svg>
    </a>
    </div>
  </div>
  <style media="screen">
   .entry-featured-image{
    display: none;
  }
  .wrap-all-list.ebook .file-btn {
      float: none;
      margin: 17px auto 30px;
      text-align: center;
    }
  </style>
<?php } ?>
