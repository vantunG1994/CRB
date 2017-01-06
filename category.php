<?php global $theme; get_header(); ?>
    <div class="main-content">
        <div class="list-job">
            <div class="container bg-fff">
                <div class="row">
                    <div class=" col-md-8 col-sm-12 col-xs-12">
                        <h1 class="content"><b><?php printf( __( '<span>Danh Mục Ngành Nghề :%s</span>', 'themater' ), single_cat_title( '', false ) ); ?></b></h1>
                        <?php 
                $is_post_wrap = 0;
                    if (have_posts()) : while (have_posts()) : the_post();
                     
                     /**
                     * The default post formatting from the post.php template file will be used.
                     * If you want to customize the post formatting for your category pages:
                     * 
                     *   - Create a new file: post-category.php
                     *   - Copy/Paste the content of post.php to post-category.php
                     *   - Edit and customize the post-category.php file for your needs.
                     * 
                     * Learn more about the get_template_part() function: http://codex.wordpress.org/Function_Reference/get_template_part
                     */
                     
                    $is_post_wrap++;
                        if($is_post_wrap == '1') {
                            ?>
                            <div class="post-wrap clearfix"><?php
                        }
                        get_template_part('post', 'category');
                        
                        if($is_post_wrap == '2') {
                            $is_post_wrap = 0;
                            ?></div><?php
                        }
                endwhile;
                
                else :
                    get_template_part('post', 'noresults');
                endif; 
                    
                    if($is_post_wrap == '1') {
                        ?>
                            
                      </div><?php
                    } 
                
                get_template_part('navigation');
            ?>
            
            <?php $theme->hook('content_after'); ?>
                       
            </div> <!-- end col-md-8 -->
                    <div class="col-md-4 col-sm-12 col-xs-12">
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
<?php  include('desktop/template-scroll-top.php');?>

    
<?php get_footer(); ?>