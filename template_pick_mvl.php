<style>
a.button-ag-full {
cursor: pointer;
background-color: #2980b9;
padding: 15px 20px 13px 20px;
text-transform: uppercase;
color: #fff;
width: auto;
float: left;
display: inline-block;
float: none;
font-weight: bold;
font-size: 14px;
cursor: pointer;
margin-right: 4px;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
-webkit-transition: all 0.2s ease;
-moz-transition: all 0.2s ease;
-o-transition: all 0.2s ease;
-ms-transition: all 0.2s ease;
transition: all 0.2s ease;
/* -webkit-box-shadow: 0 2px 0 #1f6797; */
/* box-shadow: 0 3px 0 #1f6797; */
text-decoration: none;
}
</style>
<?php
if($_GET["page"]=="mvl-vip") {
?>
<div class="wrap">
    <h1><?php global $title;
    echo $title; ?></h1>
    <form method="post">
        <table>
            <div class="error" style="width: 500px;display: none;"></div>
            <tr>
                <td><b>Nhập tên tài khoản</b></td>
                <td><input type="text" id="user_name" name="user_name"/></td>
            </tr>
            <tr>
                <td style="position: absolute;"><b>Gói VIP</b></td>
                <?php
                global $wpdb;
                $user_vip = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'user_vip'");
                ?>
                <td>
                    <!--                        <input  style="margin-top: -20px !important;" type="number" name="num_week" id="num_week_user"/>-->
                    <select name="user_vip" id="num_week_user" style="">
                        <option value="">Lựa chọn gói VIP</option>
                        <?php
                        foreach ( $user_vip as $package )
                        {
                        ?>
                        <option value="<?php echo $package->package_id ?>"><?php echo $package->name ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
                <td><p class="error_user" style="color: #ff0000;padding-bottom: 28px;"></p></td>
            </tr>
            <tr>
                <td><input type="submit" name="add_vip" id="submit" value="Kích hoạt"/></td>
            </tr>
        </table>
    </form>
    <table class="wp-list-table widefat fixed posts">
        <caption>Danh Sách Tài Khoản VIP</caption>
        <thead>
            <tr>
                <th><?php _e('Tên Tài Khoản', 'pippinw'); ?></th>
                <th><?php _e('Email', 'pippinw'); ?></th>
                <th><?php _e('Thời hạn', 'pippinw'); ?></th>
                <th><?php _e('Gói VIP sở hữu', 'pippinw'); ?></th>
            </tr>
        </thead>
        <tfoot>
        <tr>
            <th><?php _e('Tên Tài Khoản', 'pippinw'); ?></th>
            <th><?php _e('Email', 'pippinw'); ?></th>
            <th><?php _e('Thời hạn', 'pippinw'); ?></th>
            <th><?php _e('Gói tin sở hữu', 'pippinw'); ?></th>
        </tr>
        </tfoot>
        <tbody>
            <?php
            $no = 12;// total no of author to display
            $paged = $_GET["paged"] ?: 1;
            if ($paged == 1) {
            $offset = 0;
            } else {
            $offset = ($paged - 1) * $no;
            }
            $args = array(
            'role' => 'Subscriber',
            'role__in' => array(),
            'role__not_in' => array(),
            'meta_key' => 'vip_level',
            'meta_value' => '',
            'meta_compare' => '',
            'meta_query' => array(),
            'date_query' => array(),
            'include' => array(),
            'exclude' => array(),
            'orderby' => 'login',
            'order' => 'ASC',
            'offset' => $offset,
            'search' => '',
            'number' => $no,
            'count_total' => false,
            'fields' => 'all',
            'who' => ''
            );
            $user_query = get_users($args);
            $i=0;
            foreach ($user_query as $user) {
            $date_expierd = get_user_meta($user->ID, 'vip_expire', true);
            $package = get_user_meta($user->ID, 'vip_package_id', true);
            $i=$i+1;
            $user_vip_package = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'user_vip' AND package_id='$package'");
            foreach ( $user_vip_package as $package ) {
            $name_package=$package->name;
            }
            ?>
            <tr>
                <td><?php echo $user->user_login; ?></td>
                <td><?php echo $user->user_email; ?></td>
                <td><?php echo $date_expierd; ?></td>
                <td><?php echo $name_package; ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
    $users = get_users(array(
    'role' => 'Subscriber',
    'role__in' => array(),
    'role__not_in' => array(),
    'meta_key' => 'vip_level',
    'meta_value' => '',
    'meta_compare' => '',
    'meta_query' => array(),
    'date_query' => array(),
    'include' => array(),
    'exclude' => array(),
    'orderby' => 'login',
    'order' => 'ASC',
    'search' => '',
    'count_total' => false,
    'fields' => 'all',
    'who' => ''
    ));
    $number_of_users = count($users);
    $total_user = $number_of_users;
    $total_pages = ceil($total_user / $no);
    echo "<div class='paginate_links_filters'>" . paginate_links(array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => '&paged=%#%',
        'current' => $paged,
        'total' => $total_pages,
        'prev_text' => 'Previous',
        'next_text' => 'Next',
    )) . "</div>";
    ?>
</div>
<?php
if (isset($_POST["add_vip"])) {
global $td_allowed,$wpdb,$current_user;
get_currentuserinfo();
$user_name = $_POST["user_name"];
$user = get_user_by('login', $user_name) ?:  get_user_by( 'email',$user_name);
if ($user) {
$user_id = $user->ID;
}
$id_package = $_POST["user_vip"];
$today = date('Y-m-d');
$date_expierd = get_user_meta($user_id, 'vip_expire', true);
$account_vip = get_user_meta($user_id, 'vip_package_id', true);
$count_view_resume=get_user_meta($user_id, 'user_cv_view_count', true);
$user_daily_max_post = get_user_meta($user_id, 'user_daily_max_post', true);
$user_monthly_max_post = get_user_meta($user_id, 'user_monthly_max_post', true);
$user_vip = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'user_vip' AND package_id='$id_package'");
foreach ( $user_vip as $package )
{
$name=$package->name;
$id_package=$package->package_id;
$description=$package->service_benefit;
$description=json_decode($description, true);
$num_date= $description["duration"];
$cv_view_count=$description["cv_view_count"];
$vip_level=$description["vip_level"];
$vip_star=$description["vip_star"];
$user_daily_max_post=$description["user_daily_max_post"];
$user_monthly_max_post=$description["user_monthly_max_post"];
$discount_percent=$description["discount_percent"];
}
//        $balance = get_user_meta($user_id, 'user_cash', true);
//        update_user_meta($user_id, 'user_cash', $balance-$package->price);
$package_vip_gift=$description['package_vip_gift'];
if($package_vip_gift !="")
{
$post_vips = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE package_id='$package_vip_gift' ");
foreach ($post_vips as $package_gift) {
$name_gift = $package_gift->name;
$package_vip_gift = $package_gift->package_id;
$description_gift = $package_gift->service_benefit;
$description_gift = json_decode($description_gift, true);
$num_week_gift = $description_gift["duration"];
}
$post_vip = get_user_meta($user_id, 'star_package_id', true);
$week_gift = strtotime(date("Y-m-d", strtotime($today)) . " +" . $num_week_gift . " day");
$week_gift = strftime("%Y-%m-%d", $week_gift);
$balance = get_user_meta($user_id, 'user_cash', true);
update_user_meta($user_id, 'star_package_id', $package_vip_gift);
update_user_meta($user_id, 'count_post_star', $description_gift['count_gift_post']);
if ($post_vip == "") {
$message_gift = "Gói " . $name_gift . " dành cho tài khoản " . $user_name . " thời hạn kết thúc vào ngày " . $week_gift . " do thành viên admin tạo vào lúc " . date('Y-m-d H:i:s');
$wpdb->insert("crb_vip_manage", array(
"user_id" => $user_id,
"admin_id" => $current_user->ID,
"package_id" => $package_vip_gift,
"expired_at" => $week_gift,
"description" => $message_gift,
"service_type" => "vip_job",
"date_create" => date('Y-m-d H:i:s'),
));
} else {
$table_name = "crb_vip_manage";
$message_gift = "Gói " . $name_gift . " dành cho tài khoản " . $user_name . " thời hạn kết thúc vào ngày " . $week_gift . " do thành viên admin cập nhật vào lúc " . date('Y-m-d H:i:s');
$wpdb->update($table_name, array("expired_at" => $week_gift, "description" => $message_gift), array('user_id' => $user_id, 'package_id' => $package_vip_gift, 'service_type' => 'vip_job'));
}}
if ($date_expierd != "") {
$week = strtotime(date("Y-m-d", strtotime($date_expierd)) . " +" . $num_date . " day");
$week = strftime("%Y-%m-%d", $week);
update_user_meta($user_id, 'vip_level', $vip_level);
update_user_meta($user_id, 'vip_package_id', $id_package);
update_user_meta($user_id, 'vip_star', $vip_star);
update_user_meta($user_id, 'discount_percent', $discount_percent);
update_user_meta($user_id, 'vip_expire', $week);
update_user_meta($user_id, 'user_daily_max_post',$user_daily_max_post);
update_user_meta($user_id, 'user_monthly_max_post',$user_monthly_max_post);
update_user_meta($user_id, 'user_cv_view_count',$count_view_resume +1000);
update_user_meta($user_id, 'user_cv_view_expire',  $week);
$key=1;
$table_name="crb_vip_manage";
$message= "Gói ".$name." dành cho tài khoản ".$user_name." thời hạn kết thúc vào ngày ".$week." do thành viên ".$current_user->user_login." cập nhật vào lúc ". date('Y-m-d H:i:s');
$wpdb->update( $table_name, array( "expired_at" => $week, "description" => $message),array('user_id'=>$user_id, 'package_id'=>$account_vip));
?>
<script>
var url = window.location.href;
location.href = url;
</script>
<?php
} else {
$week = strtotime(date("Y-m-d", strtotime($today)) . " +" . $num_date . " day");
$week = strftime("%Y-%m-%d", $week);
add_user_meta($user_id, 'vip_level', $vip_level);
add_user_meta($user_id, 'vip_package_id', $id_package);
add_user_meta($user_id, 'vip_star', $vip_star);
add_user_meta($user_id, 'discount_percent', $discount_percent);
add_user_meta($user_id, 'vip_expire', $week);
add_user_meta($user_id, 'user_daily_max_post', $user_daily_max_post);
add_user_meta($user_id, 'user_monthly_max_post', $user_monthly_max_post);
add_user_meta($user_id, 'user_cv_view_count',$cv_view_count);
add_user_meta($user_id, 'user_cv_view_expire',  $week);
$message= "Gói ".$name." dành cho tài khoản ".$user_name." thời hạn kết thúc vào ngày ".$week." do thành viên admin tạo vào lúc ". date('Y-m-d H:i:s');
$wpdb->insert("crb_vip_manage", array(
"user_id" => $user_id,
"admin_id" => $current_user->ID ,
"package_id"=>$package_id,
"expired_at" => $week,
"description" => $message,
"service_type"=>"user_vip",
"date_create" => date('Y-m-d H:i:s') ,
));
?>
<script>
var url = window.location.href;
location.href = url;
</script>
<?php
}
}
}
if($_GET["page"]=="mvl-job")
{
?>
<div class="wrap">
    <table><tr><td><a class="button-ag-full" href="?page=mvl-job&job_vip=Tin đặc biệt">Tin đặc biệt</a></td><td><a class="button-ag-full" href="?page=mvl-job&job_new=Tin đăng mới">Tin đăng mới</a></td></tr></table>
    <h1><?php echo $_GET["job_vip"]; ?></h1>
    <?php
    if(isset($_GET["user"]))
    {
    ?>
    <div class="error" style="width: 500px;">
        <?php
        $user = get_user_by('login',$_GET["user"]) ?: get_user_by( 'email',$_GET["user"]);
        global $wpdb;
        $where = get_posts_by_author_sql("job", true,$user->ID );
        $user_post_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts $where" );
        $count_vip=$wpdb->get_var( "SELECT COUNT(*) FROM crb_wp2es WHERE uid='$user->ID' AND sync_type='edit'" )?:0;
        $count_new=$wpdb->get_var( "SELECT COUNT(*) FROM crb_wp2es WHERE uid='$user->ID' AND sync_type='up'" )?:0;
        $companies = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}posts` WHERE post_type = 'company' and post_status = 'publish' and post_author = '" . $user->ID . "'");
        foreach ($companies as $company) {
        $comp_id = $company->ID;
        $wpjobus_company_fullname = esc_attr(get_post_meta($comp_id, 'wpjobus_company_fullname', true));
        echo "<p>Công ty : ".$wpjobus_company_fullname ."</p>";
        }
        echo "<p>Tài khoản người dùng : ".$_GET["user"]."</p>";
        echo "<p>Email người dùng : ".$user->user_email ?: $_GET["user"]."</p>";
        echo "<p>Số tin đăng tuyển dụng : ".$user_post_count."</p>";
        echo "<p>Số tin đăng đặc biệt : ".$count_vip."</p>";
        echo "<p>Số tin đăng ưu tiên : ".$count_new."</p>";
        ?>
    </div>
    <?php
    }
    ?>
    <div class="error" style="width: 500px;display: none;"></div>
    <table>
        <tr>
            <td>Nhập tên tài khoản</td>
            <td><input  type="text" id="user_name_job_vip" name="user_name_job" value="<?php echo $_GET["user"] ?:"" ;?>"/></td>
            <td><input type="submit" id="load_post" name="load_post" value="Load Tin"/></td>
        </tr>
        <?php
        if(isset($_GET['user'])) {
        ?>
        <tr>
            <td>
                <select style="" name="user_up_post" class="user_up_post">
                    <option value="">Lựa chọn gói up tin</option>
                    <?php
                    $post_up = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'up' ");
                    foreach ($post_up as $package) {
                    ?>
                    <option value="<?php echo $package->package_id; ?>"><?php echo $package->name; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
            <td>  <select  name="user_vip_post" class="user_vip_post">
                <option value="">Lựa chọn gói tin đặc biệt</option>
                <?php
                $post_vip = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'vip_job'");
                foreach ($post_vip as $package) {
                ?>
                <option value="<?php echo $package->package_id; ?>"><?php echo $package->name; ?></option>
                <?php
                }
                ?>
            </select></td>
            <td><input type="submit" id="up_post_submit" name="up_post_submit" value="Chấp nhận"/></td>
        </tr>
        <?php
        if($_GET['package_post']!="") {
        global $current_user, $wpdb;
        $package_post = $_GET['package_post'];
        $user_name = $_GET['user'];
        $user = get_user_by('login', $user_name);
        $user_id = $user->ID;
        $today = date('Y-m-d');
        $package_id_up=$_GET['package_post'];
        $date_expierd = get_user_meta($user_id, 'user_up_expire', true);
        $count_up = get_user_meta($user_id, 'user_up_count', true);
        $post_up = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'up' AND package_id='$package_id_up'");
        foreach ( $post_up as $package )
        {
        $name=$package->name;
        $id_package=$package->package_id;
        $description=$package->service_benefit;
        $description=json_decode($description, true);
        $num_date= $description["duration"];
        $user_up_count=$description["up_count"];
        }
        $balance = get_user_meta($user_id, 'user_cash', true);
        //            update_user_meta($user_id, 'user_cash', $balance-$package->price);
        if($date_expierd !="" ){
        $week = strtotime(date("Y-m-d", strtotime($date_expierd)) . "+" . $num_date . " day");
        $week = strftime("%Y-%m-%d", $week);
        update_user_meta($user_id, 'up_package_id',$_GET['package_post']);
        update_user_meta($user_id, 'user_up_count',$count_up+$user_up_count);
        update_user_meta($user_id, 'user_up_expire',$week);
        $table_name="crb_vip_manage";
        $message= "Gói User VIP  dành cho tài khoản ".$user_name." thời hạn kết thúc vào ngày ".$week." do thành viên admin cập nhật vào lúc ". date('Y-m-d H:i:s');
        $wpdb->update( $table_name, array( "expired_at" => $week, "description" => $message),array('user_id'=>$user_id, 'package_id'=>$package_id_up,'service_type'=>'up'));
        }
        else{
        $week = strtotime(date("Y-m-d", strtotime($today)) . "+" . $num_date . " day");
        $week = strftime("%Y-%m-%d", $week);
        update_user_meta($user_id, 'up_package_id',$_GET['package_post']);
        update_user_meta($user_id, 'user_up_count',$user_up_count);
        update_user_meta($user_id, 'user_up_expire',$week);
        $message= "Gói ".$name." dành cho tài khoản ".$user_name." thời hạn kết thúc vào ngày ".$week." do thành viên admin tạo vào lúc ". date('Y-m-d H:i:s');
        $wpdb->insert("crb_vip_manage", array(
        "user_id" => $user_id,
        "admin_id" => $current_user->ID ,
        "package_id"=>$package_id_up,
        "expired_at" => $week,
        "description" => $message,
        "service_type"=>"up",
        "date_create" => date('Y-m-d H:i:s') ,
        ));
        }
        }
        }
        if($_GET['package_post_star']!="") {
        global $current_user, $wpdb;
        $package_post = $_GET['package_post'];
        $user_name = $_GET['user'];
        $user = get_user_by('login', $user_name);
        $user_id = $user->ID;
        $today = date('Y-m-d');
        $package_id_star=$_GET['package_post_star'];
        $post_vips = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'vip_job' AND package_id='$package_id_star' ");
        foreach ($post_vips as $package) {
        $name = $package->name;
        $id_package = $package->package_id;
        $description = $package->service_benefit;
        $description = json_decode($description, true);
        $num_week = $description["duration"];
        $package_id_vip=$_GET['package_post_star'];
        }
        $post_vip = get_user_meta($user_id, 'star_package_id', true);
        $week = strtotime(date("Y-m-d", strtotime($today)) . " +" . $num_week . " day");
        $week = strftime("%Y-%m-%d", $week);
        $balance = get_user_meta($user_id, 'user_cash', true);
        update_user_meta($user_id, 'star_package_id', $package_id_vip);
        if ($post_vip == "") {
        $message = "Gói " . $name . " dành cho tài khoản " . $user_name . " thời hạn kết thúc vào ngày " . $week . " do thành viên admin tạo vào lúc " . date('Y-m-d H:i:s');
        $wpdb->insert("crb_vip_manage", array(
        "user_id" => $user_id,
        "admin_id" => $current_user->ID,
        "package_id" => $package_id_vip,
        "expired_at" => $week,
        "description" => $message,
        "service_type" => "vip_job",
        "date_create" => date('Y-m-d H:i:s'),
        ));
        } else {
        $table_name = "crb_vip_manage";
        $message = "Gói " . $name . " dành cho tài khoản " . $user_name . " thời hạn kết thúc vào ngày " . $week . " do thành viên admin cập nhật vào lúc " . date('Y-m-d H:i:s');
        $wpdb->update($table_name, array("expired_at" => $week, "description" => $message), array('user_id' => $user_id, 'package_id' => $package_id_vip, 'service_type' => 'vip_job'));
        }
        }
        ?>
    </table>
    <?php
    if(isset($_GET["id"])) {
    $job_id=$_GET["id"];
    $wpjobus_job_fullname = esc_attr(get_post_meta($job_id, 'wpjobus_job_fullname',true));
    $job_industry= esc_attr(get_post_meta($job_id, 'job_industry',true));
    $job_vip= esc_attr(get_post_meta($job_id, 'vip_star_expire',true));
    $job_expire= esc_attr(get_post_meta($job_id, 'user_up_expire',true));
    ?>
    <table class="wp-list-table widefat fixed posts" style="margin-bottom: 100px;">
        <caption><h2>Gia hạn gói tin đăng</h2></caption>
        <thead>
            <tr>
                <th style="width: 300px;"><?php _e('Tên Tin Đăng', 'pippinw'); ?></th>
                <th style="width: 300px;"><?php _e('Gia hạn', 'pippinw'); ?></th>
                <th><?php _e('Thời hạn tin đặc biệt', 'pippinw'); ?></th>
                <th><?php _e('Thời hạn tin ưu tiên', 'pippinw'); ?></th>
            </tr>
        </thead>
        <tr>
            <td style="text-align: left !important;"><?php echo $wpjobus_job_fullname ; ?></td>
            <td>
                <table>
                    <tr>
                        <td>Vip Star<input class="job_vip_<?php echo $_GET["id"]; ?>" name="job_vip" type="checkbox"/>
                    </td>
                    <td>Tin UP<input class="job_new_<?php echo $_GET["id"]; ?>" name="job_new" type="checkbox"/></td>
                    <input type="hidden" class="job_id" value="<?php echo $_GET["id"]; ?>"/>
                    <input type="hidden" class="user_id" value="<?php echo $_GET["user"]; ?>"/>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php
                        ?>
                        <input type="submit" class="pick" name="pick_job" value="OK">
                    </td>
                </tr>
                <?php
                ?>
            </table>
        </td>
        <td class="pick_vip_result_<?php echo  $job_id; ?>"><?php echo $job_vip ?></td>
        <td class="pick_new_result_<?php echo  $job_id; ?>"><?php echo $job_expire ?></td>
    </tr>
</table>
<?php
}
if(isset($_GET["user"])){
?>
<div id="list_job">
    <?php
    $id=$_GET["user"];
    if($id==""){
    echo "<p style='color: red;'>Vui lòng nhập tên tài khoản</p>";
    }
    else{
    $user_email = get_user_by( 'email',$id);
    $userEmail= $user_email->ID;
    $user = get_user_by('login',$id);
    if(!$user && !$userEmail){
    echo "<p style='color: red;'>Tài khoản không tồn tại</p>";
    }
    else{
    ?>
    <table class="wp-list-table widefat fixed posts">
        <thead>
            <tr>
                <th><?php _e('Tên Tin Đăng', 'pippinw'); ?></th>
                <th><?php _e('Ngành nghề', 'pippinw'); ?></th>
                <th><?php _e('Tin đặc biệt', 'pippinw'); ?></th>
                <th><?php _e('Tin ưu tiên', 'pippinw'); ?></th>
                <th><?php _e('Tuỳ chỉnh', 'pippinw'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 15;// total no of author to display
            $paged = $_GET["p"] ?: 1;
            if ($paged == 1) {
            $offset = 0;
            } else {
            $offset = ($paged - 1) * $no;
            }
            $args = array(
            'posts_per_page'   =>$no,
            'offset'           =>  $offset,
            'orderby'          => 'date',
            'order'            => 'DESC',
            'post_type'        => 'job',
            'post_status'      => 'publish',
            'author'        => $user->ID ?:$userEmail,
            'suppress_filters' => true
            );
            $posts_array = get_posts( $args );
            $i=0;
            foreach ($posts_array as $post) {
            $job_id=$post->ID;
            $wpjobus_job_fullname = esc_attr(get_post_meta($job_id, 'wpjobus_job_fullname',true));
            $job_industry= esc_attr(get_post_meta($job_id, 'job_industry',true));
            $job_vip=  esc_attr(get_post_meta($job_id, 'vip_star_expire',true));
            $job_expire= esc_attr(get_post_meta($job_id, 'user_up_expire',true));
            $pos=strrpos($_SERVER["REQUEST_URI"],"id");
            if($pos!="")
            {
            $url=substr($_SERVER["REQUEST_URI"],0,$pos-1);
            }
            else {$url=$_SERVER["REQUEST_URI"];}
            ?>
            <tr>
                <td><?php echo $wpjobus_job_fullname ; ?></td>
                <td><?php echo $job_industry ?></td>
                <td class="pick_vip_result"><?php echo $job_vip ?></td>
                <td class="pick_new_result"><?php echo $job_expire ?></td>
                <td>
                    <a class="button" href="<?php echo $url ?>&id=<?php echo $job_id; ?>">Gia hạn</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
    $posts = get_posts(array(
    'orderby'          => 'date',
    'order'            => 'DESC',
    'meta_value'       => '',
    'post_type'        => 'job',
    'posts_per_page'   =>-1,
    'post_status'      => 'publish',
    'author'        => $user->ID ?:$userEmail,
    'suppress_filters' => true
    ));
    $posts_count= count( $posts);
    $total_posts = $posts_count;
    $total_pages = ceil($total_posts / $no);
    echo "<div style='margin-bottom: 100px;' class='paginate_links_filters'>" . paginate_links(array(
        'base' => $_SERVER["REQUEST_URI"]. '%_%',
        'format' => '&p=%#%',
        'current' => $paged,
        'total' => $total_pages,
    )) . "</div>";
    ?>
    <?php
    }
    }
    ?>
</div>
<?php
}
?>
<?php
if(isset($_GET["job_vip"]))
{
?>
<table class="wp-list-table widefat fixed posts">
    <caption><h2>Danh Sách Tin Đặc Biệt</h2></caption>
    <thead>
        <tr>
            <th><?php _e('Tên Tin Đăng', 'pippinw'); ?></th>
            <th><?php _e('Ngành nghề', 'pippinw'); ?></th>
            <th><?php _e('Tài khoản KH', 'pippinw'); ?></th>
            <th><?php _e('Thời hạn', 'pippinw'); ?></th>
        </tr>
    </thead>
    <tfoot>
    <tr>
        <th><?php _e('Tên Tin Đăng', 'pippinw'); ?></th>
        <th><?php _e('Ngành nghề', 'pippinw'); ?></th>
        <th><?php _e('Tài khoản KH', 'pippinw'); ?></th>
        <th><?php _e('Thời hạn', 'pippinw'); ?></th>
    </tr>
    </tfoot>
    <tbody>
        <?php
        $no = 12;// total no of author to display
        $paged = $_GET["paged"] ?: 1;
        if ($paged == 1) {
        $offset = 0;
        } else {
        $offset = ($paged - 1) * $no;
        }
        $args = array(
        'posts_per_page'   =>$no,
        'offset'           =>  $offset,
        'orderby'          => 'date',
        'order'            => 'DESC',
        'meta_key'         => 'vip_star',
        'meta_value'         => 5,
        'post_type'        => 'job',
        'post_status'      => 'publish',
        'suppress_filters' => true
        );
        $posts_array = get_posts( $args );
        $i=0;
        foreach ($posts_array as $post) {
        $job_id=$post->ID;
        $wpjobus_job_fullname = esc_attr(get_post_meta($job_id, 'wpjobus_job_fullname',true));
        $job_industry= esc_attr(get_post_meta($job_id, 'job_industry',true));
        $date_exp_job_vip= esc_attr(get_post_meta($job_id, 'vip_star_expire',true));
        $user_info = get_userdata($post->post_author);
        $username = $user_info->user_login;
        ?>
        <tr>
            <td><?php echo $wpjobus_job_fullname ; ?></td>
            <td><?php echo $job_industry ?></td>
            <td><?php echo  $username; ?></td>
            <td><?php echo $date_exp_job_vip;?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
$posts = get_posts(array(
'orderby'          => 'date',
'order'            => 'DESC',
'meta_key'         => 'vip_expire',
'meta_value'       => '',
'post_type'        => 'job',
'posts_per_page'   =>-1,
'post_status'      => 'publish',
'suppress_filters' => true
));
$posts_count= count( $posts);
$total_posts = $posts_count;
$total_pages = ceil($total_posts / $no);
echo "<div class='paginate_links_filters'>" . paginate_links(array(
    'base' => $_SERVER["REQUEST_URI"]. '%_%',
    'format' => '&paged=%#%',
    'current' => $paged,
    'total' => $total_pages,
)) . "</div>";
?>
<?php
}
?>
<?php
if(isset($_GET["job_new"]))
{
?>
<table class="wp-list-table widefat fixed posts">
    <caption><h2>Danh Sách Tin UP</h2></caption>
    <thead>
        <tr>
            <th><?php _e('Tên Tin Đăng', 'pippinw'); ?></th>
            <th><?php _e('Ngành nghề', 'pippinw'); ?></th>
            <th><?php _e('Tài khoản KH', 'pippinw'); ?></th>
            <th><?php _e('Thời hạn', 'pippinw'); ?></th>
        </tr>
    </thead>
    <tfoot>
    <tr>
        <th><?php _e('Tên Tin Đăng', 'pippinw'); ?></th>
        <th><?php _e('Ngành nghề', 'pippinw'); ?></th>
        <th><?php _e('Tác giả', 'pippinw'); ?></th>
        <th><?php _e('Tài khoản KH', 'pippinw'); ?></th>
    </tr>
    </tfoot>
    <tbody>
        <?php
        $no = 12;// total no of author to display
        $paged = $_GET["paged"] ?: 1;
        if ($paged == 1) {
        $offset = 0;
        } else {
        $offset = ($paged - 1) * $no;
        }
        $args = array(
        'posts_per_page'   =>$no,
        'offset'           =>  $offset,
        'orderby'          => 'date',
        'order'            => 'DESC',
        'meta_key'         => 'user_up_expire',
        'post_type'        => 'job',
        'post_status'      => 'publish',
        'suppress_filters' => true
        );
        $posts_array = get_posts( $args );
        $i=0;
        foreach ($posts_array as $post) {
        $job_id=$post->ID;
        $wpjobus_job_fullname = esc_attr(get_post_meta($job_id, 'wpjobus_job_fullname',true));
        $job_industry= esc_attr(get_post_meta($job_id, 'job_industry',true));
        $date_exp_job_vip= esc_attr(get_post_meta($job_id, 'user_up_expire',true));
        $user_info = get_userdata($post->post_author);
        $username = $user_info->user_login;
        ?>
        <tr>
            <td><?php echo $wpjobus_job_fullname ; ?></td>
            <td><?php echo $job_industry ?></td>
            <td><?php echo $username; ?></td>
            <td><?php echo $date_exp_job_vip;?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
$posts = get_posts(array(
'orderby'          => 'date',
'order'            => 'DESC',
'meta_key'         => 'user_up_expire',
'meta_value'       => '',
'post_type'        => 'job',
'posts_per_page'   =>-1,
'post_status'      => 'publish',
'suppress_filters' => true
));
$posts_count= count( $posts);
$total_posts = $posts_count;
$total_pages = ceil($total_posts / $no);
echo "<div class='paginate_links_filters'>" . paginate_links(array(
    'base' => $_SERVER["REQUEST_URI"]. '%_%',
    'format' => '&paged=%#%',
    'current' => $paged,
    'total' => $total_pages,
)) . "</div>";
?>
<?php
}
?>
</div>
<?php
}
//global $wp2es;
//$cond=array('post_status'=>'publish','post_type'=>'job','vip_star'=>5);
//$order=array('ID'=>'desc');
//$limit=array('size'=>11,'page'=>1);
//$result_job = $wp2es->and_simple_search($cond,$order,$limit);
//
//print_r($result_job);
?>