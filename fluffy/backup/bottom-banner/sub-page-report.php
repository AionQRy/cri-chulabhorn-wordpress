<?php
// add_action('admin_menu', 'bottom_banner_register_ref_page');
function bottom_banner_register_ref_page() {

  add_submenu_page(
    'edit.php?post_type=banner_bottom',
    __( 'Reports', 'fluffy' ),
    __( 'Reports', 'fluffy' ),
    'manage_options',
    'bottom-banner-report',
    'report_page_callback'
);

}


function report_page_callback(){
  ?>
  <?php global $wpdb;?>
  <div id="report-bottom-wrap" data-prefix="<?php echo $wpdb->prefix ?>">
    <h1>Report</h1>
  </div>

  <style media="screen">
  @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@200;300&display=swap');
  .notice, div.error, div.updated {
      margin-left: 0;
  }

  .wrap-content{
    padding: 0 25px;
  }
  #report-bottom-wrap h1{
      font-family: 'Kanit', sans-serif;
    padding-top: 2rem;
    margin-bottom: 15px;
    padding-bottom: 2rem;
    border-bottom: 1px solid #c7c7c7;
    margin-top: 0;
    background: #12273e;
    color: #fff;
    padding-left: 1rem;
  }
  #wpcontent, #wpfooter {
      padding-left: 0;
  }
  </style>

  <?php
}
 ?>
