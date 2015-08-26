<?php 


$mb[] = array(
    'id' => 'info',
    'title' => __( 'Information', 'rwmb' ),
    'pages' => array('medlem'),
    'context' => 'normal',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(
        
        array(
            'name'  => __( 'Navn', 'rwmb' ),
            'id'    => "medlem_name",
            'type' => 'text',
        ),
        
        array(
            'name'  => __( 'Titel', 'rwmb' ),
            'id'    => "medlem_position",
            'type' => 'text',
        ),
        
        array(
            'name'  => __( 'Sygehus', 'rwmb' ),
            'id'    => "medlem_work",
            'type' => 'text',
        ),
        
        array(
            'name'  => __( 'Region', 'rwmb' ),
            'id'    => "medlem_region",
            'type' => 'select_advanced',
            'placeholder' => __('Vælg region'),
            'options' => array(
                'nord' => 'Nordjylland',
                'midt' => 'Midtjylland',
                'syd' => 'Syddanmark',
                'hovedstad' => 'Hovedstaden',
                'sjaelland' => 'Sjælland',
            ),
        ),
        
        array(
            'id'    => "medlem_sep",
            'type' => 'divider',
        ),
        
        array(
            'name'  => __( 'Ansat siden', 'rwmb' ),
            'id'    => "medlem_work_since",
            'type' => 'date',
        ),
        
        array(
            'name'  => __( 'Fødselsdato', 'rwmb' ),
            'id'    => "medlem_birthday",
            'type' => 'date',
        ),
        
        array(
            'id'    => "medlem_sep",
            'type' => 'divider',
        ),
        
        array(
            'name'  => __( 'Arbejdstelefon', 'rwmb' ),
            'id'    => "medlem_phone",
            'type' => 'text',
        ),
        
        array(
            'name'  => __( 'E-mail', 'rwmb' ),
            'id'    => "medlem_email",
            'type' => 'text',
        ),
        
        array(
            'name'  => __( 'Medlemstype', 'rwmb' ),
            'id'    => "medlem_type",
            'type' => 'select_advanced',
            'placeholder' => __('Vælg type','rwmb'),
            'options'   => array(
                'privat' => 'Privat',
                'erhverv' => 'Erhverv',
            ),
        ),
        
        array(
            'id'    => "medlem_sep",
            'type' => 'divider',
        ),
        
        array(
            'name'  => __( 'Tillidspost(er)', 'rwmb' ),
            'id'    => "medlem_post",
            'type' => 'select_advanced',
            'placeholder' => __('Tilføj tillidspost','rwmb'),
            'clone' => true,
            'options'   => array(
                'bestyrelse' => 'Bestyrelsesmedlem',
                'brancheraad' => 'Brancherådsmedlem',
                'udvalg' => 'Udvalgssmedlem',
            ),
        ),
        
    ),
);