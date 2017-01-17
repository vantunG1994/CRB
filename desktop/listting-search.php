<?php
global $wpdb,$wp2es;
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
if(($_GET["search"])!="")
{
$key_search=$_GET["search"];
$post_title='post_title';
}else{
$post_title='post_type';
$key_search='job';
}
$cond_job=array('post_status'=>'publish', $post_title=>$key_search);
$order_count=array('up_at'=>'desc','post_modified'=>'desc');
$limit_count=array('size'=>18,'page'=>$td_current_page);
$result_search = $wp2es->and_simple_search($cond_job,$order_count,$limit_count);
$td_total = $result_search["0"]["es_total_result"] ?: 0;
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
            <div class="col-md-8">
                <div class="box_title row clearfix" id="b1012">
                    <ul class="nav nav-tabs caribe-border-bottom-fff">
                        <li role="presentation" class="active">
                            <div class="title t-curpointer title_h1_green">
                                <h1 class="news-h1-title caribe-breadcum">Tìm kiếm </h1>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="discription-top">
                    <h2>Tìm kiếm</h2>
                    <p>- Có <?php echo $td_total; ?> kết quả về từ khóa <b><?php echo $key_search; ?></b></p>
                    <p> Bạn đang xem trang <?php echo $td_current_page; ?></p>
                    <h3>Tim kiem</h3>
                </div>
                <div class="index_listting1">
                    <?php
                    foreach ($result_search as  $list) {
                    include 'loop/item_listing_search.php';
                    }
                    ?>
                </section>
                <?php
                $url = home_url() . '/tim-kiem/';
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
<?php include('template-scroll-top.php') ?>
</div>