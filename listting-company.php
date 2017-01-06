<?php
/**
 * Template name: Listting Company
 */
	 get_header();

      if(DEVICE == 'mobile') {
          include 'mobile/listting-company.php';
      } else {
         include 'desktop/listting-company.php';
      }

    get_footer();
?>