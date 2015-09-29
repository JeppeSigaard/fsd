<?php
add_action( 'init', 'smamo_add_rapport' );

function smamo_add_rapport() {
	register_post_type( 'rapport', array(

        'menu_icon' 		 => 'dashicons-analytics',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'rapport' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 22,
		'supports'           => array('title','editor'),
        'labels'             => array(

            'name'               => _x( 'Vejledninger og Rapporter', 'post type general name', 'smamo' ),
            'singular_name'      => _x( 'Rapport', 'post type singular name', 'smamo' ),
            'menu_name'          => _x( 'Rapporter', 'admin menu', 'smamo' ),
            'name_admin_bar'     => _x( 'Rapporter', 'add new on admin bar', 'smamo' ),
            'add_new'            => _x( 'Tilføj ny rapport', 'medlem', 'smamo' ),
            'add_new_item'       => __( 'Tilføj ny rapport', 'smamo' ),
            'new_item'           => __( 'Ny rapport', 'smamo' ),
            'edit_item'          => __( 'Rediger', 'smamo' ),
            'view_item'          => __( 'Se rapport', 'smamo' ),
            'all_items'          => __( 'Se alle', 'smamo' ),
            'search_items'       => __( 'Find rapprt', 'smamo' ),
            'parent_item_colon'  => __( 'Forældre:', 'smamo' ),
            'not_found'          => __( 'Start med at oprette en ny rapport.', 'smamo' ),
            'not_found_in_trash' => __( 'Papirkurven er tom.', 'smamo' ),
            ),
	   )
    );
}
