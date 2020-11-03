<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="shortcut icon" href="http://hamburgerwp.local/wp-content/uploads/2020/11/favicon-1.png">
  <?php wp_head(); ?> 
  </head>

  <body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
    <div class="l-side_overlay"></div>
    <div class="l-side_back">

  <!-- ヘッダー -->
 <header class="l-header" >
 <h1 class="l-header_logo"><a href="<?php echo $home_url;?>http://hamburgerwp.local/">Hamburger</a></h1>
   <a class="l-header_menu" href="#">Menu</a>
  
  <?php get_search_form(); ?>

</header>