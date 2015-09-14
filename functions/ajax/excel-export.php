<?php

add_action('wp_ajax_smamo_excel_export','smamo_excel_export');
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

    if(isset($_POST['post_type']) && $_POST['post_type'] === 'medlem'){
    
        $list_type_name = array(
            'upper' => 'Medlemmer',
            'lower' => 'medlemmer',
        );
        
        
        // Indstil header
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Id')
                    ->setCellValue('B1', 'Navn')
                    ->setCellValue('C1', 'Titel')
                    ->setCellValue('D1', 'Arbejdssted')
                    ->setCellValue('E1', 'Region')
                    ->setCellValue('F1', 'Ansat siden')
                    ->setCellValue('G1', 'Fødselsdato')

                    ->setCellValue('H1','Adresse')
                    ->setCellValue('I1','Postnummer')
                    ->setCellValue('J1','By')

                    ->setCellValue('K1','Telefon')
                    ->setCellValue('L1','Email')
                    ->setCellValue('M1','Medlemstype')
                    ->setCellValue('N1','Tillidsposter');
    }



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
        foreach ( $myposts as $post ) {
            
            $medlem_type_name = '';
            $medlem_type = get_post_meta($post->ID,'medlem_type',true);
            
            switch($medlem_type) {
                case '0':
                    $medlem_type_name = 'Ikke registreret';
                    break;
                    
                case '1':
                    $medlem_type_name = 'Pensioneret';
                    break;
                    
                case '2':
                    $medlem_type_name = 'Ordinær';
                    break;
                
                case '3':
                    $medlem_type_name = 'Ekstraordinær';
                    break;
                    
                case '99':
                    $medlem_type_name = 'Passiv / inaktiv';
                    break;
            }
            
            $member_posts = '';
            $member_posts_array = get_post_meta($post->ID,'medlem_post',true);
            if(is_array($member_posts_array)){
                foreach($member_posts_array as $m_post){
                    $member_posts .= $m_post.', ';
                }
            }
            
           
            $i ++;
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$i, $post->ID)
                ->setCellValue('B'.$i, get_post_meta($post->ID,'medlem_name',true))
                ->setCellValue('C'.$i, get_post_meta($post->ID,'medlem_position',true))
                ->setCellValue('D'.$i, get_post_meta($post->ID,'medlem_work',true))
                ->setCellValue('E'.$i, get_post_meta($post->ID,'medlem_region',true))
                ->setCellValue('F'.$i, get_post_meta($post->ID,'medlem_work_since',true))
                ->setCellValue('G'.$i, get_post_meta($post->ID,'medlem_birthday',true))
                
                ->setCellValue('H'.$i, get_post_meta($post->ID,'medlem_address',true))
                ->setCellValue('I'.$i, get_post_meta($post->ID,'medlem_post',true))
                ->setCellValue('J'.$i, get_post_meta($post->ID,'medlem_by',true))
                
                ->setCellValue('K'.$i, get_post_meta($post->ID,'medlem_phone',true))
                ->setCellValue('L'.$i, get_post_meta($post->ID,'medlem_email',true))
                ->setCellValue('M'.$i, $medlem_type_name)
                ->setCellValue('N'.$i, $member_posts);

            $oldI++;

        }}




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
