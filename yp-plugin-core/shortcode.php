<?php
function bottom_banner() {
		ob_start();
?>
<div class="bottom_banner">
	<div class="v-container  wow fadeInRight slow">

		<?php if( have_rows('bottom_banner','option') ): ?>
		    <div class="swiper sw-bottom_banner">
		  		<div class="swiper-wrapper">
			    <?php while( have_rows('bottom_banner','option') ): the_row();
			        $image = get_sub_field('b_image');
			        ?>
			        <div class="swiper-slide">
			           <a target="_blank" href="<?php echo get_sub_field('b_url'); ?>">
									  <?php echo wp_get_attachment_image( $image['id'], 'full' ); ?>
								 </a>
			        </div>
			    <?php endwhile; ?>
		    </div>
				<div class="swiper-button-prev">
					<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
						<polyline points="15 18 9 12 15 6"></polyline>
					</svg>
				</div>
				<div class="swiper-button-next">
					<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
						<polyline points="9 18 15 12 9 6"></polyline>
					</svg>
				</div>
			</div>
			<script type="module">
			var swiper = new Swiper(".sw-bottom_banner", {
				slidesPerView: 3,
				spaceBetween: 15,
				autoplay: {
			    delay: 5000,
			  },
				loop: true,
			  autoHeight: true,
				pagination: {
					el: ".sw-bottom_banner .swiper-pagination",
					clickable: true,
				},
				navigation: {
					nextEl: ".sw-bottom_banner .swiper-button-next",
					prevEl: ".sw-bottom_banner .swiper-button-prev",
				},
				breakpoints: {
					 320: {
						 slidesPerView: 1,
						 slidesPerGroup: 1,
						 spaceBetween: 10,
					 },
					 768: {
						 slidesPerView: 3,
						 slidesPerGroup: 3,
						 spaceBetween: 15,
					 },
					 1024: {
						 slidesPerView: 3,
						 slidesPerGroup: 3,
						 spaceBetween: 15,
					 },
				 }
			});
			</script>
		<?php endif; ?>


	</div>
</div>


<?php
$output_string = ob_get_contents();
ob_end_clean();
return $output_string;
}
add_shortcode('bottom_banner','bottom_banner');

function polylang_dropdown() {
	if ( ! function_exists( 'pll_the_languages' ) ) return;

	  // Gets the pll_the_languages() raw code
	  $languages = pll_the_languages( array(
	    'display_names_as'       => 'name',
	    'hide_if_no_translation' => 0,
			'show_flags' => 1,
	    'raw'                    => true
	  ) );
		// print_r($languages);

	  // $output = '';

	  // Checks if the $languages is not empty
	  if ( ! empty( $languages ) ) {

	    // Creates the $output variable with languages container
	  ?>
    <div class="languages-yp">

    <?php

	    // Runs the loop through all languages

       foreach ( $languages as $language ) {
         $id             = $language['id'];
         $name           = $language['name'];
         $url            = $language['url'];
         $current        = $language['current_lang'] ? ' languages__item--current' : '';
         $no_translation = $language['no_translation'];
         ?>
         <?php if ($current): ?>
           <div class="current_btn_lang <?php echo $current; ?>">
            <!-- <img src="<php echo YP_DIRECTORY_URL.'/assets/img/'.$language['slug']; ?>.svg" alt="<php echo $name; ?>"> -->
            <span><?php echo $name; ?></span>
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="6 9 12 15 18 9"></polyline></svg>
             <div class="dropdown_lang">

             <?php
              foreach ( $languages as $language ) {

                   // Variables containing language data
                   $id             = $language['id'];
                   $name           = $language['name'];
                   $url            = $language['url'];
                   $current        = $language['current_lang'] ? ' languages__item--current' : '';
                   $no_translation = $language['no_translation'];

                       ?>

                       <a href="<?php echo $url; ?>" class="languages__item <?php echo $current; ?>">
                         <?php echo $name; ?>
                       </a>
                       <?php
                 }
                ?>

              </div>
           </div>
         <?php endif; ?>

         <?php } ?>
      </div>

<?php
}
	  // return $output;
}

add_shortcode( 'polylang_dropdown', 'polylang_dropdown' );



function polylang_slink() {
	if ( ! function_exists( 'pll_the_languages' ) ) return;

	  // Gets the pll_the_languages() raw code
	  $languages = pll_the_languages( array(
	    'display_names_as'       => 'name',
	    'hide_if_no_translation' => 0,
			'show_flags' => 1,
	    'raw'                    => true
	  ) );
		// print_r($languages);

	  // $output = '';

	  // Checks if the $languages is not empty
	  if ( ! empty( $languages ) ) {

	    // Creates the $output variable with languages container
	  ?>
    <div class="polylang_slink">

    <?php

	    // Runs the loop through all languages

       foreach ( $languages as $language ) {
         $id             = $language['id'];
         $name           = $language['name'];
         $url            = $language['url'];
         $current        = $language['current_lang'] ? ' languages__item--current' : '';
         $no_translation = $language['no_translation'];
         ?>
         <?php if ($current): ?>

             <?php
              foreach ( $languages as $language ) {

                   // Variables containing language data
                   $id             = $language['id'];
                   $name           = $language['name'];
                   $url            = $language['url'];
                   $current        = $language['current_lang'] ? ' languages__item--current' : '';
                   $no_translation = $language['no_translation'];

                       ?>

                       <a href="<?php echo $url; ?>" class="languages__item <?php echo $current; ?>">
												 <!--<div class="wrap-img-flag">
												 	 <img src="<php echo YP_DIRECTORY_URL.'/assets/img/'.$language['slug']; ?>.svg" alt="<php echo $name; ?>">
												 </div>-->
												 <div class="ftext">
													 <?php yp_text('EN/English','TH/ไทย'); ?>
												 </div>
                       </a>
                       <?php
                 }
                ?>


         <?php endif; ?>

         <?php } ?>
      </div>

<?php
}
	  // return $output;
}

add_shortcode( 'polylang_slink', 'polylang_slink' );



function social_list() {
		ob_start();
?>
<?php
$facebook = get_field('facebook_link', 'option');
$twitter = get_field('twitter_link', 'option');
$youtube = get_field('youtube_link', 'option');
$line = get_field('line_link', 'option');
$map = get_field('map_link', 'option');
?>
<div class="social-list">
	<ul>
		<?php if ($facebook): ?>
			<li>
				<a target="_blank" href="<?php echo $facebook; ?>">
<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
				</a>
			</li>
		<?php endif; ?>

		<?php if ($twitter): ?>
			<li>
				<a target="_blank" href="<?php echo $twitter; ?>">
					<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
				</a>
			</li>
		<?php endif; ?>

		<?php if ($line): ?>
			<li>
				<a target="_blank" href="<?php echo $line; ?>">
					<span>
<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M24 10.304c0-5.369-5.383-9.738-12-9.738-6.616 0-12 4.369-12 9.738 0 4.814 4.269 8.846 10.036 9.608.391.084.922.258 1.057.592.121.303.079.778.039 1.085l-.171 1.027c-.053.303-.242 1.186 1.039.647 1.281-.54 6.911-4.069 9.428-6.967 1.739-1.907 2.572-3.843 2.572-5.992zm-18.988-2.595c.129 0 .234.105.234.234v4.153h2.287c.129 0 .233.104.233.233v.842c0 .129-.104.234-.233.234h-3.363c-.063 0-.119-.025-.161-.065l-.001-.001-.002-.002-.001-.001-.003-.003c-.04-.042-.065-.099-.065-.161v-5.229c0-.129.104-.234.233-.234h.842zm14.992 0c.129 0 .233.105.233.234v.842c0 .129-.104.234-.233.234h-2.287v.883h2.287c.129 0 .233.105.233.234v.842c0 .129-.104.234-.233.234h-2.287v.884h2.287c.129 0 .233.105.233.233v.842c0 .129-.104.234-.233.234h-3.363c-.063 0-.12-.025-.162-.065l-.003-.004-.003-.003c-.04-.042-.066-.099-.066-.161v-5.229c0-.062.025-.119.065-.161l.004-.004.003-.003c.042-.04.099-.066.162-.066h3.363zm-10.442.001c.129 0 .234.104.234.233v5.229c0 .128-.105.233-.234.233h-.842c-.129 0-.234-.105-.234-.233v-5.229c0-.129.105-.233.234-.233h.842zm2.127 0h.008l.012.001.013.001.01.001.013.003.008.003.014.004.008.003.013.006.007.003.013.007.007.004.012.009.006.004.013.011.004.004.014.014.002.002.018.023 2.396 3.236v-3.106c0-.129.105-.233.234-.233h.841c.13 0 .234.104.234.233v5.229c0 .128-.104.233-.234.233h-.841l-.06-.008-.004-.001-.015-.005-.007-.003-.012-.004-.011-.006-.007-.003-.014-.009-.002-.002-.06-.058-2.399-3.24v3.106c0 .128-.104.233-.234.233h-.841c-.129 0-.234-.105-.234-.233v-5.229c0-.129.105-.233.234-.233h.841z"/></svg>
					</span>
				</a>
			</li>
		<?php endif; ?>

		<?php if ($youtube): ?>
			<li>
				<a target="_blank" href="<?php echo $youtube; ?>">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 310 310" style="enable-background:new 0 0 310 310;" xml:space="preserve">
					<g id="XMLID_822_">
						<path id="XMLID_823_" d="M297.917,64.645c-11.19-13.302-31.85-18.728-71.306-18.728H83.386c-40.359,0-61.369,5.776-72.517,19.938   C0,79.663,0,100.008,0,128.166v53.669c0,54.551,12.896,82.248,83.386,82.248h143.226c34.216,0,53.176-4.788,65.442-16.527   C304.633,235.518,310,215.863,310,181.835v-53.669C310,98.471,309.159,78.006,297.917,64.645z M199.021,162.41l-65.038,33.991   c-1.454,0.76-3.044,1.137-4.632,1.137c-1.798,0-3.592-0.484-5.181-1.446c-2.992-1.813-4.819-5.056-4.819-8.554v-67.764   c0-3.492,1.822-6.732,4.808-8.546c2.987-1.814,6.702-1.938,9.801-0.328l65.038,33.772c3.309,1.718,5.387,5.134,5.392,8.861   C204.394,157.263,202.325,160.684,199.021,162.41z"/>
					</g>
					</svg>
				</a>
			</li>
		<?php endif; ?>

		<?php if ($map): ?>
			<li class="map">
				<a target="_blank" href="<?php echo $map; ?>">
<svg xmlns="http://www.w3.org/2000/svg" fill="#000000" viewBox="0 0 50 50" width="50px" height="50px"><path d="M 36 2 C 35.570313 2 35.136719 2.015625 34.71875 2.0625 C 34.605469 2.074219 34.488281 2.109375 34.375 2.125 C 34.070313 2.164063 33.765625 2.21875 33.46875 2.28125 C 33.355469 2.304688 33.269531 2.316406 33.15625 2.34375 C 32.863281 2.414063 32.566406 2.5 32.28125 2.59375 C 32.1875 2.625 32.09375 2.652344 32 2.6875 C 31.699219 2.796875 31.382813 2.929688 31.09375 3.0625 C 31.023438 3.09375 30.976563 3.125 30.90625 3.15625 C 30.597656 3.304688 30.292969 3.453125 30 3.625 C 29.953125 3.652344 29.890625 3.691406 29.84375 3.71875 C 29.53125 3.90625 29.230469 4.097656 28.9375 4.3125 C 28.914063 4.332031 28.898438 4.355469 28.875 4.375 C 28.5625 4.609375 28.257813 4.863281 27.96875 5.125 C 27.960938 5.132813 27.945313 5.117188 27.9375 5.125 C 27.636719 5.398438 27.363281 5.699219 27.09375 6 C 25.1875 8.125 24 10.925781 24 14 C 24 18.148438 26.136719 20.992188 28.40625 24 C 29.230469 25.09375 30.109375 26.246094 30.9375 27.53125 C 32.722656 29.773438 34.371094 32.410156 35.28125 35.90625 C 35.421875 36.449219 35.417969 36.875 35.65625 37.0625 C 35.765625 37.085938 35.871094 37.09375 36 37.09375 C 36.128906 37.09375 36.234375 37.082031 36.34375 37.0625 C 36.582031 36.875 36.578125 36.449219 36.71875 35.90625 C 37.628906 32.410156 39.277344 29.773438 41.0625 27.53125 C 41.890625 26.246094 42.769531 25.089844 43.59375 24 C 43.734375 23.816406 43.863281 23.621094 44 23.4375 C 44.214844 23.152344 44.417969 22.878906 44.625 22.59375 C 44.722656 22.460938 44.808594 22.320313 44.90625 22.1875 C 45.0625 21.964844 45.222656 21.753906 45.375 21.53125 C 45.484375 21.367188 45.582031 21.195313 45.6875 21.03125 C 45.820313 20.828125 45.972656 20.644531 46.09375 20.4375 C 46.203125 20.253906 46.304688 20.0625 46.40625 19.875 C 46.515625 19.679688 46.621094 19.480469 46.71875 19.28125 C 46.820313 19.078125 46.910156 18.863281 47 18.65625 C 47.085938 18.464844 47.175781 18.257813 47.25 18.0625 C 47.339844 17.832031 47.394531 17.613281 47.46875 17.375 C 47.527344 17.1875 47.605469 17.003906 47.65625 16.8125 C 47.726563 16.53125 47.761719 16.230469 47.8125 15.9375 C 47.839844 15.773438 47.886719 15.636719 47.90625 15.46875 C 47.964844 15 48 14.503906 48 14 C 48 7.382813 42.617188 2 36 2 Z M 6.34375 6 C 3.953125 6 2 7.953125 2 10.34375 L 2 43.65625 C 2 43.882813 2.027344 44.09375 2.0625 44.3125 C 2.382813 46.386719 4.179688 48 6.34375 48 L 39.65625 48 C 39.882813 48 40.09375 47.972656 40.3125 47.9375 C 42.277344 47.632813 43.8125 46.011719 43.96875 44 L 44 44 L 44 26.78125 C 43.582031 27.355469 43.160156 27.957031 42.75 28.59375 L 42.625 28.78125 C 40.597656 31.328125 39.367188 33.675781 38.65625 36.40625 C 38.625 36.523438 38.613281 36.617188 38.59375 36.71875 C 38.515625 37.125 38.371094 37.773438 37.90625 38.3125 L 42 42.40625 L 42 43.65625 C 42 44.941406 40.941406 46 39.65625 46 L 38.40625 46 L 24.34375 31.96875 L 27.9375 28.3125 L 31.5 31.90625 C 30.914063 30.871094 30.21875 29.839844 29.375 28.78125 L 29.25 28.59375 C 28.667969 27.691406 28.078125 26.902344 27.5 26.125 L 7.59375 46 L 6.34375 46 C 5.058594 46 4 44.941406 4 43.65625 L 4 42.40625 L 24.46875 21.90625 C 23.058594 19.671875 22 17.183594 22 14 C 22 11.027344 22.941406 8.269531 24.53125 6 Z M 12.125 10 C 13.710938 10 15.132813 10.605469 16.21875 11.59375 L 14.5 13.3125 C 13.855469 12.761719 13.039063 12.4375 12.125 12.4375 C 10.089844 12.4375 8.4375 14.089844 8.4375 16.125 C 8.4375 18.160156 10.089844 19.8125 12.125 19.8125 C 13.835938 19.8125 15.003906 18.789063 15.4375 17.375 L 12.125 17.375 L 12.125 15.03125 L 17.875 15.03125 C 18.378906 17.414063 17.46875 22.21875 12.125 22.21875 C 8.75 22.21875 6 19.5 6 16.125 C 6 12.75 8.75 10 12.125 10 Z M 36 11 C 37.65625 11 39 12.34375 39 14 C 39 15.65625 37.65625 17 36 17 C 34.34375 17 33 15.65625 33 14 C 33 12.34375 34.34375 11 36 11 Z"></path></svg>
				</a>
			</li>
		<?php endif; ?>

		<li class="print2pdf">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 511 511.999" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><path d="M276.41 3.957C274.062 1.484 270.844 0 267.508 0H67.778C30.921 0 .5 30.3.5 67.152v377.692C.5 481.699 30.922 512 67.777 512h271.086c36.856 0 67.278-30.3 67.278-67.156V144.94c0-3.214-1.485-6.304-3.586-8.656Zm3.586 39.7 84.469 88.671h-54.91c-16.325 0-29.559-13.11-29.559-29.433Zm58.867 443.609H67.777c-23.125 0-42.543-19.168-42.543-42.422V67.152c0-23.125 19.293-42.418 42.543-42.418h187.485v78.16c0 30.051 24.242 54.168 54.293 54.168h71.851v287.782c0 23.254-19.293 42.422-42.543 42.422Zm0 0" style="stroke:none;fill-rule:nonzero;fill-opacity:1;" fill="#ffffff" data-original="#000000"/><path d="M305.102 401.934H101.539c-6.8 0-12.367 5.562-12.367 12.367 0 6.8 5.566 12.367 12.367 12.367h203.688c6.8 0 12.367-5.566 12.367-12.367 0-6.805-5.567-12.367-12.492-12.367ZM194.293 357.535c2.352 2.473 5.566 3.957 9.027 3.957 3.465 0 6.68-1.484 9.028-3.957l72.472-77.789c4.7-4.95 4.328-12.863-.617-17.437-4.95-4.7-12.863-4.332-17.437.617l-51.079 54.785V182.664c0-6.805-5.566-12.367-12.367-12.367-6.8 0-12.367 5.562-12.367 12.367v135.047L140 262.926c-4.7-4.946-12.492-5.317-17.438-.617-4.945 4.699-5.316 12.492-.617 17.437Zm0 0" style="stroke:none;fill-rule:nonzero;fill-opacity:1;" fill="#ffffff" data-original="#000000"/></g></svg>
		</li>
	</ul>
</div>
<?php
$output_string = ob_get_contents();
ob_end_clean();
return $output_string;
}
add_shortcode('social_list','social_list');
