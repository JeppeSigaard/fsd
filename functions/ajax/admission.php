<?php 

function return_response($response){
    echo json_encode($response);
    wp_die();
}

add_action('wp_ajax_smamo_admission','smamo_ajax_admission');
add_action('wp_ajax_nopriv_smamo_admission','smamo_ajax_admission');
function smamo_ajax_admission(){
    
    $response = array();
    
    $email = (isset($_POST['email'])) ? wp_strip_all_tags($_POST['email']) : false;
    $name = (isset($_POST['name'])) ? wp_strip_all_tags($_POST['name']) : false;
    $post_id = (isset($_POST['post_id'])) ? wp_strip_all_tags($_POST['post_id']) : false;
    $company = (isset($_POST['company'])) ? wp_strip_all_tags($_POST['company']) : false;
    $ean = (isset($_POST['ean'])) ? wp_strip_all_tags($_POST['ean']) : false;
    $member_of = (isset($_POST['member_of'])) ? wp_strip_all_tags($_POST['member_of']) : false;
    $user_id = (isset($_POST['user_id'])) ? wp_strip_all_tags($_POST['user_id']) : false;
    
    if(!$email){$response['error'] = 'Email mangler'; return_response($response);}
    if(!$name){$response['error'] = 'Navn mangler'; return_response($response);}
    if(!$post_id){$response['error'] = 'Systemfejl, prøv venligst igen senere'; return_response($response);}

    $event = get_post($post_id);
    
    $new = wp_insert_post(array(
        'post_title'    => $name . ' [' . $email . ']',
        'post_status'   => 'publish',
        'post_type'     => 'tilmelding',
    
    ), true);
    
    if(is_wp_error($new)){
        $response['error'] = $new -> get_error_message();
        return_response($response);
    }
    
    update_post_meta($new,'add_to',$event->post_title);
    update_post_meta($new,'add_name',$name);
    update_post_meta($new,'add_email',$email);
    update_post_meta($new,'add_ean',$ean);
    if ($company) {update_post_meta($new,'add_company',$company);}
    if ($member_of) {update_post_meta($new,'add_member_of',$member_of);}
    if ($user_id) {update_post_meta($new,'add_user_id',$user_id);}

    // Send emails
    $message = '<html><head><meta name="charset" content="UTF-8"</head><body>';
    
    $message .= '<h3>Bekræftelse på tilmelding</h3>';
    $message .= '<p>Kære '.$name.'. Tak for din tilmelding, som nu er registreret</p>';
    $message .= '<p>Hvis du har nogen spørgsmål til din tilmelding eller arrangementet, kan du kontakte FSD på info@sygehusmaskinmestre.dk</p>';
    $message .= '<br/><br/><p>Venlig hilsen FSD</p></body></html>';
    
    $confirm_header = "From: FSD <mail@sygehusmaskinmestre.dk>\r\n"; 
    $confirm_header.= "MIME-Version: 1.0\r\n"; 
    $confirm_header.= "Content-Type: text/html; charset=utf-8\r\n"; 
    $confirm_header.= "X-Priority: 1\r\n"; 
    
    $confirm = wp_mail($email, 'Bekræftelse på tilmelding', $message, $confirm_header);
    $copy = wp_mail('support@smartmonkey.dk', '[Sikkerhedskopi] Bekræftelse på tilmelding', $message, $confirm_header);
    
    $response['success'] = '<p>Tak for din henvendelse. Din tilmelding er registreret.</p>';
    return_response($response);
    
}
