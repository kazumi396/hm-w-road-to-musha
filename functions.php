<?php
// アイキャッチ画像の有効化
add_theme_support( 'post-thumbnails' );


// ブロックエディターにCSSを読み込む
add_action('after_setup_theme', 'my_editor_suport');
function my_editor_suport()
{
  add_theme_support('editor-styles');
  add_editor_style('editor-style.css');
};

// メニュー
function register_my_menus() {
	register_nav_menus(
		array(
			'pickup'        => 'ピックアップ',
		)
	);
}
add_action( 'after_setup_theme', 'register_my_menus' );

// アーカイブページのタイトルをカスタマイズ
function custom_archive_title( $title ) {
	if ( is_category() || is_tag() ) { // 『カテゴリー：』 と『タグ：』 を削除
		$title = single_term_title( '', false );
	} elseif ( is_date() ) {
		if ( is_day() ) { // 『年：』 と『月：』 と『日：』 を削除
			$title = get_the_date( 'Y年n月j日' );
		} elseif ( is_month() ) {
			$title = get_the_date( 'Y年n月' );
		} elseif ( is_year() ) {
			$title = get_the_date( 'Y年' );
		}
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'custom_archive_title' );


// 検索結果を固定ページを除外し投稿のみを検索の対象とする
function SearchFilter( $query ) {
	if ( !is_admin() && $query->is_main_query() && $query->is_search ) {
		$query->set( 'post_type', 'post' );
	}
	return $query;
}
add_filter( 'pre_get_posts', 'SearchFilter' );

// ===============================
// カテゴリーラベルにカスタムカラーを適用（ACFで背景色を設定）
// 使用：テンプレート内で render_colored_category_labels(); を呼び出し
// ===============================
function render_colored_category_labels($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    $categories = get_the_category($post_id);
    if ($categories) {
        foreach ($categories as $category) {
            // ACFフィールド（フィールド名: label_color）をカテゴリーに設定しておく
            $color = get_field('label_color', 'category_' . $category->term_id);
            $style_attr = $color ? ' style="background-color:' . esc_attr($color) . ';"' : '';

            echo '<span class="c-label"' . $style_attr . '>';
            echo esc_html($category->name);
            echo '</span>';
        }
    }
};

/* ---------- 「投稿」の表記変更 ---------- */
// function Change_menulabel() {
//   global $menu;
//   global $submenu;
//   $name = '記事';
//   $menu[5][0] = $name;
//   $submenu['edit.php'][5][0] = $name.'一覧';
//   $submenu['edit.php'][10][0] = '新規'.$name.'の投稿';
// }
// function Change_objectlabel() {
//   global $wp_post_types;
//   $name = '記事';
//   $labels = &$wp_post_types['post']->labels;
//   $labels->name = $name;
//   $labels->singular_name = $name;
//   $labels->add_new = _x('追加', $name);
//   $labels->add_new_item = $name.'の新規追加';
//   $labels->edit_item = $name.'の編集';
//   $labels->new_item = '新規'.$name;
//   $labels->view_item = $name.'を表示';
//   $labels->search_items = $name.'を検索';
//   $labels->not_found = $name.'が見つかりませんでした';
//   $labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';
// }
// add_action( 'init', 'Change_objectlabel' );
// add_action( 'admin_menu', 'Change_menulabel' );

/* ---------- 投稿の「タグ」の非表示 ---------- */
function my_unregister_taxonomies() {
  global $wp_taxonomies;
  // 「タグ」の非表示
  if (!empty($wp_taxonomies['post_tag']->object_type)) {
    foreach ($wp_taxonomies['post_tag']->object_type as $i => $object_type) {
      if ($object_type == 'post') {
        unset($wp_taxonomies['post_tag']->object_type[$i]);
      }
    }
  }
  return true;
}
add_action('init', 'my_unregister_taxonomies');

/**
 * セキュリティ対策
 * 参考記事：https://baigie.me/officialblog/2020/01/28/wordpress-security/
 */
remove_action( 'wp_head', 'wp_generator' ); // WordPressのバージョン
remove_action( 'wp_head', 'wp_shortlink_wp_head' ); // 短縮URLのlink
remove_action( 'wp_head', 'wlwmanifest_link' ); // ブログエディターのマニフェストファイル
remove_action( 'wp_head', 'rsd_link' ); // 外部から編集するためのAPI
remove_action( 'wp_head', 'feed_links_extra', 3 ); // フィードへのリンク
remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); // 絵文字に関するJavaScript
remove_action( 'wp_head', 'rel_canonical' ); // カノニカル
remove_action( 'wp_print_styles', 'print_emoji_styles' ); // 絵文字に関するCSS
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); // 絵文字に関するJavaScript
remove_action( 'admin_print_styles', 'print_emoji_styles' ); // 絵文字に関するCSS