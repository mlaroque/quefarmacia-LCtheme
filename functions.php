<?php
/**
 * LaComuna Theme 2.0 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage LaComuna Theme
 * @since 1.0.0
 */

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

add_theme_support( 'post-thumbnails' );

// This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'header' => esc_html__( 'Header', 'lacomuna-theme' ),
        'footer' => esc_html__( 'Footer', 'lacomuna-theme' ),
    ) );

add_action( 'admin_enqueue_scripts', 'load_admin_style' );
function load_admin_style() {
        wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/css/admin.css', false, '1.0.0' );
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lacomuna_theme_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'lacomuna-theme' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'lacomuna-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );  register_sidebar( array(
        'name'          => esc_html__( 'Footer-1', 'lacomuna-theme' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'lacomuna-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
     register_sidebar( array(
        'name'          => esc_html__( 'Footer-2', 'lacomuna-theme' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'lacomuna-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
     register_sidebar( array(
        'name'          => esc_html__( 'Footer-3', 'lacomuna-theme' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here.', 'lacomuna-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
 register_sidebar( array(
        'name'          => esc_html__( 'Footer-4', 'lacomuna-theme' ),
        'id'            => 'footer-4',
        'description'   => esc_html__( 'Add widgets here.', 'lacomuna-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

 register_sidebar( array(
        'name'          => esc_html__( 'Big Text', 'lacomuna-theme' ),
        'id'            => 'footer-5',
        'description'   => esc_html__( 'Add widgets here.', 'lacomuna-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );


  register_sidebar( array(
        'name'          => esc_html__( 'Footer Horizontal Centered', 'lacomuna-theme' ),
        'id'            => 'footer-hori',
        'description'   => esc_html__( 'Add widgets here.', 'lacomuna-theme' ),
        'before_widget' => '<section id="%1$s" class="footHori widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

  register_sidebar( array(
        'name'          => esc_html__( 'Footer Horizontal Left', 'lacomuna-theme' ),
        'id'            => 'footer-hsx',
        'description'   => esc_html__( 'Add widgets here.', 'lacomuna-theme' ),
        'before_widget' => '<section id="%1$s" class="footHleft widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

  register_sidebar( array(
        'name'          => esc_html__( 'Footer Horizontal Right', 'lacomuna-theme' ),
        'id'            => 'footer-hdx',
        'description'   => esc_html__( 'Add widgets here.', 'lacomuna-theme' ),
        'before_widget' => '<section id="%1$s" class="footHright widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );


  register_sidebar( array(
        'name'          => esc_html__( 'Copyright', 'lacomuna-theme' ),
        'id'            => 'copyright',
        'description'   => esc_html__( 'Add widgets here.', 'lacomuna-theme' ),
        'before_widget' => '<section id="%1$s" class="copyright widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
  
}
add_action( 'widgets_init', 'lacomuna_theme_widgets_init' );

/**************************************/
/***********POST TYPES*****************/
/**************************************/


add_action( 'init', 'create_post_type' );

function create_post_type() {  

    register_post_type( 'farmacias',  
      array(  
        'labels' => array(  
          'name' => __( 'Farmacias' ),  
          'singular_name' => __( 'Farmacia' )  
        ),  
      'public' => true,  
      'menu_position' => 5,  
      'hierarchical' => true,  
      'taxonomies' => array( 'category', 'post_tag' ),
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes')
      )  
    );
    
    register_post_type( 'laboratorios',  
      array(  
        'labels' => array(  
          'name' => __( 'Laboratorios' ),  
          'singular_name' => __( 'Laboratorio' )  
        ),  
      'public' => true,  
      'menu_position' => 6,  
      'hierarchical' => true,  
      'taxonomies' => array( 'category', 'post_tag' ),
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes')
      )  
    );
    
    
    register_post_type( 'medicamentos',  
      array(  
        'labels' => array(  
          'name' => __( 'Medicamentos' ),  
          'singular_name' => __( 'Medicamentos' )  
        ),  
      'public' => true,  
      'menu_position' => 7,  
      'hierarchical' => true,  
      'taxonomies' => array( 'category', 'post_tag' ),
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes')
      )  
    );
    
    register_post_type( 'medicamento-remedios',  
      array(  
        'labels' => array(  
          'name' => __( 'Enfermedades' ),  
          'singular_name' => __( 'Enfermedad' )  
        ),  
      'public' => true,  
      'menu_position' => 8,  
      'rewrite' => array( 'slug' => 'medicamentos-y-remedios' ),
      'hierarchical' => true,  
      'taxonomies' => array( 'category', 'post_tag' ),
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes')
      )  
    );

    register_post_type( 'productos',  
      array(  
        'labels' => array(  
          'name' => __( 'Productos' ),  
          'singular_name' => __( 'Producto' )  
        ),  
      'public' => true,  
      'menu_position' => 9, 
      'hierarchical' => true,  
      'taxonomies' => array( 'category', 'post_tag' ),
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes')
      )  
    );

register_post_type( 'analisis-y-estudios',  
      array(  
        'labels' => array(  
          'name' => __( 'Analisis' ),  
          'singular_name' => __( 'Analisis-y-estudio' )  
        ),  
      'public' => true,  
      'menu_position' => 10, 
      'hierarchical' => true,  
      'taxonomies' => array( 'category', 'post_tag' ),
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes')
      )  
    );

    register_post_type( 'medicos',  
      array(  
        'labels' => array(  
          'name' => __( 'Médicos' ),  
          'singular_name' => __( 'Médico' )  
        ),  
      'public' => true,  
      'menu_position' => 11, 
      'hierarchical' => true,  
      'taxonomies' => array( 'category', 'post_tag' ),
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes')
      )  
    );  

    register_post_type( 'clinicas-hospitales',  
      array(  
        'labels' => array(  
          'name' => __( 'Clínicas y Hospitales' ),  
          'singular_name' => __( 'Clinicá o Hospital' )  
        ),  
      'public' => true,  
      'menu_position' => 12, 
      'rewrite' => array( 'slug' => 'clinicas-y-hospitales' ),
      'hierarchical' => true,  
      'taxonomies' => array( 'category', 'post_tag' ),
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes')
      )  
    );  

  register_post_type( 'asociaciones-medicas',  
      array(  
        'labels' => array(  
          'name' => __( 'Asociaciones Médicas' ),  
          'singular_name' => __( 'Asociación médica' )  
        ),  
      'public' => true,  
      'menu_position' => 13, 
      'hierarchical' => true,  
      'taxonomies' => array( 'category', 'post_tag' ),
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes')
      )  
    );  

    register_post_type( 'espec-medicas',  
      array(  
        'labels' => array(  
          'name' => __( 'Especialidades Médicas' ),  
          'singular_name' => __( 'Especialidad Médica' )  
        ),  
      'public' => true,  
      'menu_position' => 14, 
      'hierarchical' => true,  
      'rewrite' => array( 'slug' => 'especialidades-medicas' ),
      'taxonomies' => array( 'category', 'post_tag' ),
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes')
      )  
    );


    register_post_type( 'cronicas',  
      array(  
        'labels' => array(  
          'name' => __( 'Enfermedades Crónicas' ),  
          'singular_name' => __( 'Enfermedad Crónica' )  
        ),  
      'public' => true,  
      'menu_position' => 15, 
      'hierarchical' => true,  
      'rewrite' => array( 'slug' => 'enfermedades-cronicas' ),
      'taxonomies' => array( 'category', 'post_tag' ),
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes')
      )  
    );

    register_post_type( 'guias',  
      array(  
        'labels' => array(  
          'name' => __( 'Guias' ),  
          'singular_name' => __( 'Guía' )  
        ),  
      'public' => true,  
      'menu_position' => 16, 
      'hierarchical' => true,  
      'taxonomies' => array( 'category', 'post_tag' ),
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes')
      )  
    ); 

}


/**************************************/
/***********META BOXES*****************/
/**************************************/ 

require_once ( get_template_directory() . '/functions/metas.php' );


/**************************************/
/***********END*****************/
/**************************************/ 

/**************************************/
/***********SHORTCODES*****************/
/**************************************/ 

/* Incluimos los shortcodes del antiguo canvas que nos hacen falta */
require_once ( get_template_directory() . '/functions/shortcodes.php' );


/**************************************/
/***********END*****************/
/**************************************/ 

/**************************************/
/***********FUNCIONES UTILES*****************/
/**************************************/ 

/* Incluimos los shortcodes del antiguo canvas que nos hacen falta */
require_once ( get_template_directory() . '/functions/utils.php' );


/**************************************/
/***********END*****************/
/**************************************/ 

/**************************************/
/***********END POST TYPES*****************/
/**************************************/

function lacomuna_scripts() {


}


add_action( 'wp_enqueue_scripts', 'lacomuna_scripts' );

?>