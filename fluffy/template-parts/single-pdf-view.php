<?php
$pdf_post = get_field('pdf_post');
if( $pdf_post ):
$url_pdf = $pdf_post['url'];
?>
<style media="screen">
  .box-show_pdf{
    margin-top: 15px;
  }
</style>
<div class="box-show_pdf">
    <?php echo do_shortcode( "[pdf-embedder toolbarfixed='on' toolbar='top' url='$url_pdf']" );?>
</div>
<?php endif; ?>
