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
            'type' => 'text',
        ),
        
        array(
            'id'    => "medlem_sep",
            'type' => 'divider',
        ),
        
        array(
            'name'  => __( 'Ansat siden', 'rwmb' ),
            'id'    => "medlem_work_since",
            'type' => 'text',
        ),
        
        array(
            'name'  => __( 'Fødselsdato', 'rwmb' ),
            'id'    => "medlem_birthday",
            'type' => 'text',
        ),
        
        array(
            'id'    => "medlem_sep",
            'type' => 'divider',
        ),
        
        array(
            'id'    => 'medlem_address',
            'name'  => __('Adresse','rwmb'),
            'type'  => 'text',
        ),

        array(
            'id'    => 'medlem_post',
            'name'  => __('Postnummer','rwmb'),
            'type'  => 'text',
        ),

        array(
            'id'    => 'medlem_by',
            'name'  => __('By','rwmb'),
            'type'  => 'text',
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
                '0' => 'ikke registreret',
                '1' => 'Pensioneret',
                '2' => 'Ordinær',
                '3' => 'Ekstraordinær',
                '99' => 'Passiv / inaktiv',
            ),
        ),
        
        array(
            'id'    => "medlem_sep",
            'type' => 'divider',
        ),
        
        array(
            'name'  => __( 'Tillidspost(er)', 'rwmb' ),
            'id'    => "medlem_udvalg",
            'type' => 'text',
        ),
        
        array(
            'name'  => __('Evt. bestyrelsespost i FSD','rwmb'),
            'id'    => 'medlem_best_post',
            'type'  => 'text',
        ),
        
    ),
);


$mb[] = array(
    'id' => 'get_notified',
    'title' => __( 'Modtag notifikationer', 'rwmb' ),
    'pages' => array('medlem'),
    'context' => 'normal',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(

        array(
            'name'  => __( 'Om jubilæer', 'rwmb' ),
            'id'    => "notify_jubilee",
            'type' => 'checkbox',
            'std'   => '0',
        ),

        array(
            'name'  => __( 'Om fødselsdage', 'rwmb' ),
            'id'    => "notify_birthday",
            'type' => 'checkbox',
            'std'   => '0',
        ),
    ),
);
