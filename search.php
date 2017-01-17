<?php global $theme; get_header(); ?>

<?php
if(DEVICE == 'mobile') {
    include 'mobile/listting-job.php';
} else {
    include 'desktop/listting-job.php';
}
?>
    
<?php get_footer(); ?>