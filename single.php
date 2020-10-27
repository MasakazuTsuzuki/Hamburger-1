<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()):the_post(); ?>

<main class="l-main">

<!-- h1チーズバーガー -->
 <div class="l-main_title">
  <img class="l-main_title_image" src="<?php the_post_thumbnail('large' ); ?>
  <img class="l-main_title_image_tab" src="<?php the_post_thumbnail('' ); ?>
  <img class="l-main_title_image_sp" src="<?php the_post_thumbnail('' ); ?>
  <p><?php the_title(); ?></p>
</div>

<div class="l-main_wrapper">
  
<p><?php the_content(); ?></p> 

<?php endwhile; endif; ?>

<?php the_tags('Tags:', ' '); ?>

</main>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

