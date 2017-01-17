<?php
/**
* Company Page
*/
    get_header();
?>
<style>
section#popup-login {
width: 100%;

z-index: 3;
position: fixed;
width: 100%;
height: 100%;
z-index: 999999;
display: none;
background-color: rgba(0,0,0,0.5);
}
form#login p.status{
display: none;
}
</style>
<section id="popup-login">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                
                <div class="resume-skills">
                    <a id="close-popup-login" href="#"  rel="top" title="<?php _e( "close", "themesdojo" ); ?>" ><i class="fa fa-times"></i></a>
                    <h3 class="resume-section-title"><i class="fa fa-check"></i><?php _e( 'Đăng nhập', 'themesdojo' ); ?></h3>
                    <h3 class="resume-section-subtitle"><?php _e( 'Bạn chưa có tài khoản?', 'themesdojo' ); ?> <a id="open-register-popup" href="#"><?php _e( 'Đăng ký ngay.', 'themesdojo' ); ?></a></h3>
                    <div class="divider"></div>
                    
                    
                    <div class="one_half first" style="margin-bottom: 0;">
                        <form id="login" method="post">
                            <p class="status"></p>
                            <div class="row">
                                <div class="col-xs-6">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <input id="username" placeholder="Nhập Username" type="text" name="username">
                                    
                                </div>
                                <div class="col-xs-6">
                                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                    <input id="password" placeholder="Nhập Password" type="password" name="password">
                                    
                                </div>
                            </div>
                            
                            
                            <input class="submit_button" type="submit" value="Đăng nhập" name="submit">
                            <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
                        </form>
                        <div id="success">
                        </div>
                        <div id="error">
                        </div>
                        <script type="text/javascript">
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="close-login" class="close-login"></div>
</section>
<?php
if(DEVICE == 'mobile') {
include 'mobile/single-company.php';
} else {
include 'desktop/single-company.php';
}
get_footer();
?>
<script type="text/javascript">
jQuery(function($) {
document.getElementById('close-login').addEventListener('click', function(e) {
jQuery('#popup-login').css('display','none');
});
document.getElementById('close-popup-login').addEventListener('click', function(e) {
jQuery('#popup-login').css('display','none');
});
document.getElementById('open-register-popup').addEventListener('click', function(e) {
window.location="<?php echo home_url('/')?>register";
});
});
</script>
<?php
if ( !is_user_logged_in() ) {
?>
<script>
jQuery(document).ready(function($) {
$(".unlike_post").click(function() {
$('#popup-login').css('display', 'block');
});
});
jQuery(document).ready(function($) {
$(".like_post").click(function() {
$('#popup-login').css('display', 'block');
});
});
</script>
<?php
}
else{
?>
<script>
jQuery(document).ready(function($) {
$(".unlike_post").click(function() {
var post_id="<?php echo $td_this_post_id; ?>";
var user_id="<?php echo $td_user_id; ?>";
var listing_type="company";
var dataString = {post_id: post_id, user_id: user_id,listing_type:listing_type}
$.ajax({
type : 'POST',
data : {'action' : 'unlike_action', 'data' :dataString},
url : '<?php echo admin_url( "admin-ajax.php" ); ?>',
success : function (resp){
$(".unlike_post").html(resp);
}
});
});
});
jQuery(document).ready(function($) {
$(".like_post").click(function() {
var post_id="<?php echo $td_this_post_id; ?>";
var user_id="<?php echo $td_user_id; ?>";
var listing_type="company";
var dataString = {post_id: post_id, user_id: user_id,listing_type:listing_type}
$.ajax({
type : 'POST',
data : {'action' : 'like_action', 'data' :dataString},
url : '<?php echo admin_url( "admin-ajax.php" ); ?>',
success : function (resp){
$(".like_post").html(resp);
}
});
});
});
</script>
<?php
}
?>
<script>
function copyToClipboard() {
var $temp = $("<input>");
$("body").append($temp);
$temp.val("<?php echo get_permalink(); ?>").select();
document.execCommand("copy");
$temp.remove();
$(".button_copy").html("Đã copy");
}
</script>