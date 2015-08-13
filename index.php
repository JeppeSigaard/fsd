<?php 

get_header();


// Forside eller side markeret som forside
if(is_home() || is_front_page()){
    require 'pages/front-page.php';
}

elseif(is_archive()){
    require 'pages/archive.php';
}

elseif(is_page()){
    require 'pages/page.php';
}

elseif(is_single()){
    require 'pages/single.php';
}



else{require 'pages/404.php';}
get_footer();