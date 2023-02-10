<?php
if( !defined( 'ABSPATH' ) )
    exit;
?>
<div class="warp-donation-add">

<div class="title">
        <h4 class="ywcds_amount_text"><?php yp_text('ระบุจำนวนเงิน','Specify Amount'); ?></h4>
</div>
<div class="ywcds_form_container">
  <div class="yp_currency_choice">
    <select id="currency_choice" onchange="javascript:location.href = this.value;">
          <option value=""><?php yp_text('เลือกสกุลเงิน','Choose Currency'); ?></option>
          <option <?php if ($_GET['currency'] == 'GBP') { echo "selected"; } ?> value="?currency=GBP">GBP (£)</option>
          <option <?php if ($_GET['currency'] == 'THB') { echo "selected"; } ?> value="?currency=THB">THB (฿)</option>
          <option <?php if ($_GET['currency'] == 'USD') { echo "selected"; } ?> value="?currency=USD">USD ($)</option>
        </select>
  </div>


    <form id="ywcds_add_donation_form" method="post">
        <div class="ywcds_amount_field">
          <div class="wrap-ywcds_amount">
            <input type="text" class="ywcds_amount" placeholder="<?php yp_text('ระบุจำนวนเงิน','Specify Amount'); ?>" name="ywcds_amount"/>
            <div class="currency-now">
              <?php
              if (empty($_GET['currency']) || $_GET['currency'] == 'GBP') {
                echo "£";
              }
              else if ($_GET['currency'] == 'THB') {
                echo "฿";
              }
              else{
                echo "$";
              }
               ?>
            </div>
          </div>

            <?php do_action('ywcds_after_widget_amount_field' );?>
        </div>
        <div class="ywcds_select_amounts_content">
        <?php if( !empty( $donation_amount ) ){

            $values = explode("|", $donation_amount );

            foreach ($values as $value ) {
                $value = apply_filters('ywcds_get_donation_amount', $value );
                $formatted_value = wc_price( $value );
	            if ( 'label' == $donation_amount_style ) :?>
	                <span class="ywcdp_single_amount button">
                        <?php echo $formatted_value;?>
                        <input type="hidden" value="<?php echo $value;?>">
                    </span>
            <?php else:?>
                <label for="single_donation_<?php echo $value;?>">
                    <?php echo $formatted_value;?>
                    <input type="radio" class="ywcdp_single_amount" value="<?php echo $value;?>" name="single_donation[]">
                </label>
            <?php
                endif;
            }

        }?>
        </div>
        <?php
            if( isset( $show_extra_desc ) && ( 'on' === $show_extra_desc ) ):

            ?>
            <div class="ywcds_show_extra_info_content">
                <label for="ywcds_show_extra_info"><?php echo ( $extra_desc_label );?></label>
                <input type="text" name="ywcds_show_extra_info" class="ywcds_show_extra_info" value="">
                <input type="hidden" name="ywcds_show_extra_info_label" value="<?php yp_text('ขั้นตอนถัดไป','Next Step'); ?>">
            </div>
        <?php endif;?>
        <div class="ywcds_button_field">
            <input type="hidden" class="ywcds_product_id" name="add_donation_to_cart" value="<?php echo $product_id;?>" />
            <input type="submit" name="ywcds_submit_widget" class="ywcds_submit_widget <?php echo $button_class;?>" value="<?php yp_text('ขั้นตอนถัดไป','Next Step'); ?>" />
        </div>
    </form>
    <img src="<?php echo esc_url( admin_url( 'images/wpspin_light.gif' ) ) ?>" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
    <div class="ywcds_message woocommerce-message" style="display: none;"></div>
</div>

</div>
