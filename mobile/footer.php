<section id ="footer_mb">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 remove-padding15">
                <div class="box-title"><h3>Việc làm nổi bật <i class="fa fa-angle-down text-right"></i></h3></div>
                <div class="list-item">
                    <div class="host-news">
                        <a href=""><h3>việc làm tại tp.hcm</h3></a>
                        <a href=""><h3>việc làm tại hà nội</h3></a>
                        <a href=""><h3>việc làm tại đà nẵng</h3></a>
                        <a href=""><h3>việc làm tại bình dương</h3></a>
                        <a href=""><h3>việc làm tại hải phòng</h3></a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 remove-padding15">
                <div class="box-title"><h3>Thông tin chung <i class="fa fa-angle-down text-right"></i></h3></div>
                <div class="list-item">
                    <div class="host-news">
                        <a href="#"><h3>GIỚI THIỆU</h3></a>
                        <a href="<?php echo home_url()?>/wp-content/uploads/2017/01/Bang-gia-mangvieclam.docx" target="_blank" download="Bang gia - mangvieclam"><h3>BẢNG GIÁ</h3></a>
                        <a href="<?php echo home_url()?>/wp-content/uploads/2017/01/Quy-che-hoat-đong-mangvieclam.pdf" target="_blank" type="application/octet-stream" download="Quy che hoat đong - mangvieclam"><h3>QUY CHẾ HOẠT ĐỘNG</h3></a>
                        <a href="<?php echo home_url()?>/wp-content/uploads/2017/01/Chinh-sach-bao-mat-thong-tin-mangvieclam.com_.docx" download="chinh sach bao mat - mangvieclam"><h3>CHÍNH SÁCH BẢO MẬT</h3></a>
                        <a href="<?php echo home_url()?>/wp-content/uploads/2017/01/Quy-trinh-ho-tro-giai-quyet-khieu-nai-mangvieclam.com_.docx" target="_blank" type="application/octet-stream" download="Quy trinh ha tro giai quyet khieu nai - mangvieclam"><h3>giải quyết tranh chấp</h3></a>
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
        <a href="">
            <span class="icon"><span class="fa fa-pencil-square-o"></span></span>
            <span class="text">Tin mới</span>
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
        <a href="">
            <span class="icon"><span class="fa fa-comments-o"></span></span>
            <span class="text">Live chat</span>
        </a>
    </div>
    <div class="nav-item">
        <a href="">
            <span class="icon"><span class="fa fa-globe"></span></span>
            <span class="text">Thông báo</span>
        </a>
    </div>
    <div class="nav-item">
        <a href="">
            <span class="icon"><span class="fa fa-bars"></span></span>
            <span class="text">Xem thêm</span>
        </a>
    </div>
    
</div>
<script src="<?php echo get_template_directory_uri();?>/mobile/asset/js/select2.js"></script>