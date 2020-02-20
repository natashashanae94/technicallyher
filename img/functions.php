<?php

    /*Loads the bootstrap and external css stylesheet to WordPress*/
    function load_stylesheets() {

        wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false,'all');
        wp_enqueue_style('bootstrap');

        wp_register_style('style', get_stylesheet_directory_uri() . '/style.css', array(), rand(111,9999), 'all');
        wp_enqueue_style('style');

        wp_register_style('my-style', get_stylesheet_directory_uri() . '/page.css', array(), rand(111,9999), 'all');
        wp_enqueue_style('style');
    }
    add_action('wp_enqueue_scripts', 'load_stylesheets');

    /*Downloads jQuery to WordPress*/ 
    function include_jquery() {

        wp_deregister_script('jquery');

        wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.4.1.min.js', '', rand(111,9999), true);

        add_action('wp_enqueue_scripts', 'jquery');

    }
    add_action('wp_enqueue_scripts', 'include_jquery');

    /*Links to external script.js file*/
    function loadjs() 
    {
        wp_register_script('script', get_stylesheet_directory_uri() . '/js/script.js', array('jquery'));
        wp_enqueue_script('script');
    }
    add_action('wp_enqueue_scripts', 'loadjs');


    /*Links Google Fonts to WordPress*/
    function wpb_add_google_fonts() {
        wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Alegreya|Playfair+Display&display=swap', false ); 
    }     
    add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );


    /*Activates the navigation menu to appear on WordPress*/
    function wpb_custom_new_menu() {
        register_nav_menus(

            array(
                'top-menu' => __('Top Menu', 'theme'),
                'footer-menu' => __('Footer Menu', 'theme'),
            )

        );
    }
    add_action('init', 'wpb_custom_new_menu');

    add_theme_support('post-thumbnails');

    /*Prevents duplicate WordPress Posts*/
    add_filter('post_link', 'track_displayed_posts');
    add_action('pre_get_posts','remove_already_displayed_posts');
    
    $displayed_posts = [];
    
    function track_displayed_posts($url) {
        global $displayed_posts;
        $displayed_posts[] = get_the_ID();
        return $url; // don't mess with the url
    }
    
    function remove_already_displayed_posts($query) {
        global $displayed_posts;
        $query->set('post__not_in', $displayed_posts);
    }

    /** set default settings of attachment media box - basicwp.com */
    function attachment_default_settings() { 
        update_option('image_default_align', 'left' ); 
        update_option('image_default_link_type', 'custom' ); 
        update_option('image_default_size', 'large' );
    }
    add_action('after_setup_theme', 'attachment_default_settings');
    add_action( 'after_setup_theme', 'wps_attachment_display_settings' );

    //Number Pagination Function
    function numPagination{

        global $wp_query;
        $big = 9999999; //need an unlikely integer
            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages
            ));
    }

?>
