<?php
/*
	==========================================
	 Include scripts
	==========================================
*/
function awesome_script_enqueue() {
	//css
	wp_enqueue_style('index', get_template_directory_uri() . '/css/index.css');
	//js
	wp_enqueue_script('jquery');
	wp_enqueue_script('index', get_template_directory_uri() . '/js/index.js');
}

add_action( 'wp_enqueue_scripts', 'awesome_script_enqueue');

function awesome_theme_setup() {
	
	add_theme_support('menus');

	register_nav_menu('primary', 'Primary Header Navigation');
    register_nav_menu('secondary', 'Footer Navigation');

    register_post_type( 'Users Profile',
        [
            'labels' => array(
                'name' => __( 'Users Profile' ),
                'singular_name' => __( 'Users Profile' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'usersprofile'),
            'show_in_rest' => true,
            'supports' => ['title', 'author', 'thumbnail', 'custom-fields', 'excerpt', 'categories'],
            'taxonomies'  => array( 'category' ),
        ]
    );
}

add_action('init', 'awesome_theme_setup');

/*
	==========================================
	 Theme support function
	==========================================
*/
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('post-formats',array('aside','image','video'));
add_theme_support('html5',array('search-form'));

/*
	==========================================
	 Head function
	==========================================
*/
function awesome_remove_version() {
	return '';
}
add_filter('the_generator', 'awesome_remove_version');

foreach (glob(get_template_directory().'/acf-fields/*.php') as $filename)
{
    include $filename;
}
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page ( array(
        'page_title' => 'Theme General Settings' ,
        'menu_title' => 'Theme Settings' ,
        'menu_slug' => 'theme-general-settings' ,
        'capability' => 'edit_posts' ,
        'redirect' => false
    ) );
}

add_filter( 'redirect_canonical', 'custom_disable_redirect_canonical' );
function custom_disable_redirect_canonical( $redirect_url ) {
    if ( is_paged() && is_singular() ) $redirect_url = false; 
	
    return $redirect_url; 
}


//Custom search

function custom_search_form( $form ) {
    $form = '<form role="search" method="get" action="' . home_url( '/' ) . '" class="searchform">
                <input type="search" class="form-control" placeholder="Search" value="' . get_search_query() . '" name="s" title="Search">
            </form>';

    return $form;
}
add_filter( 'get_search_form', 'custom_search_form', 40 );

function isMobile() {
	return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

function page_support() {
	add_post_type_support( 'page', 'excerpt' );
	add_post_type_support( 'page', 'author' );
	remove_post_type_support( 'page', 'editor' );
}
add_action( 'init', 'page_support');

//Schemas
require_once get_template_directory().'/include/schemas/schema.php';
//Shortcode
require_once get_template_directory().'/include/shortcodes/shortcodes.php';

//Function for tags and categories on pages

function categories_on_page() {
    // Add tag metabox to page
    register_taxonomy_for_object_type('post_tag', 'page');
    // Add category metabox to page
    register_taxonomy_for_object_type('category', 'page');
}
add_action( 'init', 'categories_on_page' );