<?php 


add_filter( 'rwmb_meta_boxes', 'smamo_add_boxes' );

function smamo_add_boxes(){

    // Your boxes or requires here
    require 'meta-box/member.php';
    require 'meta-box/show_in_slide.php';
    require 'meta-box/aside_control.php';
    
    
    return $mb;

}