<?php

    /*Loads the bootstrap and external css stylesheet to WordPress*/
    function load_stylesheets() {

        wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false,'all');
        wp_enqueue_style('bootstrap');

        wp_register_style('style', get_stylesheet_directory_uri() . '/style.css', array(), rand(111,9999), 'all');
        wp_enqueue_style('style');

        wp_register_style('custom', get_stylesheet_directory_uri() . '/css/custom.css', array(), rand(111,9999), 'all');
        wp_enqueue_style('custom');

    }
    add_action('wp_enqueue_scripts', 'load_stylesheets');

    /*Downloads jQuery to WordPress*/ 
    function include_jquery() {

        wp_deregister_script('jquery');

        wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.4.1.min.js', '', rand(111,9999), true);

        add_action('wp_enqueue_scripts', 'jquery');

    }
    add_action('wp_enqueue_scripts', 'include_jquery');

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

    /*Adds page numbers to category-post pages*/
    function my_pagination() {
        global $wp_query;
     
        $total_pages = $wp_query->max_num_pages;
     
        if ($total_pages > 1){
            $current_page = max(1, get_query_var('paged'));
     
            echo paginate_links(array(
                'base' => get_pagenum_link(1) . '%_%',
                'format' => '/page/%#%',
                'current' => $current_page,
                'total' => $total_pages,
            ));
        }
    }

    function loadjs() {
        wp_enqueue_script('my-script', get_stylesheet_directory_uri() . '/js/my-script.js', array('jquery'), '3.4.1', false);
        wp_enqueue_script('validation', get_stylesheet_directory_uri() . '/js/validation.js', array('jquery'), '3.4.1', false);
    }
    add_action('wp_enqueue_scripts', 'loadjs');

    /*function mytheme_enqueue_comment_reply() {
        // on single blog post pages with comments open and threaded comments
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
            // enqueue the javascript that performs in-link comment reply fanciness
            wp_enqueue_script( 'comment-reply' ); 
        }
    }
    // Hook into wp_enqueue_scripts
    add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_comment_reply' );
*/

function wpse218049_enqueue_comments_reply() {

    if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
        // Load comment-reply.js (into footer)
        wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
    }
}
add_action(  'wp_enqueue_scripts', 'wpse218049_enqueue_comments_reply' );
  
?>
