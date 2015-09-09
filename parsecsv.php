<?php 

define('WP_USE_THEMES', false); 
require '../../../wp-load.php';
echo '<pre>';
$csv = array_map('str_getcsv', file('extraordin.csv'));

print_r($csv);
$i = 0;
foreach($csv as $entry){
    if($i !== 0){
        
        $new = wp_insert_post(array(
        
            'post_status' => 'publish',
            'post_type' => 'medlem',
            'post_title'    => $entry[1].' '.$entry[2],
        ));
        
        if(is_wp_error($new)){
            echo $new->get_error_message();
            exit;
        }
        
        update_post_meta($new,'medlem_name', $entry[1].' '.$entry[2]);
        update_post_meta($new,'medlem_work', $entry[0]);
        update_post_meta($new,'medlem_address', $entry[3]);
        update_post_meta($new,'medlem_post', $entry[5]);
        update_post_meta($new,'medlem_by', $entry[6]);
        update_post_meta($new,'medlem_phone', $entry[7]);
        
        update_post_meta($new,'medlem_type', '3');
        
        
    }
    
    $i++;
}