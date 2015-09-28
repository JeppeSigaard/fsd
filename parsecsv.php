<?php 

define('WP_USE_THEMES', false);
header('Content-Type: text/html; charset=utf-8');
require '../../../wp-load.php';
$csv = array_map('str_getcsv', file('medlemhack.csv'));

$i = 0;
foreach($csv as $entry){
    if($i > 0){
        
        $entry = str_replace('[&comma]',',',$entry);
        
        echo '<pre>';
        print_r($entry);
        echo '</pre>';
        
        
        $new = wp_insert_post(array(
        
            'post_status' => 'publish',
            'post_type' => 'medlem',
            'post_title'    => $entry[2].' '.$entry[3],
        ));
        
        if(is_wp_error($new)){
            echo $new->get_error_message();
            exit;
        }
        
        
        // Navn
        update_post_meta($new,'medlem_name', $entry[2].' '.$entry[3]);
        
        // Arbejdssted
        if($entry[26] !== ''){
            update_post_meta($new,'medlem_work', $entry[26]);
        }
        else{
            update_post_meta($new,'medlem_work', $entry[27]);
        }
        
        // Stilling
        if($entry[37] !== ''){
            update_post_meta($new,'medlem_position', $entry[37]);
        }
        else{
            update_post_meta($new,'medlem_position', $entry[39]);
        }
        
        // Ansat siden
        update_post_meta($new,'medlem_work_since', $entry[45]);
    
        // Adresseoplysninger
        update_post_meta($new,'medlem_address', $entry[19]);
        update_post_meta($new,'medlem_post', $entry[20]);
        update_post_meta($new,'medlem_by', $entry[21]);
        update_post_meta($new,'medlem_phone', $entry[22].' '.$entry[23]);
        update_post_meta($new,'medlem_email', $entry[7]);
        
        // Medlemstype
        $medlem_type = 0;
        if($entry[1] === 'Ordinær medlem'){
            $medlem_type = 2;
        }
        
        elseif($entry[1] === 'Ekstraordinær medlem'){
            $medlem_type = 3;
        }
        
        elseif($entry[1] === 'Pensioneret medlem'){
            $medlem_type = 1;
        }
        
        update_post_meta($new,'medlem_type', $medlem_type);
        
        
        // fødselsdato
        $bd = '';
        if ($entry[17] !== '' && strlen($entry[17]) === 6){
            $bd = substr($entry[17],0,2).'-'.substr($entry[17],2,2).'-19'.substr($entry[17],4,2);
        }
        elseif($entry[17] !== '' && strlen($entry[17]) === 5){
            $bd = '0'.substr($entry[17],0,1).'-'.substr($entry[17],1,2).'-19'.substr($entry[17],3,2);
        }
        update_post_meta($new,'medlem_birthday',$bd);
        
        
        // Region
        update_post_meta($new,'medlem_region',$entry[36]);
        
        // Bestyrelse
        if($entry[13] !== ''){
            update_post_meta($new,'medlem_best_post',$entry[13]);
        }
        
        // Tillidspost
        if($entry[15] !== ''){
            update_post_meta($new,'medlem_udvalg',$entry[15]);
        }
        
        
    }
    
    $i++;
}

?>