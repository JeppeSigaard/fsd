<?php

/*
 * MEDLEMMER ADMIN COLUMN - HEADERS
 */
add_filter('manage_edit-medlem_columns', 'add_new_medlem_columns');
function add_new_medlem_columns($medlem_columns) {
	$new_columns['cb'] = '<input type="checkbox" />';
	$new_columns['name'] = __('Navn', 'column name');
    $new_columns['position'] = __('Titel', 'column name');
	$new_columns['sygehus'] = __('Sygehus', 'column name');
	$new_columns['region'] = __('Region', 'column name');
    $new_columns['ean'] = __('EAN', 'column name');
    $new_columns['medlem_work_since'] = __('Ansat siden', 'column name');
    $new_columns['medlem_birthday'] = __('Fødselsdato', 'column name');
    $new_columns['medlem_address'] = __('Adresse', 'column name');
    $new_columns['medlem_post'] = __('Postnummer', 'column name');
    $new_columns['medlem_by'] = __('By', 'column name');
    $new_columns['medlem_phone'] = __('Arbejdstelefon', 'column name');
    $new_columns['medlem_mobile'] = __('Mobiltelefon', 'column name');
    $new_columns['email'] = 'E-mail';
    $new_columns['type'] = 'Medlemstype';
    $new_columns['medlem_udvalg'] = 'Udvalg';
    $new_columns['medlem_best_post'] = 'Bestyrelsespost';
	return $new_columns;
}

/*
 * MEDLEMMER ADMIN COLUMN - CONTENT
 */
add_action('manage_medlem_posts_custom_column', 'manage_medlem_columns', 10, 2);
function manage_medlem_columns($column_name, $id) {
	global $post;
	switch ($column_name) {
        
        case 'name':
            echo edit_post_link( get_post_meta($post->ID,'medlem_name',true), '<b>', '</b>', $post->ID );
            break;
            
        case 'position':
            echo get_post_meta($post->ID,'medlem_position',true);
            break;
            
        case 'sygehus':
            echo get_post_meta($post->ID,'medlem_work',true);
            break;
		
        case 'region':
            echo get_post_meta($post->ID,'medlem_region',true);
            break;
            
        case 'type':
            $type = get_post_meta($post->ID,'medlem_type',true);
            if ($type === '0' || $type === ''){echo 'Ikke registreret';}
            if ($type === '1'){echo 'Pensioneret';}
            if ($type === '2'){echo 'Ordinær';}
            if ($type === '3'){echo 'Ekstraordinær';}
            if ($type === '99'){echo 'Inaktiv';}
            break;
            
        case 'email':
            echo '<a href="mailto:'.get_post_meta($post->ID,'medlem_email',true).'">'.get_post_meta($post->ID,'medlem_email',true).'</a>';
            break;
		
        default:
			break;
	} 
}

/*
 * MEDLEMMER ADMIN COLUMN - SORTING 
 */
add_filter("manage_edit-medlem_sortable_columns", 'medlem_sort');
function medlem_sort($columns) {
	$custom = array(
		'name' 	=> 'name',
		'sygehus' 		=> 'sygehus',
        'region'    => 'region',
	);
	return wp_parse_args($custom, $columns);
}

/*
 * MEDLEMMER ADMIN COLUMN - SORTING - ORDERBY
 */
add_filter( 'request', 'smamo_column_orderby' );
function smamo_column_orderby( $vars ) {
	
    // Sorter efter region
    if ( isset( $vars['orderby'] ) && 'region' == $vars['orderby'] ) {
		$vars = array_merge( $vars, array(
			'meta_key' => 'medlem_region',
			'orderby' => 'meta_value',
		) );
	}
	return $vars;
}