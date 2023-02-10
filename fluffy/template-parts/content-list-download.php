<div class="vitem-download-list">
  <div class="ob1">
        <?php
         $url_host = get_sub_field('file_download');
         $ext = pathinfo($url_host['url'], PATHINFO_EXTENSION);
         $file_icon_type = ext_file($ext);
    ?>
    <div class="bg type-<?php echo $ext; ?>">
      <img src="<?php echo  $file_icon_type; ?>" alt="<?php the_title(); ?>">
    </div>

  </div>
  <div class="ob2">
    <div class="top">
    <a data-id="<?php echo get_row_index(); ?>" data-pid="<?php echo get_the_ID(); ?>" target="_blank" href="<?php echo $url_host['url']; ?>">
      <h4>
        <span>
          <?php
          if (is_single()) {
            echo $url_host['title'];
          }
          else {
              the_title();
          }
          ?>
        </span>
        <?php
        new_labels();
         ?>
      </h4>
    </a>
    </div>
    <div class="bottom">
        <div class="list-1">
          <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
          <span>
            <?php
            if (!empty($url_host['url'])) {
              echo file_size_html($url_host['url']);
            }
             ?>
          </span>
        </div>
        <div class="list-2">
          <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
            <span>
              <?php
              if (!empty(get_sub_field('file_download_count'))) {
                echo get_sub_field('file_download_count');
              }
              else {
                echo "0";
              }
               ?>
            </span>
        </div>
        <div class="list-3">
          <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
            <button type="button" data-url="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" data-id="<?php echo get_row_index(); ?>" data-pid="<?php echo get_the_ID(); ?>" title="<?php echo $url_host['title']; ?>" class="file_broken_btn id-<?php echo get_the_ID();  ?>">
            <?php yp_text('แจ้งไฟล์เสีย','Report'); ?>
          </button>
        </div>
    </div>
  </div>

  <div class="ob3">

    <a data-id="<?php echo get_row_index(); ?>" data-pid="<?php echo get_the_ID(); ?>" target="_blank" href="<?php echo $url_host['url']; ?>" class="download-btn">
      <span>
          <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
      </span>
      <span><?php yp_text('ดาวน์โหลด','Download'); ?></span>
    </a>
  </div>
</div>
