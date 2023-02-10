<?php header_fuc(); ?>
<link rel='stylesheet' id='vc-fontawesome-solid-2' href='<?php echo site_url(); ?>/wp-content/plugins/elementor/assets/lib/font-awesome/css/solid.min.css' media='all' />
<link rel='stylesheet' id='vc-fontawesome-2' href='<?php echo site_url(); ?>/wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min.css' media='all' />
<?php
$taxonomy = 'rss_category';
$post_type = 'vc_rss';
 ?>

<main id="primary" class="site-main archive-box">
		<?php get_template_part( 'template-parts/vc-post-title'); ?>


	<div class="detail-archive_box detail-archive-<?php echo $post_type; ?>">
		<div class="v-container">

			<div id="grid-column-post" class="grid-column-post">
				<div class="title-td">
					<h3><?php the_title(); ?></h3>
				</div>

           <div class="column-post_grid">
            <div class="box-post_grid">
              <div id="main" class="main-post_column">

                <?php
                  $rss = simplexml_load_file(get_field('rss_url'));
                  if (!empty($rss)): ?>
                   <?php
                   if ($rss->channel) {

                   foreach ($rss->channel->item as $item){
                     if ($item->img) {
                       $img = $item->img;
                     }
                     if ($item->enclosure) {
                       $img = $item->enclosure['url'];
                     }
                    require( 'template-parts/content-card-rss-single.php');
                    }
                  }
                     ?>
                 <?php endif; ?>

              </div>
             </div>
            </div>
			</div>
		</div>
	</div>
</main><!-- #main -->
<?php
  footer_fuc();
