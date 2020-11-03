<?php

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' ); 

dynamic_sidebar( $index ); 

function my_styles() {
  wp_enqueue_style( 'style-name', get_template_directory_uri() . '/css/style.css', array(), '5.6.1' );
}
add_action( 'wp_enqueue_scripts', 'my_styles' );

add_action('wp_head', 'script_fa_cdn');

 
// font-awesome読み込み
function script_fa_cdn(){
 $link = <<<EOT
<script src="https://use.fontawesome.com/2b410f76bd.js"></script>
EOT;
 echo $link;
};

function my_scripts() {
  wp_enqueue_script( 'jQuery', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '3.5.1', false );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );

function wpbeg_widgets_init() {
  register_sidebar (
      array(
          'name'          => 'カテゴリーウィジェット',
          'id'            => 'category_widget',
          'description'   => 'カテゴリー用ウィジェットです',
          'before_widget' => '<div id="%1$s" class="widget %2$s">',
          'after_widget'  => '</div>',
          'before_title'  => '<h2><i class="fa fa-folder-open" aria-hidden="true"></i>',
          'after_title'   => "</h2>\n",
      )
  );
}
add_action( 'widgets_init', 'wpbeg_widgets_init' );

// メニュー
function menu_setup() {  
  register_nav_menus( array(
    'categorymenu' => 'カテゴリーメニュー',
    'footermenu' => 'フッターメニュー'
  ) );
}
add_action( 'after_setup_theme', 'menu_setup' );

// アーカイブ
function post_has_archive( $args, $post_type ) {

  if ( 'post' == $post_type ) {
      $args['rewrite'] = true;
      $args['has_archive'] = 'news'; // スラッグ名
  }
  return $args;
  }
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );

if(!isset ( $content_width)) $content_width = 900;
?>



<?php
// wp_list_comments 
wp_list_comments( $args ); 

// wp_link_pages 
wp_link_pages( $args ); 

// comments_template
 Comments_template( $file, $splitate_comments); 

// comment_form
 comment_form(); 

if(is_singular())wp_enqueue_script( "comment-reply");

previous_posts_link();
paginate_comments_links();

add_filter( 'wp_pagenavi_class_pages', 'custom_wp_pagenavi_class_pages' );
function custom_wp_pagenavi_class_pages($class_name) {
  return 'page-number';
}
add_filter( 'wp_pagenavi_class_page', 'custom_wp_pagenavi_class_page' );
function custom_wp_pagenavi_class_page($class_name) {
  return 'page-content';
}

?>







