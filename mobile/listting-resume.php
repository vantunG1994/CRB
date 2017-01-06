<?php
global $wp2es,$wpdb;
$job_field=$wpdb->get_results('select * from job_field ');
$job_province=$wpdb->get_results('select * from job_province ');
$url_page=$_SERVER["REQUEST_URI"];
$pos=strrpos($url_page,"?");
if($pos !="")
{
    $url_page=substr($url_page,0,$pos);
    $url_page = rtrim($url_page, "/");
}
else{
    $url_page=$_SERVER["REQUEST_URI"];
}
$url_page= rtrim( $url_page, "/");
$pos = strrpos( $url_page, "/");
$num = substr( $url_page, $pos + 1);
$td_current_page = max(1,$num);
if(($_GET["key_job"])!="")
{
    $key_search='%'.$_GET["key_job"].'%';
    $wpjobus_resume_skills='wpjobus_resume_prof_title';

}else{
    $wpjobus_resume_skills='post_type';
    $key_search='resume';

}

if(($_GET["resume_location"])!="")
{
    $location='';
    $locations=$_GET["resume_location"];
    $location=$locations[0];
    $resume_location='resume_location';

}else
{
    $resume_location='post_type';
    $location='resume';

}
if(($_GET["salary"])!="")
{
    $salary='';
    $salarys=$_GET["salary"];

    foreach($salarys as $v1) {
        $salary .= ''.$v1.'' . ',';
    }

    $wpjobus_resume_remuneration='wpjobus_resume_remuneration';
}
else{
    $salary='resume';
    $wpjobus_resume_remuneration='post_type';
}

if(($_GET["industry"])!="" )
{
    global $redux_demo;
    $job_types=$_GET["industry"];
    $job_type="";
//        foreach($job_types as $v2)
//        {
    foreach ($job_field as $industry) {
        if($job_types[0]==$industry->slug)
        {
            $job_type .=$industry->name;
        }
//            }

    }
    $resume_industry='resume_industry';

}else
{
    $resume_industry='post_type';
    $job_type='resume';
}

if(($_GET["job_est_year_num"])!=""  && $_GET["job_est_year_num"]!=0 ){
    $job_est_year_nums=$_GET["job_est_year_num"];
    $job_est_year_num="";

    $years_of_exp =$_GET["job_est_year_num"];

    $resume_years_of_exp='resume_years_of_exp';

}
else
{
    $resume_years_of_exp='post_type';
    $years_of_exp='resume';
}
if($_GET["resume_gender"]!='')
{
    $resume_gender='resume_gender';
    $gender=$_GET["resume_gender"];
}
else{
    $resume_gender='post_type';
    $gender='resume';
}
if($_GET['wpjobus_resume_job_type'] !="")
{

    $resume_job_types=$_GET['wpjobus_resume_job_type'];
    $resume_job_type="";
    foreach($resume_job_types as $v4)
    {
        $resume_job_type.=$v4.',';
    }

    $wpjobus_resume_job_type='wpjobus_resume_job_type';

}
else
{
    $wpjobus_resume_job_type='post_type';
    $resume_job_type='resume';
}
$cond_resume=array('post_status'=>'publish','post_type'=>'resume',
    $wpjobus_resume_skills=>$key_search,
    $resume_location=>$location,
    $wpjobus_resume_remuneration=>$salary,
    $resume_years_of_exp=>$years_of_exp,
    $resume_industry=>$job_type,
    $resume_gender=>$gender,
//    $wpjobus_resume_job_type=>$resume_job_type
);
$order_count_resume=array('up_at'=>'desc','post_modified'=>'desc');
$limit_count_resume=array('size'=>18,'page'=>$td_current_page);
$result_resume = $wp2es->and_simple_search($cond_resume,$order_count_resume,$limit_count_resume);
$td_total = $result_resume["0"]["es_total_result"] ?: 0;

$td_total_companies=$td_total;

$td_total_pages = ceil($td_total_companies/18);
if($td_total_pages >1000)
{
    $td_total_pages=1000;
}
?>
<div class="main-content">
   <div class="container bg-fff">
    <div class="row">
        <div class="col-md-8 listting">
            <div class="box_title  clearfix" id="b1012">
                <ul class="nav nav-tabs caribe-border-bottom-fff">
                    <li role="presentation" class="active">
                        <div class="title t-curpointer title_h1_green">
                            <h1 class="news-h1-title caribe-breadcum">Ứng viên </h1>
                        </div>
                    </li>
                </ul>
            </div>
        <div class="discription-top">  
            <h2>Ứng viên</h2> 
            <p>- Có <?php echo $td_total; ?> tin đăng còn hiệu lực trong mục</p>
            <h3>Ứng viên.</h3> 
            <p> Bạn đang xem trang <?php echo $td_current_page; ?></p>
            <h3> Ung vien</h3>
        </div>
            <div class="index_listting1">
                <div id="top_companies-block">
                <div class="list_industry">

                    <select class="select2 job_list_industry" id="job_list_industry">
                       <option value="">Ngành nghề</option>
                        <?php
                        if($job_type !="" && $job_type!="resume" && $job_type !="job")
                        {
                            ?>
                            <option selected value="<?php echo createSlug($job_type); ?>"><?php echo $job_type; ?></option>
                            <?php

                        }
                        else{
                            ?>
                            <option value="">Ngành nghề</option>
                            <?php
                        }
                        foreach ($job_field as $industry) {
                            ?>
                            <option value="<?php echo home_url();?>/ung-vien-theo-nganh-nghe/<?php echo $industry->slug ?>"><?php echo $industry->name ?></option>
                            <?php
                        }
                        ?>
                    </select>

                    <select id="width_tmp_select">
                      <option id="width_tmp_option"></option>
                    </select>
                    </div>
                    <div class="location">
                    <select class="select2 job_list_location" id="job_list_location" >
                        <?php
                        if($_GET['resume_location']!="")
                        {
                            ?>

                            <option selected value="<?php echo $locations[0]; ?>"><?php echo $locations[0]; ?></option>
                            <?php

                        }else{
                            ?>
                            <option value="">Chọn khu vực</option>
                            <?php
                        }

                        foreach ($job_province as $province) {
                            ?>
                            <option value="<?php echo $province->name ?>"><?php echo $province->name; ?></option>
                            <?php
                        }
                        ?>
                </select>
                     <select id="width_select_list_location">
                      <option id="width_list_location"></option>
                    </select>
                    </div>

                    <script>
                    $(document).ready(function() {
                      $('#job_list_industry').change(function(){
                        $("#width_tmp_option").html($('#job_list_industry option:selected').text()); 
                        $(this).width($("#width_tmp_select").width());  
                      });
                      $('#job_list_location').change(function(){
                        $("#width_list_location").html($('#job_list_industry option:selected').text()); 
                        $(this).width($("#width_select_list_location").width());  
                      });
                    });
                     
                    </script>
                  
        </div>
                <section id="template_listting">

                    <?php
                    foreach ($result_resume as $list) {
                        include 'loop/item_listing.php';
                    }
                    ?>
                </section>
                <?php
                $url = home_url() . '/ung-vien/';

                if ($td_total_pages > 1) {
                    $args = array(
                        'base' => $url . '%_%',
                        'current' => $td_current_page,
                        'format' => 'page/%#%',
                        'total' => $td_total_pages,
                    );


                    echo "<div class='paginate_links_filters'>".paginate_links( $args )."</div>";
                }
                ?>
            </div>
        </div>
          <div class="col-md-4 listting">
              <?php 
                 include('search-filters-resume.php');
                    include('sidebar.php');
                    include('listnews.php');
                 ?>

        </div>
    </div>
</div>
 <!-- <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a> -->
</div>
    <script>
        jQuery(document).ready(function ($) {
            jQuery(".job_list_industry").change(function () {
                var id = jQuery(".job_list_industry").val();
                var url = id;
                location.href = url;
            });
        });
    </script>
<?php if ($_GET["industry"] != "") {
    foreach ($_GET["industry"] as $v) {
        ?>
        <script>
            jQuery(document).ready(function ($) {
                jQuery(".job_list_location").change(function () {
                    var id = jQuery(".job_list_location").val();
                    var url = "<?php echo home_url('/')."tuyen-dung"?>?industry[]=<?php echo createSlug($v); ?>&resume_location[]=" + id;
                    location.href = url;
                });
            });
        </script>
        <?php
    }
}else{
    ?>
    <script>
        jQuery(document).ready(function ($) {
            jQuery(".job_list_location").change(function () {
                var id = jQuery(".job_list_location").val();
                var url = "<?php echo home_url('/')."tuyen-dung"?>?resume_location[]=" + id;
                location.href = url;
            });
        });
    </script>
    <?php
}
?>