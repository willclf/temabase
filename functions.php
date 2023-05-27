<?php

/**
 * CSS & JS
 */
add_action('wp_head', 'show_template');
function show_template()
{
    global $template;
    return basename($template);
}
function load_style($name)
{
    $dir = get_template_url() . '/assets/css' . '/' . $name . '.css';
    wp_enqueue_style($name . '-css', $dir, array(), time(), 'all');
    return false;
}
function load_script($name)
{
    $dir = get_template_url() . '/assets/js' . '/' . $name . '.js';
    wp_enqueue_script($name . '-js', $dir, array('googleapis-jquery'), time(),  false);
    return false;
}

/**
 * CSS / JS
 */
function labbo_scripts()
{
    global $post;
    wp_enqueue_script('googleapis-jquery', get_template_directory_uri() . '/assets/vendor/js/jquery/jquery.min.js', array(), '3.3.1', false);
    wp_localize_script('labbotheme-js', 'ajax_admin', array('ajax_url' => admin_url('admin-ajax.php'), 'nonce' => wp_create_nonce('ajax-nonce')));
    // FONTAWESOME
    wp_enqueue_style('Font Awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3', 'all');
    // LITTY MODAL
    wp_enqueue_style('lity-css', get_template_directory_uri() . '/assets/vendor/css/lity/lity.min.css', array(), '2.4.1', 'all');
    wp_enqueue_script('lity-js', get_template_directory_uri() . '/assets/vendor/js/lity/lity.min.js', array('googleapis-jquery'), '2.4.1', false);
    // ANIME JS
    wp_enqueue_script('anime-js', get_template_directory_uri() . '/assets/vendor/js/anime.js/anime.min.js', array('googleapis-jquery'), '1.0.0', false);
    // OWL-CAROUSEL
    wp_enqueue_script('owlcarousel-js', get_template_directory_uri() . '/assets/vendor/js/owl/owl.carousel.min.js', array('googleapis-jquery'), '2.3.4', false);
    wp_enqueue_style('owl-carousel-css', get_template_directory_uri() . '/assets/vendor/css/owl/owl.carousel.min.css', array(), '2.3.4', 'all');
    wp_enqueue_style('owl-default-css', get_template_directory_uri() . '/assets/vendor/css/owl/owl.theme.default.min.css', array(), '2.3.4', 'all');
    //css 
    wp_enqueue_style('tema-geral', get_template_directory_uri() . '/assets/css/tema.css', array(), time(), 'all');
    wp_enqueue_style('tema-header', get_template_directory_uri() . '/assets/css/header.css', array(), time(), 'all');
    wp_enqueue_style('tema-footer', get_template_directory_uri() . '/assets/css/footer.css', array(), time(), 'all');
    

    // ARQUIVOS DO PROJETO
    $template_name = show_template();
    switch ($template_name) {
        case "index.php":
            load_style('home');
            load_style('banner-home');
            load_script('home');
            break;
        default:
            echo '';
    }
}

add_action('wp_enqueue_scripts', 'labbo_scripts');

add_theme_support('post-thumbnails');
add_theme_support('menus');

/**
 * Helpers
 */

function get_url_template()
{
    return get_bloginfo('template_url');
}
function get_image($img = '')
{
    return get_bloginfo('template_url') . '/assets/img/' . $img;
}
function get_svg($svg = '')
{
    return get_bloginfo('template_url') . '/assets/svg/' . $svg . '.svg';
}
function get_font($font = '')
{
    return get_bloginfo('template_url') . '/assets/font/' . $font;
}
function new_excerpt($length)
{
    return 10;
}
function new_excerpt_more($more)
{
    return '';
}
function get_template_url()
{
    return get_bloginfo('template_url');
}

/**
 * OPTIONS PAGE
 */
add_filter('excerpt_length', 'new_excerpt');
add_filter('excerpt_more', 'new_excerpt_more');

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => 'Opções',
        'menu_title'    => 'Opções',
        'menu_slug'     => 'options',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}