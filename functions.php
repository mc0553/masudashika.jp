<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'id' => 'sidebar-1',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="widget_title">',
        'after_title' => '</h2>',
    ));

    //記事にサムネイル画像を表示するためのコード
    add_theme_support('post-thumbnails');

    // カスタムメニューの「場所」を設定
    register_nav_menu( 'header-navi', 'ヘッダーナビ' );

    
    // 人気記事出力用
function getPostViews($postID){
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			return "0 View";
	}
	return $count.' Views';
}
function setPostViews($postID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
	}else{
			$count++;
			update_post_meta($postID, $count_key, $count);
	}
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);



// ここからはページャーの設定
/**
* ページネーション出力関数
* $paged : 現在のページ
* $pages : 全ページ数
* $range : 左右に何ページ表示するか
* $show_only : 1ページしかない時に表示するかどうか
*/
function pagination( $pages, $paged, $range = 2, $show_only = false ) {

    $pages = ( int ) $pages;    //float型で渡ってくるので明示的に int型 へ
    $paged = $paged ?: 1;       //get_query_var('paged')をそのまま投げても大丈夫なように

    //表示テキスト
    $text_first   = "« 最初へ";
    $text_before  = "←";
    $text_next    = "→";
    $text_last    = "最後へ »";

    if ( $show_only && $pages === 1 ) {
        // １ページのみで表示設定が true の時
        echo '<div class="pagination"><span class="current pager">1</span></div>';
        return;
    }

    if ( $pages === 1 ) return;    // １ページのみで表示設定もない場合

    if ( 1 !== $pages ) {
        //２ページ以上の時
        echo '<div class="pagination"><span class="page_num">Page ', $paged ,' of ', $pages ,'</span>';
        if ( $paged > $range + 1 ) {
            // 「最初へ」 の表示
            echo '<a href="', get_pagenum_link(1) ,'" class="first">', $text_first ,'</a>';
        }
        if ( $paged > 1 ) {
            // 「前へ」 の表示
            echo '<a href="', get_pagenum_link( $paged - 1 ) ,'" class="prev">', $text_before ,'</a>';
        }
        for ( $i = 1; $i <= $pages; $i++ ) {

            if ( $i <= $paged + $range && $i >= $paged - $range ) {
                // $paged +- $range 以内であればページ番号を出力
                if ( $paged === $i ) {
                    echo '<span class="current pager">', $i ,'</span>';
                } else {
                    echo '<a href="', get_pagenum_link( $i ) ,'" class="pager">', $i ,'</a>';
                }
            }

        }
        if ( $paged < $pages ) {
            // 「次へ」 の表示
            echo '<a href="', get_pagenum_link( $paged + 1 ) ,'" class="next">', $text_next ,'</a>';
        }
        if ( $paged + $range < $pages ) {
            // 「最後へ」 の表示
            echo '<a href="', get_pagenum_link( $pages ) ,'" class="last">', $text_last ,'</a>';
        }
        echo '</div>';
    }
}



// ここからパンくずリスト
if ( ! function_exists( 'custom_breadcrumb' ) ) {
    function custom_breadcrumb() {
  
      // トップページでは何も出力しないように
      if ( is_front_page() ) return false;
  
      //そのページのWPオブジェクトを取得
      $wp_obj = get_queried_object();
  
      echo '<div id="breadcrumb">'.  //id名などは任意で
        '<ul>'.
          '<li>'.
            '<a href="'. esc_url( home_url() ) .'"><span>ホーム</span></a>'.
          '</li>';
  
      if ( is_attachment() ) {
  
        /**
         * 添付ファイルページ ( $wp_obj : WP_Post )
         * ※ 添付ファイルページでは is_single() も true になるので先に分岐
         */
        $post_title = apply_filters( 'the_title', $wp_obj->post_title );
        echo '<li><span>'. esc_html( $post_title ) .'</span></li>';
  
      } elseif ( is_single() ) {
  
        /**
         * 投稿ページ ( $wp_obj : WP_Post )
         */
        $post_id    = $wp_obj->ID;
        $post_type  = $wp_obj->post_type;
        $post_title = apply_filters( 'the_title', $wp_obj->post_title );
  
        // カスタム投稿タイプかどうか
        if ( $post_type !== 'post' ) {
  
          $the_tax = "";  //そのサイトに合わせて投稿タイプごとに分岐させて明示的に指定してもよい
  
          // 投稿タイプに紐づいたタクソノミーを取得 (投稿フォーマットは除く)
          $tax_array = get_object_taxonomies( $post_type, 'names');
          foreach ($tax_array as $tax_name) {
              if ( $tax_name !== 'post_format' ) {
                  $the_tax = $tax_name;
                  break;
              }
          }
  
          $post_type_link = esc_url( get_post_type_archive_link( $post_type ) );
          $post_type_label = esc_html( get_post_type_object( $post_type )->label );
  
          //カスタム投稿タイプ名の表示
          echo '<li>'.
                '<a href="'. $post_type_link .'">'.
                  '<span>'. $post_type_label .'</span>'.
                '</a>'.
              '</li>';
  
          } else {
  
            $the_tax = 'category';  //通常の投稿の場合、カテゴリーを表示
  
          }
  
          // 投稿に紐づくタームを全て取得
          $terms = get_the_terms( $post_id, $the_tax );
  
          // タクソノミーが紐づいていれば表示
          if ( $terms !== false ) {
  
            $child_terms  = array();  // 子を持たないタームだけを集める配列
            $parents_list = array();  // 子を持つタームだけを集める配列
  
            //全タームの親IDを取得
            foreach ( $terms as $term ) {
              if ( $term->parent !== 0 ) {
                $parents_list[] = $term->parent;
              }
            }
  
            //親リストに含まれないタームのみ取得
            foreach ( $terms as $term ) {
              if ( ! in_array( $term->term_id, $parents_list ) ) {
                $child_terms[] = $term;
              }
            }
  
            // 最下層のターム配列から一つだけ取得
            $term = $child_terms[0];
  
            if ( $term->parent !== 0 ) {
  
              // 親タームのIDリストを取得
              $parent_array = array_reverse( get_ancestors( $term->term_id, $the_tax ) );
  
              foreach ( $parent_array as $parent_id ) {
                $parent_term = get_term( $parent_id, $the_tax );
                $parent_link = esc_url( get_term_link( $parent_id, $the_tax ) );
                $parent_name = esc_html( $parent_term->name );
                echo '<li>'.
                      '<a href="'. $parent_link .'">'.
                        '<span>'. $parent_name .'</span>'.
                      '</a>'.
                    '</li>';
              }
            }
  
            $term_link = esc_url( get_term_link( $term->term_id, $the_tax ) );
            $term_name = esc_html( $term->name );
            // 最下層のタームを表示
            echo '<li>'.
                  '<a href="'. $term_link .'">'.
                    '<span>'. $term_name .'</span>'.
                  '</a>'.
                '</li>';
          }
  
          // 投稿自身の表示
          echo '<li><span>'. esc_html( strip_tags( $post_title ) ) .'</span></li>';
  
      } elseif ( is_page() || is_home() ) {
  
        /**
         * 固定ページ ( $wp_obj : WP_Post )
         */
        $page_id    = $wp_obj->ID;
        $page_title = apply_filters( 'the_title', $wp_obj->post_title );
  
        // 親ページがあれば順番に表示
        if ( $wp_obj->post_parent !== 0 ) {
          $parent_array = array_reverse( get_post_ancestors( $page_id ) );
          foreach( $parent_array as $parent_id ) {
            $parent_link = esc_url( get_permalink( $parent_id ) );
            $parent_name = esc_html( get_the_title( $parent_id ) );
            echo '<li>'.
                  '<a href="'. $parent_link .'">'.
                    '<span>'. $parent_name .'</span>'.
                  '</a>'.
                '</li>';
          }
        }
        // 投稿自身の表示
        echo '<li><span>'. esc_html( strip_tags( $page_title ) ) .'</span></li>';
  
      } elseif ( is_post_type_archive() ) {
  
        /**
         * 投稿タイプアーカイブページ ( $wp_obj : WP_Post_Type )
         */
        echo '<li><span>'. esc_html( $wp_obj->label ) .'</span></li>';
  
      } elseif ( is_date() ) {
  
        /**
         * 日付アーカイブ ( $wp_obj : null )
         */
        $year  = get_query_var('year');
        $month = get_query_var('monthnum');
        $day   = get_query_var('day');
  
        if ( $day !== 0 ) {
          //日別アーカイブ
          echo '<li>'.
                '<a href="'. esc_url( get_year_link( $year ) ) .'"><span>'. esc_html( $year ) .'年</span></a>'.
              '</li>'.
              '<li>'.
                '<a href="'. esc_url( get_month_link( $year, $month ) ) . '"><span>'. esc_html( $month ) .'月</span></a>'.
              '</li>'.
              '<li>'.
                '<span>'. esc_html( $day ) .'日</span>'.
              '</li>';
  
        } elseif ( $month !== 0 ) {
          //月別アーカイブ
          echo '<li>'.
                '<a href="'. esc_url( get_year_link( $year ) ) .'"><span>'. esc_html( $year ) .'年</span></a>'.
              '</li>'.
              '<li>'.
                '<span>'. esc_html( $month ) .'月</span>'.
              '</li>';
  
        } else {
          //年別アーカイブ
          echo '<li><span>'. esc_html( $year ) .'年</span></li>';
  
        }
  
      } elseif ( is_author() ) {
  
        /**
         * 投稿者アーカイブ ( $wp_obj : WP_User )
         */
        echo '<li><span>'. esc_html( $wp_obj->display_name ) .' の執筆記事</span></li>';
  
      } elseif ( is_archive() ) {
  
        /**
         * タームアーカイブ ( $wp_obj : WP_Term )
         */
        $term_id   = $wp_obj->term_id;
        $term_name = $wp_obj->name;
        $tax_name  = $wp_obj->taxonomy;
  
        /* ここでタクソノミーに紐づくカスタム投稿タイプを出力しても良いでしょう。 */
  
        // 親ページがあれば順番に表示
        if ( $wp_obj->parent !== 0 ) {
  
          $parent_array = array_reverse( get_ancestors( $term_id, $tax_name ) );
          foreach( $parent_array as $parent_id ) {
            $parent_term = get_term( $parent_id, $tax_name );
            $parent_link = esc_url( get_term_link( $parent_id, $tax_name ) );
            $parent_name = esc_html( $parent_term->name );
            echo '<li>'.
                  '<a href="'. $parent_link .'">'.
                    '<span>'. $parent_name .'</span>'.
                  '</a>'.
                '</li>';
          }
        }
  
        // ターム自身の表示
        echo '<li>'.
              '<span>'. esc_html( $term_name ) .'</span>'.
            '</li>';
  
  
      } elseif ( is_search() ) {
  
        /**
         * 検索結果ページ
         */
        echo '<li><span>「'. esc_html( get_search_query() ) .'」で検索した結果</span></li>';
  
      
      } elseif ( is_404() ) {
  
        /**
         * 404ページ
         */
        echo '<li><span>お探しの記事は見つかりませんでした。</span></li>';
  
      } else {
  
        /**
         * その他のページ（無いと思うけど一応）
         */
        echo '<li><span>'. esc_html( get_the_title() ) .'</span></li>';
  
      }
  
      echo '</ul></div>';  // 冒頭に合わせた閉じタグ
  
    }
  }