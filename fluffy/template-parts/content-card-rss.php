<article class="card-rss">
    <a class="link-all" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"></a>
    <div class="column-box">
        <div class="c-1">
            <div class="feature-column">
                <div class="feature-image">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/theme-core/theme-1/img/rss-img-1.png" alt="" srcset="">
                    </a>
                </div>
                <div class="text-box">
                    <h3><a href="#"><?php echo get_the_title(); ?></a></h3>
                    <p><?php echo get_the_excerpt() ?></p>
                </div>
            </div>
        </div>
        <div class="c-2">
            <div class="sub-box">
                <div class="date-box">
                <?php $post_date = get_the_date( 'd M Y' ); ?>
				<span class="date-post_card">
						<svg viewBox="0 0 24 24" width="24" height="24" stroke="#0074bc" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
						<span class="text-card"><?php echo $post_date; ?></span>
				</span>
                </div>
                <div class="btn-card">
                    <a href="#" class="btn-rss"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                </div>
            </div>
        </div>
    </div>
</article>
