<div class="main-content">


    <div class="list-job-detail">
	<div class="container bg-fff">
		<div class="row">

			<div class="col-md-8 col-xs-12">
                <?php
                if (have_posts()) : while (have_posts()) : the_post();
                    /**
                     * Find the post formatting for the single post (full post view) in the post-single.php file
                     */
                    get_template_part('post', 'single');
                endwhile;

                else :
                    get_template_part('post', 'noresults');
                endif;
                ?>

				</div>
				
				<div class="col-md-4 col-xs-12">
					<div class="input-search">
						<form action="" class="form-search">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Tìm Kiếm ">
								<span class="input-group-btn">
									<button class="btn btn-default btn-search" type="button"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</form>
					</div>
					<div class="category-menu">
						 <ul class="menu-title">
                                <li class="title">Chuyên mục</li>
                                <li><a href="<?php echo home_url();?>/category/ket-noi-su-nghiep/cam-nang-viec-lam/">Cẩm Nang Việc Làm</a></li>
                                <li><a href="<?php echo home_url();?>/category/ket-noi-su-nghiep/cam-nang-viec-lam/bi-quyet-tim-viec/">Bí quyết tìm việc</a></li>
                                 <li><a href="<?php echo home_url();?>/category/ket-noi-su-nghiep/cam-nang-viec-lam/kinh-nghiem-tim-viec/">Kinh nghiệm tìm việc</a></li>
                                <li><a href="<?php echo home_url();?>/category/ket-noi-su-nghiep/cam-nang-viec-lam/phong-van-xin-viec/">Phỏng vấn xin việc</a></li>
                                  <li><a href="<?php echo home_url();?>/category/ket-noi-su-nghiep/cam-nang-tuyen-dung/">Cẩm Nang Tuyển Dụng</a></li>
                                <li><a href="<?php echo home_url();?>/category/ket-noi-su-nghiep/cam-nang-tuyen-dung/bi-quyet-tuyen-dung/">Bí quyết tuyển dụng</a></li>
                                <li><a href="<?php echo home_url();?>/category/ket-noi-su-nghiep/cam-nang-tuyen-dung/quan-ly-nhan-su/">Quản lý nhận sự</a></li>
                              
                            </ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




<?php  include('template-scroll-top.php');?>
