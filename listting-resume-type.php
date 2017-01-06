<?php
/**
 * Template name: Listting Resume Type
 */
	 get_header();

      if(DEVICE == 'mobile') {
          include 'mobile/listting-resume-type.php';
      } else {
         include 'desktop/listting-resume-type.php';
      }

    get_footer();
?>