<?php
add_action( 'init', 'smamo_add_hyperlink' );

function smamo_add_hyperlink() {
	register_post_type( 'hyperlink', array(

        'menu_icon' 		 => 'dashicons-admin-links',
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'hyperlink' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 22,
		'supports'           => array('title','editor'),
        'labels'             => array(

            'name'               => _x( 'Links', 'post type general name', 'smamo' ),
            'singular_name'      => _x( 'Link', 'post type singular name', 'smamo' ),
            'menu_name'          => _x( 'Links', 'admin menu', 'smamo' ),
            'name_admin_bar'     => _x( 'Links', 'add new on admin bar', 'smamo' ),
            'add_new'            => _x( 'Tilføj nyt Link', 'medlem', 'smamo' ),
            'add_new_item'       => __( 'Tilføj nyt Link', 'smamo' ),
            'new_item'           => __( 'Ny Link', 'smamo' ),
            'edit_item'          => __( 'Rediger', 'smamo' ),
            'view_item'          => __( 'Se Link', 'smamo' ),
            'all_items'          => __( 'Se alle', 'smamo' ),
            'search_items'       => __( 'Find rapprt', 'smamo' ),
            'parent_item_colon'  => __( 'Forældre:', 'smamo' ),
            'not_found'          => __( 'Start med at oprette et nyt Link.', 'smamo' ),
            'not_found_in_trash' => __( 'Papirkurven er tom.', 'smamo' ),
            ),
	   )
    );
}
