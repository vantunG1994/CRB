<?php
/**
* Template name: Register Page
*/
if ( is_user_logged_in() ) {
global $redux_demo;
$profile = $redux_demo['profile'];
wp_redirect( $profile ); exit;
}
$page = get_page($post->ID);
$td_current_page_id = $page->ID;
get_header(); ?>
<div class="main-content">
    <div class="container content-bg">
        <div class="title-top">
            <h1 class="resume-title  text-center"><i class="fa fa-check"></i>Đặt lại mật khẩu</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-register">
                    <form class="form-horizontal" method="post" role="form">
                        <div class="form-group">
                            <div class="col-md-3 col-xs-12">
                                <label class="txt-lb" for=""><?php _e( 'Số điện thoại:', 'themesdojo' ); ?></label>
                            </div>
                            <div class="col-md-6 col-xs-12 fr-input">
                                <i class="fa fa-phone-square" aria-hidden="true"></i>
                                <input type="text" name="userPhone" id="userPhone" value="" class="input-phone" placeholder="Nhập số điện thoại của bạn" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class=" col-md-6 col-md-offset-3 col-xs-12">
                                <input style="margin-bottom: 0;" name="submit_phone" type="submit" value="<?php _e( 'Gửi qua SMS', 'themesdojo' ); ?>" class="input-submit-phone">
                                <input style="margin-bottom: 0;" name="submit_email" type="submit" value="<?php _e( 'Gửi qua email', 'themesdojo' ); ?>" class="input-submit-phone">
                            </div>
                            <div class=" col-md-6 col-md-offset-3 col-xs-12">
                                <p style="color: #008cd8 !important;font-weight: bold !important;">Hoặc gọi tổng đài (08) 222222.36  bấm phím 6 để được cấp lại mật khẩu mới.</p>
                            </div>
                        </div>
                      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
<?php
if(isset($_POST['submit_phone']))
{
$user = get_user_by('login', $_POST['userPhone']);
$user_id=$user->ID;
$user_info = get_userdata($user_id);
$role= implode(', ', $user_info->roles);
if($user && $role !="administrator")
{
$user_id=$user->ID;
$phone_activation_code = rand(111111,999999);
$today=date('Y-m-d');
$last_reset_pass=get_user_meta($user_id, 'last_reset_pass', true);
if($last_reset_pass !=$today)
{
update_user_meta($user_id, 'user_reset_pass', $phone_activation_code);
update_user_meta($user_id, 'last_reset_pass', $today);
$sms_data=array();
$sms_data['phone']=$_POST['userPhone'];
$sms_data['message']='Mat khau moi duoc cap moi cua tai khoan '.$_POST['userPhone'].' tai Mangvieclam.com: '.$phone_activation_code.'     ';
add_queue('sms',$sms_data);
//        wp_set_password( $phone_activation_code, $user_id );
?>
<script>
swal({
title: 'Reset mật khẩu thành công!',
text: 'Mật khẩu của bạn đã được tạo mới và gửi cho bạn qua SMS, vui lòng kiểm tra tin nhắn đến.',
timer: 10000
}).then(
function () {
location.href="<?php echo home_url(); ?>/login";
},
function (dismiss) {
}
)
</script>
<?php
}
else{
?>
<script>
$(".error").html('Mật khẩu của bạn chỉ được cấp lại một lần trong ngày. Vui lòng thử lại sau.');
</script>
<?php
}
}
else{
if($role =="administrator")
{
?>
<script>
$(".error").html('Tài khoản admin không thể thực hiện chức năng này');
</script>
<?php
}else{
?>
<script>
$(".error").html('Tài khoản không tồn tại. Vui lòng kiểm tra lại thông tin');
</script>
<?php
}}
}
if(isset($_POST['submit_email']))
{
include_once(ABSPATH . WPINC . '/class-phpmailer.php');
$user_email =  get_user_by('login', $_POST['userPhone']);
$user_id=$user_email->ID;
$user_info = get_userdata($user_id);
$role= implode(', ', $user_info->roles);
if($user_email && $role !="administrator")
{
$user_id=$user_email->ID;
$email_activation_code ='mangvieclam';
$today=date('Y-m-d');
$last_reset_pass=get_user_meta($user_id, 'last_reset_pass', true);
if($last_reset_pass !=$today)
{
$author_obj = get_user_by('id', $user_id);
$email_data=array();
$email= $author_obj->user_email;
$email_data['from'] = 'no-reply@mangvieclam.com';
$email_data['to'] = $email;
$email_data['subject'] = 'Đăng ký tài khoản MangViecLam.com thành công';
$email_data['body'] = 'Mật khẩu mới được cấp lại cho tài khoản '.$_POST['userPhone'].' MangViecLam.com của bạn là: '.$email_activation_code.'.     ';
add_queue('email',$email_data);
$company= get_option('blogname');
$nFrom = $company;    //mail duoc gui tu dau, thuong de ten cong ty ban
$mFrom = 'mvlgroup68@gmail.com';  //dia chi email cua ban
$mPass = 'Dh51200497';       //mat khau email cua ban
$nTo = 'MVL GROUP'; //Ten nguoi nhan
$mTo = $email;   //dia chi nhan mail
$mail             =new PHPMailer();
$body             ='Mật khẩu mới được cấp lại cho tài khoản'.$_POST['userPhone'].' MangViecLam.com của bạn là: '.$email_activation_code.'     ';
$title = 'Reset New Password';   //Tieu de gui mail
$mail->IsSMTP();
$mail->CharSet  = "utf-8";
$mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;    // enable SMTP authentication
$mail->SMTPSecure = "ssl";   // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";    // sever gui mail.
$mail->Port       = 465;         // cong gui mail de nguyen
// xong phan cau hinh bat dau phan gui mail
$mail->Username   = $mFrom;  // khai bao dia chi email
$mail->Password   = $mPass;              // khai bao mat khau
$mail->SetFrom($mFrom, $nFrom);
$mail->AddReplyTo($user_email, $company); //khi nguoi dung phan hoi se duoc gui den email nay
$mail->Subject    = $title;// tieu de email
$mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
$mail->AddAddress($mTo, $nTo);
// thuc thi lenh gui mail
if(!$mail->Send()) {
//        echo 'Co loi!';
} else {
//        echo 'mail của bạn đã được gửi đi hãy kiếm tra hộp thư đến để xem kết quả. ';
}
update_user_meta($user_id, 'last_reset_pass', $today);
update_user_meta($user_id, 'user_reset_pass', $email_activation_code);
//        wp_set_password( $email_activation_code, $user_id );
?>
<script>
swal({
title: 'Reset mật khẩu thành công!',
text: 'Mật khẩu tài khoản của bạn đã được cấp mới.Vui lòng kiểm tra hộp thư email cá nhân',
timer: 10000
}).then(
function () {
location.href="<?php echo home_url(); ?>/login";
},
function (dismiss) {
}
)
</script>
<?php
}
else{
?>
<script>
$(".error").html('Mật khẩu của bạn chỉ được cấp lại một lần trong ngày. Vui lòng thử lại sau.');
</script>
<?php
}
}
else{
if($role =="administrator")
{
?>
<script>
$(".error").html('Tài khoản admin không thể thực hiện chức năng này');
</script>
<?php
}else{
?>
<script>
$(".error").html('Tài khoản không tồn tại. Vui lòng kiểm tra lại thông tin');
</script>
<?php
}}
}
