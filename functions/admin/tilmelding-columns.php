<?php 

add_filter( 'smamo_tilmelding_column_fields', 'smamo_add_tilmelding_fields' );
function smamo_add_tilmelding_fields(){
    
    $fields = array(
        'add_name' => array(
            'slug' => 'add_name',
            'output' => 'Navn',
            'meta_field' => 'add_name',
            'link' => 'post',
        ),
        
        'add_email' => array(
            'slug' => 'add_email',
            'output' => 'Email',
            'meta_field' => 'add_email',
        ),
        
        'add_company' => array(
            'slug' => 'add_company',
            'output' => 'Firma/organisation',
            'meta_field' => 'add_company',
        ),
        
        'add_member_of' => array(
            'slug' => 'add_member_of',
            'output' => 'Medlem af',
            'meta_field' => 'add_member_of',
        ),
        
        'add_ean' => array(
            'slug' => 'add_ean',
            'output' => 'EAN',
            'meta_field' => 'add_ean',
        ),
        
        'add_user_id' => array(
            'slug' => 'add_user_id',
            'output' => 'Bruger ID/Rekv. nr.',
            'meta_field' => 'add_user_id',
        ),
        
        'add_to' => array(
            'slug' => 'add_to',
            'output' => 'Tilmeldt til',
            'meta_field' => 'add_to',
        ),

        
    );
    
    return $fields;
}

/*
OPRET FELTER
------------------------------------------------*/


// Headers
add_filter('manage_edit-tilmelding_columns', 'smamo_add_tilmelding_columns');
function smamo_add_tilmelding_columns($columns) {
    
    $fields = apply_filters( 'smamo_tilmelding_column_fields', array() );
    if ( empty( $fields ) || ! is_array( $fields ) ){
        return $columns;
    }
    
	$new_columns = array(
        'cb' => '<input type="checkbox" />',
    );
    
    foreach($fields as $field){
        $key = $field['slug'];
        $new_columns[$key] = $field['output'];
    }
    
	return $new_columns;
}

// Indhold
add_action('manage_tilmelding_posts_custom_column', 'smamo_manage_tilmelding_columns', 10, 2);
function smamo_manage_tilmelding_columns($column_name, $id) {
	global $post;
    
    $fields = apply_filters( 'smamo_tilmelding_column_fields', array() );
        
    foreach($fields as $field){
        if($field['slug'] === $column_name){
            
            if(isset($field['link']) && $field['link'] === 'post'){
                echo edit_post_link( get_post_meta($post->ID,$field['meta_field'],true), '<b>', '</b>', $post->ID );
            }
            
            else if(isset($field['field_type']) && $field['field_type'] === 'options'){
                echo $field['options'][get_post_meta($post->ID,$field['meta_field'],true)];   
            }
            
            else{
                echo get_post_meta($post->ID,$field['meta_field'],true);
            }
           
        }
	} 
}

// Sortering
add_filter("manage_edit-tilmelding_sortable_columns", 'smamo_sort_tilmelding_columns');
function smamo_sort_tilmelding_columns($columns) {
    
    $fields = apply_filters( 'smamo_tilmelding_column_fields', array() );
	if ( empty( $fields ) || ! is_array( $fields ) ){
        return $columns;
    }
    
	$custom = array();
    
    foreach($fields as $field){
        $key = $field['slug'];
        $custom[$key] = $field['slug'];
        
    }
    
	return wp_parse_args($custom, $columns);
}

// Ordn
add_filter( 'request', 'smamo_sort_tilmelding_columns_orderby' );
function smamo_sort_tilmelding_columns_orderby( $vars ) {
	
    $fields = apply_filters( 'smamo_tilmelding_column_fields', array() );
    if ( empty( $fields ) || ! is_array( $fields ) ){
        return $vars;
    }
    
    foreach($fields as $field){
       if ( isset( $vars['orderby'] ) && $field['slug'] == $vars['orderby'] ) {
            $order_by = (isset($field['order_by'])) ? $field['order_by'] : 'meta_value';
            
            $merge_array = array(
                'meta_key' => $field['meta_field'],
                'orderby' => $order_by
            );
                
            if(isset($field['meta_type'])){
                $merge_array['meta_type'] = $field['meta_type'];
                
            }
           
            $vars = array_merge( $vars, $merge_array);
        } 
    }
	return $vars;
}