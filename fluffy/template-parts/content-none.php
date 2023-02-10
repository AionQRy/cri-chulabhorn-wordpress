<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fluffy
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'fluffy' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'fluffy' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>
			<div class="box-none_search">
				<div class="h3-fail">
					<?php yp_text( 'ผลลัพธ์การค้นหา', 'Results for' ); ?>
					<?php if($_GET['s']){
						?>
						<span class="word-t word-s">"<?php echo $_GET['s'];?>"</span>
						<?php
					}?>					
					<?php yp_text( 'พบ', 'found' ); ?>
					<span class="word-t word-f"></span>
					<?php yp_text( 'บทความ', 'items' ); ?>
				</div>
				<div class="messager-error">
				<?php yp_text( 'ขออภัย ไม่มีอะไรที่ตรงกับคำค้นหาของคุณ โปรดลองอีกครั้งโดยใช้คำหลักอื่น', 'Sorry, but nothing matched your search terms. Please try again with some different keywords.' ); ?>
				</div>
				
			</div>
			<?php
			// get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'fluffy' ); ?></p>
			<?php
			// get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
