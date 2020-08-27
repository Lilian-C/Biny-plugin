<?php

add_filter( 'login_redirect', 'admin_default_page' );
add_filter( 'logout_redirect', 'admin_default_page' );

add_action( 'login_enqueue_scripts', 'import_logo_background' );
add_action( 'login_enqueue_scripts', 'load_login_stylesheet' );

add_filter( 'wp_nav_menu_items', 'add_loginout_link', 10, 2 );

// Adding the basic login/logout nav item

function add_loginout_link( $items, $args ) {

    if (is_user_logged_in() && $args->theme_location == 'primary')
    {
        $items .= '<li><a href="'. wp_logout_url() .'">Deconnexion</a></li>';
    }
    else if (!is_user_logged_in() && $args->theme_location == 'primary')
    {
        $items .= '<li><a href="'. site_url('wp-login.php') .'">Connexion</a></li>';
    }
    return $items;
}

// Redirecting by default to '/' after login or logout. This is mainly used for partnership accounts.

function admin_default_page() {
  return '/';
}

// This is nasty, but can't get a way around

function import_logo_background() {
    ?>
    <style type="text/css">
    body.login{
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/binyBackground.jpg);
    }
    </style
    <?php
}

function load_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/login/login-style.css' );
}

