<?php 
add_action( 'init', 'smamo_add_medlem' );

function smamo_add_medlem() {
	register_post_type( 'medlem', array(
		
        'menu_icon' 		 => 'dashicons-businessman',
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'medlem' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 22,
		'supports'           => array('thumbnail','title'),
        'labels'             => array(
            
            'name'               => _x( 'Medlemmer', 'post type general name', 'smamo' ),
            'singular_name'      => _x( 'Medlem', 'post type singular name', 'smamo' ),
            'menu_name'          => _x( 'Medlemmer', 'admin menu', 'smamo' ),
            'name_admin_bar'     => _x( 'Medlemmer', 'add new on admin bar', 'smamo' ),
            'add_new'            => _x( 'Tilføj nyt medlem', 'medlem', 'smamo' ),
            'add_new_item'       => __( 'Tilføj nyt medlem', 'smamo' ),
            'new_item'           => __( 'Nyt medlem', 'smamo' ),
            'edit_item'          => __( 'Rediger', 'smamo' ),
            'view_item'          => __( 'Se medlem', 'smamo' ),
            'all_items'          => __( 'Se alle', 'smamo' ),
            'search_items'       => __( 'Find medlem', 'smamo' ),
            'parent_item_colon'  => __( 'Forældre:', 'smamo' ),
            'not_found'          => __( 'Start med at oprette et nyt medlem.', 'smamo' ),
            'not_found_in_trash' => __( 'Papirkurven er tom.', 'smamo' ),
            ),
	   )
    );
}