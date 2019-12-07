<?php get_header(); ?>

<div id="container-single">
  <h2><?php the_title(); ?></h2>
  <section>
      <div class="sumne-img">
        <p class="time">投稿日：<?php the_time('Y/m/d'); ?></p>
        <img id="mainkizi" src="<?php the_post_thumbnail_url(); ?>" alt="">      
      </div>
  </section>

  <section class="single-section">
    <?php if (have_posts()): ?>
      <div class="single-contentwrap">
        <?php while(have_posts()): the_post(); ?>
          <div class="single-content">
              <?php the_content(); ?>
              <div class="backimg">
                  <?php previous_post_link('%link','＜ 前へ', true); ?>
                  <?php next_post_link('%link','次へ ＞', true); ?>
              </div>
          </div>
        <?php endwhile; endif; ?>
      </div>
  </section>
</div>

<?php get_footer(); ?>