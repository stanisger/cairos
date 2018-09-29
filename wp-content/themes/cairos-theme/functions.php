<?php


//  Paginador

function pagination($prev = 'p', $next = '»') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    $pagination = array(
        'base' => @add_query_arg('paged','%#%'),
        'format' => '',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'prev_text' => __($prev),
        'next_text' => __($next),
        'type' => 'plain'
);
    if( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
    if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array( 's' => get_query_var( 's' ) );
    echo paginate_links( $pagination );
};

//  Limitar Carácteres
function get_excerpt($count){  
    $permalink = get_permalink($post->ID);
    $excerpt = get_the_content(); 
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $count);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    //$excerpt = $excerpt.'... <a href="'.$permalink.'">leer mas</a>';
    return $excerpt;
}


//  Add Style

function styleMain_style() {
 // ∆∆ Registre Styles & fonts

   wp_enqueue_style( 
    'stylePlugin', 
     get_template_directory_uri() . '/css/main.css' ,
     '',
     null,
     'screen'
     );

 }
add_action( 'wp_enqueue_scripts', 'styleMain_style' );

register_sidebar(array(
 'name' => 'contac',
 'before_widget' => '<h2>',
'before_title'  => '</h2>',
'after_title'   => '',
 'after_widget' => '',
 ));

register_sidebar(array(
 'name' => 'contaclateral',
 'before_widget' => '',
'before_title'  => '',
'after_title'   => '',
 'after_widget' => '',
 ));


  //  Supports
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'post-formats', array(
    'aside',
    'image',
    'video',
    'quote',
    'link',
    'gallery',
    'status',
    'audio',
    'chat',
  ) );

//  Limitar cantidad de palabras Excerpt
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
  array_pop($excerpt);
  $excerpt = implode(" ",$excerpt).'...';
  }
  else {
  $excerpt = implode(" ",$excerpt);
  }
  
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}


///Pines///
add_action('init', 'Call_to_action');
function Call_to_action() {
  register_post_type( 'Call_to_action', array(
  'labels' => array(
  'name' => __('Call to action'),
  // 'singular_name' => __('Crear call to action')
  ),
  'public' => true,
  'show_ui' => true,
  'rewrite' => array(
  'slug' => 'callToAction',
  'with_front' => false
  ),
  'supports' => array('title','editor','author','thumbnail','excerpt','comments','custom-fields'),
  'has_archive' => true,
  'taxonomies' => array('category', 'post_tag'),
  ) );
}
?>