<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fluffy
 */

header_fuc();
global $post;
$post_type = get_post_type( get_the_ID() );
if ($post_type == 'vc_photos') {
	$taxonomy = 'vc_photo_category';
	$tags = 'vc_photo_tags';
}
elseif ($post_type == 'vc_videos') {
	$taxonomy = 'vc_video_category';
	$tags = 'vc_video_tags';
}
elseif ($post_type == 'vc_ebook') {
	$taxonomy = 'vc_ebook_category';
	$tags = 'vc_ebook_tags';
}
elseif ($post_type == 'vc_downloadmanager') {
	$taxonomy = 'vc_download_category';
	$tags = 'vc_download_tags';
}
elseif ($post_type == 'mec-events') {
	$taxonomy = 'mec_category';
	$tags = 'mec_tag';
}
elseif ($post_type == 'poll') {
	$taxonomy = 'poll_cat';
	$tags = '';
}
elseif ($post_type == 'vc_faqs') {
	$taxonomy = 'vc_faqs_category';
	$tags = '';
}
else {
	$taxonomy = 'category';
	$tags = 'post_tag';
}
?>

<main id="primary" class="site-main">
	<?php
	while ( have_posts() ) :
	the_post();
	?>

		<?php get_template_part( 'template-parts/vc-post-title'); ?>


		<div class="entry-content">
			<div class="v-container">
				<div class="main-content">
					<div class="wrap-single content-left style-2">
						<?php
							 require( 'template-parts/post-meta-s2.php');
						  	if ($post_type == 'vc_photos') {
							 	 require('template-parts/single-gallery-top.php');
							 }
							 elseif ($post_type == 'vc_videos') {
							 	require('template-parts/single-video.php');
							 }
							 else {
								 // require('template-parts/single-featured-image.php');
							 }
						?>

						<?php
							 require('template-parts/single-content.php');

							 if ($post_type != 'vc_videos') {
								 require('template-parts/single-video.php');
							 }

							 if ($post_type != 'vc_photos') {
							 	 require('template-parts/single-gallery.php');
							 }
							 require('template-parts/single-ebook-view.php');
							 require('template-parts/single-pdf-view.php');
							 require('template-parts/single-download.php');
						?>
						<div class="wrap-tag-shared">
							<?php
								require('template-parts/single-tags.php');
								require('template-parts/single-shared.php');
							 ?>
						</div>
			  	</div>
				<?php require('template-parts/single-sidebar.php'); ?>
			</div>  <!-- main-content -->
			</div> <!-- containner -->
		</div><!-- .entry-content -->
	<?php  endwhile; // End of the loop. ?>

</main><!-- #main -->

<?php
// get_sidebar();
footer_fuc();
