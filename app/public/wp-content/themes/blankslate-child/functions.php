<?php

/* ** ** ** ** ** ** ** * S T Y L E S * ** ** ** ** ** ** **/
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    // Chargement du style.css du thème parent Twenty Twenty
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    //    wp_enqueue_style('parent-style', get_parent_theme_file_uri() . 'style.css'); 

    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}


/* ** ** ** ** ** * ENREGISTREMENT DE MENUS * ** ** ** ** **//*
function register_header_menu()
{
    register_nav_menu('header_menu', __('Main Menu'));
}
add_action('init', 'register_header_menu');
/* --- */

function register_visitor_menu()
{
    register_nav_menu('visiteur', __('Main Menu'));
}
add_action('init', 'register_visitor_menu');
/* --- */

function register_footer_menu()
{
    register_nav_menu('footer_menu', __('Footer'));
}
add_action('init', 'register_footer_menu');

