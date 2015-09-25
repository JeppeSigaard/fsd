<?php 

$mb[] = array(
    'id' => 'attach_files',
    'title' => __( 'Tilføj links til filer', 'rwmb' ),
    'pages' => array('referat','rapport','fagblad'),
    'context' => 'normal',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(
       
        array(
            'name' => __('Tilføj filer','rwmb'),
            'id'    => 'attach_file',
            'type'  => 'file_advanced',
        ),
           
    ),
);