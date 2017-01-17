<?php
global $wp2es;
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
$cond_company=array('post_status'=>'publish','post_type'=>'company');
$order_count_company=array('up_at'=>'desc','post_modified'=>'desc');
$limit_count_company=array('size'=>8,'page'=>$td_current_page);
$result_company = $wp2es->and_simple_search($cond_company,$order_count_company,$limit_count_company);
$td_total = $result_company["0"]["es_total_result"] ?: 0;
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
                                <h1 class="news-h1-title caribe-breadcum">Doanh nghiệp </h1>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="discription-top">
                    <p> Có <?php echo $td_total ?> hồ sơ còn hiệu lực
                        </p><p> Bạn đang xem trang <?php echo $td_current_page ?></p>
                        <h2>Doanh nghiep</h2>
                    </div>
                    <div class="index_listting1">
                        <section id="template_listting">
                            <?php
                            foreach ($result_company as  $list) {
                            include 'loop/item_listing_company.php';
                            }
                            ?>
                        </section>
                        <?php
                        $url = home_url() . '/ho-so-doanh-nghiep/';
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