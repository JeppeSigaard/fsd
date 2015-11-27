<?php 
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

}