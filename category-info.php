<?php
/*
Template Name: お知らせ―カテゴリー表示
*/
?>

<?php get_header(); ?>

<?php
$paged = get_query_var('paged') ?: 1;

$args  = array(
    'paged' => $paged,
    'posts_per_page' => 9, // 表示する件数
    'orderby' => 'date', // 日付でソート
    'order' => 'DESC', // DESCで最新から表示、ASCで最古から表示
    'category_name' => 'info', // 表示したいカテゴリーのスラッグを指定

);
$the_query = new WP_Query($args);
?>

<?php if ($the_query->have_posts()) : ?>
    <div class="case-content">

        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="contentwrap box fadeIn">
                <div class="space">
                    <?php if (has_post_thumbnail()) : ?>
                        <!-- サムネイルが設定されている場合 -->
                        <a href="<?php echo get_permalink(); ?>">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                        </a>
                    <?php endif; ?>
                    <div class="space-div">
                        <p><?php the_time('Y/m/d'); ?>　投稿</p>
                        <p class="textheight">
                            <?php the_title(); ?>
                            <?php the_content(); ?>
                        </p>

                    </div>
                </div>
            </div>
        <?php endwhile; ?>

    </div>
<?php endif; ?>

<!-- ページャーの表示 -->
<?php if (function_exists('pagination')) :
    pagination($the_query->max_num_pages, $paged);
endif; ?>

<?php get_footer(); ?>