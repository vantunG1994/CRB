<?php
global $wpdb,$wp2es;
$pos=strrpos(get_pagenum_link(),"?");
if($pos !="")
{
    $url=substr(get_pagenum_link(),0,$pos);
    $url = rtrim($url, "/");
}
else{
    $url = rtrim(get_pagenum_link(), "/");
}


$pos = strrpos($url, "/");
$sub_string = substr($url, $pos + 1);
$job_field=$wpdb->get_row('SELECT * FROM `job_field` WHERE `slug`= "'.$sub_string.'" ');
$job_type=$job_field->name;
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
$job_field=$wpdb->get_results('select * from job_field ');
$job_province=$wpdb->get_results('select * from job_province ');

if(($_GET["key_job"])!="")
{
    $key_search=$_GET["key_job"];
    $post_title='post_title';

}else{
    $post_title='post_type';
    $key_search='job';
}

if(($_GET["resume_location"])!="")
{
    $location='';
    $locations=$_GET["resume_location"];

    $location .=$locations[0];




    $job_location='job_location';
}else{
    $location='job';
    $job_location='post_type';
}



if(($_GET["salary"])!="")
{
    $salary='';
    $salarys=$_GET["salary"];

    foreach($salarys as $v1) {
        $salary .= ''.$v1.'' . ',';


    }
    $wpjobus_job_remuneration='wpjobus_job_remuneration';

}
else{

    $salary='job';
    $wpjobus_job_remuneration='post_type';


}
if(($_GET["industry"])!="" )
{
    global $redux_demo;
    $job_typess=$_GET["industry"];
    $job_types="";

    $industry = $job_typess[0];


    if(count($job_typess)==1 &&$industry !=$job_type)
    {

        $query = str_replace( '&industry%5B%5D='.$industry.'', '', $_SERVER['QUERY_STRING'] );




        ?>
        <script>
            location.href="<?php echo home_url('/')."nganh-nghe-tuyen-dung/".$industry."?".$query; ?>";
        </script>
        <?php
    }




    $job_types=$job_type;
    $job_industry='job_industry';
}
else{
    $job_industry='job_industry';
    $job_types=$job_type;

}
if(($_GET["job_est_year_num"])!=""  && $_GET["job_est_year_num"]!=0 ){
    $job_est_year_nums=$_GET["job_est_year_num"];
    $job_est_year_num=$_GET["job_est_year_num"];

    $job_years_of_exp='job_years_of_exp';
}else{
    $job_years_of_exp='post_type';
    $job_est_year_num='job';

}

$cond_job=array('post_status'=>'publish','post_type'=>'job',
    $job_years_of_exp=>$job_est_year_num,
    $job_industry=>$job_types,
    $wpjobus_job_remuneration=>$salary,
    $job_location=>$location,
    $post_title=>$key_search
);

$order_count=array('up_at'=>'desc','post_modified'=>'desc');
$limit_count=array('size'=>18,'page'=>$td_current_page);
$result_job = $wp2es->and_simple_search($cond_job,$order_count,$limit_count);
$td_total = $result_job["0"]["es_total_result"] ?: 0;
$td_total_companies=$td_total;

$td_total_pages = ceil($td_total_companies/18);
if($td_total_pages >1000)
{
    $td_total_pages=1000;
}

?>
<div class="main-content">
   <div class="container content-bg">
    <div class="row">
        <div class="col-md-8 listting">
            <div class="box_title row clearfix" id="b1012">
                <ul class="nav nav-tabs caribe-border-bottom-fff">
                    <li role="presentation" class="active">
                        <div class="title t-curpointer title_h1_green">
                            <h1 class="news-h1-title caribe-breadcum">Tuyển Dụng </h1>
                        </div>
                    </li>
                </ul>
            </div>
        <div class="discription-top">  
            <h2>Tuyển dụng <?php echo $job_type;?></h2>
            <p>- Có <?php echo $td_total; ?> tin đăng còn hiệu lực trong mục</p>
            <h3>Tuyển dụng <?php echo $job_type;?>.</h3>
            <p> Bạn đang xem trang <?php echo $td_current_page; ?></p>
            <h3> Tuyen Dung <?php echo vn_str_filter ($job_type); ?></h3>
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
                        foreach ($job_field as $industry) {
                            ?>
                            <option value="<?php echo home_url();?>/nganh-nghe-tuyen-dung/<?php echo $industry->slug ?>"><?php echo $industry->name ?></option>
                            <?php
                        }
                        ?>
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
                    
                    </div>

                   
                  
        </div>
                
                <section id="template_listting">

                    <?php
                    foreach ($result_job as $list) {
                      include 'loop/item_listing_job.php';
                    }
                    ?>
                </section>
                <?php
                $url = home_url() . '/nganh-nghe-tuyen-dung/'.$sub_string.'/';

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
                include('search-filters.php');
                 ?>
              <?php 
                include('sidebar.php');
                 ?>
                 <?php 
                include('listnews.php');
                 ?>


        </div>
    </div>
</div>
 <?php //include('template-scroll-top.php') ?>
</div>
<script>
    jQuery(document).ready(function ($) {
        jQuery(".job_list_location").change(function () {
            var id = jQuery(".job_list_location").val();
            var url = "<?php echo home_url('/')."nganh-nghe-tuyen-dung/".$sub_string;?>?resume_location[]=" + id;
            location.href = url;
        });
    });
</script>
<script>
    jQuery(document).ready(function ($) {
        jQuery(".job_list_industry").change(function () {
            var id = jQuery(".job_list_industry").val();
            var url = id;
            location.href = url;
        });
    });
</script>