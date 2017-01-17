<?php
global $wp2es,$wpdb;
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
$pos=strrpos(get_pagenum_link(),"?");
if($pos !="")
{
$url=substr(get_pagenum_link(),0,$pos);
$url = rtrim($url, "/");
}
else{
$url = rtrim(get_pagenum_link(), "/");
}
$td_total = $result_resume["0"]["es_total_result"] ?: 0;
$td_total_pages=$td_total;
if($td_total_pages >1000)
{
$td_total_pages=1000;
}
$pos = strrpos($url, "/");
$sub_string = substr($url, $pos + 1);
$job_field=$wpdb->get_row('SELECT * FROM `job_field` WHERE `slug`= "'.$sub_string.'" ');
$job_type=$job_field->name;
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
$location =$locations;
$resume_location='resume_location';
}else
{
$resume_location='post_type';
$location='resume';
}
if(($_GET["salary"])!="")
{
$salary='';
$salary=$_GET["salary"];
$wpjobus_resume_remuneration='wpjobus_resume_remuneration';
}
else{
$salary='resume';
$wpjobus_resume_remuneration='post_type';
}
if(($_GET["industry"])!="" )
{
global $redux_demo;
$job_typess=$_GET["industry"];
$job_types="";
$job_typess=$_GET["industry"];
$job_types="";
$industry = $job_typess;
if(count($job_typess)==1 && $industry !=$job_type)
{
$query = str_replace( '&industry='.$industry.'', '', $_SERVER['QUERY_STRING'] );
?>
<script>
location.href="<?php echo home_url('/')."ung-vien-theo-nganh-nghe/".$industry."?".$query; ?>";
</script>
<?php
}
$job_types=$job_type;
$resume_industry='resume_industry';
}else
{
if($job_type=="")
{
$resume_industry='post_type';
$job_types='resume';
}else{
$resume_industry='resume_industry';
$job_types=$job_type;
}
}
if(($_GET["job_est_year_num"])!=""  && $_GET["job_est_year_num"]!=0 ){
$years_of_exp=$_GET["job_est_year_num"];
$job_est_year_num="";
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
if($_GET['wpjobus_resume_job_type'] !='')
{
$resume_job_type=$_GET['wpjobus_resume_job_type'];
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
$resume_industry=>$job_types,
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
$job_field=$wpdb->get_results('select * from job_field ');
$job_province=$wpdb->get_results('select * from job_province ');
?>
<div class="main-content">
    <div class="container content-bg">
        <div class="row">
            <div class="col-md-8">
                <div class="box_title row clearfix" id="b1012">
                    <ul class="nav nav-tabs caribe-border-bottom-fff">
                        <li role="presentation" class="active">
                            <div class="title t-curpointer title_h1_green">
                                <h1 class="news-h1-title caribe-breadcum">Ứng viên <?php echo $job_type ?></h1>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="discription-top">
                    <h2>Ứng viên <?php echo $job_type ?></h2>
                    <p>- Có <?php echo $td_total ?> tin đăng còn hiệu lực trong mục</p>
                    <h3>Ứng viên <?php echo $job_type ?>.</h3>
                    <p> Bạn đang xem trang <?php echo $td_current_page; ?></p>
                    <h3> Un vien <?php echo vn_str_filter($job_type); ?></h3>
                </div>
                <div class="index_listting1">
                    <div id="top_companies-block">
                        <div class="list_industry">
                            <select class="select2 job_list_industry" id="job_list_industry">
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
                            
                        </div>
                        <div class="location">
                            <select class="select2 job_list_location" id="job_list_location" >
                                <?php
                                if($_GET['resume_location']!="")
                                {
                                ?>
                                <option selected value="<?php echo $location; ?>"><?php echo $location; ?></option>
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
                        foreach ($result_resume as $list) {
                        include 'loop/item_listing.php';
                        }
                        ?>
                    </section>
                    <?php
                    $url = home_url() . '/ung-vien-theo-nganh-nghe/'.$sub_string.'/';
                    if ($td_total_pages > 1) {
                    $args = array(
                    'base' => $url . '%_%',
                    'current' => $td_current_page,
                    'format' => 'page/%#%',
                    'total' => $td_total_pages,
                    );
                    echo "<div class='paginate_links_filters'>".paginate_links( $args )."</div>";                }
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                include('search-filters-resume.php');
                include('sidebar.php');
                include('listnews.php');
                ?>
            </div>
        </div>
    </div>
    <?php include('template-scroll-top.php') ?>
</div>
<script>
jQuery(document).ready(function ($) {
jQuery(".job_list_location").change(function () {
var id = jQuery(".job_list_location").val();
var url = "<?php echo home_url('/')."ung-vien-theo-nganh-nghe/".$sub_string;?>?resume_location=" + id;
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