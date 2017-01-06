<?php
global $wpdb;
$job_field=$wpdb->get_results('select * from job_field LIMIT 7');

?>
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
    <div class="search-input">
      <form method="" action="">
        <input type="text" name="" placeholder="Nhập từ khóa bạn muốn tìm">
      </form>
    </div>
  </div>
  <div class="host-new">
    <span class="new">Mới nhất</span>
    <div> <span class="fa fa-sort-desc hot_news_sort_desc"></span></div>
  </div>
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
            <a class="dangky" rel="nofollow" href="<?php echo home_url(); ?>/login/register">Đăng ký</a>
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
    <li class="item-child">
      <a href="<?php echo home_url(); ?>/ung-vien/" class="title"><i class="fa fa-users icon"></i>Ứng viên</a>
      <a href="<?php echo home_url(); ?>/ung-vien/" class="total">891.000 hồ sơ</a>
      <span class="down-icon"></span>
      <ul class="sub-item">
          <?php
          foreach ($job_field as $industry) {
              ?>
              <li>
                  <a class="sub-title" href="<?php echo home_url(); ?>/ung-vien-theo-nganh-nghe/<?php echo $industry->slug ?>" title=""><?php echo $industry->name ?></a>
                  <a class="sub-total" href="">891.000 hồ sơ</a>
              </li>
              <?php
          }
          ?>
        
      </ul>
    </li>
    <li class="item-child">
      <a href="<?php echo home_url(); ?>/tuyen-dung/" class="title"><i class="fa fa-user"></i>Tuyển Dụng</a>
      <a  href="" class="total">10.890 tin đăng</a>
      <span class="down-icon"></span>
      <ul class="sub-item">
          <?php
          foreach ($job_field as $industry) {
              ?>
              <li>
                  <a class="sub-title" href="<?php echo home_url(); ?>/nganh-nghe-tuyen-dung/<?php echo $industry->slug ?>" title=""><?php echo $industry->name ?></a>
                  <a class="sub-total" href="">891.000 tin đăng</a>
              </li>
              <?php
          }
          ?>

      </ul>
    </li>
    <li class="item-child">
      <a href="<?php echo home_url(); ?>/ho-so-doanh-nghiep/" class="title"><i class="fa fa-briefcase"></i>Doanh nghiệp</a>
      <a class="total">385.890 công ty</a>
     <!--  <span class="down-icon"></span>   -->
    </li>
    <li class="item-child">
      <a href="<?php echo home_url();?>/category/ket-noi-su-nghiep/" class="title"><i class="fa fa-bookmark icon"></i>Kết nối sự nghiệp</a>
      <a class="total">385.890 bài viết</a>
      <span class="down-icon"></span>
      <ul class="sub-item">
        <li> <a class="sub-title" href="" title="<?php echo home_url();?>/category/ket-noi-su-nghiep/cam-nang-tuyen-dung/">Cẩm nang tuyển dụng</a></li>
        <li><a class="sub-title" href="<?php echo home_url();?>/category/ket-noi-su-nghiep/cam-nang-viec-lam/" title="">Cẩm nang việc làm</a></li>
      </ul>
    </li>
     <li class="item-child pdbottom10">
      <a href="<?php echo home_url();?>/bang-gia/" class="title"><i class="fa fa-file-text-o"></i>Bảng giá</a>
     <!--  <span class="down-icon"></span>   -->
    </li>
     <li class="item-child pdbottom10">
      <a href="<?php echo home_url();?>/du-tinh-luong/" class="title"><i class="fa fa-building-o"></i>Dự tính lương</a>
     <!--  <span class="down-icon"></span>   -->
    </li> 
  </ul>
</nav>
</div> <!-- #wapper-menu -->