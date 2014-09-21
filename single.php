<?php get_header(); ?>
<div class="main">
<div class="main-wrap">
 <?php get_sidebar(); ?>
 <div class="contents">
  <?php if(have_posts()): while(have_posts()): the_post(); ?>
  <article class="single">
  <div class="box-entry">
   <header class="article-header">
    <div class="
<?php
$cats = get_the_category();
$cat = $cats[0];
if($cat->parent){
$parent = get_category($cat->parent);
echo $parent->slug;
}else{
echo $cat->slug;
}
?> box-cat">
     <p><?php
$cats = get_the_category();
$cat = $cats[0];
if($cat->parent){
$parent = get_category($cat->parent);
echo $parent->cat_name;
}else{
echo $cat->cat_name;
}
?></p>
     <span class="cat-arrow"></span> </div>
    <div class="box-data">
       <p><?php echo get_post_time('Y.m.d D'); ?></p>
    </div>
    <div class="box-tag">
     <?php the_tags('<ul><li>','</li><li>','</li></ul>');?>
    </div>
    <div class="box-sns">
     <?php
if(function_exists('display_social4i'))
echo display_social4i("large","float-left");
?>
    </div>
    <div class="box-title">
     <h1>
      <?php the_title(); ?>
     </h1>
    </div>
   </header>
   <div class="box-post">
    <?php the_content(''); ?>
   </div>
   <div class="post-ad">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 1080ry記事フッタ -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-5789366866277775"
     data-ad-slot="7192224241"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
   </div>
   <div class="box-sns">
    <?php
if(function_exists('display_social4i'))
echo display_social4i("large","float-right");
?>
   </div>
       </div>
   <?php
$prevpost = get_adjacent_post(true, '', true); //前の記事
$nextpost = get_adjacent_post(true, '', false); //次の記事
if( $prevpost or $nextpost ){ //前の記事、次の記事いずれか存在しているとき
?>
   <div class="box_paging">
    <?php
 if ( $prevpost ) { //前の記事が存在しているとき
  echo '<div class="entry prev"><a href="' . get_permalink($prevpost->ID) . '"><div class="img_arrow"><img src="絶対パス/img/single_prev.png" width="22" height="37" alt="前へ"></div><div><figure class="figure">' . get_the_post_thumbnail($prevpost->ID, array(60,60)) . '</figure><h1>' . get_the_title($prevpost->ID) . '</h1></div></a></div>';
 } else { //前の記事が存在しないとき
  echo '<div class="no-prev-post"><p>これより前の記事はありません</p></div>';
 }
 if ( $nextpost ) { //次の記事が存在しているとき
  echo '<div class="entry nextpage"><a href="' . get_permalink($nextpost->ID) . '"><h1>' . get_the_title($nextpost->ID) . '</h1><div><figure class="figure">' . get_the_post_thumbnail($nextpost->ID, array(60,60)) . '</figure></div><div class="img_arrow"><img src="絶対パス/img/single_next.png" width="22" height="37" alt="次へ"></div></a></div>';
 } else { //次の記事が存在しないとき
  echo '<div class="no-next-post"><p>最新の記事です</p></div>';
 }
?>
   </div>
   <?php } ?>
   <?php endwhile; endif; ?>
      </article>
   <section class="box-zenback">
  <div class="icon_arrow"></div>
  <!-- X:S ZenBackWidget --><div id="zenback-widget-loader"></div><script type="text/javascript">!function(d,i){if(!d.getElementById(i)){var r=Math.ceil((new Date()*1)*Math.random());var j=d.createElement("script");j.id=i;j.async=true;j.src="//w.zenback.jp/v1/?base_uri=http%3A//1080ry.com/&nsid=124323086764873049%3A%3A124323098844490293&rand="+r;d.body.appendChild(j);}}(document,"zenback-widget-js");</script><!-- X:E ZenBackWidget -->
</section>
  </div>
 </div>
</div>
<?php get_footer(); ?>
<?php wp_footer(); ?>
</body>
</html>
