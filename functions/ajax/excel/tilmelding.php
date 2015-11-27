<?php 
$list_type_name = array(
    'upper' => 'Tilmeldinger',
    'lower' => 'tilmeldinger',
);

// Indstil header
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Id')
            ->setCellValue('B1', 'Navn')
            ->setCellValue('C1', 'Email')
            ->setCellValue('D1', 'Firmanavn')
            ->setCellValue('E1', 'Medlem af')
            ->setCellValue('F1', 'EAN')
            ->setCellValue('G1', 'Tilmeldt til');



foreach ( $myposts as $post ) {
    
    $i ++;
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, $post->ID)
        ->setCellValue('B'.$i, get_post_meta($post->ID,'add_name',true))
        ->setCellValue('C'.$i, get_post_meta($post->ID,'add_email',true))
        ->setCellValue('D'.$i, get_post_meta($post->ID,'add_company',true))
        ->setCellValue('E'.$i, get_post_meta($post->ID,'add_member_of',true))
        ->setCellValue('F'.$i, get_post_meta($post->ID,'add_ean',true))
        ->setCellValue('G'.$i, get_post_meta($post->ID,'add_to',true));

    $oldI++;

}