<?php 
add_action('wp_ajax_smamo_signup','smamo_ajax_signup');
add_action('wp_ajax_nopriv_smamo_signup','smamo_ajax_signup');

function sendError($response,$msg){
    $response['error'] = $msg;
    echo json_encode($response);
    exit;
}

function smamo_ajax_signup(){

    $response = array();
    
    if(!isset($_POST['name']) || $_POST['name'] === ''){
        sendError($response,'Indtast venligst et navn');
    }

    if(!isset($_POST['email']) || $_POST['email'] === ''){
        sendError($response,'Indtast venligst en email');
    }

    if(!isset($_POST['work']) || $_POST['work'] === ''){
        sendError($response,'Vælg en arbejdsplads');
    }

    if(!isset($_POST['position']) || $_POST['position'] === ''){
        sendError($response,'Vælg en stilling');
    }

    if(!isset($_POST['work_since']) || $_POST['work_since'] === ''){
        sendError($response,'Indtast ansat siden');
    }

    if(!isset($_POST['birthday']) || $_POST['birthday'] === ''){
        sendError($response,'Indtast din fødselsdag');
    }

    if(!isset($_POST['phone']) || $_POST['phone'] === ''){
        sendError($response,'Skriv dit telefonnummer');
    }

    if(!isset($_POST['address']) || $_POST['address'] === ''){
        sendError($response,'Indtast din adresse');
    }

    if(!isset($_POST['post']) || $_POST['post'] === ''){
        sendError($response,'Indtast dit postnummer');
    }

    if(!isset($_POST['by']) || $_POST['by'] === ''){
        sendError($response,'Indtast by');
    }

    $name = wp_strip_all_tags($_POST['name']);
    $email = wp_strip_all_tags($_POST['email']);
    $work = wp_strip_all_tags($_POST['work']);
    $position = wp_strip_all_tags($_POST['position']);
    $ean = (isset($_POST['ean'])) ? wp_strip_all_tags($_POST['ean']) : '';
    $cpr = (isset($_POST['cpr'])) ? wp_strip_all_tags($_POST['cpr']) : '';
    $user_id = (isset($_POST['user_id'])) ? wp_strip_all_tags($_POST['user_id']) : '';
    $work_since = strtotime(wp_strip_all_tags($_POST['work_since']));
    $birthday = strtotime(wp_strip_all_tags($_POST['birthday']));
    $phone = strtotime(wp_strip_all_tags($_POST['phone']));
    $address = wp_strip_all_tags($_POST['address']);
    $post = wp_strip_all_tags($_POST['post']);
    $by = wp_strip_all_tags($_POST['by']);
    $remarks = (isset($_POST['remarks'])) ? wp_strip_all_tags($_POST['remarks']) : '';


    $new = wp_insert_post(array(
        'post_title'    => $name,
        'post_type' => 'medlem',
        'post_status'   => 'draft',
    
    ),true);
    
    if(is_wp_error($new)){
        $response['error'] = 'Kunne ikke oprette medlemsskab på grund af en teknisk fejl: '. $new->get_error_message;
        echo json_encode($response);
        exit;

    }
    
    
    update_post_meta($new,'medlem_name',$name);
    update_post_meta($new,'medlem_email',$email);
    update_post_meta($new,'medlem_work',$work);
    update_post_meta($new,'medlem_position',$position);
    update_post_meta($new,'medlem_ean',$ean);
    update_post_meta($new,'medlem_cpr',$cpr);
    update_post_meta($new,'medlem_user_id',$user_id);
    update_post_meta($new,'medlem_work_since',$work_since);
    update_post_meta($new,'medlem_birthday',$birthday);
    update_post_meta($new,'medlem_phone',$phone);
    update_post_meta($new,'medlem_address',$address);
    update_post_meta($new,'medlem_post',$post);
    update_post_meta($new,'medlem_by',$by);
    update_post_meta($new,'medlem_remarks',$remarks);
    update_post_meta($new,'medlem_type','99');
    
    
    // Send notifikation
    $members = get_posts(array(
        'posts_per_page' => -1,
        'meta_key'         => 'notify_new_member',
        'meta_value'       => 1,
    ));
    
    $emails = array(
        0 => 'support@smartmonkey.dk',
    );
    
    foreach($members as $member){
        $emails[] = get_post_meta($member->ID,'medlem_email',true);
    }
    
    
    
    $message = '<html><head><meta name="charset" content="UTF-8"</head><body>';
    
    $message .= '<h3>'.$name.' har anmodet om medlemsskab i FSD</h3>';
    $message .= '<p><strong>Oplysninger</strong></p><ul>';
    $message .= '<li>Navn: '.$name.'</li>';
    $message .= '<li>Email: '.$email.'</li><';
    $message .= '<li>Telefonnummer: '.$phone.'</li><';
    $message .= '<li>Ansat hos: '.$work.'</li>';
    $message .= '<li>Stilling: '.$position.'</li>';
    $message .= '<li>EAN: '.$ean.'</li>';
    $message .= '<li>Bruger ID: '.$user_id.'</li>';
    $message .= '<li>Ansat siden: '.$work_since.'</li>';
    $message .= '<li>Fødselsdato: '.$birthday.'</li>';
    $message .= '<li>Adresse: '.$address.'</li>';
    $message .= '<li>Postnummer: '.$post.'</li>';
    $message .= '<li>By: '.$by.'</li>';
    $message .= '<li>CPR: '.$cpr.'</li>';
    $message .= '<li>Bemærkninger: '.$remarks.'</li>';
    
    $message .= '</ul><br/><br/><p>Venlig hilsen FSD</p></body></html>';
    

    $notify_header = "From: FSD <mail@sygehusmaskinmestre.dk>\r\n"; 
    $notify_header.= "MIME-Version: 1.0\r\n"; 
    $notify_header.= "Content-Type: text/html; charset=utf-8\r\n"; 
    $notify_header.= "X-Priority: 1\r\n"; 
    $email = wp_mail($emails, 'Nyt medlemsskab i FSD', $message, $notify_header);
       

    
    
    $response['success'] = '<h2>Tjek din email</h2><p>Tak for din henvendelse. Du vil modtage en bekræftelsesemail, når medlemsskabet er gennemført</p>';
    echo json_encode($response);
    exit;

}
