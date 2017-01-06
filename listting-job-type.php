<?php
/**
 * Template name: Listting Job Type
 */
	 get_header();

      if(DEVICE == 'mobile') {
          include 'mobile/listting-job-type.php';
      } else {
         include 'desktop/listting-job-type.php';
      }

    get_footer();
?>