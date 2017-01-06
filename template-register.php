<?php
/**
* Template name: Register Page
*/
get_header(); ?>
<?php
if ( is_user_logged_in() ) {
$profile = home_url('/')."my-account";
?>
<script>
window.location.href="<?php echo $profile; ?>"
</script>
<?php
}
?>
<div class="main-contnet">
    <div class="container">
        <div class="register">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-xs-12"><h1 class="resume-title  text-center"><i class="fa fa-check"></i>Đăng Ký tài khoản</h1></div>
                <div class="col-sm-12 col-xs-12" ><h3 class="tt-text text-center"> Đăng ký ngay một tài khoản để trải nghiệm tất cả các chức năng website của chúng tôi!</h3></div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-register">
                                <?php if(is_user_logged_in()) { $user_id = get_current_user_id();$current_user = wp_get_current_user();$profile_url = get_author_posts_url($user_id);$edit_profile_url = get_edit_profile_url($user_id); ?>
                                <div class="regted">
                                    Bạn đã đăng nhập với tên nick <a href="<?php echo $profile_url ?>"><?php echo $current_user->display_name; ?></a> Bạn có muốn <a href="<?php echo esc_url(wp_logout_url($current_url)); ?>">Thoát</a> không ?
                                </div>
                                <?php } else { ?>
                                <div class="dangkytaikhoan" >
                                    <?php
                                    if(isset($_POST['task'])){
                                    global $current_user,$wpdb;
                                    if($_POST['userName']=="" ||$_POST['email']=="" ||$_POST['pwd1']=="" )
                                    {
                                        $err= "Vui lòng nhập đầy đủ thông tin";
                                    }
                                    else{
                                        if($_POST['pwd1'] !=$_POST['pwd2'])
                                        {
                                            $err= "Mật khẩu không trùng khớp";

                                        }
                                        else{
                                            $userdata = array(
                                                'user_login'  =>  $_POST['userName'],
                                                'user_email'    =>  $_POST['email'],
                                                'user_pass'   =>  $_POST['pwd1']
                                            );

                                            $user_id = wp_insert_user( $userdata ) ;
                                            update_user_meta($user_id, 'account_type', $_POST['account_type']);

                                            if (  is_wp_error( $user_id ) ) {
                                                $err= "SĐT hoặc email đã tồn tại.Vui lòng kiểm tra lại";
                                            }
                                            else{
                                                $phone_activation_code = rand(11111,99999);
                                                $email_activation_code = md5(rand(11111,99999));

                                                update_user_meta($td_user_id, 'user_phone_activation_code', $phone_activation_code);
                                                update_user_meta($td_user_id, 'user_email_activation_code', $email_activation_code);


                                                $sms_data=array();
                                                $sms_data['phone']=$username;
                                                $sms_data['message']='Ma kich hoat tai khoan MangViecLam.com cua ban la '.$phone_activation_code.'     ';

                                                add_queue('sms',$sms_data);

                                                $email_data=array();
                                                $email_data['from'] = 'no-reply@mangvieclam.com';
                                                $email_data['to'] = $email;
                                                $email_data['subject'] = 'Đăng ký tài khoản MangViecLam.com thành công';
                                                $email_data['body'] = 'Tài khoản '.$username.' của bạn tại MangViecLam.com đã được khởi tạo. 
                                                 <br /><br /> Thông tin đăng nhập:<br /> Username: '.$username.'<br /> Password: '.$password.'<br />';

                                                add_queue('email',$email_data);

                                                $success="Đăng ký thành công";


                                            }
                                        }


                                    }}

                                    ?>
                                    <!--display error/success message-->
                                    <div id="message">
                                        <?php
                                        if(! empty($err) ) :
                                        echo '<p style="color: darkred;">'.$err.'</p>';
                                        endif;
                                        ?>
                                        <?php
                                        if(! empty($success) ) :
                                        $login_page  = home_url( '/login' );
                                        echo ''.$success. '<a href='.$login_page.'> Đăng nhập</a>'.'';
                                        endif;
                                        ?>
                                    </div>
                                    <form name ="frm" class="form-horizontal" method="post" role="form" >
                                        <div class="form-group">
                                            
                                            <label class="control-label  col-sm-3" for="userName">Số điện thoại:</label>
                                            <div class="col-sm-9">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>

                                                <input type="number" class="form-control" name="userName" id="userName" placeholder="Nhập số điện thoại của bạn" onblur="return kt_sdt()" required>
                                                  <p id="err" style="color: #ff0000;font-size: 14px;width: 200px;"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <label class="control-label col-sm-3" for="email">Email:</label>
                                            <div class="col-sm-9">
                                                <i class="fa fa-at"></i>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <label class="control-label col-sm-3" for="pwd1">Password:</label>
                                            <div class="col-sm-9">
                                                <i class="fa fa-key" aria-hidden="true"></i>
                                                <input type="password" class="form-control" name="pwd1" id="inputPassword" placeholder="Nhập password" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <label class="control-label col-sm-3" for="pwd2">Nhập lại Pass:</label>
                                            <div class="col-sm-9">
                                                <i class="fa fa-clipboard" aria-hidden="true"></i>
                                                <input type="password" class="form-control" name="pwd2" id="pwd2" placeholder="Nhập lại password" data-match="#inputPassword" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                                <label class="control-label col-sm-3" for="">Kiểu tài khoản :</label>
                                            
                                            <div class="col-sm-9">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <select class="form-control" name="account_type" id="sel1">
                                                    <option value="job-offer">Ứng viên</option>
                                                    <option value="job-seeker">Nhà tuyển dụng</option>
                                                </select>
                                                
                                                </div><div class="clearfix"></div>
                                            </div>
                                            <?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                                                    <input type="hidden" name="task" value="register" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="thongbaologin" style="color: darkred;">
                                        <?php
                                        $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;
                                        if ( $login === "failed" ) {
                                        echo '<strong>ERROR:</strong> Sai username hoặc mật khẩu.!';
                                        } elseif ( $login === "empty" ) {
                                        echo '<strong>ERROR:</strong> Username và mật khẩu không thể bỏ trống.';
                                        } elseif ( $login === "false" ) {
                                        echo '<strong>ERROR:</strong> Bạn đã thoát ra.';
                                        }
                                        ?>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <?php get_footer(); ?>