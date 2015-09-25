<?php 

add_action( 'init', 'smamo_add_fagblad' );

function smamo_add_fagblad() {
	register_post_type( 'fagblad', array(
		
        'menu_icon' 		 => 'dashicons-businessman',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'fagblad' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 22,
		'supports'           => array( 'title', 'thumbnail', 'editor'),
        'labels'             => array(
            
            'name'               => _x( 'Fagblade', 'post type general name', 'smamo' ),
            'singular_name'      => _x( 'Fagblad', 'post type singular name', 'smamo' ),
            'menu_name'          => _x( 'Fagblade', 'admin menu', 'smamo' ),
            'name_admin_bar'     => _x( 'Fagblade', 'add new on admin bar', 'smamo' ),
            'add_new'            => _x( 'Tilføj nyt ', 'fagblad', 'smamo' ),
            'add_new_item'       => __( 'Tilføj ny', 'smamo' ),
            'new_item'           => __( 'Nyt fagblad', 'smamo' ),
            'edit_item'          => __( 'Rediger', 'smamo' ),
            'view_item'          => __( 'Se fagblad', 'smamo' ),
            'all_items'          => __( 'Se alle', 'smamo' ),
            'search_items'       => __( 'Find fagblad', 'smamo' ),
            'parent_item_colon'  => __( 'Forældre:', 'smamo' ),
            'not_found'          => __( 'Start med at oprette et nyt fagblad.', 'smamo' ),
            'not_found_in_trash' => __( 'Papirkurven er tom.', 'smamo' ),
            ),
	   )
    );
}