<div class="sidebar">

<?php if(is_category()): ?>
<div class="side-cat">
<div class="sidebar-wrapper">
<h2 class="sidebar-title">
<?php
$cats = get_the_category();
$cat = $cats[0];
if($cat->parent){
$parent = get_category($cat->parent);
echo $parent->cat_name;
}else{
echo $cat->cat_name;
}
?></h2>
<ul>
<?php
$cat_now = get_the_category();
$cat_now = $cat_now[0];
if($cat_now->parent){
$cat_now_parent = get_category($cat_now->parent);
wp_list_categories( "title_li=&child_of={$cat_now_parent->term_id}&depth=1&show_count=1" );
}else{
wp_list_categories( "title_li=&child_of={$cat_now->term_id}&depth=2&show_count=1" );
}
?>
</ul>
</div>

<?php elseif(is_single()): ?>
<div class="side-cat">
<div class="sidebar-wrapper">
<h2 class="sidebar-title">
<?php
$cats = get_the_category();
$cat = $cats[0];
if($cat->parent){
$parent = get_category($cat->parent);
echo $parent->cat_name;
}else{
echo $cat->cat_name;
}
?></h2>
<ul>
<?php
$cat_now = get_the_category();
$cat_now = $cat_now[0];
if($cat_now->parent){
$cat_now_parent = get_category($cat_now->parent);
wp_list_categories( "title_li=&child_of={$cat_now_parent->term_id}&depth=1&show_count=1" );
}else{
wp_list_categories( "title_li=&child_of={$cat_now->term_id}&depth=1&show_count=1" );
}
?>
</ul>
</div>

<?php else : ?>
<div class="side-cat">
<div class="sidebar-wrapper"><h2 class="sidebar-title">ブログカテゴリー</h2>
<ul>
<?php wp_list_categories('title_li=&depth=1&show_count=1'); ?>
</ul>
</div>
<?php endif; ?>
 <?php dynamic_sidebar(); ?>
</div>
<div id="box-wrap">
 <div>
<img src="http://placehold.it/336x250">
</div>
</div>
</div>
<!--sidebar-->