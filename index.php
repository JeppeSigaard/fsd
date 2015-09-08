<?php 

/* 

Index fil til dette tema
Hent header og site-nav, og hent derefter page template, switch board style.
Se så ren en mappestruktur det giver. Og squaky clean templates. Se evt. /pages/-mappen

KH SmartMonkey

*/

get_header(); 

?>
<div class="page-wrap">
    <?php get_template_part('parts/site','nav') ?>
    <div class="content">
        <?php

        // Home og front page behandles ens
        if(is_home() || is_front_page()){
            require 'pages/front-page.php';
        }

        // Arkiver
        elseif(is_archive()){
            require 'pages/archive.php';
        }

        // enkeltsider
        elseif(is_page()){
            require 'pages/page.php';
        }

        // Singles, posts osv.
        elseif(is_singular()){
            require 'pages/single.php';
        }

        // Søgning
        elseif(is_search()){
            require 'pages/search.php';
        }

        // Side ikke fundet
        else{require 'pages/404.php';}

        ?>
    </div>
</div>
<?php get_footer();