<?php
/**
 * Template name: Add resume
 */
	 get_header();
if ( !is_user_logged_in() ) {

    $login = home_url('/')."login";
    ?>
    <script>
        window.location.href="<?php echo $login; ?>"
    </script>
    <?php


}

      if(DEVICE == 'mobile') {
          include 'mobile/add-resume.php';
      } else {
         include 'desktop/add-resume.php';
      }

    get_footer();
?>