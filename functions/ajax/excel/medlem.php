<?php 
$list_type_name = array(
    'upper' => 'Medlemmer',
    'lower' => 'medlemmer',
);


// Indstil header
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Id')
            ->setCellValue('B1', 'Navn')
            ->setCellValue('C1', 'CPR-nummer')
            ->setCellValue('D1', 'Titel')
            ->setCellValue('E1', 'Arbejdssted')
            ->setCellValue('F1', 'Region')
            ->setCellValue('G1', 'Ansat siden')
            ->setCellValue('H1', 'Fødselsdato')

            ->setCellValue('I1','Adresse')
            ->setCellValue('J1','Postnummer')
            ->setCellValue('K1','By')

            ->setCellValue('L1','Telefon')
            ->setCellValue('M1','Email')
            ->setCellValue('N1','Medlemstype')
            ->setCellValue('O1','Tillidsposter');




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
        ->setCellValue('C'.$i, get_post_meta($post->ID,'medlem_cpr',true))
        ->setCellValue('D'.$i, get_post_meta($post->ID,'medlem_position',true))
        ->setCellValue('E'.$i, get_post_meta($post->ID,'medlem_work',true))
        ->setCellValue('F'.$i, get_post_meta($post->ID,'medlem_region',true))
        ->setCellValue('G'.$i, get_post_meta($post->ID,'medlem_work_since',true))
        ->setCellValue('H'.$i, get_post_meta($post->ID,'medlem_birthday',true))

        ->setCellValue('I'.$i, get_post_meta($post->ID,'medlem_address',true))
        ->setCellValue('J'.$i, get_post_meta($post->ID,'medlem_post',true))
        ->setCellValue('K'.$i, get_post_meta($post->ID,'medlem_by',true))

        ->setCellValue('L'.$i, get_post_meta($post->ID,'medlem_phone',true))
        ->setCellValue('M'.$i, get_post_meta($post->ID,'medlem_email',true))
        ->setCellValue('N'.$i, $medlem_type_name)
        ->setCellValue('O'.$i, $member_posts);

    $oldI++;

}