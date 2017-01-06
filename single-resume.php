<?php
/**
 * Resume Page
 */
	 get_header();

      if(DEVICE == 'mobile') {
          include 'mobile/single-resume.php';
      } else {
         include 'desktop/single-resume.php';
      }

    get_footer();
?>