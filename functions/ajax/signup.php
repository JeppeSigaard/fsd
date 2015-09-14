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
    update_post_meta($new,'medlem_birthday',$birthday);
    update_post_meta($new,'medlem_phone',$phone);
    update_post_meta($new,'medlem_address',$address);
    update_post_meta($new,'medlem_post',$post);
    update_post_meta($new,'medlem_by',$by);
    update_post_meta($new,'medlem_remarks',$remarks);
    update_post_meta($new,'medlem_type','99');
    
    $response['success'] = '<h2>Tjek din email</h2><p>Tak for din henvendelse. Du vil modtage en bekræftelsesemail, når medlemsskabet er gennemført</p>';
    echo json_encode($response);
    exit;

}