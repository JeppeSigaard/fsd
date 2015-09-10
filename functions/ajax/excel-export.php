<?php

add_action('wp_ajax_smamo_excel_export','smamo_excel_export');
function smamo_excel_export(){
    $response = array();






    echo json_encode($_POST);
    exit;

}
