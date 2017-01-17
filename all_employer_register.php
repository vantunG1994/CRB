<script src="/wp-content/themes/mangvieclam789/js/sweetalert2.min.js"></script>
<link href="/wp-content/themes/mangvieclam789/css/sweetalert2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />
<?php
global $wpdb,$current_user;
$page=intval($_GET['p'])?:0;
$item_per_page=30;
$limit=$page>0?($page-1)*$item_per_page:0;
$employer = $wpdb->get_results("SELECT DISTINCT number_phone,industry_user,date_create,status,id FROM crb_cookie_user WHERE account_type='job-offer' ORDER BY date_create DESC  LIMIT $limit,$item_per_page");
$employer_count = $wpdb->get_var("SELECT COUNT(id) FROM crb_cookie_user WHERE account_type='job-offer'");
//    $employer_count=count($employers);
?>
<h2>Có tất cả <?php echo $employer_count ?> doanh nghiệp</h2>
<?php
$notetemplate=array(
'Không liên lạc được.',
'Đổ chuông không nghe máy.',
'Đã tư vấn.',
'Khách tiềm năng, theo sát.',
'Khách quan tâm, liên hệ sau.',
'Khách bận, liên hệ sau.',
'Khách chưa có nhu cầu, liên hệ sau.',
'Khách không tiềm năng, liên hệ sau.',
'Khách từ chối, NEXT',
'Khách bất lịch sự, NEXT',
);
if($_GET['id_user'] !="")
{
$id_user=$_GET['id_user'];
$job_offer = $wpdb->get_row("SELECT * FROM crb_cookie_user WHERE account_type='job-offer' AND id='$id_user'");
//        print_r($job_offer);
?>
<div style="border:solid 1px #ccc; padding:3px; ">
    <h3 style="color: crimson;">Bạn đang hỗ trợ khách hàng <?php echo $job_offer->number_phone; ?></h3>
    <p><b>ID:</b> <?php echo $job_offer->id; ?></p>
    <p><b>SĐT:</b> <?php echo $job_offer->number_phone; ?></p>
    <p><b>Ngành nghề:</b> <?php echo $job_offer->industry_user; ?></p>
    <h5 style="font-weight: bold;">Tạo tài khoản khách hàng với pass mặc định là: mangvieclam</h5>
    <form method="post">
        <input type="text" name="user_name" placeholder="Nhập SĐT">
        <input type="text" name="user_email" placeholder="Nhập email(nếu có)">
        <input type="submit" name="add_user" value="Thêm">
        <select name="contact_note">
            <option>Lựa chọn trạng thái</option>
            <?php
            foreach($notetemplate as $note){
            echo '<option value="'.$note.'">'.$note.'</option>';
            }
            ?>
            <input type="submit" name="add_contact_note" value="Xác nhận liên lạc">
        </select>
    </form>
</div>
<?php
}
if(isset($_POST["add_contact_note"])) {
$data_status=array();
$data_status["sale_id"]=$current_user->ID;
$data_status["note_contact"]=$_POST["contact_note"];
$data_status["date_contact"]=date('Y-m-d H:i:s');
$wpdb->update(
'crb_cookie_user',
array(
'status' => json_encode($data_status)
),
array( 'id' => $_GET["id_user"] )
);
}
if(isset($_POST["add_user"])) {
$login_name = $_POST["user_name"];
$email_name = $_POST["user_email"];
$pass = "mangvieclam";
global $current_user, $wpdb;
$userdata = array(
'user_login' => $login_name,
'user_email' => $email_name,
'user_pass' => 'mangvieclam'
);
$user_id = wp_insert_user($userdata);
if (is_wp_error($user_id)) {
echo "<p style='font-size: 20px;color: red;'>SĐT hoặc email đã tồn tại.Vui lòng kiểm tra lại</p>";
}
else{
if($email_name=="")
{
$check_email="chưa cập nhật";
}
else{$check_email=$email_name;}
$data = array();
$data['name'] =$login_name;
$data['email'] =$check_email ;
$data['phone'] =$login_name;
$wpdb->insert("crb_salestaff_company", array(
"ID"=>$user_id,
"name" =>$login_name,
"other_contact" => json_encode($data),
"last_contact" => '',
"sale_uid" => $current_user->ID,
"contact_rating" =>'',
"re_contact_time" =>'',
));
update_user_meta($user_id, 'account_type', $job_offer->industry_user);
//            $wpdb->delete( 'crb_cookie_user', array( 'id' => $id_user ) );
?>
<script>
jQuery(document).ready(function ($) {
alert("Tạo tài khoản thành công, Khách hàng thuộc quyền chăm sóc của bạn");
});
</script>
<?php
}
}
?>
<style>
table{
border-collapse:collapse;
border:1px solid #ccc;
} table td,th{border:solid 1px #ccc; padding:3px;}
</style>
<table class="" style="margin-top: 50px;">
    <caption>Danh Sách Doanh Nghiệp Hỗ Trợ </caption>
    <thead>
        <tr>
            <th><?php _e('Tên Tài Khoản', 'pippinw'); ?></th>
            <th><?php _e('Ngành nghề doanh nghiệp ', 'pippinw'); ?></th>
            <th><?php _e('Ngày xác nhận', 'pippinw'); ?></th>
            <th><?php _e('Ghi chú', 'pippinw'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i=0;
        foreach ($employer as $user) {
        $status="";
        $user_check = get_user_by( 'login',$user->number_phone );
        if($user_check =="") {
        $check_account = "Chưa có TK";
        $status = json_decode($user->status);
        }
        else {
        $check_account = "Đã có TK";
        }
        ?>
        <tr>
            <td><a href="<?php home_url().$_SERVER["REQUEST_URI"] ?>admin.php?page=all-employer-register&p=<?php echo $page; ?>&id_user=<?php echo $user->id; ?>"><?php echo $user->number_phone; ?></a></td>
            <td><?php echo $user->industry_user; ?></td>
            <td><?php echo $user->date_create; ?></td>
            <td><?php
                if($status){
                $sale_info = get_userdata($status->sale_id);
                echo '<b>CSKH:</b> ' . $sale_info->user_login . "<br>";
                echo '<b>Trạng thái:</b> ' . $status->note_contact . "<br>";
                echo '<b>Ngày liên hệ:</b> ' . $status->date_contact . "<br>";
                echo '<b>'.$check_account.'</b>';
                }
                else{
                echo '<b>'.$check_account.'</b>';
                }
            ?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
echo '<div>'.salestaff_paginate_function($item_per_page,$page,$employer_count,$_SERVER["REQUEST_URI"]).'</div>';