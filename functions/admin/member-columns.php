<?php 

add_filter( 'smamo_meta_column_fields', 'smamo_add_medlem_fields' );
function smamo_add_medlem_fields(){
    
    $fields = array(
        'position' => array(
            'slug' => 'position',
            'output' => 'Titel',
            'meta_field' => 'medlem_position',
        ),

        'sygehus' => array(
            'slug' => 'sygehus',
            'output' => 'Syghus',
            'meta_field' => 'medlem_work',
        ),

        'region' => array(
            'slug' => 'region',
            'output' => 'Region',
            'meta_field' => 'medlem_region',
        ),

        'ean' => array(
            'slug' => 'ean',
            'output' => 'EAN',
            'meta_field' => 'medlem_ean',
        ),

        'work_since' => array(
            'slug' => 'work_since',
            'output' => 'Ansat siden',
            'meta_field' => 'medlem_work_since',
            'meta_type' => 'DATE',
        ),

        'birthday' => array(
            'slug' => 'birthday',
            'output' => 'Fødselsdato',
            'meta_field' => 'medlem_birthday',
        ),

        'address' => array(
            'slug' => 'address',
            'output' => 'Adresse',
            'meta_field' => 'medlem_address',
        ),

        'post' => array(
            'slug' => 'post',
            'output' => 'Postnummer',
            'meta_field' => 'medlem_post',
        ),

        'by' => array(
            'slug' => 'by',
            'output' => 'By',
            'meta_field' => 'medlem_by',
        ),

        'phone' => array(
            'slug' => 'phone',
            'output' => 'Telefon',
            'meta_field' => 'medlem_phone',
        ),

        'mobile' => array(
            'slug' => 'mobile',
            'output' => 'Mobil',
            'meta_field' => 'medlem_mobile',
        ),

        'email' => array(
            'slug' => 'email',
            'output' => 'Email',
            'meta_field' => 'medlem_email',
        ),

        'type' => array(
            'slug' => 'type',
            'output' => 'type',
            'meta_field' => 'medlem_type',
            'field_type' => 'options',
            'options' => array(
                '0' => 'ikke registreret',
                '1' => 'Pensioneret',
                '2' => 'Ordinær',
                '3' => 'Ekstraordinær',
                '99' => 'Passiv / inaktiv',
            ),
        ),

        'udvalg' => array(
            'slug' => 'udvalg',
            'output' => 'udvalg',
            'meta_field' => 'medlem_udvalg',
        ),

        'best_post' => array(
            'slug' => 'best_post',
            'output' => 'Bestyrelsespost',
            'meta_field' => 'medlem_best_post',
        ),
    );
    
    return $fields;
}

/*
OPRET FELTER
------------------------------------------------*/


// Headers
add_filter('manage_edit-medlem_columns', 'smamo_add_meta_columns');
function smamo_add_meta_columns($columns) {
    
    $fields = apply_filters( 'smamo_meta_column_fields', array() );
    if ( empty( $fields ) || ! is_array( $fields ) ){
        return $columns;
    }
    
	$new_columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => 'Navn',
    );
    
    foreach($fields as $field){
        $key = $field['slug'];
        $new_columns[$key] = $field['output'];
    }
    
	return $new_columns;
}

// Indhold
add_action('manage_medlem_posts_custom_column', 'smamo_manage_meta_columns', 10, 2);
function smamo_manage_meta_columns($column_name, $id) {
	global $post;
    
    $fields = apply_filters( 'smamo_meta_column_fields', array() );
        
    foreach($fields as $field){
        if($field['slug'] === $column_name){
            
            if(isset($field['link']) && $field['link'] === 'post'){
                echo edit_post_link( get_post_meta($post->ID,$field['meta_field'],true), '<b>', '</b>', $post->ID );
            }
            
            if(isset($field['field_type']) && $field['field_type'] === 'options'){
                echo $field['options'][get_post_meta($post->ID,$field['meta_field'],true)];
                
            }
            
            else{
                echo get_post_meta($post->ID,$field['meta_field'],true);
            }
           
        }
	} 
}

// Sortering
add_filter("manage_edit-medlem_sortable_columns", 'smamo_sort_meta_columns');
function smamo_sort_meta_columns($columns) {
    
    $fields = apply_filters( 'smamo_meta_column_fields', array() );
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
add_filter( 'request', 'smamo_sort_meta_columns_orderby' );
function smamo_sort_meta_columns_orderby( $vars ) {
	
    $fields = apply_filters( 'smamo_meta_column_fields', array() );
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