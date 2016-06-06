<?php 
$list_type_name = array(
    'upper' => 'Medlemmer',
    'lower' => 'medlemmer',
);


// Indstil header
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Id')
            ->setCellValue('B1', 'Navn')
            ->setCellValue('C1', 'Arbejdssted')
            ->setCellValue('D1','Telefon');

foreach ( $myposts as $post ) {
    
    $i ++;
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, $post->ID)
        ->setCellValue('B'.$i, get_post_meta($post->ID,'medlem_name',true))
        ->setCellValue('C'.$i, get_post_meta($post->ID,'medlem_work',true))
        ->setCellValue('D'.$i, get_post_meta($post->ID,'medlem_phone',true));
    $oldI++;

}