<?php

add_action( 'init', 'create_role_partenaire');

//Adding the partner role to the Wordpress. It'll be mainly used by WooCommerce.

function create_role_partenaire()
{
    remove_role( 'partenaire' );
    $result = add_role(
        'partenaire',
        __( 'Partenaire' ),
        array(
            'read'          => true,
            'comment_posts' => true
        )
    );
}

