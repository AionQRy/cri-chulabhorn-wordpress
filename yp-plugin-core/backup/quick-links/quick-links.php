<?php
function quick_links()
{
  ob_start();
?>
  <style media="screen">
    /* .yp-row.auto-grid {
      display: -ms-grid;
      display: grid;
      padding: 0 10px;
      -ms-grid-columns: (minmax(30px, 1fr))[auto-fit];
      grid-template-columns: repeat(auto-fit, minmax(30px, 1fr));
      margin-top: 9px;
      grid-auto-flow: dense;
    } */

    .item-quick-links {
      text-align: center;
    }

    .item-quick-links .order-number {
      display: inline-block;
      background-color: #eee;
      border-radius: 3px;
      padding: 4px 6px 2px;
      line-height: 12px;
      font-size: 12px;
      color: #222;
    }

    .item-quick-links h6 {
      font-size: 18px;
    }

    .item-quick-links h6 {
      font-size: 13px;
      margin: 10px 5px;
    }

    .item-quick-links a {
      display: block;
    }

    @media (max-width:767px) {
      .yp-row.auto-grid {
        grid-template-columns: repeat(3, 1fr);
      }

      .item-quick-links {
        margin-bottom: 10px;
      }
    }
  </style>
  <div class="yp-row auto-grid quick_links theme-<?php echo get_field('setting_theme', 'option'); ?>">
    <div class="main-object" id="minimize-more-info-menu" x-data="{ open: true }">
      <div class=" object-quick object-1" x-show="open">
        <h3> <strong><?php yp_text('NSC', ''); ?></strong><?php yp_text('e-Services', 'บริการออนไลน์'); ?></h3>
        <h4><?php yp_text('บริการออนไลน์', 'MOE E-Services'); ?></h4>
        <div class="line-obj"></div>
      </div>
      <div class="object-quick object-2">
        <div class="quick-container">
          <div id="carousel_quicklink" class="swiper">
            <div class="swiper-wrapper">

          <?php if (have_rows('quick_links', 'option')) : ?>
            <?php
            $i = 0;
            while (have_rows('quick_links', 'option')) : the_row();
              $i++; ?>
              <?php
              $image_q = get_sub_field('image_h', 'option');
              $image_light = get_sub_field('image_light', 'option');
              $link = get_sub_field('link', 'option');
              $on_off = get_sub_field('on_off', 'option');
              $name = get_sub_field('name_quick', 'option');
              $new_tab = get_sub_field('new_tab', 'option');
              if ($new_tab == true) {
                $new_tab = '_blank';
              } else {
                $new_tab = '_self';
              }
              ?>
              <?php if ($on_off == true) : ?>
                <div class="item-quick-links swiper-slide">
                  <a href="<?php echo $link; ?>" target="<?php echo $new_tab; ?>">
                    <div class="thumbnail-link">
                      <?php if (get_field('setting_theme', 'option') == 'four') : ?>
                        <img src="<?php echo $image_light['url']; ?>" alt="<?php echo $image_light['title']; ?>">
                      <?php endif; ?>
                    </div>
                    <div class="title-link" x-show="open">
                      <h3><?php echo $name; ?></h3>
                    </div>
                    <?php if (get_field('setting_theme', 'option') == 'ten') : ?>
                      <div class="more-info">
                        <?php yp_text('ข้อมูลเพิ่มเติม','Read More'); ?>
                      </div>
                    <?php endif; ?>
                  </a>
                </div>
              <?php endif; ?>
            <?php endwhile; ?>

          <?php endif; ?>

        </div>

        <div class="swiper-button-prev"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
            <polyline points="15 18 9 12 15 6"></polyline>
          </svg>
        </div>
        <div class="swiper-button-next"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
            <polyline points="9 18 15 12 9 6"></polyline>
          </svg>
        </div>

      </div>
    </div>
      </div>
    </div>
  </div>

  <script type="module">
  var swiper = new Swiper("#carousel_quicklink", {
    slidesPerView: 6,
    spaceBetween: 0,
    autoplay: {
     delay: 5000,
   },
   breakpoints: {
       320: {
         slidesPerView: 2,
         spaceBetween: 5,
       },
       768: {
         slidesPerView: 5,
         spaceBetween: 5,
       },
       1024: {
         slidesPerView:6,
         spaceBetween: 5,
       },
     },
    loop: true,
    autoHeight: false,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });


  </script>
<?php
  $output_string = ob_get_contents();
  ob_end_clean();
  return $output_string;
}
add_shortcode('quick_links', 'quick_links');
