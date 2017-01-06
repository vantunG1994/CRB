<?php
/**
 * Template name: Edit company
 */
	 get_header();

      if(DEVICE == 'mobile') {
          include 'mobile/edit-company.php';
      } else {
         include 'desktop/edit-company.php';
      }

    get_footer();
?>