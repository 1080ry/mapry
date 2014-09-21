<?php
//ウィジェット
//sidebarにclass名追加
register_sidebar(array(
  'name'=>'サイドバー1',
  'id' => 'sidebar1',
  'before_widget'=>'<div class="sidebar-wrapper">',
  'after_widget'=>'</div>',
  'before_title' => '<h2 class="sidebar-title">',
  'after_title' => '</h2>'
));

register_sidebar(array(
  'name'=>'サイドバー2',
  'id' => 'sidebar2',
  'before_widget'=>'<div class="sidebar-wrapper">',
  'after_widget'=>'</div>',
  'before_title' => '<h2 class="sidebar-title">',
  'after_title' => '</h2>'
));

//カテゴリーの投稿数をaタグの中に移動させる
add_filter( 'wp_list_categories', 'my_list_categories', 10, 2 );
function my_list_categories( $output, $args ) {
  $output = preg_replace('/<\/a>\s*\((\d+)\)/',' <span class="post-count">$1</span></a>',$output);
  return $output;
}

//受信したコメント
function mydesign($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>

<li class="compost">
<?php comment_text(); ?>
<p class="cominfo">
<?php comment_date(); ?> <?php comment_time(); ?>
 |
<?php comment_author_link(); ?>
</p>

<?php
}

//コメント欄のデフォルト文言削除
add_filter('comment_form_default_fields', 'mytheme_remove_url');
function mytheme_remove_url($arg) {
    $arg['url'] = '';
        $arg['email'] = '';
    return $arg;
}

add_filter( "comment_form_defaults", "my_comment_notes_before");
function my_comment_notes_before( $defaults){
    $defaults['comment_notes_before'] = '';
    return $defaults;
}

add_filter("comment_form_defaults","my_special_comment_after");
function my_special_comment_after($args){
    $args['comment_notes_after'] = '';
return $args;
}

//wp_head()不要タグ削除
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'feed_links_extra', 3);

//検索フォーム
function my_search_form( $form ) {

    $form = '
    <div class="search-box">
    <form role="search" method="get" id="searchform" action="'.home_url( '/' ).'" >
    <input type="text" value="' . get_search_query() . '" class="search-text" name="s" id="s" placeholder="キーワードを入力" >
    <div class="box-search-btn"> <span><i class="fa fa-search"></i></span>
   <input type="submit" id="searchbtn" value="検索" class="search-btn">
  </div></form></div>';
    return $form;
}
add_filter( 'get_search_form', 'my_search_form' );

//アイキャッチ
add_theme_support( 'post-thumbnails', array( 'post' ) );
set_post_thumbnail_size( 210, 140, true );
//スマホサイト用のアイキャッチ105x70サイズ
add_image_size( 'spicatch', 105, 70, true );

//現在のページ数の取得
function show_page_number() {
    global $wp_query;

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $max_page = $wp_query->max_num_pages;
    echo $paged;
}

//総ページ数の取得
function max_show_page_number() {
    global $wp_query;

    $max_page = $wp_query->max_num_pages;
    echo $max_page;
}

// テーマのタグクラウドのパラメータ変更
function my_tag_cloud_filter($args) {
    $myargs = array(
        'smallest' => 12, // 最小文字サイズは 10pt
        'largest' => 12, // 最大文字サイズは 10pt
        'number' => 30,  // 一度に表示するのは30タグまで
        'order' => 'RAND', // 表示順はランダムで
    );
    return $myargs;
}
add_filter('widget_tag_cloud_args', 'my_tag_cloud_filter');


// ソーシャルボタン
function SocialButtonVertical()
{ ?>
<ul class="sns-btn">
<li><div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="box_count" data-width="72" data-show-faces="false"></div></li>
<li><a href="https://twitter.com/share" class="twitter-share-button" data-count="vertical" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-via="" data-lang="ja"　>ツイート</a></li>
<li><g:plusone size="tall" href="<?php the_permalink(); ?>"></g:plusone></li>
<li><a href="http://b.hatena.ne.jp/entry/<?php the_permalink(); ?>" class="hatena-bookmark-button" data-hatena-bookmark-title="<?php the_title(); ?>" data-hatena-bookmark-layout="vertical" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only.gif" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a></li>
<li><a href="#" onclick="Evernote.doClip({}); return false;"><img src="http://static.evernote.com/article-clipper-vert.png" alt="Clip to Evernote" /></a></li>
</ul>
<?php }
