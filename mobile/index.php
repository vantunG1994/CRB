<?php
global $wp2es;
$cond_job=array('post_status'=>'publish','post_type'=>'job');
$order_count=array('up_at'=>'desc','post_modified'=>'desc');
$limit_count=array('size'=>10,'page'=>2);
$result_job = $wp2es->and_simple_search($cond_job,$order_count,$limit_count);

$cond_resume=array('post_status'=>'publish','post_type'=>'resume');
$order_count_resume=array('up_at'=>'desc','post_modified'=>'desc');
$limit_count_resume=array('size'=>12,'page'=>1);
$result_resume = $wp2es->and_simple_search($cond_resume,$order_count_resume,$limit_count_resume);

$cond_company=array('post_status'=>'publish','post_type'=>'company');
$order_count_company=array('up_at'=>'desc','post_modified'=>'desc');
$limit_count_company=array('size'=>12,'page'=>1);
$result_company = $wp2es->and_simple_search($cond_company,$order_count_company,$limit_count_company);
?>
<div class="clearfix"></div>
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
                        <a href="#list-resum"><i class="fa fa-bullhorn"></i>Ứng Viên</a>
                    </li>
                    <li class="list-job">
                        <a href="#list-job"><i class="fa fa-file-text-o"></i>Tuyển Dụng</a>
                    </li>
                </ul>
             
        <div class="col-md-8 col-xs-12">
            <div class="index_listting" id ="list-resum">
                <section id="template_listting">

                    <?php
                    foreach ($result_resume as $list) {
                       include 'loop/item_listing.php';
                    }
                    ?>
                </section>
                 <div class="more"><a href=""> +Xem Thêm 967.453 Hồ Sơ Ứng Viên</a></div>
            </div>

            <div class="index_listting" id="list-job">
                        <section id="template_listting">

                            <?php
                            foreach ($result_job as  $list) {
                                 include 'loop/item_listing_job.php';
                            }
                            ?>
                        </section>
                        <div class="more"><a href=""> +Xem Thêm 967.453 Tin Tuyển Dụng</a></div>
                    </div>
           
        </div>
        </div>
          <div class="col-md-4 col-xs-12">
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
 ?>
</div>