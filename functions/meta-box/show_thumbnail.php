<?php 
$mb[] = array(
    'id' => 'show_thumb',
    'title' => __( 'Vis sidens udvalgte billede på siden', 'rwmb' ),
    'pages' => array('page'),
    'context' => 'side',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(
        
        array(
            'name'  => __( 'Vis thumbnail', 'rwmb' ),
            'id'    => "show_thumbnail",
            'type' => 'checkbox',
            'std' => '0'
            ),
    ),
);