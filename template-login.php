<?php
/**
* Template name: Login Page
*/
get_header();
if ( is_user_logged_in() ) {
$profile = home_url('/')."my-account";
?>
<script>
window.location.href="<?php echo $profile; ?>"
</script>
<?php
}
?>
<style>
.login-area h3 {
text-align: center;
color: #008cd8;
font-weight: bold;
font-size: 25px;
padding-bottom: 10px;
border-bottom: 1px solid #ccc;
}
.login-area h3 i {
color: #008cd8;
margin-right: 10px;
font-size: 30px;
}
.login-area p {
font-size: 16px; }
.login-area .register:hover {
color: #ecf0f1;
text-decoration: none;
}
.login-area .re-password {
position: relative;
top: -90px;
float: right;

}
@media(max-width: 768px){
.login-area .re-password {
position: none;
top:0;
float: left;
}
}
.login-area .re-password a {
font-size: 16px;
text-decoration: none;
}
#dangnhap .login-username, .lg-form #dangnhap .login-password {
line-height: 24px;
font-weight: 400;
font-style: normal;
color: #484848; }
#dangnhap .login-username input, #dangnhap .login-password input {
width: 100%;
background: #ffffff none no-repeat;
border: 1px solid #e0e0e0;
box-shadow: none;
font-weight: normal;
vertical-align: baseline;
border-left: 3px solid #008cd8;
border-radius: 3px;
padding: 5px;
float: left;
font-size: 16px;
color: #999999;
margin-bottom: 30px;
transition: all 0.2s ease; }

#dangnhap .login-submit input {
background-color: #2980b9;
padding: 6px 15px;
color: #fff;
text-transform: uppercase;
}
@media(max-width: 768px) {
#dangnhap .login-submit input {
width:100%;
}
}
#dangnhap .login-submit:hover input {
background-color: #1f6797;
}
#dangnhap .login-remember input[type=checkbox]  {
transform: scale(1.5);
-ms-transform: scale(1.5);
-webkit-transform: scale(1.5);
margin-right: 10px;
}
/*# sourceMappingURL=login-mvl.css.map */
</style>
<div class="main-content">
  <div class="container content-bg">
    <div class="row">
      <div class="col-md-offset-3 col-md-6 col-xs-12">
        <div class="login-area">
          <div class="note">
            <h3><i class="fa fa-check"></i>Đăng nhập</h3>
            <p>Hãy sử dụng tài khoản của bạn để đăng nhập vào website. Nếu chưa có tài khoản, <a class="register" href="<?php home_url();?>/register/">đăng ký tại đây</a>.</p>
          </div>
          <div class="form-group">
            <?php
            $args = array(
            'redirect'       => site_url( $_SERVER['REQUEST_URI'] ),
            'form_id'        => 'dangnhap', //Để dành viết CSS
            'label_username' => __( 'Tên tài khoản' ),
            'label_password' => __( 'Mật khẩu' ),
            'label_remember' => __( 'Ghi nhớ mật khẩu' ),
            'label_log_in'   => __( 'Đăng nhập' ),
            );
            wp_login_form($args);
            ?>
            <div class="text-right re-password"><a href="<?php echo home_url(); ?>/reset">Quên mật khẩu</a></div>
          </div>
        </div>
        <?php
        $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;
        if ( $login === "failed" ) {
        echo '<h5 style="color: red; padding-top:25px;"><strong>ERROR:</strong> Sai username hoặc mật khẩu.</h5>';
        } elseif ( $login === "empty" ) {
        echo '<p style="color: red; float:left;"><strong>ERROR:</strong> Username và mật khẩu không thể bỏ trống.</p>';
        } elseif ( $login === "false" ) {
        echo '<p style="color: red;"><strong>ERROR:</strong> Bạn đã thoát ra.</p>';
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>