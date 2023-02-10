<?php
    $url_rss = get_field('url_rss', get_the_ID() );
    if($url_rss == ''){
        $url = '#';
    }else{
        $url = $url_rss;
    }
?>
<article class="card-rss card-publications">
    <div class="column-box">
        <div class="c-1">
            <div class="feature-column">
                <div class="text-box">
                  <?php the_content(); ?>
                    <!-- <p><php the_excerpt() ?></p> -->
                </div>
            </div>
        </div>
    </div>
</article>
