<h1>Tài khoản tặng VIP </h1>
<form method="post" style="margin: 100px;">
    <input type="text" name="user_name" placeholder="Nhập tài khoản">
    <input type="submit" name="add_user" value="ADD">
</form>

<?php
$args = array(
    'role' => 'Subscriber',
    'role__in' => array(),
    'role__not_in' => array(),
    'meta_key' => 'user_vip_gift',
    'meta_value' => '',
    'meta_compare' => '',
    'meta_query' => array(),
    'date_query' => array(),
    'include' => array(),
    'exclude' => array(),
    'orderby' => 'login',
    'order' => 'ASC',
    'count_total' => false,
    'fields' => 'all',
    'who' => ''
);

$user_query = get_users($args);
foreach ($user_query as $user) {
    echo "<p>".$user->user_login."</p>";

}
if(isset($_POST["add_user"])) {
    $login_name = $_POST["user_name"];
    $pass = "mangvieclam";
    global $current_user, $wpdb;
    $userdata = array(
        'user_login' => $login_name,
        'user_email' => "",
        'user_pass' => 'mangvieclam'
    );

    $user_id = wp_insert_user($userdata);

    if (is_wp_error($user_id)) {
        echo "<p style='font-size: 20px;color: red;'>SĐT hoặc email đã tồn tại.Vui lòng kiểm tra lại</p>";
    }
    else{
        $data = array();
        $data['name'] =$login_name;
        $data['email'] = "chưa cập nhật";
        $data['phone'] ="chưa cập nhật";
        $wpdb->insert("crb_salestaff_company", array(
            "ID"=>$user_id,
            "name" =>$login_name,
            "other_contact" => $data,
            "last_contact" => '',
            "sale_uid" => 0,
            "contact_rating" =>'',
            "re_contact_time" =>'',
        ));
        update_user_meta($user_id, 'account_type', $login_name);
        update_user_meta($user_id, 'user_vip_gift',$login_name);
        ?>
        <script>
            jQuery(document).ready(function ($) {
                alert("Tạo tài khoản thành công");
//                var url = window.location.href + "?page=sale-staff-all-customer&p=0&customer=<?php //echo $user_id; ?>//";
//                location.href = url;
            });

        </script>
        <?php


    }
}

