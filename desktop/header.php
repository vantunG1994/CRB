<?php
global $wpdb;
$job_field=$wpdb->get_results('select * from job_field LIMIT 16 ');
global $mvl_stats;
?>
<style>
.searchwp-live-search-result p {
padding: 5px;
border-bottom: solid 1px gainsboro;
}
.listting_job .logo img, .listting_company .logo img  {
padding-left: 5px;
}
ul.sub-menu-pack{
text-align: left;
position: absolute;
top: 100%;
z-index: 1000;
min-width: 75px;
list-style: none;
font-size: 13px;
float: none;
padding:10px;
margin-left: 48%;
-webkit-box-shadow: none;
box-shadow: none;
border: 0;
border-radius: 0;
background: 0 0;
display: none;
background: #2a6496;
border-top: 1px solid rgba(0,0,0,.1);
border-bottom-left-radius: 2px;
border-bottom-right-radius: 2px;
}
#show-menu-package:hover ul {display: block !important;}
</style>
<div class="header-top">
    <div class="container">
        <div class="row">
            <div class=" col-xs-6 text-left">
                <a href="<?php echo home_url();?>/tuyen-dung"><span><?php echo $mvl_stats['total_job'];?> Việc làm</span></a>
                <span>|</span>
                <a href="<?php echo home_url();?>/ung-vien"><span><?php echo $mvl_stats['total_resume'];?> Ứng viên</span></a>
                <a href="<?php echo home_url();?>/ho-so-doanh-nghiep"><span>| <?php echo $mvl_stats['total_employer'];?> Doanh nghiệp</span></a>
            </div>
            <?php if ( is_user_logged_in() ) {
            global $current_user;
            $current_user =  wp_get_current_user();
            $user_id= $current_user->user_login ;
            $balance = get_user_meta($current_user->ID, 'user_cash', true);
            $user_gift_cash = get_user_meta($current_user->ID, 'user_gift_cash', true);
            global $current_user;
            $td_user_id = $current_user->ID;
            global $wpdb;
            $vip_package_id = get_user_meta($current_user->ID, 'vip_package_id', true);
            $package_id_up = get_user_meta($current_user->ID, 'up_package_id', true);
            $user_vip = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'user_vip' AND package_id='$vip_package_id'");
            $post_vip = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'vip_job'");
            $post_up = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'up' AND package_id='$package_id_up'");
            foreach ( $user_vip as $package )
            {
            if($package->package_id==$vip_package_id)
            {
            $name_vip=$package->name;
            }
            }
            foreach ( $post_up as $package_up )
            {
            if($package_up->package_id==$package_id_up)
            {
            $name_up=$package_up->name;
            }
            }
            $up_expire = get_user_meta($current_user->ID, 'user_up_expire', true);
            $date_expierd = get_user_meta($current_user->ID, 'vip_expire', true);
            $count_up = get_user_meta($current_user->ID, 'user_up_count', true);
            $balance = get_user_meta($current_user->ID, 'user_cash', true);
            $user_gift_cash = get_user_meta($current_user->ID, 'user_gift_cash', true);
            $view_cv = get_user_meta($current_user->ID, 'user_cv_view_count', true);
            $count_day = get_user_meta($current_user->ID, 'user_daily_max_post', true);
            $count_month = get_user_meta($current_user->ID, 'user_monthly_max_post', true);
            $count_up = get_user_meta($current_user->ID, 'user_up_count', true);
            $package_id_vip = get_user_meta($current_user->ID, 'star_package_id', true);
            }
            ?>
            <div class=" col-xs-6 text-right">
                <?php  if ( !is_user_logged_in() ) {
                ?>
                <a href="<?php echo home_url(); ?>/login">Đăng nhập</a>
                <span>|</span>
                <a href="<?php echo home_url(); ?>/register">Đăng ký</a>
                <?php
                }
                else
                {
                global $current_user;
                $current_user =  wp_get_current_user();
                $user_id= $current_user->user_login ;
                $balance = get_user_meta($current_user->ID, 'user_cash', true);
                $user_gift_cash = get_user_meta($current_user->ID, 'user_gift_cash', true);
                global $current_user;
                $td_user_id = $current_user->ID;
                global $wpdb;
                $vip_package_id = get_user_meta($current_user->ID, 'vip_package_id', true);
                $package_id_up = get_user_meta($current_user->ID, 'up_package_id', true);
                $user_vip = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'user_vip' AND package_id='$vip_package_id'");
                $post_vip = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'vip_job'");
                $post_up = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'up' AND package_id='$package_id_up'");
                foreach ( $user_vip as $package )
                {
                if($package->package_id==$vip_package_id)
                {
                $name_vip=$package->name;
                }
                }
                foreach ( $post_up as $package_up )
                {
                if($package_up->package_id==$package_id_up)
                {
                $name_up=$package_up->name;
                }
                }
                $up_expire = get_user_meta($current_user->ID, 'user_up_expire', true);
                $date_expierd = get_user_meta($current_user->ID, 'vip_expire', true);
                $count_up = get_user_meta($current_user->ID, 'user_up_count', true);
                $balance = get_user_meta($current_user->ID, 'user_cash', true);
                $user_gift_cash = get_user_meta($current_user->ID, 'user_gift_cash', true);
                $view_cv = get_user_meta($current_user->ID, 'user_cv_view_count', true);
                $count_day = get_user_meta($current_user->ID, 'user_daily_max_post', true);
                $count_month = get_user_meta($current_user->ID, 'user_monthly_max_post', true);
                $count_up = get_user_meta($current_user->ID, 'user_up_count', true);
                $package_id_vip = get_user_meta($current_user->ID, 'star_package_id', true);
                ?>
                <?php
                if ($date_expierd != "" || $up_expire != "" || $package_id_vip != "") {
                ?>
                <img id="show-menu-package" style="" src="<?php echo home_url();?>/wp-content/themes/mangvieclam789/images/sao_1.png "> <?php
                if ($package_id_vip != "") {
                $name_post_vip = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE package_id = '$package_id_vip' ");
                $checked = "Bạn đang sở hữu gói " . $name_post_vip[0]->name;
                } else {
                $checked = "";
                }
                ?>
                <ul class="sub-menu-pack">
                    <?php
                    if ($date_expierd != "") {
                    ?>
                    <li><a href="#">Gói VIP sở hữu: <?php echo $name_vip; ?></a></li>
                    <li><a href="#">Thời hạn gói User Vip: <?php echo $date_expierd; ?></a></li>
                    <?php
                    if ($view_cv != "") {
                    ?>
                    <li><a href="#">Lượt xem hồ sơ còn lại: <?php echo $view_cv; ?> lượt</a>
                </li>
                <?php } ?>
                <?php
                if ($count_day != "") {
                ?>
                <li><a href="#">Lượt đăng tin trong ngày: <?php echo $count_day; ?> lượt</a>
            </li>
            <li><a href="#">Lượt đăng tin trong tháng: <?php echo $count_month; ?>
            lượt</a></li>
            <?php
            }
            }
            ?>
            <?php
            if ($up_expire != "") {
            ?>
            <li><a href="#">Gói Up tin sở hữu: <?php echo $name_up; ?></a></li>
            <li><a href="#">Thời hạn gói UP tin: <?php echo $up_expire; ?></a></li>
            <li><a href="#">Lượt Up tin còn lại: <?php echo $count_up; ?> lượt</a></li>
            <?php
            }
            if ($package_id_vip != "") {
            ?>
            <li><a href="#"><?php echo $checked; ?></a></li>
            <?php
            }
            ?>
        </ul>
        <script>
        jQuery(document).ready(function($) {
        jQuery("#show-menu-package").mouseover(function() {
        jQuery(".sub-menu-pack").show();
        });
        jQuery(".sub-menu-pack").mouseleave(function() {
        jQuery(".sub-menu-pack").hide();
        });
        });
        </script>
        <?php
        }
        ?>
        <a href="<?php echo home_url(); ?>/my-account">Tài khoản</a>
        <span>|</span>
        <a href="<?php echo wp_logout_url(get_option('siteurl')); ?>">Đăng xuất</a>
        <?php
        }
        ?>
    </div>
</div>
</div>
</div>
<div class="wrap-header">
<div class="container">
<div class="row header">
    <div class="col-md-3">
        <div class="logo">
            <a href="<?php echo home_url();?>"><img src="<?php echo get_template_directory_uri();?>/mobile/asset/images/logo-mvl.png" alt=""></a>
        </div>
    </div>
    
    <div class="col-md-6">
        <form action="<?php echo home_url();?>/tim-kiem" method="get" class="form-search">
            <div class="input-group">
                <input type="text" name="search" class="form-control" id="search_fulltext" placeholder="Tìm Kiếm Nhanh">
                <span class="input-group-btn">
                    <button class="btn btn-default btn-search" type="submit"><i class="fa fa-search"></i></button>
                </span>
            </div>
            <!-- /input-group -->
        </form>
        <div class="searchwp-live-search-result" style=" background-color: whitesmoke;position: absolute;z-index: 2;width: 68%;"></div>
    </div>
    
    <div class="col-md-3">
        <div class="wrap-right1">
            <ul>
                <li><a href="" class="btn btn-primary"><?php printf( __( 'Đăng tin', 'themesdojo' )); ?> <i class="fa fa-plus-circle"></i></a>
                <ul class="sub--">
                    <?php if ( !is_user_logged_in() ) { ?>
                    <li><a href="<?php echo home_url();?>/dang-tin-tuyen-dung"><i class="fa fa-bullhorn"></i>  Tuyển dụng</a></li>
                    <li><a href="<?php echo home_url();?>/them-ho-so-ca-nhan/"><i class="fa fa-file-text-o"></i>  Hồ sơ</a></li>
                    <?php  }
                    else {
                    global $current_user;
                    $key = 'account_type';
                    $single = true;
                    $td_user_id = $current_user->ID;
                    $user_account_type = get_user_meta( $td_user_id, $key, $single );
                    // var_dump($user_account_type);
                    if($user_account_type == "job-seeker") { ?>
                    <li><a href="<?php echo home_url();?>/them-ho-so-ca-nhan/"><i class="fa fa-file-text-o"></i>  Hồ sơ</a></li>
                    <?php }
                    else { ?>
                    <li><a href="<?php echo home_url();?>/dang-tin-tuyen-dung"><i class="fa fa-bullhorn"></i>  Tuyển dụng</a></li>
                    <?php }
                    ?>
                    <?php   }
                    ?>
                </ul>
            </li>
        </ul>
    </div>
</div>
</div>
<div class="main-menu">
<ul class="menu">
    <li><a href="<?php echo home_url();?>"><i class="fa fa-home" aria-hidden="true"></i>Trang Chủ</a></li>
    <li>
        <a href="<?php echo home_url();?>/ung-vien/"><i class="fa fa-file-text-o"></i>ứng viên <i class="fa fa-chevron-down"></i></a>
        <ul class="sub-menu">
            <?php
            foreach ($job_field as $industry) {
            ?>
            <li class="item-sub"><a href="<?php echo home_url(); ?>/ung-vien-theo-nganh-nghe/<?php echo $industry->slug ?>"><?php echo $industry->name ?></a></li>
            <?php
            }
            ?>
            <li class="item-sub sub-all"><a href="<?php echo home_url();?>/ung-vien/">Xem tất cả</a></li>
            
        </ul>
    </li>
    <li>
        <a href="<?php echo home_url();?>/tuyen-dung/"><i class="fa fa-bullhorn"></i>Tuyển Dụng <i class="fa fa-chevron-down"></i></a>
        <ul class="sub-menu">
            <?php
            foreach ($job_field as $industry){
            ?>
            <li class="item-sub"><a href="<?php echo home_url();?>/nganh-nghe-tuyen-dung/<?php echo $industry->slug ?>"><?php echo $industry->name ?></a></li>
            <?php
            }
            ?>
            <li class="item-sub sub-all"><a href="<?php echo home_url();?>/tuyen-dung/">Xem tất cả</a></li>
            
        </ul>
    </li>
    <li><a href="<?php echo home_url();?>/ho-so-doanh-nghiep/"><i class="fa fa-briefcase" aria-hidden="true"></i>doanh nghiệp</a></li>
    <li class="blog-content">
        <a href="<?php echo home_url();?>/c/ket-noi-su-nghiep/"><i class="fa fa-bullhorn"></i>kết nối sự nghiệp <i class="fa fa-chevron-down"></i></a>
        <ul class="sub-menu sub-menu-1 menu-blog">
            <li class="item-sub menu-blog-content">
                <a href="<?php echo home_url();?>/c/ket-noi-su-nghiep/cam-nang-viec-lam/">Cẩm Nang Việc Làm</a>
            <ul class="sub-menu1">
                <li class="item-sub menu-blog-content"><a href="<?php echo home_url();?>/c/ket-noi-su-nghiep/cam-nang-viec-lam/bi-quyet-tim-viec/">Bí Quyết Tìm Việc</a></li>
                <li class="item-sub menu-blog-content"><a href="<?php echo home_url();?>/c/ket-noi-su-nghiep/cam-nang-tuyen-dung/quan-ly-nhan-su/">Quản Lý Nhân Sự</a></li>
                <li class="item-sub menu-blog-content"><a href="<?php echo home_url();?>/c/ket-noi-su-nghiep/cam-nang-viec-lam/phong-van-xin-viec/">Phỏng Vấn Xin Việc</a></li>
                
            </ul>
        </li>
        <li class="item-sub menu-blog-content"><a href="<?php echo home_url();?>/c/ket-noi-su-nghiep/cam-nang-tuyen-dung/">Cẩm Nang Tuyển Dụng</a>
            <ul class="sub-menu2">
                <li class="item-sub menu-blog-content"><a href="<?php echo home_url();?>/c/ket-noi-su-nghiep/cam-nang-viec-lam/kinh-nghiem-tim-viec/">Kinh Nghiệm Tìm Việc</a></li>
                <li class="item-sub menu-blog-content"><a href="<?php echo home_url();?>/c/ket-noi-su-nghiep/cam-nang-tuyen-dung/bi-quyet/">Bí Quyết Tuyển Dụng</a></li>
                
            </ul>
    </li>
</ul>
</li>
<li><a href="<?php echo home_url();?>/bang-gia/"><i class="fa fa-file-text-o"></i>Bảng giá</a></li>
<li><a href="<?php echo home_url();?>/du-tinh-luong"><i class="fa fa-file-text-o"></i>Dự tính lương</a></li>
</ul>
</div>
</div>
</div>