<?php
/*
Template Name: お問い合わせ
*/
?>

<!-- header.phpを読み込む -->
<?php get_header(); ?>


<section class="form">
    <div id="contact">
        <div class="contact-us">
            <?php echo do_shortcode('[mwform_formkey key="23"]'); ?>
        </div>
    </div>
</section>



<!-- footer.phpを読み込む -->
<?php get_footer(); ?>