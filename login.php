<?php
/**
 * Template name: Login
 */
	 get_header();

      if(DEVICE == 'mobile') {
          include 'mobile/login.php';
      } else {
         include 'desktop/login.php';
      }

    get_footer();
?>