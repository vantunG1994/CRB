<?php

//echo $_SERVER["REQUEST_URI"];
function sale_staff_my_customer(){
global $wpdb;
$item_per_page=30;
$sale_id = intval(get_current_user_id());
$page=intval($_GET['p']);
echo '<script src="/wp-content/themes/mangvieclam789/js/sweetalert2.min.js"></script>
<link href="/wp-content/themes/mangvieclam789/css/sweetalert2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />';

$limit=$page>0?($page-1)*$item_per_page:0;
$where='1=1 and (sale_uid='.$sale_id.' )';

$user_count=$wpdb->get_var('select count(crb_salestaff_company.ID) from crb_salestaff_company join wp_users on crb_salestaff_company.ID=wp_users.ID where '.$where.'');

$users_sale=$wpdb->get_results('select wp_users.*,crb_salestaff_company.* from crb_salestaff_company join wp_users on crb_salestaff_company.ID=wp_users.ID where '.$where.' order by last_contact desc limit '.$limit.','.$item_per_page);
echo '<div class="wrap">
    <h1>Danh sách khách hàng của tôi</h1>
    <form method="post">
        <table style="margin: 20px;">
            <div class="error" style="width: 500px;display: none;"></div>
            <tr>
                <td>Nhập tên tài khoản</td>
                <td><input style="" type="text" id="user_name" name="user_name"/></td>
                <td><button type="submit" name="up_pass_user" class="up_pass_user">Reset mật khẩu</button></td>
                <td><button type="submit" name="activation_user" class="activation_user">Xác thực tài khoản</button></td>
            </tr>
        </table>
    </form>
    ';
    ?>
    <h4>Tạo tài khoản khách hàng vai trò là nhà tuyển dụng mật khẩu mặc định là: mangvieclam </h4>
    <form method="post">
        <table style="margin-left: 65px;">
            <tr>
                <td>Nhập SĐT</td>
                <td><input style="" type="text"  name="name_custom"/></td>
            </tr>
            <tr>
                <td>Nhập email</td>
                <td><input style="" type="text"  name="email_custom"/></td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <input type="submit" name="feed_custom" value="Tạo tài khoản">
                </td>
            </tr>
        </table>
    </form>
    <?php
    if(isset($_POST['feed_custom']))
    {
    global $current_user,$wpdb;
    $userdata = array(
    'user_login'  =>  $_POST['name_custom'],
    'user_email'    =>  $_POST['email_custom'],
    'user_pass'   =>  'mangvieclam'
    );
    $user_id = wp_insert_user( $userdata ) ;
    if (  is_wp_error( $user_id ) ) {
    echo "<p style='font-size: 20px;color: red;'>SĐT hoặc email đã tồn tại.Vui lòng kiểm tra lại</p>";
    }
    else{
    $data = array();
    $data['name'] = $_POST['name_custom'];
    $data['email'] =  $_POST['email_custom'];
    $data['phone'] = $_POST['name_custom'];
    $wpdb->insert("crb_salestaff_company", array(
    "ID"=>$user_id,
    "name" => $_POST['name_custom'],
    "other_contact" => $data,
    "last_contact" => '',
    "sale_uid" => 0,
    "contact_rating" =>'',
    "re_contact_time" =>'',
    ));
    update_user_meta($user_id, 'account_type', 'job-offer');
    ?>
    <script>
    jQuery(document).ready(function ($) {
    alert("Tạo tài khoản thành công");
    var url = window.location.href + "?page=sale-staff-all-customer&p=0&customer=<?php echo $user_id; ?>";
    location.href = url;
    });
    </script>
    <?php
    }
    }
    if (!current_user_can('sale_staff'))
    {
    global $wpdb;
    $crb_salestaff_company = $wpdb->get_row("SELECT * FROM crb_salestaff_company ORDER BY ID DESC LIMIT 1");
    $id_last = $crb_salestaff_company->ID;
    $users = $wpdb->get_results("SELECT * FROM wp_users INNER  JOIN wp_usermeta ON wp_users.ID=wp_usermeta.user_id WHERE ID >'$id_last' AND wp_usermeta.meta_key='account_type'
    AND wp_usermeta.meta_value='job-offer'");
    $count_new_user = count($users);
    ?>
    <h2>Có <?php echo $count_new_user; ?> tài khoản chưa cập nhật</h2>
    <form method="post">
        <input style="margin-bottom: 15px;" type="submit" name="up_sale_company" value="Cập nhật DSKH"/><br>
        <input type="text" name="id_user_company" placeholder="Nhập ID KH"/>
        <input type="submit" name="up_user_company"  value="Cập nhật KH theo ID"/>
    </form>
    <h2>Chuyển quyền chăm sóc khách hàng</h2>
    <form method="post">
        <input type="text" name="login_company" placeholder="Nhập tài khoản KH"/>
        <input type="text" name="sale_login" placeholder="Nhập tài khoản sale"/>
        <input type="submit" name="add_sale_cap"  value="Chuyển quyền"/>
    </form>
    <?php
    }
    if($user_count){
    echo '<style>table.company-listing{
    border-collapse:collapse;
    border:1px solid #ccc;
    } .company-listing td{border:solid 1px #ccc; padding:3px;} </style>';
    echo '<table class="company-listing" style="width:100%;" cellspacing="0"><tr style="font-weight:bold;"><td>ID</td> <td>Username</td>  <td> Tên Cty</td> <td>Email</td> <td> LH cuối </td> </tr>';
    foreach($users_sale as $user){
    echo '<tr> <td>'.$user->ID.'</td> <td> <a href="?page=sale-staff-all-customer&p='.$page.'&customer='.$user->ID.'">  '.$user->user_login.' </a></td> <td> <a href="?page=sale-staff-all-customer&p='.$page.'&customer='.$user->ID.'">  '.$user->name.' </a></td> <td>'.$user->user_email.'</td><td> '.$user->last_contact.' </td> </tr>';
    
    
    
    }
echo '</table>';
echo '<div>'.salestaff_paginate_function($item_per_page,$page,$user_count,'?page=sale-staff').'</div>';


}
echo '</div>';


}
function sale_staff_all_customer(){
global $wpdb;
$item_per_page=30;
$sale_id = intval(get_current_user_id());
echo '<script src="/wp-content/themes/mangvieclam789/js/sweetalert2.min.js"></script>
<link href="/wp-content/themes/mangvieclam789/css/sweetalert2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />';

$notetemplate=array(
' ',
'Không liên lạc được.',
'Đổ chuông không nghe máy.',
'Đã gặp mặt.',
'Đã gọi điện.',
'Đã nhắn tin.',
'Đã gửi email.',
'Đã tư vấn.',
'Khách tiềm năng, theo sát.',
'Khách quan tâm, liên hệ sau.',
'Khách bận, liên hệ sau.',
'Khách chưa có nhu cầu, liên hệ sau.',
'Khách không tiềm năng, liên hệ sau.',
'Khách từ chối, NEXT',
'Khách bất lịch sự, NEXT',
);



$customer=intval($_GET['customer']);

if($customer){
$user=$wpdb->get_row('select wp_users.ID, wp_users.user_login, wp_users.user_email,crb_salestaff_company.* from crb_salestaff_company join wp_users on crb_salestaff_company.ID=wp_users.ID where wp_users.ID='.$customer.'');
if($user){
if($user->sale_uid==0){
$wpdb->query('update crb_salestaff_company set sale_uid='.$sale_id.' where ID='.$customer);
}else if($user->sale_uid!=$sale_id){
echo '<h2>Khách hàng đã được người khác liên hệ trước bạn</h2>';
goto customer_listing;
}
//contact_day="'.date().'"
if($_POST['note']){
$wpdb->query($sql='insert into crb_salestaff_history set user_id='.$customer.', sale_uid='.$sale_id.', create_at="'.time().'", contact_day="'.date('Y-m-d').'", contact_note="'.addslashes(trim($_POST['note'])).'"' );
//echo $sql;
$wpdb->query('update crb_salestaff_company set last_contact="'.date('Y-m-d').'" '.($_POST['re_contact_day']?', re_contact_time="'.strtotime('+ '.intval($_POST['re_contact_day']).' days').'"':'').' where ID='.$customer);
echo '<h2 style="color:blue;"> Đã lưu cuộc liên hệ, hãy tiếp tục với khách hàng khác </h2>';
}
echo '<br /> <h3> Chi tiết khách hàng </h3><form name="customer_contact" method="post">
<div>Mã KH: <b style="color:red;">'.$user->ID.' </b> </div>
<div>Khách hàng: <b style="color:blue;">'.$user->name.' </b> </div>
<div>Username: <span style="color:red;">'.$user->user_login.'</span> #  Email: <span style="color:blue;">'.$user->user_email.'</span> </div>
<div>Liên hệ: '.(strtotime($user->last_contact)>strtotime('2016-11-30')?$user->last_contact:' Lần đầu liên hệ').' </div>';
$other_contact=json_decode($user->other_contact);
foreach($other_contact as $k=>$info){
echo '<div> INFO_'.$k.': <b>'.$info.'</b></div>';
}
echo '<br>
<div>
    <select onchange="document.customer_contact.note.value+=\' \'+this.options[this.selectedIndex].value">';
        foreach($notetemplate as $note){
        echo '<option value="'.$note.'">'.$note.'</option>';
        }
    echo '</select>
    <input name="note" size="100" placeholder="Nhập kết quả liên hệ, có thể chọn nhanh bằng danh sách bên trái ." />
</div>
<br />

<select name="re_contact_day" onchange="if(this.selectedIndex>0){document.customer_contact.note.value+=\' LH sau \'+this.options[this.selectedIndex].value+\' ngày nữa.\';}">
    <option value=""> Chọn thời gian sẽ liên hệ lại (tùy chọn để được nhắc lịch) </option>
    <option value="1"> Ngày mai </option>
    <option value="2"> 2 ngày nữa </option>
    <option value="3"> 3 ngày </option>
    <option value="5"> 5 ngày </option>
    <option value="7"> 1 tuần </option>
    <option value="14"> 2 tuần </option>
    <option value="30"> 1 tháng </option>
    <option value="60"> 2 tháng </option>
    <option value="90"> 3 tháng </option>
    <option value="180"> 6 tháng </option>
    
</select>

<input type="button" onclick="save_contact();" value="Liên lạc xong" />


</form>
<script>
function save_contact(){
swal({
title: "Hoàn tất cuộc liên hệ?",
text: "  ",
type: "question",
showCancelButton: true,
confirmButtonColor: "#3085d6",
cancelButtonColor: "#d33",
confirmButtonText: "Hoàn tất",
cancelButtonText: "Còn bổ sung",
confirmButtonClass: "btn btn-success",
cancelButtonClass: "btn btn-danger",
buttonsStyling: true
}).then(function () {
document.customer_contact.submit();
})
}
</script>
';
$contact_history=$wpdb->get_results('select * from crb_salestaff_history where user_id='.$customer);
if(count($contact_history)){
echo '<h3>Lịch sử liên hệ:</h3>';
foreach($contact_history as $history){
echo '<div style="width:95%;">
<span style="margin-left:50px;"><b>'.$history->contact_day.':</b> '.$history->contact_note.' </span>

</div>';
}
}
} else{
echo '<h3>User không tồn tại </h3><br>';
}
}

customer_listing:
echo '<div class="wrap">
<h1>Danh sách khách hàng sẵn có</h1>
<div class="error" style="width: 500px;display: none;"></div>
';
global $wpdb,$wp2es;
$item_per_page=30;
if($_GET['from_date']!="" && $_GET['to_date']!="")
{
$s=$_GET['from_date'];
$e=$_GET['to_date'];
$where='  WHERE sale_uid=0 AND user_registered >= "'.$s.'" ';
}
else {
if($_GET['user_search_staff']!="")
{
$key_user=$_GET['user_search_staff'];
$id=$key_user;
$user = get_user_by('login',$id);
$user_email = get_user_by( 'email',$id);
if($user !="")
{
$id_user_search=$user->ID;
}
if($user_email !="")
{
$id_user_search= $user_email->ID;
}
$where=' WHERE (wp_users.ID='.$id_user_search.' )';
}
else if($_GET['option']=='register_new_in_date')
{
$today = date('Y-m-d');
$where='  WHERE sale_uid=0 AND user_registered >= "'.$today.'" ';
}
else if($_GET['option']=='register_new_in_week')
{
//            echo   $today = date('Y-m-d');
$day = date('Y-m-d', strtotime("last Monday"));
$where='  WHERE sale_uid=0 AND user_registered >= "'.$day.'" ';
}
else if($_GET['option']=='sucess_new_in_date')
{
$today = date('Y-m-d');
$day = date('Y-m-d', strtotime("last Monday"));
$where="INNER JOIN wp_usermeta ON wp_users.ID=wp_usermeta.user_id WHERE sale_uid=0 AND wp_usermeta.meta_key='user_phone_activation_time' AND wp_usermeta.meta_value!=0 AND user_registered >= ".$today." ";
}
else if($_GET['option']=='sucess_new_in_week')
{
$today = date('Y-m-d');
$day = date('Y-m-d', strtotime("last Monday"));
$where="INNER JOIN wp_usermeta ON wp_users.ID=wp_usermeta.user_id WHERE sale_uid=0 AND wp_usermeta.meta_key='user_phone_activation_time' AND wp_usermeta.meta_value!=0 AND user_registered >= ".$day." ";
}
else if($_GET['option']=='post_10_50')
{
$users_post=$wpdb->get_results("SELECT DISTINCT crb_salestaff_company.ID FROM crb_salestaff_company INNER JOIN wp_users ON crb_salestaff_company.ID=wp_users.ID INNER JOIN wp_posts ON wp_users.ID=wp_posts.post_author WHERE sale_uid=0 AND wp_posts.post_type='job'");
$id_user_post=" ";
foreach($users_post as $v)
{
$id_user_post.='wp_users.ID='.$v->ID.' OR ';
}
$pos=strrpos($id_user_post,"OR");
$id_user_post= substr($id_user_post,0,$pos);
$where="WHERE sale_uid=0 AND ".$id_user_post;
}
else{
$where = ' WHERE sale_uid=0 ORDER BY user_registered DESC ';
}
}
$page=intval($_GET['p']);
$limit=$page>0?($page-1)*$item_per_page:0;
$user_count=$wpdb->get_var('select count(crb_salestaff_company.ID) from crb_salestaff_company join wp_users on crb_salestaff_company.ID=wp_users.ID '.$where.'');
$users_list=$wpdb->get_results('SELECT * FROM crb_salestaff_company INNER JOIN wp_users ON crb_salestaff_company.ID=wp_users.ID '.$where.' LIMIT '.$limit.',30');
if($user_count==0)
{
$user_count=$wpdb->get_var('select count(*) from wp_users '.$where.'');
$users_list=$wpdb->get_results('SELECT * FROM wp_users '.$where.' LIMIT '.$limit.',30');
}
//    $data_option=array(
//
//        'register_new_in_date'=>'KH mới đăng ký trong ngày',
//        'register_new_in_week'=>'KH mới đăng ký trong tuần',
//        'sucess_new_in_date'=>'KH mới xác thực trong ngày',
//        'sucess_new_in_week'=>'KH mới xác thực trong tuần',
//        'post_100'=>'KH có nhiều hơn 100 tin đăng',
//        'post_50_100'=>'KH có từ 50 đến 100 tin đăng',
//
//    );
////    print_r($data_option);
//
//        echo $data_option['register_new_in_date'];
?>
<h3 style="color:darkred; ">Có <?php echo $user_count; ?> tài khoản</h3>
<table style="margin-bottom: 20px;">
    <tr>
        <td>
            <select class="select_user_option">
                <option value="" >Lựa chọn thao tác</option>
                <option value="register_new_in_date" >KH mới đăng ký trong ngày</option>
                <option value="register_new_in_week" >KH mới đăng ký trong tuần</option>
                <option value="sucess_new_in_date" >KH mới xác thực trong ngày</option>
                <option value="sucess_new_in_week" >KH mới xác thực trong tuần</option>
                <option value="post_10_50" >KH có tin đăng </option>
                <option value="new_login" >KH vừa mới đăng nhập </option>
                <option value="sucess_transaction" >KH đã từng giao dịch </option>
            </select>
        </td>
        <td>Từ ngày</td>
        <td><input type="date" name="from_date" value="<?php echo $_GET['from_date']; ?>" class="from_date"> </td>
        <td>Đến ngày</td>
        <td><input type="date" name="to_date" class="to_date" value="<?php echo $_GET['to_date']; ?>"> </td>
        <td><input type="button" class="search_user_date" name="search_user_date" value="Lọc theo ngày"></td>
        <td><input placeholder="Nhập từ khoá tìm kiếm" value="<?php echo $_GET['user_search_staff']; ?>" class="key_search_user" type="text" name="key_search_user"></td>
        <td><input type="button" class="search_user_staff" name="search_user_staff" value="Tìm kiếm"></td>
    </tr>
</table>
<?php
if($user_count){
echo '<style>table.company-listing{
border-collapse:collapse;
border:1px solid #ccc;
} .company-listing td{border:solid 1px #ccc; padding:3px;} </style>';
echo '<table class="company-listing" style="width:100%;" cellspacing="0"><tr style="font-weight:bold;"><td>STT</td><td>ID</td>  <td> Tên cty</td> <td>Email</td><td>Sở hữu</td><td> Hoạt động </td> <td> Trạng thái </td> </tr>';
$i=0;
foreach($users_list as $user){
//            print_r($user);
$user_id=$user->ID;
$sale_id=$user->sale_uid;
$sale_obj = get_user_by('id', $sale_id);
if($sale_id==0)
{
$user_status="Không xác định";
}else{
$user_info = get_userdata($sale_id);
$user_status=$user_info->user_login."<br>Đã liên hệ";
}
$user_name=$user->name;
if($user_name=="") {
$companies = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}posts` WHERE post_type = 'company' and post_status = 'publish' and post_author = '" . $user->ID . "'");
foreach ($companies as $company) {
$comp_id = $company->ID;
$user_name = esc_attr(get_post_meta($comp_id, 'wpjobus_company_fullname', true));
}
}
$i=$i+1;
global $wpdb;
$where = get_posts_by_author_sql("job", true,$user_id);
$user_post_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts $where" );
$date_login= get_last_login($user->ID);
if($date_login !="")
{
$login_date=date("Y-m-d h:m:s",$date_login);
}else{$login_date="";}
$now = time();
$last_login = get_last_login($user->ID,true);
$datediff = $now - $last_login;
$last_login_date= floor($datediff/(60*60*24)) . '';
if($last_login_date <=0)
{
$last_login_date="";
}
//            if (current_user_can('administrator')){
//                echo "<pre>";
    //                echo $wpdb->last_query;//lists only single query
//                echo "</pre>";
//            }
echo '<tr><td>'.$i.'</td>  <td>'.$user->ID.'</td>
<td> <a href="?page=sale-staff-all-customer&p='.$page.'&customer='.$user->ID.'">  '.$user_name.' </a>
<p><b>Tài khoản: </b><a href="?page=sale-staff-all-customer&p='.$page.'&customer='.$user->ID.'"> '.$user->user_login.'</p>
</td>
<td>'.$user->user_email.'</td>
<td><p><b>Tin đăng: </b>'.$user_post_count.'</p></td>
<td><p><b>Đăng ký: </b>'.$user->user_registered.'</p>
<p><b>Login date: </b>'.$login_date .'</p>
<p><b>Last login date: </b>'.$last_login_date .'</p>
</td>
<td>'.$user_status.'</td>
</tr>';



}
echo '</table>';
echo '<div>'.salestaff_paginate_function($item_per_page,$page,$user_count,$_SERVER["REQUEST_URI"]).'</div>';


}
echo '</div>';


}
function salestaff_paginate_function($item_per_page, $current_page, $total_records,$url)  {

$current_page=($current_page?$current_page:1);
$total_pages = FLOOR($total_records/$item_per_page);
$url_first = $url;
if(!strpos(' '.$url,'?')){
$url .='?';
}else{
$url .='&';
}

$pagination = '';
if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
$pagination .= '<ul class="pagination">';

$right_links    = $current_page + 5;
$previous       = $current_page - 5; //previous link
$next           = $current_page + 1; //next link
$first_link     = true; //boolean var to decide our first link
$pos=strrpos($_SERVER["REQUEST_URI"],"p=");
if($pos !="")
{
$uri=substr($_SERVER["REQUEST_URI"],0,$pos-1);
}
else{
$uri =$_SERVER["REQUEST_URI"];
}
$url_first=home_url().$uri;

if($current_page > 1){
$previous_link = ($previous<=0)?$current_page-1:1;
$pagination .= '<li class="first"><a href="'.$url_first.'"  title="First">First</a></li>'; //first link
if ($previous_link==1) {
$pagination .= '<li><a href="'.$url_first.'" title="Previous">&laquo;</a></li>'; //previous link
}else{
$pagination .= '<li><a href="'.$url.'p='.$previous_link.'" title="Previous">&laquo;</a></li>'; //previous link
}

for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
if($i > 0){
if ($i ==1) {
$pagination .= '<li><a href="'.$url_first.'" title="Page'.$i.'">'.$i.'</a></li>';
}else{
$pagination .= '<li><a href="'.$url.'p='.$i.'" title="Page'.$i.'">'.$i.'</a></li>';
}

}
}
$first_link = false; //set first link to false
}

if($first_link){ //if current active page is first link
$pagination .= '<li class="first active"><a>'.$current_page.'</a></li>';
}elseif($current_page == $total_pages){ //if it's the last active link
$pagination .= '<li class="last active"><a>'.$current_page.'</a></li>';
}else{ //regular current link
$pagination .= '<li class="active"><a>'.$current_page.'</a></li>';
}

for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
if($i<=$total_pages){
$pagination .= '<li><a href="'.$url.'p='.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
}
}
if($current_page < $total_pages){
$next_link = ($i > $total_pages)? $current_page+1 :1;
$pagination .= '<li><a href="'.$url.'p='.$next_link.'"  title="Next">&raquo;</a></li>'; //next link
$pagination .= '<li class="last"><a href="'.$url.'p='.$total_pages.'" title="Last">Last</i></a></li>'; //last link
}

$pagination .= '</ul>';
}
return $pagination; //return pagination links
}
if(isset($_POST["up_pass_user"]))
{
$user = get_userdatabylogin($_POST["user_name"]);
if($user){
$user_id= $user->ID;
$password="mangvieclam";
wp_set_password( $password, $user_id );
?>
<script>alert("Cập nhập mật khẩu thành công");
window.history.back();
</script>
<?php
}
else{
?>
<script>alert("Tài khoản không chính xác");
window.history.back();
</script>
<?php
}
}
if(isset($_POST["activation_user"])) {
$user = get_userdatabylogin($_GET["user_name"]);
if ($user) {
$user_id = $user->ID;
$user_phone_activation_code = get_user_meta($user_id, 'user_phone_activation_code', true) ?: 0;
$user_phone_activation_time = get_user_meta($user_id, 'user_phone_activation_time', true) ?: 0;
$time = time();
if ($user_phone_activation_code != 0 && $user_phone_activation_time == 0) {
update_user_meta($user_id, 'user_phone_activation_time',$time);
?>
<script>alert("Xác thực tài khoản thành công");
window.history.back();
</script>
<?php
}
else{
?>
<script>alert("Tài khoản đã được xác thực");
window.history.back();
</script>
<?php
}
}
else{
?>
<script>alert("Tài khoản không chính xác");
window.history.back();
</script>
<?php
}
}
if(isset($_POST["up_user_company"]))
{
global $wpdb;
$id_user=$_POST['id_user_company'];
$crb_salestaff_company=$wpdb->get_row("SELECT * FROM crb_salestaff_company WHERE ID ='$id_user' ");
$id_last= $crb_salestaff_company->ID;
if($id_last ==""){
$users = $wpdb->get_results("SELECT * FROM wp_users INNER  JOIN wp_usermeta ON wp_users.ID=wp_usermeta.user_id WHERE ID ='$id_user' ");
//    $users = $wpdb->get_results("SELECT * FROM wp_users INNER  JOIN wp_usermeta ON wp_users.ID=wp_usermeta.user_id WHERE ID >'$id_last' AND wp_usermeta.meta_key='account_type' AND wp_usermeta.meta_value='job-offer'");
$count_new_user= count($users);
//    print_r($users);
if(count($users) >0){
foreach ($users as $user) {
//                echo $user->ID;
$companies = $wpdb->get_results("SELECT * FROM wp_posts WHERE post_type = 'company' and post_author = '" . $user->ID . "'");
foreach ($companies as $company) {
$comp_id = $company->ID;
$wpjobus_company_fullname = esc_attr(get_post_meta($comp_id, 'wpjobus_company_fullname', true));
}
if ($wpjobus_company_fullname == "") {
$wpjobus_company_fullname = $user->user_login;
}
$data = array();
$data['name'] = $user->user_nicename;
$data['email'] = $user->user_email;
$data['phone'] = $user->user_login;
//                print_r($data);
$wpdb->insert("crb_salestaff_company", array(
"ID"=>$user->ID,
"name" => $wpjobus_company_fullname,
"other_contact" => $data,
"last_contact" => '',
"sale_uid" =>0,
"contact_rating" =>'',
"re_contact_time" =>'',
));
//            echo "<pre>";
//            echo $wpdb->last_query;//lists only single query
//            echo "</pre>";
?>
<script>alert("Tài khoản cập nhật thành công");
window.history.back();
</script>
<?php
}
}
else{
?>
<script>alert("Tài khoản không chính xác");
window.history.back();
</script>
<?php
}
}
else{
?>
<script>alert("Tài khoản đã tồn tại");
window.history.back();
</script>
<?php
}
}
if(isset($_POST["up_sale_company"]))
{
global $wpdb;
$crb_salestaff_company=$wpdb->get_row("SELECT * FROM crb_salestaff_company ORDER BY ID DESC LIMIT 1");
$id_last= $crb_salestaff_company->ID;
//    $users = $wpdb->get_results("SELECT * FROM wp_users INNER  JOIN wp_usermeta ON wp_users.ID=wp_usermeta.user_id WHERE ID =304428 OR ID=328356 AND wp_usermeta.meta_key='account_type' AND wp_usermeta.meta_value='job-offer'");
$users = $wpdb->get_results("SELECT * FROM wp_users INNER  JOIN wp_usermeta ON wp_users.ID=wp_usermeta.user_id WHERE ID >'$id_last' AND wp_usermeta.meta_key='account_type' AND wp_usermeta.meta_value='job-offer'");
$count_new_user= count($users);
//    print_r($users);
if(count($users) >0){
foreach ($users as $user) {
$user_company_id= $user->ID;
$companies = $wpdb->get_row("SELECT ID FROM wp_posts WHERE post_type = 'company' and post_author = '" .$user_company_id. "'");
$comp_id = $companies->ID;
$wpjobus_company_fullname = esc_attr(get_post_meta($comp_id, 'wpjobus_company_fullname', true));
if ($wpjobus_company_fullname == "") {
$wpjobus_company_fullname = $user->user_login;
}
$data = array();
$data['name'] = $user->user_nicename;
$data['email'] = $user->user_email;
$data['phone'] = $user->user_login;
//                print_r($data);
$wpdb->insert("crb_salestaff_company", array(
"ID"=>$user->ID,
"name" => $wpjobus_company_fullname,
"other_contact" => $data,
"last_contact" => '',
"sale_uid" =>0,
"contact_rating" =>'',
"re_contact_time" =>'',
));
//            echo "<pre>";
//            echo $wpdb->last_query;//lists only single query
//            echo "</pre>";
}
}
}
if(isset($_POST['add_sale_cap']))
{
global $wpdb;
$login_company=$_POST['login_company'];
$sale_login=$_POST['sale_login'];
$user_company = get_user_by('login',$login_company);
$user_email_company = get_user_by( 'email',$login_company);
if($user_company !="")
{
$id_user_company=$user_company->ID;
}
if($user_email_company !="")
{
$id_user_company= $user_email_company->ID;
}
$user_sale = get_user_by('login',$sale_login);
$user_email_sale = get_user_by( 'email',$sale_login);
if($user_sale !="")
{
$id_user_sale=$user_sale->ID;
}
if($user_email_sale !="")
{
$id_user_sale= $user_email_sale->ID;
}
if($id_user_company!="" && $id_user_sale!="" )
{
$wpdb->query('update crb_salestaff_company set sale_uid='.$id_user_sale.' where ID='.$id_user_company);
?>
<script>
alert("Chuyển quyền thành công");
</script>
<?php
}
else{
?>
<script>
alert("Thông tin không chính xác. Vui lòng nhập lại");
</script>
<?php
}
}
?>