<section id ="footer_mb">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 remove-padding15">
                <div class="box-title"><h3>Việc làm nổi bật <i class="fa fa-angle-down text-right"></i></h3></div>
                <div class="list-item">
                    <div class="host-news">
                      <a href="<?php echo home_url(); ?>/tuyen-dung/?resume_location=TP%20H%E1%BB%93%20Ch%C3%AD%20Minh"><h3>việc làm tại tp.hcm</h3></a>
                        <a href="<?php echo home_url(); ?>/tuyen-dung/?resume_location=H%C3%A0%20N%E1%BB%99i"><h3>việc làm tại hà nội</h3></a>
                        <a href="<?php echo home_url(); ?>/tuyen-dung/?resume_location=%C4%90%C3%A0%20N%E1%BA%B5ng"><h3>việc làm tại đà nẵng</h3></a>
                        <a href="<?php echo home_url(); ?>/tuyen-dung/?resume_location=B%C3%ACnh%20D%C6%B0%C6%A1ng"><h3>việc làm tại bình dương</h3></a>
                        <a href="<?php echo home_url(); ?>/tuyen-dung/?resume_location=H%E1%BA%A3i%20Ph%C3%B2ng"><h3>việc làm tại hải phòng</h3></a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 remove-padding15">
                <div class="box-title"><h3>Thông tin chung <i class="fa fa-angle-down text-right"></i></h3></div>
                <div class="list-item">
                    <div class="host-news">
                        <a href="<?php echo home_url();?>/gioi-thieu"><h3>GIỚI THIỆU</h3></a>
                        <a href="<?php echo home_url();?>/bang-gia"><h3>BẢNG GIÁ</h3></a>
                        <a id="downloadLink" href="/wp-content/themes/CRB/file/Quy che hoat dong - mangvieclam.pdf" target="_blank" type="application/octet-stream" download="Quy che hoat dong - mangvieclam.pdf"><h3>QUY CHẾ HOẠT ĐỘNG</h3></a>
                        <a id="downloadLink" href="/wp-content/themes/CRB/file/Chinh sach bao mat thong tin - mangvieclam.com.docx" target="_blank" type="application/octet-stream" download="Chinh sach bao mat thong tin - mangvieclam.com.docx"><h3>CHÍNH SÁCH BẢO MẬT</h3></a>
                        <a id="downloadLink" href="/wp-content/themes/CRB/file/Quy trình ho tro giai quyet khieu nai - mangvieclam.com.docx" target="_blank" type="application/octet-stream" download="Quy trình ho tro giai quyet khieu nai - mangvieclam.com.docx"><h3>GIẢI QUYẾT TRANH CHẤP</h3></a>
                    </div>
                </div>
            </div>
            <div class=" col-xs-12 remove-padding15">
                <div class="box-title"><h3>tổng đài hỗ trợ <i class="fa fa-angle-down text-right"></i></h3></div>
                <div class="list-item">
                    <div class="host-news">
                        <a href=""><h3>Hotline CSKH: (08) 222222.36 </h3></a>
                        <h3>Email:info@mangvieclam.com</h3>
                        <h3> Phản ánh chất lượng <a href="">0925.138.138</a></h3>
                        
                    </div>
                    
                </div>
                
            </div>
            <div class=" col-xs-12 remove-padding15 margin-bottom50 click-ft">
                <div class="box-title"><h3>Công ty công nghê <i class="fa fa-angle-down text-right"></i></h3></div>
                <div class="list-item">
                    <div class="ft-company">
                        <div class="content">
                            <h3><i class="fa fa-map-marker"></i>Caribbean Technology Co., Ltd</h3>
                            <span class="address1"><b>Address:</b> 3838 Beverly Blvd, Los Angeles, CA 90048, USA</span>
                            <span class="address1"><b>Tel:</b> (+1) 323 515 5485</span>
                        </div>
                        <div class="content-1">
                            <h3><i class="fa fa-map-marker"></i>Đại diện tại Việt Nam</h3>
                            <span class="address1"><b>Trụ sở chính:</b> 68 Lê Thị Riêng, P. Bến Thành, Quận 1, TPHCM</span>
                            <span class="address1"><b>VP Kinh Doanh:</b> 26 Đặng Thị Nhu, P. Nguyễn Thái Bình, Quận 1, TP. HCM</span>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
</section> <!-- footer_yuna -->
<div class="bottom-navigation">
    
    <div class="nav-item nav-active">
        <?php
        if ( is_user_logged_in() ) {

        ?>

        <a href="<?php echo home_url();?>/tin-da-luu">
            <?php
            }
            else{
            ?>
            <a href="<?php echo home_url();?>/login">
            <?php
            }
            ?>
            <span class="icon"><span class="fa fa-floppy-o"></span></span>
            <span class="text">Tin lưu</span>
        </a>
    </div>
     <?php if ( !is_user_logged_in() ) { ?>
       <div class="nav-item">
        <a href="<?php echo home_url();?>/login/">
            <span class="icon"><span class="fa fa-sign-in"></span></span>
            <span class="text">Đăng Nhập</span>
        </a>
      </div>     
       <?php }
        else {?>
            <div class="nav-item">
        <a href="<?php echo wp_logout_url(get_option('siteurl')); ?>">
            <span class="icon"><span class="fa fa-sign-in"></span></span>
            <span class="text">Đăng Xuất </span>
        </a>
    </div>
    <?php    }
    ?>
   
    <div class="nav-item">
        <a style="color: white;" href="//m.me/mangvieclamcom" target="_blank" rel="nofollow">
            <span class="icon"><span class="fa fa-comments-o"></span></span>
            <span class="text">Live chat</span>
        </a>
    </div>
    <div class="nav-item">
        <a href="#">
            <span class="icon"><span class="fa fa-globe"></span></span>
            <span class="text">Thông báo</span>
        </a>
    </div>
    <div class="nav-item" id="nav-item">
        <a href="#">
            <span class="icon"><span class="fa fa-bars"></span></span>
            <span class="text">Xem thêm</span>
        </a>
        
    </div>
   
  
   
</div>
<div id="topnews_header">
      <div class="table-news">
        <span class="text-news"><span class="fa fa-rss"></span> Mới nhất</span>
       <div class="content-new">
           <div class="list-job" style="margin-top: 10%;">
               <div class="container bg-fff">
                   <div class="row">
                       <div class=" col-md-8 col-sm-12 col-xs-12">
                           <div class="post-wrap clearfix">
                               <?php
                               global $post;
                               //                $args = array( 'posts_per_page' => 5, 'offset'=> 0, 'category' => 20 );
                               $args = array( 'posts_per_page' =>3,'order' => 'DESC', 'offset'=> 0,'orderby' => 'rand','category' =>2510);
                               $myposts = get_posts( $args );
                               foreach( $myposts as $post ) : setup_postdata($post); ?>
                               <div class="post post-box clearfix post-2211737 type-post status-publish format-standard has-post-thumbnail hentry category-phong-van-xin-viec tag-cho-ket-qua-phong-van tag-cuoc-phong-van tag-ket-qua-phong-van tag-kinh-nghiem-phong-van tag-kinh-nghiem-phong-van-thanh-cong tag-kinh-nghiem-phong-van-xin-viec tag-lam-gi-khiket-qua-phong-van tag-meo-phong-van tag-nha-tuyen-dung tag-phong-van tag-phong-van-vong-hai tag-thu-cam-on tag-thu-cam-on-nha-tuyen-dung tag-viec-nen-lam-khi-ket-qua-phong-van tag-viet-thu-cam-on" id="post-2211737">

                                   <div class="postmeta-primary">
                                       <!--<span class="meta_date">29/11/2016</span>

                                        &nbsp; <span class="meta_comments"><a href="https://mangvieclam.com/trong-khi-cho-doi-phong-van-ban-can-nen-lam-nhung-dieu-gi.html#respond">No comments</a></span> -->
                                   </div>

                                   <h2 class="title"><a href="<?php the_permalink(); ?>" title="   <?php the_title(); ?>" rel="bookmark">   <?php the_title(); ?></a></h2>

                                   <div class="entry clearfix">
                                       <div class="img-txt">
                                           <a href="<?php the_permalink(); ?>"><img width="90" height="90" src="<?php echo catch_that_image();?>" class="alignleft featured_image wp-post-image" alt="cau-hoi-phong-van"></a>
                                       </div>
                                       <div class="removepd15">
                                           <div class="txt-content ">
                                              <?php the_content_rss('', FALSE, '',20);; ?><div class="readmore">
                                                   <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">Xem Thêm</a>
                                               </div>
                                           </div>
                                       </div>
                                   </div>



                               </div><!-- Post ID 2211737 -->
                               <?php endforeach; ?>
                               <?php
                               global $post;
                               //                $args = array( 'posts_per_page' => 5, 'offset'=> 0, 'category' => 20 );
                               $args = array( 'posts_per_page' =>2,'order' => 'DESC', 'offset'=> 0,'orderby' => 'rand','category' =>5);
                               $myposts = get_posts( $args );
                               foreach( $myposts as $post ) : setup_postdata($post); ?>
                                   <div class="post post-box clearfix post-2211737 type-post status-publish format-standard has-post-thumbnail hentry category-phong-van-xin-viec tag-cho-ket-qua-phong-van tag-cuoc-phong-van tag-ket-qua-phong-van tag-kinh-nghiem-phong-van tag-kinh-nghiem-phong-van-thanh-cong tag-kinh-nghiem-phong-van-xin-viec tag-lam-gi-khiket-qua-phong-van tag-meo-phong-van tag-nha-tuyen-dung tag-phong-van tag-phong-van-vong-hai tag-thu-cam-on tag-thu-cam-on-nha-tuyen-dung tag-viec-nen-lam-khi-ket-qua-phong-van tag-viet-thu-cam-on" id="post-2211737">

                                       <div class="postmeta-primary">
                                           <!--<span class="meta_date">29/11/2016</span>

                                            &nbsp; <span class="meta_comments"><a href="https://mangvieclam.com/trong-khi-cho-doi-phong-van-ban-can-nen-lam-nhung-dieu-gi.html#respond">No comments</a></span> -->
                                       </div>

                                       <h2 class="title"><a href="<?php the_permalink(); ?>" title="   <?php the_title(); ?>" rel="bookmark">   <?php the_title(); ?></a></h2>

                                       <div class="entry clearfix">
                                           <div class="img-txt">
                                               <a href="<?php the_permalink(); ?>"><img width="90" height="90" src="<?php echo catch_that_image();?>" class="alignleft featured_image wp-post-image" alt="cau-hoi-phong-van"></a>
                                           </div>
                                           <div class="removepd15">
                                               <div class="txt-content ">
                                                   <?php the_content_rss('', FALSE, '',20);; ?><div class="readmore">
                                                       <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">Xem Thêm</a>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>



                                   </div><!-- Post ID 2211737 -->
                               <?php endforeach; ?>

                           </div> <!-- end col-md-8 --></div>

               </div>
           </div>
            </div>

      </div>
     
    </div>
 <div class="store-information">
            <div class="list-save">
                <span class="text-news"><span class="fa fa-pencil-square-o"></span> Danh sách</span>
            </div>
            <div class="content-save">
                
            </div>
        </div>
        <script>
    $(document).ready(function(){
            
        $(".show-news").click(function(){
            $("#topnews_header").show();
        });
    });
    </script>
    <script>
    $(document).ready(function(){
            
        $(".hide-news").click(function(){
            $("#topnews_header").hide();
        });
    });
    </script>
      <script>
    $(document).ready(function(){
            
        $("#nav-item").click(function(){
            $(".store-information").toggle();
        });
    });
    </script>
    <script>
            $(document).ready(function(){
                $(".icon-show").click(function(){
                    $(".discription-top").toggleClass("show");
                });
                $(".icon-show").click(function(){
                    $(".icon-show").toggleClass("icon-hide");
                });
            });
            </script>
            
        
<script src="<?php echo get_template_directory_uri();?>/mobile/asset/js/select2.js"></script>