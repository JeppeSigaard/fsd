<?php

add_filter( 'rwmb_meta_boxes', 'smamo_add_boxes' );

function smamo_add_boxes(){

// Your boxes or requires here
$mb[] = array(
    'id' => 'page-box',
    'title' => __( 'Gridsystem til undersider', 'rwmb' ),
    'pages' => array('page'),
    'context' => 'normal',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(
        
        array(
            'name'  => __( 'Opret side', 'rwmb' ),
            'id'    => "page_in_page",
            'type' => 'group',
            'clone' => true,
            'fields' => array(
                
                array(
                    'name' => __('Henvsning til'),
                    'id' => 'pip_page_id',
                    'type' => 'post',
                    'post_type' => 'page',
                ),
                
                array(
                    'name' => __('Billede'),
                    'id' => 'pip_page_img',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                ),
                
                array(
                    'name' => __('Tekst'),
                    'id' => 'pip_page_text',
                    'type' => 'textarea',
                ),
                
            ),
            
        ),
    ),
);

    
return $mb;

}




?>