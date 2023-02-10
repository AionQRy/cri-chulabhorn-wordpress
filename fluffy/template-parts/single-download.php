<?php if (get_field('files_download') && get_field('files_download')[0]['file_download'] != '' ): ?>

  <div class="file-download-list section-box-single">
    <div class="left">
      <h3 class="section-title">
        <div class="icon-title">
          <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
        </div>
        <?php
        yp_text('ไฟล์เอกสารที่เกี่ยวข้อง','File Attachment');
         ?>
      </h3>
    </div>
    <div class="right">
      <?php if( have_rows('files_download') ): ?>
        <?php while( have_rows('files_download') ): the_row();?>
            <?php require('content-list-download.php'); ?>
          <?php endwhile; ?>
      <?php endif; ?>
    </div>



 </div>
<?php endif; ?>
