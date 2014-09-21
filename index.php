<?php get_header(); ?>
<?php if ( is_home() || is_front_page() ) : ?>
<div class="main">
 <?php endif; ?>
 <div class="main-wrap">
  <?php get_sidebar(); ?>
  <div class="contents">
   <div class="entry-list">
    <?php if(is_category()): ?>
    <div class="main-cat">
     <h1>
      <?php single_cat_title(); ?>
      の記事一覧</h1>
    </div>
    <?php endif; ?>
    <?php if(is_month()): ?>
    <div class="">
     <h1><?php echo $year . '年' .$monthnum . '月の記事一覧'; ?></h1>
    </div>
    <?php endif; ?>
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
    <article class="entry"> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
     <div class="box-thumbnail">
      <?php if ( has_post_thumbnail()) : ?>
      <figure>
       <?php the_post_thumbnail( array(210,140)); ?>
       <?php endif; ?>
      </figure>
     </div>
     <div class="entry-title">
      <div class="<?php
$cats = get_the_category();
$cat = $cats[0];
if($cat->parent){
$parent = get_category($cat->parent);
echo $parent->slug;
}else{
echo $cat->slug;
}
?>
 box-cat">
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
      <h1>
       <?php the_title(); ?>
      </h1>

     </div>
     </a> </article>
    <?php endwhile; endif; ?>
    <?php if(is_home()):?>
    <div class="index-paging">
     <p class="previous">
      <?php previous_posts_link('<i class="fa fa-angle-double-left"></i> 　新しい記事')?>
     </p>
     <p class="next">
      <?php next_posts_link('以前の記事　　<i class="fa fa-angle-double-right"></i>')?>
     </p>
    </div>
    <?php endif; ?>
    <?php if(is_archive()): ?>
    <div class="index-paging">
     <p class="previous">
      <?php previous_posts_link('<i class="fa fa-angle-double-left"></i> 　新しい記事')?>
     </p>
     <p class="next">
      <?php next_posts_link('以前の記事　　<i class="fa fa-angle-double-right"></i>')?>
     </p>
    </div>
    <?php endif; ?>
   </div>
  </div>
 </div>
</div>
<div class="pagetop"></div>
<?php get_footer(); ?>
<?php wp_footer(); ?>
</body>
</html>