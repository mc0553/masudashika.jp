<?php
/*
Template Name: infomation
*/
?>

<section>
  <table class="infoCategory">
    <caption>お知らせ !New!</caption>
    <tbody>

      <?php
      $newslist = get_posts(array(
        'category_name' => 'info', //特定のカテゴリースラッグを指定
        'posts_per_page' => 5 //取得記事件数
      ));
      foreach ($newslist as $post) :
        setup_postdata($post);
        ?>

        <tr class="tr">
          <th class="firstth"><?php the_time('Y年n月j日'); ?></th>
          <th class="secoundth"><?php the_title(); ?></th>
          <th class="thirdth"><?php the_content(); ?></th>
        </tr>

      <?php
      endforeach;
      wp_reset_postdata();
      ?>

    </tbody>
  </table>
</section>