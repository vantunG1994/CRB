<?php
global $wp2es;
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

?>
<div class="main-content">
    <?php
    include('search_top_home.php');
     include('statistical.php');
    ?>
    <div class="container bg-fff">
        <div class="row">
            <div class="tab-wrapper-list">
                <ul class="tab-list">
                    <li class="list-resum">
                        <a href="#list-resum"><h2><i class="fa fa-bullhorn"></i>Ứng Viên Mới</h2></a>
                    </li>
                    <li class="list-job">
                        <a href="#list-job"><h2><i class="fa fa-file-text-o"></i>Tuyển Dụng Mới</h2></a>
                    </li>
                    <li class="list-company">
                        <a href="#list-company"><h2><i class="fa fa-briefcase"></i>Doanh Nghiệp Mới</h2></a>
                    </li>
                </ul>
                <div class="col-md-8">
                    <div class="index_listting " id="list-resum">
                        <section id="template_listting">

                            <?php
                            foreach ($result_resume as $list) {
                            include 'loop/item_listing.php';
                            }
                            ?>
                        </section>
                        <div class="more"><a href="<?php echo home_url();?>/ung-vien/"> +Xem Thêm <?php echo number_format($td_total_resume ,0,0,'.'); ?> Hồ Sơ Ứng Viên</a></div>
                    </div>
                    
                    <div class="index_listting " id="list-job">
                        <section id="template_listting">

                            <?php
                            foreach ($result_job as $list) {
                                 include 'loop/item_listing_job.php';
                            }
                            ?>
                        </section>
                        <div class="more"><a href="<?php echo home_url();?>/tuyen-dung/"> +Xem Thêm <?php echo number_format($td_total_job ,0,0,'.'); ?> Tin Tuyển Dụng</a></div>
                    </div>
                    
                    <div class="index_listting " id="list-company">
                        <section id="template_listting">

                            <?php
                            foreach ($result_company as $list) {
                                include 'loop/item_listing_company.php';
                            }
                            ?>
                        </section>
                        <div class="more"><a href="<?php echo home_url();?>/ho-so-doanh-nghiep/"> +Xem Thêm <?php echo number_format($td_total_company ,0,0,'.'); ?> Hồ Sơ Doanh Nghiệp</a></div>
                    </div>
                    
                </div>
            </div>
            
            <div class="col-md-4">
                <?php
                include('sidebar.php');
                ?>
                <?php
                include('listnews.php');
                ?>
            </div>
            
        </div>
    </div>
    <?php
    include('register-front.php');
    include('testimonial.php');
    include('template-scroll-top.php');
    ?>
</div>