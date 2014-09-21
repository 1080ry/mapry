<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
<title><?php if ( is_home() || is_front_page() ) : ?><?php bloginfo('name'); ?><?php else : ?><?php the_title(); ?> | <?php bloginfo('name'); ?><?php endif; ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--CSS-->
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
<!--googlefont-->
<link href='http://fonts.googleapis.com/css?family=Passion+One:700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<!-- font awesome -->
<link href="<?php bloginfo('template_url'); ?>/css/font-awesome.min.css" rel="stylesheet" >
<!-- favicon -->
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">
<!--[if lt IE 9]>
<script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/sns.js"></script>
<?php wp_head()?>
</head>
<body>
<div id="wrapper" class="wrapper">
<header class="header">
 <div class="header-wrap">
  <div class="header-box-left">
   <div class="header-logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" width="150" height="77" alt="1080"></a></div>
<h1 class="hide-text"><?php bloginfo('name'); ?></h1>
<p><?php bloginfo('description'); ?></p>
  </div>
  <div class="header-box-right">
   <div class="header-ad">

<img src="http://placehold.it/728x90">

  </div>
  </div>
 </div>
</header>
<?php if ( !is_home() && !is_front_page() ) : ?>
<!--TOPページ以外でパンくずリストを表示する-->
<div class="breadcrumbs">
<ol>
 <?php
  if(function_exists('bcn_display'))
  { bcn_display();  }?>
</ol>
</div>
<?php endif; ?>