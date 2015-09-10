<?php
add_action( 'init', 'smamo_add_tilmelding' );

function smamo_add_tilmelding() {
	register_post_type( 'tilmelding', array(

        'menu_icon' 		 => 'dashicons-businessman',
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => 'edit.php?post_type=event',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'tilmelding' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 22,
		'supports'           => array('title'),
        'labels'             => array(

            'name'               => _x( 'Tilmeldinger', 'post type general name', 'smamo' ),
            'singular_name'      => _x( 'Tilmelding', 'post type singular name', 'smamo' ),
            'menu_name'          => _x( 'Tilmeldinger', 'admin menu', 'smamo' ),
            'name_admin_bar'     => _x( 'Tilmeldinger', 'add new on admin bar', 'smamo' ),
            'add_new'            => _x( 'Tilføj ny tilmelding', 'medlem', 'smamo' ),
            'add_new_item'       => __( 'Tilføj ny tilmelding', 'smamo' ),
            'new_item'           => __( 'Ny tilmelding', 'smamo' ),
            'edit_item'          => __( 'Rediger', 'smamo' ),
            'view_item'          => __( 'Se tilmelding', 'smamo' ),
            'all_items'          => __( 'Tilmeldinger', 'smamo' ),
            'search_items'       => __( 'Find rapprt', 'smamo' ),
            'parent_item_colon'  => __( 'Forældre:', 'smamo' ),
            'not_found'          => __( 'Start med at oprette en ny tilmelding.', 'smamo' ),
            'not_found_in_trash' => __( 'Papirkurven er tom.', 'smamo' ),
            ),
	   )
    );
}
