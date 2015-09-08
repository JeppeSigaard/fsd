<?php 

$mb[] = array(
    'id' => 'event_details',
    'title' => __( 'Start og slut', 'rwmb' ),
    'pages' => array('event'),
    'context' => 'normal',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(
        
        array(
            'name'  => __( 'Startdato', 'rwmb' ),
            'id'    => "start_date",
            'type' => 'datetime',
            ),
        
         array(
            'name'  => __( 'Slutdato', 'rwmb' ),
            'id'    => "end_date",
            'type' => 'datetime',
            ),
    ),
);