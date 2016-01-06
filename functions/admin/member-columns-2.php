<?php 


add_action( 'admin_init', 'smamo_register_admin_columns' );
function smamo_register_admin_columns()
{
	$columns = apply_filters( 'smamo_admin_columns', array() );
	if ( empty( $columns ) || ! is_array( $columns ) ){return;}

	foreach ( $columns as $column ){
        
        
        
	}
}

add_filter( 'smamo_admin_columns', 'smamo_add_fields' );
function smamo_add_fields(){
    $fields = array();
    
    $fields[] = array(
        'post_type' => 'medlem',
        'slug' => 'name',
        'name' => __('Navn','smamo'),
        'meta' => 'medlem_name',
    ),  
}