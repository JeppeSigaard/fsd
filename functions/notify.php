<?php
setlocale(LC_ALL, "da_DK.UTF-8", "Danish_Denmark.1252", "danish_denmark", "danish", "dk_DK@euro");

// Funktion til at sende emails
function sendEmail( $from_name, $from, $to, $subject, $message ){
    $header = "From: ".$from_name." <".$from.">\r\n";
    $header.= "MIME-Version: 1.0\r\n";
    $header.= "Content-Type: text/html; charset=utf-8\r\n";
    $header.= "X-Priority: 1\r\n";
    $email = wp_mail($to, $subject, $message, $header);
    return $email;
}

add_action( 'wp', 'smamo_activate_notifier' );
add_action( 'smamo_notifier_event', 'smamo_do_notifier' );

function smamo_activate_notifier() {
    if ( !wp_next_scheduled( 'smamo_notifier_event' ) ) {
        wp_schedule_event( time(), 'daily', 'smamo_notifier_event' );
    }
}
function smamo_do_notifier() {
    
    $notifications = array();
    $time_to_event =  date('d m',strtotime('+14 day'));
    
    $current_year = date('Y');
    $years_array = array('30','40','50','60','70','75','80','90','100');

    $members = get_posts(array(
        'posts_per_page' => -1,
        'post_type' => 'medlem'
    ));
    
    // Check for fødselsdage
    foreach($members as $member){

        $bday = get_post_meta($member->ID,'medlem_birthday',true);
        $bday_no_year = date('d m',strtotime($bday));

        if($bday_no_year === $time_to_event && in_array($current_year - date('Y',strtotime($bday)),$years_array)){

            $notifications[] = array(
                'type'      => 'bday',
                'name'      => get_post_meta($member->ID,'medlem_name',true),
                'position'  => get_post_meta($member->ID,'medlem_position',true),
                'work'      => get_post_meta($member->ID,'medlem_work',true),
                'region'    => get_post_meta($member->ID,'medlem_region',true),
                'address'   => get_post_meta($member->ID,'medlem_address',true),
                'post'      => get_post_meta($member->ID,'medlem_post',true),
                'by'        => get_post_meta($member->ID,'medlem_by',true),
                'phone'     => get_post_meta($member->ID,'medlem_phone',true),
                'mobile'    => get_post_meta($member->ID,'medlem_mobile',true),
                'email'     => get_post_meta($member->ID,'medlem_email',true),
                'date'      => strftime('%d %B',strtotime($bday)).' '.date('Y'),
                'amount'    => $current_year - date('Y', strtotime($bday)),
            );
        }
    }



    // Check for jubilæer
    /*foreach($members as $member){

        $jubi = get_post_meta($member->ID,'medlem_work_since',true);
        $jubi_no_year = date('d m',strtotime($jubi));


        if($jubi_no_year === $time_to_event){

            $notifications[] = array(
                'type' => 'jubi',
                'name' => get_post_meta($member->ID,'medlem_name',true),
                'date' => date('d F',strtotime($jubi)).' '.date('Y'),
                'work_since' => date('d F Y',strtotime($jubi)),
            );

        }


    }*/

    // Hvis der er notifikationer
    if(!empty($notifications)){

        $receivers_bday = array();
        $receivers_jubi = array();
        
        $receivers_bday[] = 'support@smartmonkey.dk';
        /*$receivers_jubi[] = 'support@smartmonkey.dk';*/

        foreach($members as $member){

            // fødselsdage
            if(get_post_meta($member->ID,'notify_birthday',true) === '1'){
                $receivers_bday[] = get_post_meta($member->ID,'medlem_email',true);
            }

            // jubilæer
            /*if(get_post_meta($member->ID,'notify_jubilee',true) === '1'){
                $receivers_jubi[] = get_post_meta($member->ID,'medlem_email',true);
            }*/

        }

        // Fødselsdagsnotifikationer
        if(!empty($receivers_bday)){
            
            $msg = '';
            $receiver_string = '';
            
            foreach($notifications as $note){
                
                
                if($note['type'] === 'bday'){
                    $msg .= '<div><p><strong>'.$note['name'].'</strong></p>';
                    $msg .= '<p>'.$note['position'].'</p>';
                    $msg .= '<p>'.$note['work'].'</p>';
                    $msg .= '<p>'.$note['region'].'</p><br/>';
                    $msg .= '<p><strong>Adresse</strong></p>';
                    $msg .= '<p>'.$note['address'].'</p>';
                    $msg .= '<p>'.$note['post'].' '.$note['by'].'</p><br/>';
                    $msg .= '<p>Telefon: '.$note['phone'].' / '.$note['mobile'].'</p>';
                    $msg .= '<p>Email: '.$note['email'].'</p>';
                    $msg .= '<p>Fødselsdag den '.$note['date'].', '.$note['amount'].' år.</p></div>';
                }
            }
            
            foreach($receivers_bday as $rec){
                $receiver_string .= $rec . '<br/>';
            }

            if($msg !== ''){
                $encap_msg = '<html><head><meta charset="UTF-8"></head><body><div><h1>Der er nye fødselsdage i FSD</h1></div><br/><br/>'.$msg.'<br><br><p>Med venlig hilsen FSD</p><hr/><p>Denne email er sendt til:</p><p>'.$receiver_string.'</p></body></html>';
                
                foreach($receivers_bday as $rec){
                    sendEmail( 'FSD Server', 'server@sygehusmaskinmestre.dk', $rec, 'Fødselsdag i FSD', $encap_msg );
                }
            }
        }

        // Jubilæer
        /*if(!empty($receivers_jubi)){
            
            $msg = '';
            
            foreach($notifications as $note){
                
                if($note['type'] === 'jubi'){
                    $msg .= '<div><p><strong>'.$note['name'].'</strong></p>';
                    $msg .= '<p>Jubilæum den '.$note['date'].'</p>';
                    $msg .= '<p>Ansat siden '.$note['work_since'].'</p></div><hr/>';
                }
            }

            if($msg !== ''){
                $encap_msg = '<html><head><meta charset="UTF-8"></head><body><div><h1>Der er nye jubilæer i FSD</h1></div><br/><br/>'.$msg.'<br><br><p>Kærlig hilsen Serveren</p></body></html>';

                
                foreach($receivers_jubi as $rec){
                    sendEmail( 'FSD Server', 'server@sygehusmaskinmestre.dk', $rec, 'Nye Jubilæer', $encap_msg );
                }
            }
        }*/
    }
}

