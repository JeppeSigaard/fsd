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
                    'class' => 'always-show',
                    'type'  => 'select',
                    'std'   => '',
                    'placeholder'   => 'Vælg en indholdstype',
                    'options'   => array(
                    
                        'quick_links'   => 'Quick Links',
                        'list'   => 'Indholdsliste',
                        'member_list'   => 'Medlemsliste',
                        'newsletter'   => 'Tilmelding til nyhedsbrev',
                        
                    ),
                ),
                
                // ql
                array(
                    'name'  => __('Link 1','rwmb'),
                    'id'    => 'ql_1',
                    'class' => 'quick_links_field',
                    'type'  => 'post',
                    'field_type' => 'select_advanced',
                    'post_type' => 'page',
                    'placeholder' => 'Vælg en side',
                ),

                array(
                    'name'  => __('Link 2','rwmb'),
                    'id'    => 'ql_2',
                    'class' => 'quick_links_field',
                    'type'  => 'post',
                    'field_type' => 'select_advanced',
                    'post_type' => 'page',
                    'placeholder' => 'Vælg en side',
                ),

                array(
                    'name'  => __('Link 3','rwmb'),
                    'id'    => 'ql_3',
                    'class' => 'quick_links_field',
                    'type'  => 'post',
                    'field_type' => 'select_advanced',
                    'post_type' => 'page',
                    'placeholder' => 'Vælg en side',
                ),

                array(
                    'name'  => __('Link 4','rwmb'),
                    'id'    => 'ql_4',
                    'class' => 'quick_links_field',
                    'type'  => 'post',
                    'field_type' => 'select_advanced',
                    'post_type' => 'page',
                    'placeholder' => 'Vælg en side',
                ),





                // list
                array(
                    'name' => __('Vis som','rwmb'),
                    'id' => 'list_show_as',
                    'class' => 'list_field',
                    'type'  => 'select_advanced',
                    'options'   => array(
                        '1' => 'bred liste',
                        '2' => 'kasser',
                    ),
                ),

                array(
                    'name' => __('Vis liste over','rwmb'),
                    'id' => 'list_show_type',
                    'class' => 'list_field',
                    'type'  => 'select_advanced',
                    'placeholder'   => __('Vælg indhold','rwmb'),
                    'options'   => array(
                        'events_new' => 'Kommende Arrangementer',
                        'events_old' => 'Tidligere Arrangementer',
                        'underside' => 'Denne sides undersider',
                        'post' => 'Seneste nyheder',
                        'referat'   => 'Referater',
                        'rapport'   => 'Vejledninger og rapporter',
                    ),
                ),

                array(
                    'name' => __('Vis max (antal)','rwmb'),
                    'id' => 'list_num_posts',
                    'class' => 'list_field',
                    'type'  => 'text',
                    'placeholder'  => __('-1 viser alle','rwmb'),
                ),



                // member list
                array(
                    'name' => __('Vis som','rwmb'),
                    'id' => 'member_list_show_as',
                    'class' => 'member_list_field',
                    'type'  => 'select_advanced',
                    'options'   => array(
                        '1' => 'bred liste',
                        '2' => 'kasser',
                    ),
                ),

                array(
                    'name' => __('Vis liste over','rwmb'),
                    'id' => 'member_list_show_type',
                    'class' => 'member_list_field',
                    'type'  => 'taxonomy',
                    'std'   => 'Alle',
                    'placeholder' => __('Vælg en gruppe','rwmb'),
                    'options'   => array(
                        'type' => 'select_advanced',
                        'taxonomy' => 'gruppe',
                    ),
                ),

                array(
                    'name' => __('Vis max (antal)','rwmb'),
                    'id' => 'member_list_num_posts',
                    'class' => 'member_list_field',
                    'type'  => 'text',
                    'placeholder'  => __('-1 viser alle','rwmb'),
                ),
                
                
                // header
                
                array(
                    'name'  => __('Tilføj header'),
                    'id' => 'add_header',
                    'class' => 'member_list_field list_field',
                    'type' => 'text',
                    'placeholder' => 'Efterlad blank for ingen',
                    
                ),
                
                array(
                    'name'  => __('Header link'),
                    'id' => 'add_header_link',
                    'class' => 'member_list_field list_field',
                    'type' => 'post',
                    'type'  => 'post',
                    'field_type' => 'select_advanced',
                    'post_type' => 'page',
                    'placeholder' => 'Vælg en side eller angiv speciel',
                    
                ),
                array(
                    'name'  => __('Eksternt link'),
                    'id' => 'add_header_link_spec',
                    'class' => 'member_list_field list_field',
                    'type' => 'url',
                    'placeholder' => 'Link til ekstern ressource',
                    
                ),
            ),
        ),
    ),
);