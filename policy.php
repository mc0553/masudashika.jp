<?php
/*
Template Name: プライバシーポリシー
*/
?>

<!-- header.phpを読み込む -->
<?php get_header(); ?>

<div id="container">
    
    <?php
    $page_data = get_page_by_path('privacy-policy'); $page = get_post($page_data);
    $content = $page -> post_content;
    
    // 本文を表示する（自動整形含む）
    echo apply_filters('the_content', $content);
    ?>
    
</div>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>