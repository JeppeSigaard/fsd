<?php

$mb[] = array(
    'id' => 'hyperlink_link',
    'title' => __( 'Link data', 'rwmb' ),
    'pages' => array('hyperlink'),
    'context' => 'normal',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(

        array(
            'name'  => __( 'Link', 'rwmb' ),
            'id'    => "hyperlink_url",
            'type' => 'url',
            ),

		array(
            'name'  => __( 'email', 'rwmb' ),
            'id'    => "hyperlink_email",
            'type' => 'text',
            ),
    ),
);
