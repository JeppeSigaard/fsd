<?php 

$mb[] = array(
    'id' => 'show_forms',
    'title' => __( 'Vis formularer', 'rwmb' ),
    'pages' => array('page'),
    'context' => 'side',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(
        
        array(
            'name'  => __( 'Vis Indemeldelse', 'rwmb' ),
            'id'    => "show_signup_form",
            'type' => 'checkbox',
            'std' => '0'
            ),
        
        array(
            'name'  => __( 'Vis Nyhedsbrevsformular', 'rwmb' ),
            'id'    => "show_newsletter_form",
            'type' => 'checkbox',
            'std' => '0'
            ),
    ),
);