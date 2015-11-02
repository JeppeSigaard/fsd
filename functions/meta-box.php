<?php 


add_filter( 'rwmb_meta_boxes', 'smamo_add_boxes' );

function smamo_add_boxes(){

    // Your boxes or requires here
    require 'meta-box/member.php';
    require 'meta-box/show_in_slide.php';
    require 'meta-box/aside_control.php';
    require 'meta-box/event.php';
    require 'meta-box/show_thumbnail.php';
    require 'meta-box/forms.php';
    require 'meta-box/attach_files.php';
    require 'meta-box/link.php';
    require 'meta-box/tilmelding.php';
    
    
    return $mb;

}
