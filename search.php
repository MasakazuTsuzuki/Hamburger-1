
<?php get_header(); ?>

<?php
/*
Template Name: Search Page
*/
?>

<main class="l-main">
<!-- チーズバーガー -->
<div class="l-main_archive">
  <img class="l-main_archive_img" src="<?php echo esc_url (get_template_directory_uri().'/image/archive_img01.png'); ?>">
  <img class="l-main_archive_img_tab" src="<?php echo esc_url (get_template_directory_uri().'/image/archive(tab)_img01.png'); ?>">
  <img class="l-main_archive_img_sp" src="<?php echo esc_url (get_template_directory_uri().'/image/archive(sp)_img01.png'); ?>">

  <div class="l-main_archive_text" >
  <?php
    if(have_posts() ):
        // 検索結果の有無
        if ( isset($_GET['s']) && empty($_GET['s']) ) {
            // 検索キーワードが未入力の場合
            echo '<h1 class="text-center">検索キーワード未入力</h1>';
        } else {
            // 検索キーワードと該当件数を表示
            echo '<h1 class="text-md-center">“' . $_GET['s'] . '”の検索結果： ' . $wp_query->found_posts . ' 件</h1>';
        }
        while(have_posts() ): the_post();
            // 検索内容に一致する記事をループ
           
        endwhile;
    else:
        // 検索結果がない場合
        echo '<h1 class="text-md-center">検索されたキーワードにマッチする記事はありませんでした。</h1>';
    endif;
?>
</div>
</div>

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
   <img  class="p-article_archive_img" src="<?php the_post_thumbnail('large');?>

   <div class="p-article_archive_wrapper">
 
    <h2><?php the_title(); ?></h2>
    
    <?php
if(mb_strlen($post->post_content, 'UTF-8')>200){
	$content= mb_substr($post->post_content, 0, 200, 'UTF-8');
	echo $content.'…';
}else{
	echo $post->post_content;
}
?>

    
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

