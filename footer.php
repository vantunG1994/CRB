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