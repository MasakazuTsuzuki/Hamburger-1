
<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()):the_post(); ?>

<main class="l-main">


  <!-- ショップについて -->
 <div class="l-main_title">
  <img class="l-main_title_image" src="<?php echo esc_url (get_template_directory_uri().'/image/page_img01.png'); ?>">
  <img class="l-main_title_image_tab" src="<?php echo esc_url (get_template_directory_uri().'/image/page(tab)_img01.png'); ?>">
  <img class="l-main_title_image_sp" src="<?php echo esc_url (get_template_directory_uri().'/image/page(sp)_img01.png'); ?>">
  <p class="l-main_title_text"><?php the_title(); ?></p>
</div>

<div class="l-main_wrapper">
    

<?php if( has_post_thumbnail() ): ?>
  <?php the_post_thumbnail('large' ); ?>
<?php endif; ?>

<p><?php the_content(); ?></p> 

<?php endwhile; endif; ?>

</main>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
