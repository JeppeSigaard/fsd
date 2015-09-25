<?php 

define('WP_USE_THEMES', false);
header('Content-Type: text/html; charset=utf-8');
require '../../../wp-load.php';
$csv = array_map('str_getcsv', file('datamedlemmer.csv'));

$i = 0;
foreach($csv as $entry){
    if($i === 0){
        
        echo '<pre>';
        print_r($entry);
        echo '</pre>';
        
        /*
        $new = wp_insert_post(array(
        
            'post_status' => 'publish',
            'post_type' => 'medlem',
            'post_title'    => $entry[1].' '.$entry[2],
        ));
        
        if(is_wp_error($new)){
            echo $new->get_error_message();
            exit;
        }
        
        update_post_meta($new,'medlem_name', $entry[2].' '.$entry[3]);
        update_post_meta($new,'medlem_work', $entry[0]);
        update_post_meta($new,'medlem_address', $entry[3]);
        update_post_meta($new,'medlem_post', $entry[5]);
        update_post_meta($new,'medlem_by', $entry[6]);
        update_post_meta($new,'medlem_phone', $entry[7]);
        
        update_post_meta($new,'medlem_type', '3');
        */
        
    }
    
    $i++;
}

?>


Medlem status:
Medlem type:
Fornavn:
Efternavn:
Udmeldelses grund:
Medlem ID:
Brugernavn:
E-mail:
Privat e-mail:
Primære adresse:
Syghus repræsentant:
Regionskoordinator:
Regions Repræsentant:
Bestyrelsespost:
BoardindexGrupper/Udvalg:
PERSONOPLYSNINGERFødselsdato:
CPR nr.:
Adresse:
Postnummer:
By:
Telefonnummer:
Mobilnummer:
Hjemmeside:
AnsættelsesoplysningerAnsættelsessted(sygehus liste):
Ansættelsessted(andet):
Ansættelsessted:
Adresse:
Postboks:
Postnummer:
By:
Hoved nr.:
Hoved fax nr.:
Hjemmeside:
Region/kommune:
Stilling(stilling liste):
Stilling(andet):
Stilling:
Afdeling:
Direkte nr.:
Fax nr.:
LønoplysningerAnsat i sygehusvæsnet fra:
Ansat på nuværende sygehus med anciennitet:
Lønaftale:Skalatrin:Særlige løntillæg:
Grundløn:Funktionsløn:
Kvalifikationsløn:
Resultatløn:
KontigentbetalingKontigent:
Betalt kontigent:Sendt kontigent Email:
Sendt kontigent brev:Sendt Email rykker:
Sendt brev rykker:Eksporteret til Told & Skat:
Kontigent historik:
Kontigent kommentar: