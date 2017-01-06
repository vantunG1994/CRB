<?php
/**
 * Template name: Home Page
 */
?>
<?php
get_header();

if(DEVICE == 'mobile') {
    include 'mobile/index.php';
} else {
    include 'desktop/index.php';
}

get_footer();
?>