<?php

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

    $time_to_event =  date('d m',strtotime('+14 day'));

    // Check for fødselsdage
    foreach($members as $member){

        $bday = get_post_meta($member->ID,'medlem_birthday',true);
        $bday_no_year = date('d m',strtotime($bday));

        if($bday_no_year === $time_to_event){


            $notifications[] = array(
                'type' => 'bday',
                'name' => get_post_meta($member->ID,'',true),
                'date' => date('d F',strtotime($bday)).' '.date('Y'),
            );
        }
    }



    // Check for jubilæer
    foreach($members as $member){

        $jubi = get_post_meta($member->ID,'medlem_work_since',true);
        $jubi_no_year = date('d m',strtotime($bday));


        if($jubi_no_year === $time_to_event){

            $notifications[] = array(
                'type' => 'jubi',
                'name' => get_post_meta($member->ID,'',true),
                'date' => date('d F',strtotime($bday)).' '.date('Y'),
                'work_since' => date('d F Y',strtotime($jubi)),
            );

        }


    }



    // Hvis der er notifikationer
    if(!empty($notifications)){

        $receivers_bday = array();
        $receivers_jubi = array();

        foreach($members as $member){

            // fødselsdage
            if(get_post_meta($member->ID,'notify_birthday',true) === '1'){
                $receivers_bday[] = get_post_meta($member->ID,'medlem_email',true);
            }

            // jubilæer
            if(get_post_meta($member->ID,'notify_jubilee',true) === '1'){
                $receivers_jubi[] = get_post_meta($member->ID,'medlem_email',true);
            }

        }

        // Fødselsdagsnotifikationer
        if(!empty($receivers_bday)){

            foreach($notifications as $note){
                $msg = '';
                if($note['type'] === 'bday'){
                    $msg .= '<div><p><strong>'.$note['name'].'</strong></p>';
                    $msg .= '<p>Fødselsdag den '.$note['date'].'</p></div><hr/>';
                }
            }

            if($msg !== ''){
                $encap_msg = '<html><body><div><h1>Der er nye fødselsdage i FSD</h1></div><br/><br/>'.$msg.'<br><br><p>Kærlig hilsen Serveren</p></body></html>';

                sendEmail( 'FSD Server', 'server@sygehusmaskinmestre.dk', $receivers_bday, 'Nye Fødselsdage', $encap_msg );

            }
        }

        // Jubilæer
        if(!empty($receivers_jubi)){

            foreach($notifications as $note){
                $msg = '';
                if($note['type'] === 'jubi'){
                    $msg .= '<div><p><strong>'.$note['name'].'</strong></p>';
                    $msg .= '<p>Jubilæum den '.$note['date'].'</p>';
                    $msg .= '<p>Ansat siden '.$note['work_since'].'</p></div><hr/>';
                }
            }

            if($msg !== ''){
                $encap_msg = '<html><body><div><h1>Der er nye jubilæer i FSD</h1></div><br/><br/>'.$msg.'<br><br><p>Kærlig hilsen Serveren</p></body></html>';

                sendEmail( 'FSD Server', 'server@sygehusmaskinmestre.dk', $receivers_jubi, 'Nye Jubilæer', $encap_msg );

            }
        }
    }
}


