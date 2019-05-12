<?php

// Load Stylesheets
function cf_load_styles(){

    wp_register_style( 'font', get_template_directory_uri(). '/css/fonts/beyond_the_mountains-webfont.css', array(), 1, 'all' );
    wp_enqueue_style( 'font' );

    wp_register_style( 'ionicons', get_template_directory_uri(). '/css/fonts/ionicons.css', array(), 1, 'all' );
    wp_enqueue_style( 'ionicons' );

    wp_register_style( 'swiper', get_template_directory_uri(). '/vendor/swiper.css', array(), 1, 'all' );
    wp_enqueue_style( 'swiper' );

    wp_register_style( 'bootstrap', get_template_directory_uri(). '/vendor/bootstrap.min.css', array(), 1, 'all' );
    wp_enqueue_style( 'bootstrap' );

    wp_register_style( 'styles', get_template_directory_uri(). '/css/styles.css', array(), 1, 'all' );
    wp_enqueue_style( 'styles' );

    wp_register_style( 'custom', get_template_directory_uri(). '/css/custom.css', array(), 1, 'all' );
    wp_enqueue_style( 'custom' );
}

add_action('wp_enqueue_scripts', 'cf_load_styles');

//load Scripts
function cf_load_scripts(){

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri(). '/vendor/jquery-3.2.1.min.js', array(), 1, 1 , 1);
    wp_enqueue_script( 'jquery' );

    wp_register_script( 'booststrap', get_template_directory_uri(). '/vendor/bootstrap.min.js', array(), 1, 1 , 1);
    wp_enqueue_script( 'booststrap' );

    wp_register_script( 'swiper', get_template_directory_uri(). '/vendor/swiper.js', array(), 1, 1 , 1);
    wp_enqueue_script( 'swiper' );

    wp_register_script( 'main_scripts', get_template_directory_uri(). '/js/scripts.js', array(), 1, 1 , 1);
    wp_enqueue_script( 'main_scripts' );

    wp_register_script( 'custom', get_template_directory_uri(). '/js/custom.js', array(), 1, 1 , 1);
    wp_enqueue_script( 'custom' );

}

add_action('wp_enqueue_scripts', 'cf_load_scripts' );


//Add Theme Support
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );



//Custom Image Sizes
add_image_size( 'product_image_large', 700, 700, false );
add_image_size( 'product_image_small', 200, 200, false );
add_image_size( 'product_image_mini', 90, 90, false );


//Register Menu Location
add_action( 'after_setup_theme', 'cf_register_top_menu' );
 
function cf_register_top_menu() {
    register_nav_menu( 'top_menu', __( 'Top Menu', 'codefish' ) );
}

// Register Custom Taxonomy for Dish Types (Categories)
function cf_custom_taxonomy_cats() {

	$labels = array(
		'name'                       => _x( 'Dish Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Dish Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Dish Types', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Dish Type Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Dish Type', 'text_domain' ),
		'edit_item'                  => __( 'Edit Dish Type', 'text_domain' ),
		'update_item'                => __( 'Update Dish Type', 'text_domain' ),
		'view_item'                  => __( 'View Dish Type', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate dish types with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove dish type', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Dish Types', 'text_domain' ),
		'search_items'               => __( 'Search Dish Types', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Dish Types', 'text_domain' ),
		'items_list'                 => __( 'Dish Type list', 'text_domain' ),
		'items_list_navigation'      => __( 'Dish Types list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'dish_types', array( 'menu' ), $args );

}
add_action( 'init', 'cf_custom_taxonomy_cats', 0 );



// Register Custom Taxonomy for Dish Options (Tags)
function cf_custom_taxonomy_tags() {

	$labels = array(
		'name'                       => _x( 'Dish Options', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Dish Option', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Dish Options', 'text_domain' ),
		'all_items'                  => __( 'All Option', 'text_domain' ),
		'parent_item'                => __( 'Parent Option', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Option:', 'text_domain' ),
		'new_item_name'              => __( 'New Option Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Option', 'text_domain' ),
		'edit_item'                  => __( 'Edit Option', 'text_domain' ),
		'update_item'                => __( 'Update Option', 'text_domain' ),
		'view_item'                  => __( 'View Option', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate options with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove options', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Options', 'text_domain' ),
		'search_items'               => __( 'Search Options', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No options', 'text_domain' ),
		'items_list'                 => __( 'Options list', 'text_domain' ),
		'items_list_navigation'      => __( 'Options list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'dish_options', array( 'menu' ), $args );

}
add_action( 'init', 'cf_custom_taxonomy_tags', 0 );



//Custom Post Type Menu

function cf_custom_post_type() {
 
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Menu', 'Post Type General Name', '' ),
            'singular_name'       => _x( 'Dish', 'Post Type Singular Name', 'codefish' ),
            'menu_name'           => __( 'Menu', 'codefish' ),
            'parent_item_colon'   => __( 'Parent Movie', 'codefish' ),
            'all_items'           => __( 'All Dishes', 'codefish' ),
            'view_item'           => __( 'View Dish', 'codefish' ),
            'add_new_item'        => __( 'Add New Dish', 'codefish' ),
            'add_new'             => __( 'Add New', 'codefish' ),
            'edit_item'           => __( 'Edit Dish', 'codefish' ),
            'update_item'         => __( 'Update Dish', 'codefish' ),
            'search_items'        => __( 'Search DIsh', 'codefish' ),
            'not_found'           => __( 'Not Found', 'codefish' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'codefish' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'menu', 'codefish' ),
            'description'         => __( 'Dishes in the menu', 'codefish' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'excerpt', 'thumbnail', 'custom-fields' ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'dish_type', 'dish_options' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */ 
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
        );
         
        // Registering Custom Post Type
        register_post_type( 'menu', $args );
     
    }
     
add_action( 'init', 'cf_custom_post_type', 0 );


//Require  TGMPA to install ACF plugin Automatically
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'cf_register_required_plugins' );

function cf_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Advanced Custom Fields',
			'slug'      => 'acf',
			'required'  => true,
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'codefish',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
