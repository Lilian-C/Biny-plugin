<?php

/*
    Plugin Name: Biny
    Description: Plugin de Biny, ajout du role de partenariat, ajout de l'achat de data, et autres
    Author: Biny, Lilian Cadiou
    Version: 0.1
*/

require_once('Roles.php');
require_once('Comments.php');
require_once('Authentication.php');

add_action( 'admin_menu', 'biny_register_options_page');
add_action( 'admin_menu', 'biny_menu' );
add_action( 'init', 'create_role_partenaire');

function biny_register_options_page()
{
    add_options_page('Options de Biny', 'Biny', 'manage_options', 'biny');
}

function biny_menu()
{
    add_menu_page('Biny', 'Biny', 'manage_options', 'BinyMenu', 'displayPlugin');
}
?>

