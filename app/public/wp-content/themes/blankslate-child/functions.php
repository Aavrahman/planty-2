<?php

/* ** ** ** ** ** ** ** * S T Y L E S * ** ** ** ** ** ** **/
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    // Chargement du style.css du thème parent Twenty Twenty
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    //    wp_enqueue_style('parent-style', get_parent_theme_file_uri() . 'style.css'); 

    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));

    /** home-page.css */
    wp_enqueue_style('home-page-style', get_stylesheet_directory_uri() . '/css/home-page.css', array('theme-style'), filemtime(get_stylesheet_directory() . '/css/home-page.css'));

    /** rencontre.css */
    wp_enqueue_style('rencontrer-style', get_stylesheet_directory_uri() . '/css/rencontrer.css', array('theme-style'), filemtime(get_stylesheet_directory() . '/css/rencontrer.css'));

    /** commander.css */
    wp_enqueue_style('commander-style', get_stylesheet_directory_uri() . '/css/commander.css', array('theme-style'), filemtime(get_stylesheet_directory() . '/css/commander.css'));
}


/* ** ** ** ** ** * ENREGISTREMENT DE MENUS * ** ** ** ** **/
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


/* ** ** ** ** ** * AFFICHAGE DIFFERENTIEL DU MENU PRINCIPAL * ** ** ** ** **/
function admin_link($items, $args)
{
    if (is_user_logged_in() && $args->theme_location == 'visiteur') {
        $admin_link = "<li id='menu-item-214' class='menu-item menu-item-type-post_type menu-item-object-page'>
                            <a href='" . admin_url() . "'> 
                                <span itemprop='name'> Admin </span>
                            </a>     
                        </li>";
        $li_array = array();
        while(false !== ($pos = strpos($items, '<li', 3))) {
            $li_array[] = substr($items, 0, $pos);
            $items = substr($items, $pos);
        }
        $li_array[] = $items;
        array_splice($li_array, 1, 0, $admin_link);
        $items = implode('', $li_array);
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'admin_link', 10, 2);


/** ** ** ** ** ** * IMPORT DES SHORT CODES ** ** ** ** ** **/
require_once(__DIR__ . '/shortcodes/shortcodes.php');




/* ** ** ** ** ** * AFFICHAGE DIFFERENTIEL DU MENU PRINCIPAL * ** ** ** ** **/
/*
function admin_link($items, $args)
{
    if (is_user_logged_in() && $args->theme_location == 'visiteur') {
        $admin_link = "<li id='menu-item-214' class='menu-item menu-item-type-post_type menu-item-object-page'>
                            <a hraf='" . admin_url() . "'> 
                                <span itemprop='name'> Admin </span>
                            </a>     
                        </li>";
        $li_array = array();
        while (false !== ($pos = strpos($items, '<li', 3))) {
            $li_array[] = substr($items, 0, $pos);
            $items = substr($items, $pos);
        }
        $li_array[] = $items;
        array_splice($li_array, 1, 0, $admin_link);
        $items = implode('', $li_array);
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'admin_link', 10, 2);   */