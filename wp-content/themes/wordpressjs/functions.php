<?php

function my_theme_scripts(){
    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script('jquery-min-ui', get_template_directory_uri() . '/js/jquery.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script('menu', get_template_directory_uri() . '/js/menu.js', array( 'jquery'), '1.0.0',  true );
}

add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );

function wordpress_resources() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_script('main_js', get_template_directory_uri() . '/js/main.js', NULL, 1.0, true);
    wp_enqueue_style('wp-google-fonts', 'https://fonts.googleapis.com/css?family=Oswald:300,400,500', false);
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.0.8/css/all.css', false);


    wp_localize_script('main_js', 'magicalData', array(
        'nonce'     => wp_create_nonce('wp_rest'),
        'siteURL'   => get_site_url()
    ));
}

add_action('wp_enqueue_scripts', 'wordpress_resources', 'wp-google-fonts', 'fontawesome');

// Get top ancestor
function get_top_ancestor_id() {

    global $post;

    if ($post->post_parent) {
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }

    return $post->ID;
}

// Does page have children?
function has_children() {
    global $post;

    $pages = get_pages('child_of=' . $post->ID);
    return count($pages);
}

/******************* Excerpt's Fix ***************/
function custom_excerpt_length() {
    return 25;
}

add_filter('excerpt_length', 'custom_excerpt_length');

// Theme Setup
function wordPress_setup() {

//Navigation Menus
register_nav_menus(array(
    'primary' => __( 'Primary Menu'),
    'footer'  => __( 'Footer Menu'),
));

	// Add featured image support
	add_theme_support('post-thumbnails');
	add_image_size('small-thumbnail', 280, 120, false);
	add_image_size('square-thumbnail', 80, 80, false);
	add_image_size('banner-image', 1920, 210, array('left', 'top'));
	
	// Add post type support
	add_theme_support('post-formats', array('aside', 'gallery', 'link'));
}

add_action('after_setup_theme', 'wordPress_setup');

// Add Our Widget Locations
function ourWidgetsInit() {
    register_sidebar( array(
        'name'          => 'Sidebar',
        'id'            => 'sidebar1',
        'before_widget' => '<div class="widget-item">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="my-special-class">',
        'after_title'   => '</h4>'
    ));

    register_sidebar( array(
        'name'          => 'Footer Area 1',
        'id'            => 'footer1',
        'before_widget' => '<div class="widget-item">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="my-special-class">',
        'after_title'   => '</h4>'
    ));

    register_sidebar( array(
        'name'          => 'Footer Area 2',
        'id'            => 'footer2',
        'before_widget' => '<div class="widget-item">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="my-special-class">',
        'after_title'   => '</h4>'
    ));

    register_sidebar( array(
        'name'          => 'Footer Area 3',
        'id'            => 'footer3',
        'before_widget' => '<div class="widget-item">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="my-special-class">',
        'after_title'   => '</h4>'
    ));

    register_sidebar( array(
        'name'          => 'Footer Area 4',
        'id'            => 'footer4',
        'before_widget' => '<div class="widget-item">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="my-special-class">',
        'after_title'   => '</h4>'
    ));
}

add_action('widgets_init', 'ourWidgetsInit');

// Add footer callout section to admin appearance customize screen
function lwp_footer_callout($wp_customize) {
    $wp_customize->add_section('lwp-footer-callout-section', array(
        'title'     => 'Footer Callout'
    ));

    $wp_customize->add_setting('lwp-footer-callout-display', array(
        'default'   => 'No'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'lwp-footer-callout-display-control', array(
        'label'     => 'Display this section?',
        'section'   => 'lwp-footer-callout-section',
        'settings'  => 'lwp-footer-callout-display',
        'type'      => 'select',
        'choices'   => array('No' => 'No', 'Yes' => 'Yes')
    )));

    $wp_customize->add_setting('lwp-footer-callout-headline', array(
        'default'   => 'Example Headline Text'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'lwp-footer-callout-headline-control', array(
        'label'     => 'Headline',
        'section'   => 'lwp-footer-callout-section',
        'settings'  => 'lwp-footer-callout-headline'
    )));

    $wp_customize->add_setting('lwp-footer-callout-text', array(
        'default'   => 'Example Paragraph Text'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'lwp-footer-callout-text-control', array(
        'label'     => 'Text',
        'section'   => 'lwp-footer-callout-section',
        'settings'  => 'lwp-footer-callout-text',
        'type'      => 'textarea'
    )));

    $wp_customize->add_setting('lwp-footer-callout-link');

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'lwp-footer-callout-link-control', array(
        'label'     => 'Link',
        'section'   => 'lwp-footer-callout-section',
        'settings'  => 'lwp-footer-callout-link',
        'type'      => 'dropdown-pages'
    )));

    $wp_customize->add_setting('lwp-footer-callout-image');

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'lwp-footer-callout-image-control', array(
        'label'     => 'Image',
        'section'   => 'lwp-footer-callout-section',
        'settings'  => 'lwp-footer-callout-image',
        'width'     => 750,
        'height'    => 500
    )));
}

add_action('customize_register', 'lwp_footer_callout');


?>