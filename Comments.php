<?php

add_filter( 'comment_form_fields', 'mo_comment_fields_custom_order' );
add_filter( 'comment_form_defaults', 'remove_leave_a_reply_form' );

// Removing some useless fields from the "leave a reply" form in the main page

function remove_leave_a_reply_form($defaults) {
    $defaults['comment_notes_before'] = '';
    $defaults['title_reply'] = '';
    return $defaults;
}

// Removing some useless fields from the main contact section on the main page

function mo_comment_fields_custom_order( $fields ) {
    $comment_field = $fields['comment'];
    $author_field = $fields['author'];
    $email_field = $fields['email'];
    $url_field = $fields['url'];

    unset( $fields['url'] );
    unset( $fields['comment'] );
    $fields['comment_field'] = '<p class="comment-form-comment"><label for="comment">' . _x( 'Votre message', 'noun', 'textdomain' ) . '</label> ' .
        '<textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" aria-required="true" required="required"></textarea></p>';
    $fields['author'] = $author_field;
    $fields['email'] = $email_field;

    return $fields;
}

