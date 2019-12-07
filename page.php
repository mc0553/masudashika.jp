<?php
/*
Template Name: 診療内容
*/
?>

<!-- header.phpを読み込む -->
<?php get_header(); ?>

<section class="treatment">

    <?php
    $page_data = get_page_by_path('診療内容'); $page = get_post($page_data);
    $content = $page -> post_content;

    // 本文を表示する（自動整形含む）
    echo apply_filters('the_content', $content);
    ?>

</section>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>