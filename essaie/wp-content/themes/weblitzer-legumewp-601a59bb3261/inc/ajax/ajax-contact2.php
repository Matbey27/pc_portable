<?php

// action: ajax contact
add_action('wp_ajax_ajax_contact', 'getTheContactsWithAjax');
add_action('wp_ajax_nopriv_ajax_contact', 'getTheContactsWithAjax');

function getTheContactsWithAjax() {
    global $wpdb;
    // contacts
    $contacts = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}contact2", ARRAY_A);

    $htmlcontact = '<ul>';
    foreach ($contacts as $contact) {
        $htmlcontact .= '<li>'.$contact['email'].'</li>';
        $htmlcontact .= '<li>'.$contact['message'].'</li>';
        $htmlcontact .= '<li>'.$contact['subject'].'</li>';
        $htmlcontact .= '<li>'.$contact['created_at'].'</li>';
    }
    $htmlcontact .= '</ul>';
    $data = [
        'mail' => '',
        'message' => '',
        'subject' => '',
        'created_at' => '',
    ];
    showJson($data);
}