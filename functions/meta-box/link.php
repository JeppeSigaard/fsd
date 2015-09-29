<?php

$mb[] = array(
    'id' => 'hyperlink_link',
    'title' => __( 'Link', 'rwmb' ),
    'pages' => array('event'),
    'context' => 'normal',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(

        array(
            'name'  => __( 'Link', 'rwmb' ),
            'id'    => "hyperlink_url",
            'type' => 'url',
            ),
    ),
);
