<?php
/**
 * Template name: Listting Resume
 */
	 get_header();

      if(DEVICE == 'mobile') {
          include 'mobile/listting-resume.php';
      } else {
         include 'desktop/listting-resume.php';
      }

    get_footer();
?>