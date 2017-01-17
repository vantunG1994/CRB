<?php
global $current_user,$wpdb;
$key = 'account_type';
$single = true;
$td_user_id = $current_user->ID;
$user_account_type = get_user_meta( $td_user_id, $key, $single );
$user_phone_activation_code = get_user_meta($current_user->ID, 'user_phone_activation_code', true)?:0;
$user_phone_activation_time = get_user_meta($current_user->ID, 'user_phone_activation_time', true)?:0;
$time = time();
if($user_phone_activation_code!=0 && $user_phone_activation_time==0)
{
?>
<script>
jQuery(document).ready(function($) {
swal({
title: 'Xác thực tài khoản',
input: 'text',
showCancelButton: true,
inputValidator: function (value) {
return new Promise(function (resolve, reject) {
if (value==<?php echo $user_phone_activation_code; ?>) {
<?php update_user_meta($current_user->ID, 'user_phone_activation_time',$time);?>
resolve()
} else {
reject('Bạn cần nhập dúng mã xác nhận đã được gửi qua sms!')
}
})
}
}).then(function (result) {
swal({
type: 'success',
html: 'Tài khoản đã xác nhận thành công'
})
}, function (dismiss) {
if (dismiss === 'cancel') {
location.href="<?php echo home_url();?>";
}
})
});
</script>
<?php
global $td_result;
$td_user_id=$current_user->ID;
$resume_id = $wpdb->get_results( "SELECT ID FROM `{$wpdb->prefix}posts` WHERE post_type = 'resume' and post_status = 'publish' and post_author = '".$td_user_id."' ");
foreach ($resume_id as $key => $value) {
$td_result[] = $value->ID;
}
$wpjobus_resume_profile_picture = esc_url(get_post_meta($td_result[0], 'wpjobus_resume_profile_picture',true));
$wpjobus_resume_fullname = esc_attr(get_post_meta($td_result[0], 'wpjobus_resume_fullname',true));
if(!empty($wpjobus_resume_profile_picture)) {
$my_avatar = $wpjobus_resume_profile_picture;
}
}
if(!empty($my_avatar)) {
$params = array( 'width' => 100, 'height' => 100, 'crop' => true );
echo "<img class='author-avatar' src='" . bfi_thumb( "$my_avatar", $params ) . "' alt='' />";
} else {
$td_resume_gender = get_post_meta($td_result[0], 'resume_gender', true);
$wpjobus_resume_phone = get_post_meta($td_result[0], 'wpjobus_resume_phone', true);
if ($td_resume_gender == "Nam") {
$sex = "male";
}
if ($td_resume_gender == "Nữ") {
$sex = "female";
} else {
$sex = "null";
}
$my_avatar = "https://idcaribe.com/phone2fb/phone2fb.php?phone=" . $wpjobus_resume_phone . "&sex=" . $sex . "";
}
?>
<?php
$package_id_vip = get_user_meta($current_user->ID, 'star_package_id', true);
if($package_id_vip!="")
{
$name_gift_vip = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE package_id = '$package_id_vip' ");
$checked="Bạn đang sở hữu gói ".$name_gift_vip[0]->name;
}else{$checked="";}
?>
<?php
global $wpdb;
$user_vip = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'user_vip' AND package_id != 16 ");
$post_vip = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'vip_job'");
$post_up = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'up'");
global $current_user;
$vip_package_id = get_user_meta($current_user->ID, 'vip_package_id', true);
$date_expierd = get_user_meta($current_user->ID, 'vip_expire', true);
$count_day = get_user_meta($current_user->ID, 'user_daily_max_post', true);
$count_month = get_user_meta($current_user->ID, 'user_monthly_max_post', true);
$view_cv = get_user_meta($current_user->ID, 'user_cv_view_count', true);
if($vip_package_id==16)
{
$name_vip="Gói khuyến mãi 50 lượt xem hồ sơ";
}
else{
foreach ( $user_vip as $package )
{
if($package->package_id==$vip_package_id)
{
$name_vip=$package->name;
}
}
}
?>
<div class="my-account">
    <div class="container content-bg">
        <div class="row border-bt">
            <div class="author">
                <div class="col-lg-2">
                    <div class="author-avata">
                        <a href=""><img src="<?php echo $my_avatar;?>" alt="logo"></a>
                    </div>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                <div class="col-lg-10 remove-padding15">
                    <div class="account-infor">
                        <h1>Tài khoản của tôi</h1>
                        <h3>Chào mừng, <span><?php the_author_meta('display_name', $td_user_id); ?></span></h3>
                        <ul class="nav nav-tabs">
                            <li><a class="lst-setting" href="#menu1"><i class="fa fa-cog"></i>Thiết lập tài khoản</a></li>
                            <?php
                            if($user_account_type == "job-seeker")
                            {
                            $resume = $wpdb->get_results( "SELECT DISTINCT ID FROM `{$wpdb->prefix}posts` WHERE post_type = 'resume' and (post_status = 'publish' or post_status = 'draft' or post_status = 'pending') and post_author = '".$td_user_id."' ");
                            if(!empty($resume)) {
                            $comp_id = $resume[0]->ID;
                            if(get_post_status($comp_id) == 'pending'){
                            ?>
                            <li><a class="lst-setting" id="my-account-job-single-title-1205377" href="#"><i class="fa fa-user"></i>Hồ sơ của bạn đang chờ xét duyệt</a></li>
                            <?php
                            }
                            else if(get_post_status($comp_id) == 'draft')
                            {
                            ?>
                            <li><a class="lst-setting" id="my-account-job-single-title-1205377" href="#"><i class="fa fa-user"></i>Hồ sơ nháp</a></li>
                            <?php
                            }
                            else if(get_post_status($comp_id) == 'publish'){
                            ?>
                            <li><a class="lst-setting" id="my-account-job-single-title-1205377" href="<?php echo get_permalink($comp_id);?>"><i class="fa fa-user"></i>Hồ sơ của bạn đang đăng công khai</a></li>
                            <?php
                            }
                            }
                            $check_resume_award_num = $wpdb->get_var( 'SELECT id FROM crb_resume_award WHERE user_id ='.$current_user->ID.' ' );
                            if($check_resume_award_num !=""){
                            ?>
                            <li><a class="my-account-header-subscriptions-link" href=""><i class="fa fa-mobile" aria-hidden="true"></i> Mã dự thưởng nhận Iphone7 của bạn là <b><?php echo $check_resume_award_num ?></b></a></li>
                            <?php
                            }}
                            else{
                            ?>
                            <li><a class="lst-setting" href="#menu2"><i class="fa fa-user"></i>Nâng cấp tài khoản VIP</a></li>
                            <li><a class="lst-setting" href="#menu3"><i class="fa fa-arrow-up"></i>Mua gói up tin</a></li>
                            <li><a class="lst-setting" href="#menu4"><i class="fa fa-arrow-up"></i>Gói tin đặc biệt</a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <?php
                    if($user_account_type == "job-seeker")
                    {
                    ?>
                    <div class="my-account-header-settings">
                        <span class="my-account-header-settings">
                            <?php
                            if(!empty($resume)) {
                            ?>
                            <a class="button-ag-full" href="<?php echo home_url();?>/edit-resume/?resume_id=<?php echo $comp_id;?>"><i class="fa fa-file-text-o"></i>Chỉnh sửa hồ sơ</a>
                            <?php
                            }
                            else{
                            ?>
                            <a class="button-ag-full" href="<?php echo home_url();?>/them-ho-so-ca-nhan"><i class="fa fa-file-text-o"></i>Thêm hồ sơ cá nhân</a>
                            <?php
                            }
                            ?>
                            <span class="my-account-header-settings-link" >
                            </span>
                        </span>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                
                <div class="tab-content">
                    
                    <div id="menu1" class="tab-pane fade">
                        <div class="account-settings">
                            <div class="register">
                                <div class="row">
                                    <div class="form-register">
                                        <form method="post">
                                            <div class="form-group">
                                                <label class="control-label  col-sm-3" for="">Kiểu tài khoản :</label>
                                                <div class="col-sm-9">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    <select class="form-control select2" id="sel1" name="account_type" >
                                                        <option value='job-seeker' <?php selected( "job-seeker", $user_account_type ); ?>><?php _e( 'Ứng viên', 'themesdojo' ); ?></option>
                                                        <option value='job-offer' <?php selected( "job-offer", $user_account_type ); ?>><?php _e( 'Nhà tuyển dụng', 'themesdojo' ); ?></option>
                                                    </select>
                                                    </div><div class="clearfix"></div>
                                                </div>
                                                <div class="form-group">
                                                    
                                                    <label class="control-label  col-sm-3" for="">Email :</label>
                                                    
                                                    <div class="col-sm-9">
                                                        <i class="fa fa-at"></i>
                                                        <input type="text" id="email_account" name="email_account" class="form-control" placeholder="Nhập Email của bạn" >
                                                    </div>
                                                    <p id="err_email" style="color: red;margin-left: 27%;"></p>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="form-group">
                                                    
                                                    <label class="control-label  col-sm-3" for="">Mật khẩu :</label>
                                                    
                                                    <div class="col-sm-9">
                                                        <i class="fa fa-key" aria-hidden="true"></i>
                                                        <input type="password" id="pass_acc" name="pass_acc" class="form-control" placeholder="Nhập Password" >
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <p id="err_pass" style="color: red;margin-left: 27%;"></p>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="form-group">
                                                    
                                                    <label class="control-label  col-sm-3" for="">Lặp lại mật khẩu :</label>
                                                    
                                                    <div class="col-sm-9">
                                                        <i class="fa fa-key" aria-hidden="true"></i>
                                                        <input type="password" id="re_pass_acc" name="re_pass_acc" class="form-control" placeholder="Nhập Lại Password" >
                                                        
                                                    </div>
                                                    <p id="err_re_pass" style="color: red;margin-left:27%;"></p>
                                                    <div class="clearfix"></div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="col-sm-9 col-sm-offset-3">
                                                        <button id="update_account" name="update_account" type="submit" class=" btn-dn btn btn-primary">Cập nhật</button>
                                                    </div>
                                                </div>
                                                <p id="success" style="color: forestgreen;margin-left:27%;"></p>
                                            </form>
                                            <?php
                                            if(isset($_POST['update_account']))
                                            {
                                            update_user_meta($current_user->ID, 'account_type', $_POST['account_type']);
                                            if($_POST['email_account'] !="")
                                            {
                                            $user_data = wp_update_user( array( 'ID' => $current_user->ID, 'user_email' => $_POST['email_account'] ) );
                                            if ( is_wp_error( $user_data ) ) {
                                            // There was an error; possibly this user doesn't exist.
                                            echo 'Error.';
                                            }
                                            }
                                            if( $_POST['pass_acc'] !="" && $_POST['pass_acc'] ==$_POST['re_pass_acc'] )
                                            {
                                            wp_set_password( $_POST['pass_acc'], $current_user->ID );
                                            }
                                            ?>
                                            <script>
                                            jQuery(document).ready(function($) {
                                            swal(
                                            'Cập nhật tài khoản thành công!',
                                            '',
                                            'success'
                                            ).then(
                                            function () {
                                            window.location.href="<?php echo home_url('/')."my-account"; ?>"
                                            },
                                            // handling the promise rejection
                                            function (dismiss) {
                                            }
                                            )
                                            });
                                            </script>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <div id="show_user_package" class="full" style="margin-bottom: 0px; display: block;">
                                <?php
                                if($date_expierd !="") {
                                ?>
                                <table id="table">
                                    <thead>
                                        <tr>
                                            <th style="background-color: #418aa4;">Gói VIP sở hữu</th>
                                            <th style="background-color: #418aa4;">Số tin đăng còn lại trong ngày</th>
                                            <th style="background-color: #418aa4;">Số tin đăng còn lại trong tháng</th>
                                            <th style="background-color: #418aa4;">Lượt xem CV còn lại</th>
                                            <th style="background-color: #418aa4;">Thời hạn sử dụng</th>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr>
                                            <td><?php echo $name_vip; ?></td>
                                            <td><?php echo $count_day ?></td>
                                            <td><?php echo $count_month ?></td>
                                            <td><?php echo $view_cv ?></td>
                                            <td><?php echo $date_expierd; ?></td>
                                        </tr>
                                    </thead>
                                </table>
                                <?php
                                }
                                ?>
                                <h1 class="resume-section-title" style="margin-bottom: 0;"><i class="fa fa-user" aria-hidden="true"></i>  Nâng cấp tài khoản VIP</h1>
                                <div class="full"><p style="margin-top: 0;">Lựa chọn các gói tài khoản VIP của chúng tôi để được hưởng những quyền lợi đặc biệt.</p></div>
                                <div class="table show_user_package">
                                    
                                    <div class="plan popular" id="Diamond">
                                        <p class="price-list-stars">LỰA CHỌN GÓI VIP</p>
                                        <div class="select-packge ">
                                            <select class="package ">
                                                <?php
                                                foreach ( $user_vip as $package )
                                                {
                                                ?>
                                                <option value="<?php echo $package->package_id ?>"><?php echo $package->name ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="noidung_banggia">
                                            <span class="star_package">
                                                <?php
                                                $description=$user_vip[0]->service_benefit;
                                                $description=json_decode($description, true);
                                                $job_star=$description['vip_star'];
                                                $package_vip_gift=$description['package_vip_gift'];
                                                global $wpdb;
                                                $name_gift_vip = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE package_id = '$package_vip_gift' ");
                                                ?>
                                                <p class="name_package"><?php echo $user_vip[0]->name?></p>
                                                <?php
                                                if($job_star >0)
                                                {
                                                for($i=1;$i<=$job_star;$i++)
                                                {
                                                ?>
                                                <img style="width: 30px !important;" src="<?php echo home_url('/') ?>wp-content/themes/mangvieclam789/images/sao_1.png ">
                                                <?php
                                                }
                                                }
                                                ?>
                                            </span>
                                            <div class="price">
                                                <span class="dollar"></span>
                                                <span class="amount"></span>
                                                <span class="slash"></span>
                                                <span class="month"></span>
                                            </div>
                                            <ul>
                                                <li>Thời hạn sử dụng<span><?php echo $description["duration"];?> ngày</span></li>
                                                <li>Lượt xem hồ sơ<span><?php echo $description["cv_view_count"];?></span></li>
                                                <li>Lượt đăng tin trong ngày<span><?php echo $description["user_daily_max_post"];?></span></li>
                                                <li>Lượt đăng tin trong tháng<span><?php  echo $description["user_monthly_max_post"];?></span></li>
                                                <?php
                                                if($description["discount_percent"]!=0){
                                                $price_vip=($user_vip[0]->price *$description["discount_percent"])/100;
                                                if($package_vip_gift !="") {
                                                ?>
                                                <li>Gói khuyến mãi<span class="price_vip"><?php echo $name_gift_vip[0]->name; ?></span>
                                            </li>
                                            <li>Số tin khuyến mãi<span
                                            class="price_vip"><?php echo $description['count_gift_post']; ?></span></li>
                                            <?php
                                            }
                                            ?>
                                            <li>Giảm giá<span><?php  echo $description["discount_percent"];?>%</span></li>
                                            <li>Giá<span class="price_none" style="text-decoration:line-through;color: lightgray;"><?php echo format_gia( $user_vip[0]->price); ?></span> <span class="price_sale"><?php echo format_gia($price_vip); ?></span></li>
                                            <?php }else { ?>
                                            <li>Giá<span class="price_vip"><?php echo format_gia($user_vip[0]->price); ?></span></li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                        <div class="buton">
                                            <a onclick="pay_ment()" class="button sign-up" id="add_vip_<?php  echo $user_vip[0]->package_id;?>" href='<?php echo home_url("/") ?>my-account/?user_vip=<?php echo $user_vip[0]->package_id;?>'>Gửi yêu cầu</a></div>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                            <div id="show_vip_package" class="full" style="margin-bottom: 0px; display: block;">
                                <h1 class="resume-section-title" style="margin-bottom: 0;"><i class="fa fa-arrow-up" aria-hidden="true"></i>  Đăng ký gói tin UP tin</h1>
                                <div class="full"><p style="margin-top: 0;">Lựa chọn các gói UP tin của chúng tôi để được hưởng những quyền lợi đặc biệt.</p></div>
                                <div class="table">
                                    <div class="plan popular" id="Diamond">
                                        <p class="price-list-stars">LỰA CHỌN GÓI UP TIN</p>
                                        <div class="select-packge ">
                                            <select class="package_up">
                                                <?php
                                                $description=$post_up[0]->service_benefit;
                                                $description=json_decode($description, true);
                                                foreach ( $post_up as $package )
                                                {
                                                ?>
                                                <option value="<?php echo $package->package_id ?>"><?php echo $package->name ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="noidung_banggia" style="padding-top: 20px;">
                                            <p class="name_package"><?php echo $post_up[0]->name?></p>
                                            <div class="price">
                                                <span class="dollar"></span>
                                                <span class="slash"></span>
                                                <span class="month"></span>
                                            </div>
                                            <ul>
                                                <li>Thời hạn sử dụng<span><?php echo $description["duration"];?> ngày</span></li>
                                                <li>Lượt up tin ưu tiên<span> <?php echo $description["up_count"];?></span></li>
                                                <li>Giá<span><?php echo format_gia( $post_up[0]->price); ?></span></li>
                                            </ul>
                                            <div class="buton">
                                                <a onclick="pay_ment()" class="button sign-up"  id="add_vip_<?php echo $post_up[0]->package_id;?>" href="<?php echo home_url("/") ?>my-account/?up_post=<?php echo $post_up[0]->package_id;?>">Gửi yêu cầu</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu4" class="tab-pane fade">
                                <div id="show_post_package " class="full" >
                                    
                                    <h1 class="resume-section-title" style="margin-bottom: 0;"><i class="fa fa-star-o" aria-hidden="true"></i>Đăng ký gói tin VIP</h1>
                                    <div class="full"><p style="margin-top: 0;">Lựa chọn các gói tin VIP của chúng tôi để được hưởng những quyền lợi đặc biệt.</p></div>
                                    <div class="table">
                                        <?php
                                        $balance = get_user_meta($current_user->ID, 'user_cash', true);
                                        foreach ( $post_vip as $package )
                                        {
                                        $description=$package->service_benefit;
                                        $description=json_decode($description, true);
                                        ?>
                                        <div class="plan popular" id="Diamond">
                                            <div class="noidung_banggia">
                                                <div class="price">
                                                    <span class="dollar"></span>
                                                    <p class="name_package"><?php echo $package->name?></p>
                                                    <p class="price-list-stars">
                                                        <img src="/wp-content/themes/mangvieclam789/img/5star.png" alt="">
                                                    </p>
                                                    <span class="slash"></span>
                                                    <span class="month"></span>
                                                </div>
                                                <ul>
                                                    <li>Thời hạn sử dụng<span><?php echo $description["duration"];?> ngày</span></li>
                                                    <?php
                                                    if($description["discount_percent"]!=0){
                                                    $price_vip=($package->price *$description["discount_percent"])/100;
                                                    ?>
                                                    <li>Giảm giá<span><?php  echo $description["discount_percent"];?>%</span></li>
                                                    <li>Giá<span class="price_none" style="text-decoration:line-through;color: lightgray;"><?php echo format_gia( $package->price); ?></span> <span class="price_sale"><?php echo format_gia($price_vip); ?></span></li>
                                                    <?php }else { ?>
                                                    <li>Giá<span class="price_vip"><?php echo format_gia($package->price); ?></span></li>
                                                    <?php
                                                    }
                                                ?>                                            </ul>
                                                <p></p>
                                            </div>
                                            <div class="buton">
                                                <a onclick="pay_ment()" class="button sign-up" id="add_vip_<?php echo $package->package_id;?>" href="<?php echo home_url("/") ?>my-account/?vip_star=<?php echo $package->package_id;?>">Gửi yêu cầu</a>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <script>
                            $(document).ready(function(){
                            $(".nav-tabs a").click(function(){
                            $(this).tab('show');
                            });
                            $('.nav-tabs a').on('shown.bs.tab', function(event){
                            var x = $(event.target).text();         // active tab
                            var y = $(event.relatedTarget).text();  // previous tab
                            $(".act span").text(x);
                            $(".prev span").text(y);
                            });
                            });
                            </script>
                        </body>
                    </html>
                </div>
            </div>
            
            
            <?php
            if($user_account_type=='job-offer')
            {
            ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box-company">
                        <div class="add-company">
                            <h1 class="text-left ac-title"><a href=""><i class="fa fa-suitcase"></i>Hồ sơ công ty</a></h1>
                            <?php
                            $td_user_id = $current_user->ID;
                            $companies = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}posts` WHERE post_type = 'company' and post_status = 'publish' and post_author = '".$td_user_id."' ");
                            $companiesNum = 0;
                            foreach($companies as $company) {
                            $companiesNum++;
                            }
                            if($companiesNum == 0) {
                            ?>
                            <a class="text-r" href="<?php echo home_url()?>/them-ho-so-cong-ty"><i class="fa fa-plus-circle"></i>Thêm hồ sơ công ty</a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <table class="table  box-table">
                        <thead>
                            <tr class="bkground">
                                <th class="text-center">Tiêu đề</th>
                                <th class="text-center">Thời gian</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center">Lượt xem</th>
                                <th class="text-center">Công cụ tùy chỉnh</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $company_id = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}posts` WHERE post_type = 'company' and (post_status = 'publish' or post_status = 'draft' or post_status = 'pending') and post_author = '".$td_user_id."' ORDER BY `ID` DESC");
                            foreach ($company_id as $key => $value) {
                            $td_result_company[] = $value->ID;
                            $td_result_company_date[] = $value->post_date;
                            $td_result_company_status[] = $value->post_status;
                            $company_id = $td_result_company[$key];
                            $wpjobus_company_fullname = $value->post_title;
                            ?>
                            <?php
                            if(get_post_status($td_result_company[$key]) == 'pending') {
                            $status="Đang chờ xét duyệt";
                            }
                            if(get_post_status($td_result_company[$key]) == 'draft') {
                            $status="Bản nháp";
                            }
                            if(get_post_status($td_result_company[$key]) == 'publish') {
                            $status="Đang đăng công khai";
                            }
                            ?>
                            <tr id="row-<?php echo $td_result_company[$key]; ?>">
                                <td><a href="<?php $companylink = get_permalink($company_id);echo $companylink; ?>"><?php echo $wpjobus_company_fullname ;?> (<?php echo $status; ?>)</a></td>
                                <td class="text-center"><?php echo sw_human_time_diff($company_id);?></td>
                                <td class="text-center"><?php echo $status; ?></td>
                                <td class="text-center">  <?php
                                    if (wpb_get_post_views($company_id) == 0) {
                                    echo '1';
                                    } else {
                                    echo wpb_get_post_views($company_id);
                                    }
                                ?></td>
                                <td class="text-center">
                                    <a href="<?php $edit_comp = home_url('/')."edit-company/?company_id=".$td_result_company[$key]; echo $edit_comp; ?>"><i class="fa fa-pencil-square-o"></i></a>
                                    <a onclick='return confirm("Bạn có chắc chắn xoá hồ sơ này?")' class="delete_post" id="<?php echo $td_result_company[$key];?>" href='#'><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box-company">
                        <div class="add-company">
                            <h1 class="text-left ac-title"><a href=""><i class="fa fa-suitcase"></i>Tuyển dụng</a></h1>
                            <?php
                            global  $current_user;
                            $account_vip = get_user_meta( $current_user->ID, 'vip_package_id', true);
                            $user_daily_max_post=get_user_meta($current_user->ID, 'user_daily_max_post',true);
                            $user_monthly_max_post=get_user_meta($current_user->ID, 'user_monthly_max_post',true);
                            $today = date('Y-m-d');
                            $month= date('m');
                            $count_job_day = $wpdb->get_var( "SELECT COUNT(*) FROM `{$wpdb->prefix}posts` WHERE post_type = 'job' and (post_status = 'publish' or post_status = 'draft' or post_status = 'pending') and post_author = '".$td_user_id."' and post_date >='".$today."'")?:0;
                            $count_job_monthly = $wpdb->get_var( "SELECT COUNT(*) FROM `{$wpdb->prefix}posts` WHERE post_type = 'job' and (post_status = 'publish' or post_status = 'draft' or post_status = 'pending') and post_author = '".$td_user_id."' and post_date >='".$month."'")?:0;
                            //                                            if (current_user_can('administrator')){
                            //                                                echo $count_job_monthly;
                            //
                            //                            }
                            if($account_vip==16)
                            {
                            $account_vip="";
                            }
                            $count_job=$total_jobs;
                            if($account_vip==""){
                            if($count_job >3  && current_user_can('subscriber'))
                            {
                            ?>
                            <a class="text-r"  onclick="Function_user_vip()" href="#"><i class="fa fa-plus-circle"></i><?php _e( 'Đăng tin tuyển dụng', 'themesdojo' ); ?></a>
                            <?php
                            }else{
                            ?>
                            <a  class="text-r"  href="<?php $new_job = home_url('/')."dang-tin-tuyen-dung"; echo $new_job; ?>"><i class="fa fa-plus-circle"></i><?php _e( 'Đăng tin tuyển dụng', 'themesdojo' ); ?></a>
                            <?php
                            }}
                            if($account_vip!=""){
                            if($count_job_day >=$user_daily_max_post)
                            {
                            ?>
                            <a  class="text-r"  onclick="Function_user_up_date()" href="#"><i class="fa fa-plus-circle"></i><?php _e( 'Đăng tin tuyển dụng', 'themesdojo' ); ?></a>
                            <?php
                            }
                            else if($count_job_monthly >= $user_monthly_max_post)
                            {
                            ?>
                            <a  class="text-r"  onclick="Function_user_up_monthly()" href="#"><i class="fa fa-plus-circle"></i><?php _e( 'Đăng tin tuyển dụng', 'themesdojo' ); ?></a>
                            <?php
                            }
                            else{
                            ?>
                            <a  class="text-r"  href="<?php $new_job = home_url('/')."dang-tin-tuyen-dung"; echo $new_job; ?>"><i class="fa fa-plus-circle"></i><?php _e( 'Đăng tin tuyển dụng', 'themesdojo' ); ?></a>
                            <?php
                            }
                            }
                            ?>
                        </div>
                    </div>
                    <table class="table  box-table">
                        <thead>
                            <tr class="bkground">
                                <th  style="width: 350px;">Tiêu đề</th>
                                <th class="text-center"></th>
                                <th class="text-center">Thời gian</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center">Lượt xem</th>
                                <th class="text-center">Công cụ tùy chỉnh</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $job_id = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}posts` WHERE post_type = 'job' and (post_status = 'publish' or post_status = 'draft' or post_status = 'pending') and post_author = '".$td_user_id."' ORDER BY `ID` DESC");
                            foreach ($job_id as $key => $value) {
                            $td_result_job[] = $value->ID;
                            $td_result_job_date[] = $value->post_date;
                            $td_result_job_status[] = $value->post_status;
                            $wpjobus_job_fullname = esc_attr(get_post_meta($td_result_job[$key], 'wpjobus_job_fullname', true));
                            $td_job_company = esc_attr(get_post_meta($td_result_job[$key], 'job_company', true));
                            $wpjobus_company_fullname = esc_attr(get_post_meta($td_job_company, 'wpjobus_company_fullname', true));
                            $job_id = $td_result_job[$key];
                            if(get_post_status($td_result_job[$key]) == 'pending') {
                            $status="Đang chờ xét duyệt";
                            }
                            if(get_post_status($td_result_job[$key]) == 'draft') {
                            $status="Bản nháp";
                            }
                            if(get_post_status($td_result_job[$key]) == 'publish') {
                            $status="Đang đăng công khai";
                            }
                            ?>
                            <tr id="row-<?php echo $td_result_job[$key]; ?>">
                                <td>
                                    <?php
                                    if(get_post_status($td_result_job[$key]) == 'publish') {
                                    echo "<a href='".get_permalink($td_result_job[$key])."'>". $wpjobus_job_fullname."(".$status.")". "</a>";
                                    }
                                    else{
                                    echo $wpjobus_job_fullname."(".$status.")";
                                    }
                                    ?>
                                </td>
                                <td class="text-center"></td>
                                <td class="text-center"><?php echo sw_human_time_diff($td_result_job[$key]);?></td>
                                <td class="text-center"><?php echo $status; ?></td>
                                <td class="text-center"> <?php
                                    if (wpb_get_post_views($td_result_job[$key]) == 0) {
                                    echo '1';
                                    } else {
                                    echo wpb_get_post_views($td_result_job[$key]);
                                    }
                                ?></td>
                                <td class="text-center">
                                    <a href="<?php $edit_job = home_url('/')."edit-job/?job_id=".$td_result_job[$key]; echo $edit_job; ?>"><i class="fa fa-pencil-square-o"></i></a>
                                    <a onclick='return confirm("Bạn có chắc muốn xoá tin đăng này?")'  class="delete_post" id="<?php echo $td_result_job[$key];?>" href='#'><i class="fa fa-trash-o"></i></a>
                                    <?php
                                    global $wpdb,$current_user;
                                    $crb_wp2es_up = $wpdb->get_var("SELECT * FROM crb_wp2es WHERE post_id = '$td_result_job[$key]' AND uid= '$current_user->ID' AND sync_type ='up'");
                                    $crb_wp2es_vip = $wpdb->get_var("SELECT * FROM crb_wp2es WHERE post_id = '$td_result_job[$key]' AND uid= '$current_user->ID' AND sync_type ='edit'");
                                    $date_expierd_up = get_user_meta($current_user->ID, 'user_up_expire', true);
                                    $count_up = get_user_meta($current_user->ID, 'user_up_count', true);
                                    if($date_expierd_up =="" || $count_up <=0)
                                    {
                                    ?>
                                    <a onclick='Function_up()' href='javascript:add_up();' data-toggle="tooltip" title="up tin ưu tiên!"><i class="fa fa-eye"></i></a>
                                    <?php
                                    }
                                    else
                                    {if($crb_wp2es_up >0)
                                    {
                                    ?>
                                    <a href="#" data-toggle="tooltip" title="up tin ưu tiên!">Tin Up</i></a>
                                    <?php
                                    }
                                    else  if($count_up > 0)
                                    {
                                    ?>
                                    <a onclick='return confirm("Bạn có chắc chắn muốn up tin <?php echo $wpjobus_job_fullname ?>")' href='<?php home_url("/")?>my-account/?up=<?php echo $postid; ?>' data-toggle="tooltip" title="up tin ưu tiên!"><i class="fa fa-eye"></i></a>
                                    <?php
                                    }}
                                    global $current_user;
                                    $vip_star = get_post_meta($td_result_job[$key], 'vip_star', true);
                                    $post_vip_star = get_user_meta($current_user->ID, 'star_package_id', true);
                                    if($vip_star =="")
                                    {
                                    if($post_vip_star !="")
                                    {
                                    ?>
                                    <a onclick='return confirm("Bạn có chắc chắn muốn cấp tin đặc biệt cho tin đăng  <?php echo $wpjobus_job_fullname ?>")' href='<?php echo home_url('/') ?>my-account?vip=<?php echo $td_result_job[$key]; ?>' data-toggle="tooltip" title="Up tin đặc biệt!"><i class="fa fa-star-o"></i></a>
                                    <?php
                                    }
                                    else{
                                    ?>
                                    <a  onclick='Function_star()' href='#' data-toggle="tooltip" title="Up tin đặc biệt!"><i class="fa fa-star-o"></i></a>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    }
                                    else{
                                    ?>
                                    <a href="#" data-toggle="tooltip" title="Up tin đặc biệt!">Tin VIP</a>
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
            }
            ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box-company">
                        <div class="add-company">
                            <h1 class="text-left ac-title"><a href=""><i class="fa fa-suitcase"></i>Yêu thích</a></h1>
                        </div>
                    </div>
                    <table class="table  box-table">
                        <thead>
                            <tr class="bkground">
                                <th class="text-center">Tiêu đề</th>
                                <th class="text-center">Loại</th>
                                <th class="text-center"></th>
                                <th class="text-center">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            global $wpdb;
                            $listing_id = $wpdb->get_results( "SELECT * FROM wpjobus_favorites WHERE user_id = '".$td_user_id."' ORDER BY `ID` DESC");
                            foreach ($listing_id as $key => $value) {
                            $td_result_listing[] = $value->listing_id;
                            $listing_id = $td_result_listing[$key];
                            $listing_type = $value->listing_type;
                            if ($listing_type == "job") {
                            $type = "việc làm";
                            }
                            if ($listing_type == "resume") {
                            $type = "ứng viên";
                            }
                            if ($listing_type == "company") {
                            $type = "doanh nghiệp";
                            }
                            $listing_fullname = esc_attr(get_post_meta($listing_id, 'wpjobus_' . $listing_type . '_fullname', true));
                            ?>
                            <?php if (get_post_status($listing_id) == 'publish') { ?>
                            <tr id="row-<?php echo $listing_id;?>">
                                <td class="text-center"><a href="<?php $listinglink =get_permalink($listing_id); echo $listinglink; ?>"><?php echo $listing_fullname; ?></a></td>
                                <td class="text-center"><?php echo $type;?></td>
                                <td class="text-center"></td>
                                <td class="text-center"><a href="#"  class="delete_post" id="<?php echo $listing_id;?>"><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                            <?php
                            }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    function validateEmail(email)
    {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
    }
    jQuery(document).ready(function($) {
    $("#update_account").click(function() {
    var email = $("#email_account").val();
    var pass = $("#pass_acc").val();
    var re_pass = $("#re_pass_acc").val();
    if( email !="" && !validateEmail(email))
    {
    $('#err_email').text("Email không đúng vui lòng nhập lại.")
    return false;
    }
    if(pass!="" && pass.length <6)
    {
    $('#err_pass').text("Mật khẩu của bạn phải trên 6 ký tự.")
    return false;
    }
    if(re_pass!="" && re_pass.length <6)
    {
    $('#err_re_pass').text("Mật khẩu của bạn phải trên 6 ký tự.")
    return false;
    }
    if( re_pass!="" && pass!="" && pass != re_pass)
    {
    $('#err_re_pass').text("Mật khẩu không trùng nhau.")
    return false;
    }
    });
    });
    </script>
    <script>
    function Function_star() {
    swal({
    title: 'Gói tin đặc biệt',
    text: "Hãy mua gói UP tin đặc biệt của chúng tôi để nâng cấp tin đăng của bạn.",
    type: 'info',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Chấp nhận',
    cancelButtonText: 'Bỏ qua',
    confirmButtonClass: 'btn btn-success',
    cancelButtonClass: 'btn btn-danger',
    buttonsStyling: false
    }).then(function () {
    $("#menu4").addClass('active');
    $("#menu4").addClass('in');
    $("#menu4").show();
    }, function (dismiss) {
    if (dismiss === 'cancel') {
    return false;
    }
    })
    }
    </script>
    <script>
    function Function_up() {
    swal({
    title: 'Gói UP tin',
    text: "Hãy lựa chọn các gói UP tin của chúng tôi để nâng cấp tin đăng của bạn.",
    type: 'info',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Chấp nhận',
    cancelButtonText: 'Bỏ qua',
    confirmButtonClass: 'btn btn-success',
    cancelButtonClass: 'btn btn-danger',
    buttonsStyling: false
    }).then(function () {
    $("#menu3").addClass('active');
    $("#menu3").addClass('in');
    $("#menu3").show();
    }, function (dismiss) {
    if (dismiss === 'cancel') {
    return false;
    }
    })
    }
    function Function_user_vip() {
    swal({
    title: 'Lượt đăng 3 tin miễn phí của bạn đã hết.',
    text: "Hãy đăng ký các gói tài khoản VIP của chúng tôi để tiếp tục đăng tin.",
    type: 'info',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Chấp nhận',
    cancelButtonText: 'Bỏ qua',
    confirmButtonClass: 'btn btn-success',
    cancelButtonClass: 'btn btn-danger',
    buttonsStyling: false
    }).then(function () {
    $("#menu2").addClass('active');
    $("#menu2").addClass('in');
    $("#menu2").show();
    }, function (dismiss) {
    if (dismiss === 'cancel') {
    return false;
    }
    })
    }
    function Function_user_up_date() {
    swal({
    title: 'Lượt đăng <?php echo $user_daily_max_post; ?> tin trong ngày đã hết.',
    text: "Vui lòng đăng tin vào ngày hôm sau.",
    type: 'info',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Chấp nhận',
    cancelButtonText: 'Bỏ qua',
    confirmButtonClass: 'btn btn-success',
    cancelButtonClass: 'btn btn-danger',
    buttonsStyling: false
    }).then(function () {
    //                $(".resume-skills").addClass('openSubscriptions');
    //                $("#show_user_package").show();
    }, function (dismiss) {
    if (dismiss === 'cancel') {
    return false;
    }
    })
    }
    function Function_user_up_monthly() {
    swal({
    title: 'Lượt đăng <?php echo $user_monthly_max_post_max_post; ?> tin trong tháng đã hết.',
    text: "Hãy đăng ký các gói tài khoản VIP của chúng tôi để tiếp tục đăng tin.",
    type: 'info',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Chấp nhận',
    cancelButtonText: 'Bỏ qua',
    confirmButtonClass: 'btn btn-success',
    cancelButtonClass: 'btn btn-danger',
    buttonsStyling: false
    }).then(function () {
    $("#menu2").addClass('active');
    $("#menu2").addClass('in');
    $("#menu2").show();
    }, function (dismiss) {
    if (dismiss === 'cancel') {
    return false;
    }
    })
    }
    </script>
    <?php
    $user_account_type = get_user_meta( $current_user->ID, 'account_type', true );
    $time = current_time( 'timestamp' );
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    $check_resume_award = $wpdb->get_var( 'SELECT id FROM crb_resume_award WHERE user_id ='.$current_user->ID.' ' );
    if (current_user_can('subscriber')) {
    if (empty($check_resume_award) && $user_account_type == "job-seeker") {
    $wpdb->insert(
    'crb_resume_award',
    array(
    'user_id' => $current_user->ID,
    'sign_time' => $time,
    'ip' => $ip
    )
    );
    $resume_award_id = $wpdb->insert_id;
    ?>
    <script>
    jQuery(document).ready(function($) {
    swal({
    title: 'Cập nhật hồ sơ nhận iPhone7',
    html: $('<div>')
        .addClass('some-class')
        .text('Chúc mừng bạn đã nhận được mã số dự thưởng trúng iPhone7. Hãy nhanh tay cập nhật hồ sơ ứng viên của bạn ngay hôm nay để hoàn tất quá trình đăng ký. Mã số bốc thăm của bạn là <?php echo $resume_award_id ;?>.'),
        animation: false,
        customClass: 'animated tada'
        })
        });
        </script>
        <?php
        }
        }
        require get_template_directory() . '/inc/function_vip.php';