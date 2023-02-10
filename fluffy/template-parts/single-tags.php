<div class="single-tags">
  <div class="vtitle">
    <p><?php yp_text("แท๊ก",'Tags'); ?></p>
  </div>
  <?php
    $tags_lists = wp_get_post_terms( get_the_ID(), $tags );
     if (!empty($tags_lists)) { ?>
    <div class="tags_list">
      <?php
     foreach($tags_lists as $tags_list) {
       ?>
          <a href="<?php echo get_category_link( $tags_list->term_id ) ?>">
               <?php echo $tags_list->name; ?>
          </a>
    <?php  }  ?>
    </div>
  <?php	}
  else {
  ?>
  <style media="screen">
    .single-tags .vtitle{
      display: none;
    }
  </style>
  <?php
  } ?>

</div>
