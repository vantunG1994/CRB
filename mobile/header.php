<?php
global $wpdb,$wp2es,$current_user;
$cond_job=array('post_status'=>'publish','post_type'=>'job');
$order_count=array('up_at'=>'desc','post_modified'=>'desc');
$limit_count=array('size'=>8,'page'=>2);
$result_job = $wp2es->and_simple_search($cond_job,$order_count,$limit_count);
$td_total_job = $result_job["0"]["es_total_result"];
$cond_resume=array('post_status'=>'publish','post_type'=>'resume');
$order_count_resume=array('up_at'=>'desc','post_modified'=>'desc');
$limit_count_resume=array('size'=>8,'page'=>1);
$result_resume = $wp2es->and_simple_search($cond_resume,$order_count_resume,$limit_count_resume);
$td_total_resume = $result_resume["0"]["es_total_result"];
$cond_company=array('post_status'=>'publish','post_type'=>'company');
$order_count_company=array('up_at'=>'desc','post_modified'=>'desc');
$limit_count_company=array('size'=>8,'page'=>1);
$result_company = $wp2es->and_simple_search($cond_company,$order_count_company,$limit_count_company);
$td_total_company = $result_company["0"]["es_total_result"];
$count_posts = wp_count_posts();
$published_posts = $count_posts->publish;
$job_field=$wpdb->get_results('select * from job_field LIMIT 7');
?>
<style>
.searchwp-live-search-result p {
padding-left: 5px;
padding-right: 5px;
border-bottom: solid 1px gainsboro;
line-height: 30px;
}
li.service-links-twitter-widget.first iframe {
z-index: 2;
}

/*span.select2-dropdown.select2-dropdown--below {
    width: 180px !important;
}*/
</style>
<div id="wapper-menu" class="wrap-header clearfix">
  <div class="box-menu">
    <a id="nav_icon">
      <span class="fa fa-bars ac"></span>
    </a>
    <div class="logo_yuna"><a href="<?php echo home_url(); ?>">
    <img src="<?php echo get_template_directory_uri();?>/mobile/asset/images/logo-mvl.png" alt="Logo"></a>
  </div>
  <div class="search-mb">
    <i class="fa fa-search"></i>
  </div>
  <div class="search-input">
    <form method="" action="">
      <input type="text" name="" id="search_fulltext" placeholder="Nhập từ khóa bạn muốn tìm">
    </form>
    <div class="searchwp-live-search-result" style=" background-color: whitesmoke;position: absolute;z-index: 2;width:100%;"></div>
  </div>
  
  <div class="button-news">
    <input type="radio" id="show-news" name="group">
    <input type="radio" id="hide-news" name="group" checked>
    <label for="hide-news" class="hide-news"></label>
    <label for="show-news" class="show-news">
    </label>
  </div>
  <style>
  
  input#show-news:checked ~ .show-news:before {
  content: ""
  }
  input#show-news:checked ~ .hide-news:before {
  content: "×";
  font-size: 56px;
  line-height: 37px;
  color: #FF9800;
  }
  label.show-news {
  margin-top: -12px !important;
  }
  input#hide-news:checked ~ .hide-news:before {
  content: ""
  }
  input#hide-news:checked ~ .show-news:before {
  content:"Mới nhất \f0d7";
  font-family: FontAwesome;
  font-style: normal;
  font-weight: normal;
  text-decoration: inherit;
  font-size: 18px;
  }
  @media only screen and (max-width: 320px) {
  input#hide-news:checked ~ .show-news:before {
  content:"Mới nhất \f0d7";
  font-family: FontAwesome;
  font-style: normal;
  font-weight: normal;
  text-decoration: inherit;
  font-size: 15px;
  }
  .button-news {
  width: 18%;
  text-align: center;
  margin-right: 14px !important;
  }
  
  }
  </style>
</div>
<nav>
  
  <?php
  // $LstMenu = array('item_1' =>
  // array(
  // 'title' => 'Ứng Viên',
  // 'icon'  => 'fa fa-users',
  // 'count' => '979,678 hồ sơ',
  // ),
  // );
  ?>
  <ul class="nav-menu clearfix">
    <li class="no-child login_m">
      <?php             if ( !is_user_logged_in() ) {
      ?>
      <a class="dangnhap" rel="nofollow" href="<?php echo home_url(); ?>/login/">Đăng nhập</a>
      <a class="dangky" rel="nofollow" href="<?php echo home_url(); ?>/register">Đăng ký</a>
      <?php
      }
      else{
      ?>
      <a class="dangnhap" rel="nofollow" href="<?php echo home_url(); ?>/my-account">Tài khoản</a>
      <a class="dangky" rel="nofollow" href="<?php echo wp_logout_url(get_option('siteurl')); ?>">Đăng xuất</a>
      <?php
      }
      ?>
    </li>
    <?php
    $date_expierd = get_user_meta($current_user->ID, 'vip_expire', true);
    $count_up = get_user_meta($current_user->ID, 'user_up_count', true);
    $balance = get_user_meta($current_user->ID, 'user_cash', true);
    $user_gift_cash = get_user_meta($current_user->ID, 'user_gift_cash', true);
    $view_cv = get_user_meta($current_user->ID, 'user_cv_view_count', true);
    $count_day = get_user_meta($current_user->ID, 'user_daily_max_post', true);
    $count_month = get_user_meta($current_user->ID, 'user_monthly_max_post', true);
    $up_expire = get_user_meta($current_user->ID, 'user_up_expire', true);
    $package_id_up = get_user_meta($current_user->ID, 'up_package_id', true);
    $post_up = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'up' AND package_id='$package_id_up'");
    foreach ( $post_up as $package_up )
    {
    if($package_up->package_id==$package_id_up)
    {
    $name_up=$package_up->name;
    }
    }
    $up_expire = get_user_meta($current_user->ID, 'user_up_expire', true);
    $count_up = get_user_meta($current_user->ID, 'user_up_count', true);
    ?>
    <?php
    if($date_expierd !=""){
    ?>
    <li class="item-child">
      <a style="padding-top: 15px; padding-bottom: 16px;"><img style="width: 20px;" src="<?php echo home_url();?>/wp-content/themes/mangvieclam789/images/sao_1.png "> Gói VIP sở hữu</a>
      <span class="down-icon"></span>
      <ul class="sub-item">
        <li>
          <a class="sub-title" href="<?php echo home_url(); ?>/my-account" title="Tin Mạng Việc Làm">Ngày hết hạn VIP</a>
          <a class="sub-total" href="<?php echo home_url(); ?>/my-account"><?php echo $date_expierd ?></a>
        </li>
        <?php
        if($view_cv !=""){
        ?>
        <li>
          <a class="sub-title" href="<?php echo home_url(); ?>/my-account" title="Lượt xem hồ sơ">Lượt xem hồ sơ</a>
          <a class="sub-total" href="<?php echo home_url(); ?>/my-account"><?php echo $view_cv ?> lượt</a>
        </li>
        <?php }?>
        <?php
        if($count_day !=""){
        ?>
        <li>
          <a class="sub-title" href="<?php echo home_url(); ?>/my-account" title="Lượt xem hồ sơ">Lượt đăng tin</a>
          <a class="sub-total" href="<?php echo home_url(); ?>/my-account"><?php echo $count_day ?> lượt/ngày</a>
        </li>
        <?php }?>
        <?php
        if($view_cv !=""){
        ?>
        <li>
          <a class="sub-title" href="<?php echo home_url(); ?>/my-account" title="Lượt xem hồ sơ">Lượt đăng tin</a>
          <a class="sub-total" href="<?php echo home_url(); ?>/my-account"><?php echo $count_month; ?> lượt/tháng</a>
        </li>
        <?php }?>
        <?php
        if($up_expire !=""){
        ?>
        <li>
          <a class="sub-title" href="<?php echo home_url(); ?>/my-account" title="Lượt xem hồ sơ">Lượt UP tin</a>
          <a class="sub-total" href="<?php echo home_url(); ?>/my-account"><?php echo $count_up; ?> lượt</a>
        </li>
        <li>
          <a class="sub-title" href="<?php echo home_url(); ?>/my-account" title="Lượt xem hồ sơ">Thời hạn UP tin</a>
          <a class="sub-total" href="<?php echo home_url(); ?>/my-account"><?php echo $up_expire; ?></a>
        </li>
        <?php }?>
      </ul>
    </li>
    <?php }?>
    <li class="item-child">
      <a href="<?php echo home_url(); ?>/ung-vien/" class="title"><i class="fa fa-users icon"></i>Ứng viên</a>
      <a href="<?php echo home_url(); ?>/ung-vien/" class="total"><?php echo number_format($td_total_resume ,0,0,'.'); ?> hồ sơ</a>
      <span class="down-icon"></span>
      <ul class="sub-item">
        <?php
        foreach ($job_field as $industry) {
        $cond_job=array('post_status'=>'publish','post_type'=>'resume','resume_industry'=>$industry->name);
        $order_count=array('up_at'=>'desc','post_modified'=>'desc');
        $limit_count=array('size'=>1,'page'=>1);
        $result_job = $wp2es->and_simple_search($cond_job,$order_count,$limit_count);
        $td_total_job_type = $result_job["0"]["es_total_result"];
        ?>
        <li>
          <a class="sub-title" href="<?php echo home_url(); ?>/ung-vien-theo-nganh-nghe/<?php echo $industry->slug ?>" title=""><?php echo $industry->name ?></a>
          <a class="sub-total" href="<?php echo home_url(); ?>/ung-vien-theo-nganh-nghe/<?php echo $industry->slug ?>"><?php echo number_format($td_total_job_type ,0,0,'.'); ?> hồ sơ</a>
        </li>
        <?php
        }
        ?>
        
      </ul>
    </li>
    <li class="item-child">
      <a href="<?php echo home_url(); ?>/tuyen-dung/" class="title"><i class="fa fa-user"></i>Tuyển Dụng</a>
      <a  href="<?php echo home_url(); ?>/tuyen-dung/" class="total"><?php echo number_format($td_total_job ,0,0,'.'); ?> tin đăng</a>
      <span class="down-icon"></span>
      <ul class="sub-item">
        <?php
        foreach ($job_field as $industry) {
        $cond_resume=array('post_status'=>'publish','post_type'=>'job','job_industry'=>$industry->name);
        $order_count_resume=array('up_at'=>'desc','post_modified'=>'desc');
        $limit_count_resume=array('size'=>1,'page'=>1);
        $result_resume = $wp2es->and_simple_search($cond_resume,$order_count_resume,$limit_count_resume);
        $td_total_resume_type = $result_resume["0"]["es_total_result"];
        ?>
        <li>
          <a class="sub-title" href="<?php echo home_url(); ?>/nganh-nghe-tuyen-dung/<?php echo $industry->slug ?>" title=""><?php echo $industry->name ?></a>
          <a class="sub-total" href="<?php echo home_url(); ?>/nganh-nghe-tuyen-dung/<?php echo $industry->slug ?>"><?php echo number_format($td_total_resume_type ,0,0,'.'); ?> tin đăng</a>
        </li>
        <?php
        }
        ?>
      </ul>
    </li>
    <li class="item-child">
      <a href="<?php echo home_url(); ?>/ho-so-doanh-nghiep/" class="title"><i class="fa fa-briefcase"></i>Doanh nghiệp</a>
      <a class="total"  href="<?php echo home_url(); ?>/ho-so-doanh-nghiep/"><?php echo number_format($td_total_company ,0,0,'.'); ?> công ty</a>
    </li>
    <li class="item-child">
      <a href="<?php echo home_url();?>/c/ket-noi-su-nghiep/" class="title"><i class="fa fa-bookmark icon"></i>Kết nối sự nghiệp</a>
      <a ref="<?php echo home_url();?>/c/ket-noi-su-nghiep/" class="total"><?php echo number_format($published_posts ,0,0,'.'); ?> bài viết</a>
      <span class="down-icon"></span>
      <ul class="sub-item">
        <li> <a class="sub-title" href="<?php echo home_url();?>/c/ket-noi-su-nghiep/cam-nang-tuyen-dung/" title="">Cẩm nang tuyển dụng</a></li>
        <li><a class="sub-title" href="<?php echo home_url();?>/c/ket-noi-su-nghiep/cam-nang-viec-lam/" title="">Cẩm nang việc làm</a></li>
      </ul>
    </li>
    <li class="item-child pdbottom10">
      <a href="<?php echo home_url();?>/bang-gia/" class="title"><i class="fa fa-file-text-o"></i>Bảng giá</a>
    </li>
    <li class="item-child pdbottom10">
      <a href="<?php echo home_url();?>/du-tinh-luong/" class="title"><i class="fa fa-building-o"></i>Dự tính lương</a>
    </li>
  </ul>
</nav>
</div> <!-- #wapper-menu -->