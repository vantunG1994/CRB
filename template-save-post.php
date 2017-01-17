<?php
/**
* Template name: Template-Save-Post
*/
get_header();
if(DEVICE == 'mobile') {
include 'mobile/listting-save-post.php';
} else {
include 'desktop/listting-save-post.php';
}
get_footer();
?>