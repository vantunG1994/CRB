<?php
/**
 * Template name: Template-Search
 */
get_header();

if(DEVICE == 'mobile') {
    include 'mobile/listting-search.php';
} else {
    include 'desktop/listting-search.php';
}

get_footer();
?>