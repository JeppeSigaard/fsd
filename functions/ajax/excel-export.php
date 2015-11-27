<?php

add_action('wp_ajax_smamo_excel_export','smamo_excel_export');
add_action( 'wp_ajax_nopriv_smamo_excel_export', 'smamo_excel_export' );
function smamo_excel_export(){
    $response = array();



    /** Error reporting */
    error_reporting(E_ALL);
    ini_set('display_errors', FALSE);
    ini_set('display_startup_errors', FALSE);
    date_default_timezone_set('Europe/Copenhagen');

    define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

    /** Include PHPExcel */
    require_once get_template_directory().'/functions/admin/phpexcel/PHPExcel.php';




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

    // Get posts
    $i = 1;
    $oldI = 1;
    $args = array(
        'posts_per_page'   => -1,
        'offset'           => 0,
        'category'         => (isset($_POST['cat'])) ? wp_strip_all_tags($_POST['cat']): '',
        'orderby'          => 'post_date',
        'order'            => 'ASC',
        'post_type'        => (isset($_POST['post_type'])) ? wp_strip_all_tags($_POST['post_type']): 'post',
        'post_status'      => (isset($_POST['post_status'])) ? wp_strip_all_tags($_POST['post_status']): 'publish',
        'suppress_filters' => true
    );

    $myposts = get_posts( $args );
    
    
    if(isset($_POST['post_type']) && $_POST['post_type'] === 'medlem'){

        require_once get_template_directory().'/functions/ajax/excel/medlem.php';

    }
    
    else if(isset($_POST['post_type']) && $_POST['post_type'] === 'tilmelding'){

        require get_template_directory().'/functions/ajax/excel/tilmelding.php';

    }


    // Rename worksheet

    $objPHPExcel->getActiveSheet()->setTitle($list_type_name['upper'].'-'.$titleTimeFormat);


    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $objPHPExcel->setActiveSheetIndex(0);



    PHPExcel_Shared_Font::setAutoSizeMethod(PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);
    foreach(range('B','Q') as $columnID) {
        $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
            ->setAutoSize(true);
    }



    // Save Excel 95 file
    $callStartTime = microtime(true);

    $save_file_to = str_replace(__FILE__,$list_type_name['lower'].'-'.$titleTimeFormat.'.xls',__FILE__);
    $exports_path = '/wp-content/exports/'.$save_file_to;
    $full_path = ABSPATH.$exports_path;

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save($full_path);
    $callEndTime = microtime(true);
    $callTime = $callEndTime - $callStartTime;

    // Echo Gemt sti
    $response['file'] = get_bloginfo('url').$exports_path;


    echo json_encode($response);
    exit;

}
