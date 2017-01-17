<?php
/**
 * Template name: My Account
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
          include 'mobile/my-account.php';
      } else {
         include 'desktop/my-account.php';
      }

    get_footer();
?>
<script>

    jQuery(document).ready(function($) {
        $(".delete_post").click(function() {
            var del_id= $(this).attr('id');
            $.ajax({
                type : 'POST',
                data : {'action' : 'delete_post', 'data' :del_id},
                url : '<?php echo admin_url( "admin-ajax.php" ); ?>',
                success : function (resp){
                    $("#row-"+del_id).html(resp);

                }
            });
        });
    });


</script>
