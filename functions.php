<?php


add_theme_support( 'automatic-feed-links' );
// add_theme_support( 'menus' );
register_nav_menus();
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' ); //新たに追加
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

function menu_setup() {  
  register_nav_menus( array(
    // 'global' => 'グローバルメニュー',
    // 'footer' => 'フッターメニュー'
    'footer_nav' => esc_html__( 'footer navigation', 'rtbread' ),
    'category_nav' => esc_html__( 'categoty navigation', 'rtbread' ),
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


// ページネーション
// クラス名変更予定
function pagenation($pages = '', $range = 2){
  $showitems = ($range * 1)+10;
  global $paged;
  if(empty($paged)) $paged = 1;
  if($pages == ''){
      global $wp_query;
      $pages = $wp_query->max_num_pages;
      if(!$pages){
          $pages = 1;
      }
  }
  
  if(1 != $pages){
      // 「1/2」表示 現在のページ数 / 総ページ数
      echo  "<div class=\"p-pagination_page\">Page". $paged."/". $pages."</div>";
      // 「前へ」を表示
      if($paged > 1) echo "<div class=\"p-pagination b\"><a href='".get_pagenum_link($paged -1)."'><<</a></div>";
      
      // ページ番号を出力
      for ($i=1; $i <= $pages; $i++){
          if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
              echo ($paged == $i)? "<li class=\"p-pagination c\">".$i."</li>": // 現在のページの数字はリンク無し
                  "<li class=\"p-pagination\"><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
          }
      }
      // [...] 表示
      // if(($paged + 4 ) < $pages){
      //     echo "<li class=\"notNumbering\">...</li>";
      //     echo "<li><a href='".get_pagenum_link($pages)."'>".$pages."</a></li>";
      // }
      echo "</ol>\n";
      // 「次へ」を表示
      if($paged < $pages) echo "<div class=\"p-pagination b\" ><a href='".get_pagenum_link($paged + 1)."'>>></a></div>";
      echo "\n";

      if($paged > 1) echo "<div class=\"pc d\"><a href='".get_pagenum_link($paged -1)."'><<前へ</a></div>";

      if($paged < $pages) echo "<div class=\"pc h\" ><a href='".get_pagenum_link($paged + 1)."'>次へ>></a></div>";
      echo "\n";
     
  }
 
}


if ( ! isset( $content_width ) ) {
  $content_width = 960;
}

?>

<!-- wp_list_comments  -->
<?php wp_list_comments( $args ); ?>

<!-- wp_link_pages  -->
<?php wp_link_pages( $args ); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<!-- comments_template  -->
<?php Comments_template( $file, $splitate_comments); ?>

<!-- comment_form  -->
<?php comment_form(); ?>

<?php if(is_singular())wp_enqueue_script( "comment-reply");?>

<?php previous_posts_link();?>
<?php paginate_comments_links();?>