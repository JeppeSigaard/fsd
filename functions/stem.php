<?php 

function smamo_add_stems( $wp_customize ) {

    $fields = array();

    $fields[] = array(
        'slug'=>'stem_navn', 
        'default' => '',
        'label' => __('Navn (Firmanavn)', 'smamo'),
        'type' => 'theme_mod',

    );

    $fields[] = array(
        'slug'=>'stem_navn_engelsk',
        'default' => '',
        'label' => __('Navn (Firmanavn) engelsk', 'smamo'),
        'type' => 'theme_mod',
    );

    $fields[] = array(
        'slug'=>'stem_adresse', 
        'default' => '',
        'label' => __('Adresse', 'smamo'),
        'type' => 'theme_mod',
    );

    $fields[] = array(
        'slug'=>'stem_post', 
        'default' => '',
        'label' => __('Postnummer', 'smamo'),
        'type' => 'option',
        'type' => 'theme_mod',
    );

    $fields[] = array(
        'slug'=>'stem_by', 
        'default' => '',
        'label' => __('By', 'smamo'),
        'type' => 'theme_mod',
    );

    $fields[] = array(
        'slug'=>'stem_cvr', 
        'default' => '',
        'label' => __('Evt. CVR - nummer', 'smamo'),
        'type' => 'theme_mod',
    );

    $fields[] = array(
        'slug'=>'stem_email', 
        'default' => '',
        'label' => __('Email', 'smamo'),
        'type' => 'theme_mod',
    );

    $fields[] = array(
        'slug'=>'stem_telefon', 
        'default' => '',
        'label' => __('Telefonnummer', 'smamo'),
        'type' => 'theme_mod',
    );



    $wp_customize->add_section( 'stem_info' , array(
        'title'      => __('Stamoplysninger','smamo'),
        'priority'   => 130,
    ) );

    foreach( $fields as $field ) {
        // SETTINGS
        $wp_customize->add_setting(
            $field['slug'], array(
              'default' => $field['default'],
              'type' => $field['type'], 
              'capability' => 'edit_theme_options'
            )
        );
    // CONTROLS
    $wp_customize->add_control(
        new WP_Customize_Control(
          $wp_customize,
          $field['slug'], 
          array('label' => $field['label'], 
              'section' => 'stem_info',
              'settings' => $field['slug'])
            )
        );
    }
}
add_action( 'customize_register', 'smamo_add_stems' );
