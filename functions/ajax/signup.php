<?php 
add_action('wp_ajax_smamo_signup','smamo_ajax_signup');
add_action('wp_ajax_nopriv_smamo_signup','smamo_ajax_signup');
function smamo_ajax_signup(){

    $response = array();
    
    
    
    
    
    
    echo json_encode($response);
    exit;

}