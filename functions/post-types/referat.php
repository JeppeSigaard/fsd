<?php
add_action( 'init', 'smamo_add_referat' );

function smamo_add_referat() {
	register_post_type( 'referat', array(

        'menu_icon' 		 => 'dashicons-portfolio',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'referat' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 22,
		'supports'           => array('title','editor'),
        'labels'             => array(

            'name'               => _x( 'Referater', 'post type general name', 'smamo' ),
            'singular_name'      => _x( 'Referat', 'post type singular name', 'smamo' ),
            'menu_name'          => _x( 'Referater', 'admin menu', 'smamo' ),
            'name_admin_bar'     => _x( 'Referater', 'add new on admin bar', 'smamo' ),
            'add_new'            => _x( 'Tilføj nyt referat', 'medlem', 'smamo' ),
            'add_new_item'       => __( 'Tilføj nyt referat', 'smamo' ),
            'new_item'           => __( 'Ny referat', 'smamo' ),
            'edit_item'          => __( 'Rediger', 'smamo' ),
            'view_item'          => __( 'Se referat', 'smamo' ),
            'all_items'          => __( 'Se alle', 'smamo' ),
            'search_items'       => __( 'Find rapprt', 'smamo' ),
            'parent_item_colon'  => __( 'Forældre:', 'smamo' ),
            'not_found'          => __( 'Start med at oprette et nyt referat.', 'smamo' ),
            'not_found_in_trash' => __( 'Papirkurven er tom.', 'smamo' ),
            ),
	   )
    );
}
