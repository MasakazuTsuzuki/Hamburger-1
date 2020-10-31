<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()):the_post(); ?>

<main class="l-main">

 <div class="l-main_title">
  <img class="l-main_title_image " src="<?php the_post_thumbnail('large' ); ?>
  <p><?php the_title(); ?></p>
 </div>

<div class="l-main_wrapper">
  
<?php the_content(); ?>

<?php endwhile; endif; ?>

<?php the_tags('Tags:', ' '); ?>

</main>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

