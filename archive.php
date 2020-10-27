
<?php get_header(); ?>

<?php get_sidebar(); ?>

<main class="l-main">
<!-- チーズバーガー -->
<div class="l-main_archive">
  <img class="l-main_archive_img" src="<?php echo esc_url (get_template_directory_uri().'/image/archive_img01.png'); ?>">
  <img class="l-main_archive_img_tab" src="<?php echo esc_url (get_template_directory_uri().'/image/archive(tab)_img01.png'); ?>">
  <img class="l-main_archive_img_sp" src="<?php echo esc_url (get_template_directory_uri().'//image/archive(sp)_img01.png'); ?>">
  <div class="l-main_archive_text" >
  <h1>Menu:</h1>
  <p><?php single_cat_title(); ?></p>
</div>
</div>

<?php
/*
Template Name: Archives
*/
get_header(); ?>

<!-- ページ説明 -->
 <div class="c-textbox_archive">
   <h2>小見出しが入ります</h2>
   <p>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
 </div>

 <!-- バーガーと説明 -->
 <?php
  if(have_posts() ):while (have_posts()):the_post();
  $counter++;
?>
 <article>
  <div class="p-article_archive">
   <img  class="p-article_archive_img" src="<?php the_post_thumbnail('large' ); ?>
   <div class="p-article_archive_wrapper">
    <h2><?php the_title(); ?></h2>
    <h3>小見出しが入ります</h3>
    <p>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
    <div class="c-button_detail_wrapper">
      <dd><a href="<?php the_permalink(); ?>"><button class="c-button_detail">詳しく見る</button></a></dd>
  </div>
  </div>
  </div>
<?php if($counter%10==0) {
  echo ('</div><div class="wrap">');
} ?>

<?php endwhile; endif; ?>

<?php wp_pagenavi(); ?>

</main>
</div>

<?php get_sidebar(); ?>


<?php get_footer(); ?>
