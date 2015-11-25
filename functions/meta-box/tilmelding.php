<?php 

$mb[] = array(
    'id' => 'tilmeldingsdetaljer',
    'title' => __( 'TIlmeldingsdetaljer', 'rwmb' ),
    'pages' => array('tilmelding'),
    'context' => 'normal',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(
        
        array(
            'name'  => __( 'Tilmeldt til', 'rwmb' ),
            'id'    => "add_to",
            'type' => 'text',
        ),
        
        array(
            'name'  => __( 'Navn', 'rwmb' ),
            'id'    => "add_name",
            'type' => 'text',
        ),
        array(
            'name'  => __( 'Email', 'rwmb' ),
            'id'    => "add_email",
            'type' => 'text',
        ),
        array(
            'name'  => __( 'Firmanavn', 'rwmb' ),
            'id'    => "add_company",
            'type' => 'text',
        ),
        
        array(
            'name'  => __( 'EAN', 'rwmb' ),
            'id'    => "add_ean",
            'type' => 'text',
        ),
    ),
);