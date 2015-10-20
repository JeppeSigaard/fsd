<?php

/* OPRET MEDLEMSLISTE SOM EXCELFIL */

define('WP_USE_THEMES', false); require('../wp-blog-header.php');



/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/../phpexcel/Classes/PHPExcel.php';




// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

$titleTimeFormat = date_i18n('d-m-Y-H-i');
// Set document properties
//echo date('H:i:s') , " Set document properties" , EOL;
$objPHPExcel->getProperties()->setCreator("FSTA Serveren")
							 ->setLastModifiedBy("FSTA Serveren")
							 ->setTitle("Deltagerliste-".$titleTimeFormat)
							 ->setSubject("Deltagerliste oprettet ".$titleTimeFormat)
							 ->setDescription("Deltagerliste oprettet ".$titleTimeFormat)
							 ->setKeywords("")
							 ->setCategory("");



// Indstil header
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Num')
			->setCellValue('B1', 'Bookingnummer')
            ->setCellValue('C1', 'Navn')
            ->setCellValue('D1', 'Firma')
            ->setCellValue('E1', 'Telefon')
			->setCellValue('F1', 'Email')
			->setCellValue('G1', 'Deltager i')
			->setCellValue('H1','Tilmeldt dato')
			->setCellValue('I1','Kommentar')

			->setCellValue('J1','Betalernavn')
			->setCellValue('K1','Adresse')
			->setCellValue('L1','Postnummer')
			->setCellValue('M1','By')
			->setCellValue('N1','faktura email')
			->setCellValue('O1','referencenummer')
			->setCellValue('P1','EAN')
            ->setCellValue('Q1','Deltager ved');





// Get posts

$i = 1;
$oldI = 1;
$args = array(
	'posts_per_page'   => -1,
	'offset'           => 0,
	'category'         => '',
	'orderby'          => 'post_date',
	'order'            => 'ASC',
	'post_type'        => 'att',
	'post_mime_type'   => '',
	'post_parent'      => '',
	'post_status'      => 'publish',
	'suppress_filters' => true );

	$myposts = get_posts( $args );
	foreach ( $myposts as $att ) :
		$i ++;

        $deltager_i = '';
        $term_list = wp_get_post_terms($att->ID, 'begivenhed');
		foreach($term_list as $term){
            $deltager_i = $term->name;
        }
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $oldI)
			->setCellValue('B'.$i, get_post_meta($att->ID,'booking_num',true))
            ->setCellValue('C'.$i, get_post_meta($att->ID,'name',true))
            ->setCellValue('D'.$i, get_post_meta($att->ID,'company',true))
            ->setCellValue('E'.$i, get_post_meta($att->ID,'phone',true))
			->setCellValue('F'.$i, get_post_meta($att->ID,'email',true))
			->setCellValue('G'.$i, $deltager_i)
			->setCellValue('H'.$i, $att->post_date)
			->setCellValue('I'.$i, get_post_meta($att->ID,'comment',true))
            ->setCellValue('J'.$i, get_post_meta($att->ID,'payer_name',true))
			->setCellValue('K'.$i, get_post_meta($att->ID,'address',true))
			->setCellValue('L'.$i, get_post_meta($att->ID,'postcode',true))
			->setCellValue('M'.$i, get_post_meta($att->ID,'city',true))
			->setCellValue('N'.$i, get_post_meta($att->ID,'payer_email',true))
			->setCellValue('O'.$i, get_post_meta($att->ID,'ref_num',true))
			->setCellValue('P'.$i, get_post_meta($att->ID,'ean',true))
			->setCellValue('Q'.$i, get_post_meta($att->ID,'participate',true));

        $oldI++;

	endforeach;




// Rename worksheet

$objPHPExcel->getActiveSheet()->setTitle('Deltagere-'.$titleTimeFormat);


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);



PHPExcel_Shared_Font::setAutoSizeMethod(PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);
foreach(range('B','Q') as $columnID) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
        ->setAutoSize(true);
}



// Save Excel 95 file
$callStartTime = microtime(true);

$save_file_to = str_replace(__FILE__,'deltagerliste-'.$titleTimeFormat.'.xls',__FILE__);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save($save_file_to);
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;

// Echo Gemt sti
echo $save_file_to;
