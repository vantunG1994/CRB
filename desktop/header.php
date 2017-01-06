<?php
global $wpdb;
$job_field=$wpdb->get_results('select * from job_field LIMIT 16 ');
?>
<div class="header-top">
	<div class="container">
		<div class=" col-xs-6 text-left">
			<span>10782 Việc làm</span>
			<span>|</span>
			<span>98765 Ứng viên</span>
			<span>| 385012 Doanh nghiệp</span>
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
			<a href="<?php echo home_url(); ?>/register">Đăng Ký</a>
			<?php
			}
			else
			{
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
<div class="wrap-header">
	<div class="container">
		<div class="row header">
			<div class="col-sm-3">
				<div class="logo">
					<a href="<?php echo home_url();?>"><img src="<?php echo get_template_directory_uri();?>/mobile/asset/images/logo-mvl.png" alt=""></a>
				</div>
			</div>
			
			<div class="col-sm-6">
				<form action="" class="form-search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Tìm Kiếm Nhanh">
						<span class="input-group-btn">
							<button class="btn btn-default btn-search" type="button"><i class="fa fa-search"></i></button>
						</span>
					</div>
					<!-- /input-group -->
				</form>
			</div>
			
			<div class="col-sm-3">
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
											<?php	}
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
					<li class="item-sub sub-all"><a href="">Xem tất cả</a></li>
					
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
					<li class="item-sub sub-all"><a href="">Xem tất cả</a></li>
					
				</ul>
			</li>
			<li><a href="<?php echo home_url();?>/ho-so-doanh-nghiep/"><i class="fa fa-briefcase" aria-hidden="true"></i>doanh nghiệp</a></li>
			<li>
				<a href="<?php echo home_url();?>/category/ket-noi-su-nghiep/"><i class="fa fa-bullhorn"></i>kết nối sự nghiệp <i class="fa fa-chevron-down"></i></a>
				<ul class="sub-menu sub-menu-1">
					<li class="item-sub"><a href="<?php echo home_url();?>/category/ket-noi-su-nghiep/cam-nang-viec-lam/">Cẩm Nang Việc Làm</a></li>
					<li class="item-sub"><a href="<?php echo home_url();?>/category/ket-noi-su-nghiep/cam-nang-tuyen-dung/">Cẩm Nang Tuyển Dụng</a></li>
					<li class="item-sub pd-left"><a href="<?php echo home_url();?>/category/ket-noi-su-nghiep/cam-nang-viec-lam/bi-quyet-tim-viec/">Bí Quyết Tìm Việc</a></li>
					<li class="item-sub pd-left"><a href="<?php echo home_url();?>/category/ket-noi-su-nghiep/cam-nang-tuyen-dung/quan-ly-nhan-su/">Quản Lý Nhân Sự</a></li>
					<li class="item-sub pd-left"><a href="<?php echo home_url();?>/category/ket-noi-su-nghiep/cam-nang-viec-lam/kinh-nghiem-tim-viec/">Kinh Nghiệm Tìm Việc</a></li>
					<li class="item-sub pd-left"><a href="<?php echo home_url();?>/category/ket-noi-su-nghiep/cam-nang-tuyen-dung/bi-quyet-tuyen-dung/">Bí Quyết Tuyển Dụng</a></li>
					<li class="item-sub pd-left"><a href="<?php echo home_url();?>/category/ket-noi-su-nghiep/cam-nang-viec-lam/phong-van-xin-viec/">Phỏng Vấn Xin Việc</a></li>

				</ul>
			</li>
			<li><a href="<?php echo home_url();?>/bang-gia/"><i class="fa fa-file-text-o"></i>Bảng giá</a></li>
			<li><a href="<?php echo home_url();?>/du-tinh-luong"><i class="fa fa-file-text-o"></i>Dự tính lương</a></li>
		</ul>
	</div>
</div>
</div>