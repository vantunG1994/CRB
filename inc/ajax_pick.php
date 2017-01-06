<?php
//$result_check_vip=$_POST["data_check_vip"];
//if($result_check_vip !="")
//{
//    $id_job=$result_check_vip["id"];
//    $num_week=$result_check_vip["week"];
//    $vip=$result_check_vip["vip"];
//    $new=$result_check_vip["new"];
//    $user_name =$result_check_vip["user"];
//    $job_vip= esc_attr(get_post_meta($id_job, 'mvl_is_vip',true));
//    if ($vip == 1) {
//        global $td_allowed, $wpdb, $current_user;
//        $today = date('Y-m-d');
//        if($job_vip==""){
//            $week = strtotime(date("Y-m-d", strtotime($today)) . " +" . $num_week . " week");
//             $week = strftime("%d-%m-%Y", $week);
//            $key="mvl_is_vip";
//            $table_name = "memory_pick";
//            $message = "Gói Tin đặc biệt dành cho tài khoản " . $user_name . " thời hạn kết thúc vào ngày " . $week . " do thành viên " . $current_user->user_login . " tạo vào lúc " . date('Y-m-d H:i:s');
//
//        }
//        else{
//            $week = strtotime(date("Y-m-d", strtotime($job_vip)) . " +" . $num_week . " week");
//            $week = strftime("%d-%m-%Y", $week);
//            $message = "Gói Tin đặc biệt dành cho tài khoản " . $user_name . " thời hạn kết thúc vào ngày " . $week . " do thành viên " . $current_user->user_login . " cập nhật vào lúc " . date('Y-m-d H:i:s');
//
//        }
//
//        echo "<p id='check_vip' style='color: red;'>Thời hạn của gói Vip  cho tin đăng sẽ hết hạn vào ngày : ". $week. "</p>";
//    }
//    else{
//        echo $job_vip;
//    }
//
//}

$result_check_new=$_POST["data_check_new"];
if($result_check_new !="")
{
    global $td_allowed, $wpdb, $current_user;
    $id_job=$result_check_new["id"];
    $package_id_up=$result_check_new["package"];
    $new=$result_check_new["new"];
    $user_name =$result_check_new["user"];
    $today = date('Y-m-d');
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
    $job_expire= esc_attr(get_post_meta($id_job, 'user_up_expire',true));
    if ( $new == 1) {
        $today = date('Y-m-d');


        if($job_expire==""){
            $week = strtotime(date("Y-m-d", strtotime($today)) . " +" . $num_date . " day");
            $week = strftime("%d-%m-%Y", $week);
            $message = "Gói ".$name." dành cho tài khoản " . $user_name . " thời hạn kết thúc vào ngày " . $week . " do thành viên " . $current_user->user_login . " tạo vào lúc " . date('Y-m-d H:i:s');

        }
        else{
            $week = strtotime(date("Y-m-d", strtotime($job_expire)) . " +" . $num_date . " day");
            $week = strftime("%Y-%m-%d", $week);
            $message = "Gói ".$name." dành cho tài khoản " . $user_name . " thời hạn kết thúc vào ngày " . $week . " do thành viên " . $current_user->user_login . " cập nhật vào lúc " . date('Y-m-d H:i:s');

        }

        echo "<p id='check_new'  style='color: red;'>Thời hạn của gói Ưu tiên cho tin đăng sẽ hết hạn vào ngày : ". $week. "</p>";
    }
    else { echo $job_expire;}

}



$result_new=$_POST["data_new"];
if($result_new !="")
{
    global $td_allowed, $wpdb, $current_user;

    $id_job=$result_new["id"];
    $new=$result_new["new"];
    $user_name =$result_new["user"];
    $user = get_user_by('login',$user_name);
    $user_id=$user->ID;
    $count_up = get_user_meta($user->ID, 'user_up_count', true);
    $user_up_expire= get_user_meta($user->ID, 'user_up_expire', true);
    $post_up = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'up' AND package_id='$package_id_up'");
    foreach ( $post_up as $package )
    {
        $name=$package->name;
        $id_package=$package->package_id;
        $description=$package->service_benefit;
        $description=json_decode($description, true);
        $num_date= $description["duration"];
        $user_up_count=$description["user_up_count"];
        $today = date('Y-m-d');

    }
    $crb_wp2es_up = $wpdb->get_var("SELECT * FROM crb_wp2es WHERE post_id = '$id_job' AND uid= '$user_id' AND sync_type ='up'");

    if($crb_wp2es_up==""||$crb_wp2es_up==0) {
        $wpdb->insert("crb_wp2es", array(
            "uid" => $user_id,
            "is_synced" => 1,
            "sync_type" => "up",
            "post_id" => $id_job,
            "sync_at" => date('Y-m-d H:i:s'),
        ));

    }
    else{
        $wpdb->update("crb_wp2es", array(
                "is_synced" => 1,
                "sync_at" => date('Y-m-d H:i:s'))
            ,array("uid" =>$user_id, "post_id" =>$id_job,"sync_type" => "up")
        );
    }

        update_post_meta($id_job, 'user_up_expire',$user_up_expire);
        update_user_meta($id_job, 'user_up_count',$count_up-1);
    echo $user_up_expire= esc_attr(get_post_meta($id_job, 'user_up_expire',true));




}


$result=$_POST["data_star"];
if($result !="")
{
    global $td_allowed, $wpdb, $current_user;
    $today = date('Y-m-d');
    $id_job=$result["id"];
    $vip=$result["vip"];
    $user_name =$result["user"];
    $user = get_user_by('login',$user_name);
    $user_id=$user->ID;
    $date = esc_attr(get_post_meta($id_job, 'vip_star_expire',true));
    $post_vip_star = get_user_meta($user_id, 'star_package_id', true);
    $post_vips = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'vip_job' AND package_id='$post_vip_star' ");
    foreach ($post_vips as $package) {
        $name = $package->name;
        $id_package = $package->package_id;
        $description = $package->service_benefit;
        $description = json_decode($description, true);
        $num_date = $description["duration"];
        $package_id_vip=$_GET['package_post_star'];
    }
if($num_date=="")
{
    $num_date=5;
}
    if($vip==1)
    {
        $week = strtotime(date("Y-m-d", strtotime($today)) . "+" .$num_date. " day");
        $week = strftime("%Y-%m-%d", $week);
        $crb_wp2es_vip = $wpdb->get_var("SELECT * FROM crb_wp2es WHERE post_id = '$id_job' AND uid= '$user_id' AND sync_type ='edit'");
        if($crb_wp2es_vip==""||$crb_wp2es_vip==0)
        {
            $wpdb->insert("crb_wp2es", array(
                "uid" => $user_id,
                "is_synced" => 1,
                "sync_type" => "edit",
                "post_id" =>$id_job,
                "sync_at" => date('Y-m-d H:i:s'),
            ));

        }
        else{
            $wpdb->update("crb_wp2es", array(
                    "is_synced" => 1,
                    "sync_type" => "edit",
                    "sync_at" => date('Y-m-d H:i:s'))
                ,array("uid" => $user_id, "post_id" => $id_job,"sync_type" => "edit")
            );

        }
        update_post_meta($id_job, 'vip_star',5);
        update_post_meta($id_job, 'vip_star_expire',$week);
        delete_user_meta($user_id, 'star_package_id',$post_vip_star);
         echo  $date = esc_attr(get_post_meta($id_job, 'vip_star_expire',true));


    }



}
    ?>