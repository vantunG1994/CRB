<?php
/**
 * Template name: Edit resume
 */
	 get_header();

      if(DEVICE == 'mobile') {
          include 'mobile/edit-resume.php';
      } else {
         include 'desktop/edit-resume.php';
      }

    get_footer();
?>