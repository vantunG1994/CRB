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


    foreach($locations as $v) {
        $location .= ''.$v.'' . ',';
    }


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
    $job_typess=$_GET["industry"];
    $job_types="";
    $job_typess=$_GET["industry"];
    $job_types="";

    $industry = $job_typess[0];


    if(count($job_typess)==1 && $industry !=$job_type)
    {

        $query = str_replace( '&industry%5B%5D='.$industry.'', '', $_SERVER['QUERY_STRING'] );




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
?>
<div class="main-content">
    <div class="container bg-fff">
        <div class="row">
            <div class="col-md-8 listting">
                <div class="box_title  clearfix" id="b1012">
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
                    <h3> Ung vien <?php echo vn_str_filter($job_type); ?></h3>
                </div>
                <div class="index_listting1">
                     <div id="top_companies-block">
                <div class="list_industry">

                    <select class="select2 job_list_industry" id="job_list_industry">
                       <option value="">Ngành nghề</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/ban-hang">Bán hàng</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/bao-chi-bien-tap-vien">Báo chí/Biên tập viên</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/bat-dong-san">Bất động sản</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/bien-dich-phien-dich">Biên dịch/Phiên dịch</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/buu-chinh-vien-thong">Bưu chính viễn thông</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/co-khi-ki-thuat-ung-dung">Cơ khí/Kĩ thuật ứng dụng</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/cong-nghe-thong-tin">Công nghệ thông tin</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/dau-khi-dia-chat">Dầu khí/Địa chất</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/det-may">Dệt may</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/bao-ve-ve-si-an-ninh">Bảo vệ/Vệ sĩ/An ninh</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/cham-soc-khach-hang">Chăm sóc khách hàng</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/dien-dien-tu-dien-lanh">Điện/Điện tử/Điện lạnh</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/du-lich-nha-hang-khach-san">Du lịch/Nhà hàng/Khách sạn</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/duoc-hoa-chat-sinh-hoa">Dược/Hóa chất/Sinh hóa</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/giai-tri-vui-choi">Giải trí/Vui chơi</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/giao-duc-dao-tao-thu-vien">Giáo dục/Đào tạo/Thư viện</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/giao-thong-van-tai-thuy-loi-cau-duong">Giao thông/Vận tải/Thủy lợi/Cầu đường</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/giay-da-thuoc-da">Giày da/Thuộc da</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/sinh-vien-thuc-tap">Sinh viên/Thực tập</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/moi-truong-xu-ly-chat-thai">Môi trường/Xử lý chất thải</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/my-pham-thoi-trang-trang-suc">Mỹ phẩm/Thời trang/Trang sức</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/ngan-hang-chung-khoan-dau-tu">Ngân hàng/Chứng khoán/Đầu tư</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/nghe-thuat-dien-anh">Nghệ thuật/Điện ảnh</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/nhan-su">Nhân sự</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/nong-lam-ngu-nghiep">Nông/Lâm/Ngư nghiệp</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/quan-he-doi-ngoai">Quan hệ đối ngoại</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/tham-dinh-giam-dinh-quan-ly-chat-luong">Thẩm định/Giám định/Quản lý chất lượng</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/quan-ly-dieu-hanh">Quản lý điều hành</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/quang-cao-marketing-pr">Quảng cáo/Marketing/PR</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/san-xuat-van-hanh-san-xuat">Sản xuất/Vận hành sản xuất</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/tai-chinh-ke-toan-kiem-toan">Tài chính/Kế toán/Kiểm toán</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/the-duc-the-thao">Thể dục/Thể thao</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/thiet-ke-my-thuat">Thiết kế/Mỹ thuật</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/thoi-vu-ban-thoi-gian">Thời vụ/Bán thời gian</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/thuc-pham-dv-an-uong">Thực phẩm/DV ăn uống</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/xay-dung">Xây dựng</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/xuat-nhap-khau-ngoai-thuong">Xuất-Nhập khẩu/Ngoại thương</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/y-te">Y tế</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/khac">Khác</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/ngoai-ngu">Ngoại ngữ</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/khu-che-xuat-khu-cong-nghiep">Khu chế xuất/Khu công nghiệp</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/lam-dep-the-luc-spa">Làm đẹp/Thể lực/Spa</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/tai-xe-lai-xe-giao-nhan">Tài xế/Lái xe/Giao nhận</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/trang-thiet-bi-cong-nghiep">Trang thiết bị công nghiệp</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/trang-thiet-bi-gia-dung">Trang thiết bị gia dụng</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/trang-thiet-bi-van-phong">Trang thiết bị văn phòng</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/pg-pb-le-tan">PG/PB/Lễ tân</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/phat-trien-thi-truong">Phát triển thị trường</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/phuc-vu-tap-vu-giup-viec">Phục vụ/Tạp vụ/Giúp việc</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/tu-van-bao-hiem">Tư Vấn Bảo Hiểm</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/tong-hop">Tổng hợp</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/hanh-chinh-thu-ky-tro-ly">Hành chính/Thư ký/Trợ lý</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/kho-van-vat-tu-thu-mua">Kho vận/Vật tư/Thu mua</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/kien-truc-noi-that">Kiến trúc/Nội thất</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/kinh-doanh">Kinh doanh</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/lao-dong-pho-thong">Lao động phổ thông</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/luat-phap-ly">Luật/Pháp lý</option>
                            <option value="https://mangvieclam.com/nganh-nghe-tuyen-dung/tu-van-bao-hiem">Tư vấn bảo hiểm</option>
                    </select>

                   
                    </div>
                    <div class="location">
                    <select class="select2 job_list_location" id="job_list_location" >
                      <option value="">Khu vực</option>
                      <option value="Hà Nội">Hà Nội</option>
                      <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                      <option value="Bắc Giang">Bắc Giang</option>
                      <option value="Bắc Kạn">Bắc Kạn</option>
                      <option value="Bạc Liêu">Bạc Liêu</option>
                      <option value="Bắc Ninh">Bắc Ninh</option>
                      <option value="Bà Rịa Vũng Tàu">Bà Rịa Vũng Tàu</option>
                      <option value="Bến Tre">Bến Tre</option>
                      <option value="Bình Định">Bình Định</option>
                      <option value="Bình Dương">Bình Dương</option>
                      <option value="Bình Phước">Bình Phước</option>
                      <option value="Bình Thuận">Bình Thuận</option>
                      <option value="Cà Mau">Cà Mau</option>
                      <option value="Cao Bằng">Cao Bằng</option>
                      <option value="Đắk Lắk">Đắk Lắk</option>
                      <option value="Đắk Nông">Đắk Nông</option>
                      <option value="Đà Nẵng">Đà Nẵng</option>
                      <option value="Điện Biên">Điện Biên</option>
                      <option value="Đồng Nai">Đồng Nai</option>
                      <option value="Đồng Tháp">Đồng Tháp</option>
                      <option value="Gia Lai">Gia Lai</option>
                      <option value="Hà Giang">Hà Giang</option>
                      <option value="Hải Dương">Hải Dương</option>
                      <option value="Hải Phòng">Hải Phòng</option>
                      <option value="Hà Nam">Hà Nam</option>
                      <option value="Hậu Giang">Hậu Giang</option>
                      <option value="Hà Tĩnh">Hà Tĩnh</option>
                      <option value="Hòa Bình">Hòa Bình</option>
                      <option value="Hưng Yên">Hưng Yên</option>
                      <option value="Khánh Hòa">Khánh Hòa</option>
                      <option value="Kiên Giang">Kiên Giang</option>
                      <option value="Kon Tum">Kon Tum</option>
                      <option value="Lai Châu">Lai Châu</option>
                      <option value="Lâm Đồng">Lâm Đồng</option>
                      <option value="Lạng Sơn">Lạng Sơn</option>
                      <option value="Lào Cai">Lào Cai</option>
                      <option value="Long An">Long An</option>
                      <option value="Nam Định">Nam Định</option>
                      <option value="Nghệ An">Nghệ An</option>
                      <option value="Ninh Bình">Ninh Bình</option>
                      <option value="Ninh Thuận">Ninh Thuận</option>
                      <option value="Phú Thọ">Phú Thọ</option>
                      <option value="Phú Yên">Phú Yên</option>
                      <option value="Quảng Bình">Quảng Bình</option>
                      <option value="Quảng Nam">Quảng Nam</option>
                      <option value="Quảng Ngãi">Quảng Ngãi</option>
                      <option value="Quảng Ninh">Quảng Ninh</option>
                      <option value="Quảng Trị">Quảng Trị</option>
                      <option value="Sóc Trăng">Sóc Trăng</option>
                      <option value="Sơn La">Sơn La</option>
                      <option value="Tây Ninh">Tây Ninh</option>
                      <option value="Thái Bình">Thái Bình</option>
                      <option value="Thái Nguyên">Thái Nguyên</option>
                      <option value="Thanh Hóa">Thanh Hóa</option>
                      <option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
                      <option value="Tiền Giang">Tiền Giang</option>
                      <option value="Trà Vinh">Trà Vinh</option>
                      <option value="Tuyên Quang">Tuyên Quang</option>
                      <option value="Vĩnh Long">Vĩnh Long</option>
                      <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                      <option value="Yên Bái">Yên Bái</option>
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