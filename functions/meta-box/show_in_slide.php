<?php 

$mb[] = array(
    'id' => 'show_in_slide_manual',
    'title' => __( 'Vis i forsidens slider', 'rwmb' ),
    'pages' => array('post','page','medlem','event','referat'),
    'context' => 'side',
    'priority' => 'low',
    'autosave' => true,
    'fields' => array(
        
        array(
            'name'  => __( 'Tilføj til forsiden', 'rwmb' ),
            'id'    => "show_in_slide",
            'type'  => 'checkbox',
            'std'   => 0,
      	),
    ),
);
