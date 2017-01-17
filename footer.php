<?php global $theme; ?>
    
 <?php if($theme->display('footer_widgets')) { ?>
    <div id="footer-widgets" class="clearfix">
      <?php 
        if(DEVICE == 'mobile') {
            include 'mobile/footer.php';
        } else {
           include 'desktop/footer.php';
        }
       ?>
    </div> <!-- footer-widgets -->
    
 <?php  } ?>
 <script>
     jQuery(document).ready(function($) {

         // Show the login dialog box on click
         $('a#show_login').on('click', function(e){
             $('body').prepend('<div class="login_overlay"></div>');
             $('form#login').fadeIn(500);
             $('div.login_overlay, form#login a.close').on('click', function(){
                 $('div.login_overlay').remove();
                 $('form#login').hide();
             });
             e.preventDefault();
         });

         // Perform AJAX login on form submit
         $('form#login').on('submit', function(e){
             $('form#login p.status').show().text(ajax_login_object.loadingmessage);
             $.ajax({
                 type: 'POST',
                 dataType: 'json',
                 url: ajax_login_object.ajaxurl,
                 data: {
                     'action': 'ajaxlogin', //calls wp_ajax_nopriv_ajaxlogin
                     'username': $('form#login #username').val(),
                     'password': $('form#login #password').val(),
                     'security': $('form#login #security').val() },
                 success: function(data){
                     $('form#login p.status').text(data.message);
                     if (data.loggedin == true){
                         var url = window.location.href;
                         document.location.href =url;
                     }
                 }
             });
             e.preventDefault();
         });

     });
 </script>
<script src ="<?php echo THEMATER_URL;?>/js/jquery-2.1.4.js"></script>
<script src ="<?php echo THEMATER_URL;?>/js/owl.carousel.min.js"></script>
<script src ="<?php echo THEMATER_URL;?>/js/bootstrap.min.js"></script>
<script src="<?php echo THEMATER_URL; ?>/js/menu-mobile.js"></script> 
<script src="<?php echo get_template_directory_uri();?>/desktop/asset/js/sidebar.js"></script>
<script src="<?php echo get_template_directory_uri();?>/mobile/asset/js/footer.js"></script>
<script src="<?php echo get_template_directory_uri();?>/desktop/asset/js/search_top_home.js"></script>
<script src="<?php echo get_template_directory_uri();?>/desktop/asset/js/salary.js"></script>
<script src="<?php echo THEMATER_URL; ?>/js/select2.min.js"></script>
<script src="<?php echo THEMATER_URL; ?>/js/sweetalert2.min.js"></script>

 


<?php wp_footer(); ?>

</body>
</html>