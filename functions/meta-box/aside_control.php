<?php 

$added_to = array('page');


$mb[] = array(
    'id' => 'aside_control',
    'title' => __( 'Tilføj indhold til siden', 'rwmb' ),
    'pages' => $added_to,
    'context' => 'normal',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(
        
        array(
            'name'  => __( '', 'rwmb' ),
            'id'    => "add_section",
            'type' => 'group',
            'clone' => true,
            'fields'   => array(
                
                array(
                    'name' => __('Tilføj indhold','rwmb'),
                    'id'    => 'add_type',
                    'type'  => 'select',
                    'std'   => '',
                    'placeholder'   => 'Vælg en indholdstype',
                    'options'   => array(
                    
                        'quick_links'   => 'Quick Links',
                        'list'   => 'Indholdsliste',
                        
                    ),
                ),
                
                
                // Quick Links
                
                array(
                    'name'  => __('','rwmb'),
                    'id'    => 'quick_links_field_group',
                    'type'  => 'group',
                    'fields'=> array(
                        
                        array(
                            'name'  => __('Link 1','rwmb'),
                            'id'    => 'ql_1',
                            'type'  => 'post',
                            'field_type' => 'select_advanced',
                            'post_type' => 'page',
                            'placeholder' => 'Vælg en side',
                        ),

                        array(
                            'name'  => __('Link 2','rwmb'),
                            'id'    => 'ql_2',
                            'type'  => 'post',
                            'field_type' => 'select_advanced',
                            'post_type' => 'page',
                            'placeholder' => 'Vælg en side',
                        ),

                        array(
                            'name'  => __('Link 3','rwmb'),
                            'id'    => 'ql_3',
                            'type'  => 'post',
                            'field_type' => 'select_advanced',
                            'post_type' => 'page',
                            'placeholder' => 'Vælg en side',
                        ),

                        array(
                            'name'  => __('Link 4','rwmb'),
                            'id'    => 'ql_4',
                            'type'  => 'post',
                            'field_type' => 'select_advanced',
                            'post_type' => 'page',
                            'placeholder' => 'Vælg en side',
                        ),
                    
                    ),
                ),
                
                
                
                // Liste
                array(
                    'name'  => __('','rwmb'),
                    'id'    => 'quick_links_field_group',
                    'type'  => 'group',
                    'fields'=> array(
                        
                        array(
                            'name' => __('Vis som','rwmb'),
                            'id' => 'list_show_as',
                            'type'  => 'select',
                            'options'   => array(
                                '1' => 'bred liste',
                                '2' => 'kasser',
                            ),
                        ),

                        array(
                            'name' => __('Vis liste over','rwmb'),
                            'id' => 'list_show_type',
                            'type'  => 'select',
                            'options'   => array(
                                'events_new' => 'Kommende Begivenheder',
                                'events_old' => 'Tidligere begivenheder',
                                'bestyrelse' => 'Bestyrelse',
                                'medlemmer' => 'Medlemmer',
                                'underside' => 'Undersider',
                            ),
                        ),
                        
                        array(
                            'name' => __('Vis max (antal)','rwmb'),
                            'id' => 'list_num_posts',
                            'type'  => 'text',
                            'placeholder'  => __('-1 viser alle','rwmb'),
                        ),
                    ),
                ),
            ),
        ),
    ),
);