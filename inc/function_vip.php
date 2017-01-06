<?php
global $wpdb,$current_user;
if(isset($_GET['user_vip']))
{
    $package_id= $_GET['user_vip'];
        $user_vip = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'user_vip' AND package_id='$package_id'");
    foreach ( $user_vip as $package )
    {
        $name=$package->name;

    }
    ?>
    <script>
        jQuery(document).ready(function($) {
            var id=<?php echo $package_id; ?>;

            swal({
    title: 'Xác nhận đăng ký gói <?php echo $name; ?>',
    text: "Tài khoản <?php echo $current_user->user_login; ?> của bạn đã đăng ký gói <?php echo $name; ?>.Nhân viên hỗ trợ của chúng tôi sẽ liên lạc hỗ trợ trực tiếp cho quý khách. ",
    type: 'info',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Chấp nhận',
    cancelButtonText: 'Bỏ qua',
    confirmButtonClass: 'btn btn-success',
    cancelButtonClass: 'btn btn-danger',
    buttonsStyling: false
}).then(function () {

    $.ajax({
        type: 'POST',
        data: {'action': 'admin_contact', 'data': id},
        url: '<?php echo admin_url( "admin-ajax.php" ); ?>',
        success: function (resp) {
            swal({
                title: 'Đăng ký thành công!',
                text: 'Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi.',
                timer: 10000
            }).then(
                function () {
                    location.href="<?php echo home_url(); ?>/my-account";

                },
                function (dismiss) {
//                    if (dismiss === 'timer') {
//                        console.log('I was closed by the timer')
//                    }
                }
            )
        }
    });
}, function (dismiss) {
    if (dismiss === 'cancel') {
        location.href="<?php echo home_url(); ?>/my-account";

    }
})
        });

    </script>
<?php
//    $user_name=$current_user->user_login;
//    $today = date('Y-m-d');
//    $user_id=$current_user->ID;
//    $date_expierd = get_user_meta($current_user->ID, 'vip_expire', true);
//    $account_vip = get_user_meta($current_user->ID, 'vip_package_id', true);
//    $count_view_resume=get_user_meta($current_user->ID, 'user_cv_view_count', true);
//    $user_daily_max_post = get_user_meta($current_user->ID, 'user_daily_max_post', true);
//    $user_monthly_max_post = get_user_meta($current_user->ID, 'user_monthly_max_post', true);
//    $user_vip = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'user_vip' AND package_id='$package_id'");
//    foreach ( $user_vip as $package )
//    {
//        $name=$package->name;
//        $id_package=$package->package_id;
//        $description=$package->service_benefit;
//        $description=json_decode($description, true);
//        $num_date= $description["duration"];
//        $cv_view_count=$description["cv_view_count"];
//        $vip_level=$description["vip_level"];
//        $vip_star=$description["vip_star"];
//        $user_daily_max_post=$description["user_daily_max_post"];
//        $user_monthly_max_post=$description["user_monthly_max_post"];
//        $discount_percent=$description["discount_percent"];
//
//    }
//    $balance = get_user_meta($current_user->ID, 'user_cash', true);
//    update_user_meta($user_id, 'user_cash', $balance-$package->price);
//
//
//    if ($date_expierd != "") {
//
//        $week = strtotime(date("Y-m-d", strtotime($date_expierd)) . " +" . $num_date . " day");
//        $week = strftime("%Y-%m-%d", $week);
//        update_user_meta($user_id, 'vip_level', $vip_level);
//        update_user_meta($user_id, 'vip_package_id', $package_id);
//        update_user_meta($user_id, 'vip_star', $vip_star);
//        update_user_meta($user_id, 'discount_percent', $discount_percent);
//        update_user_meta($user_id, 'vip_expire', $week);
//        update_user_meta($user_id, 'user_daily_max_post',$user_daily_max_post);
//        update_user_meta($user_id, 'user_monthly_max_post',$user_monthly_max_post);
//        update_user_meta($user_id, 'user_cv_view_count',$count_view_resume +1000);
//        update_user_meta($user_id, 'user_cv_view_expire',  $week);
//        $table_name="crb_vip_manage";
//        $message= "Gói ".$name." dành cho tài khoản ".$user_name." thời hạn kết thúc vào ngày ".$week." do thành viên admin cập nhật vào lúc ". date('Y-m-d H:i:s');
//        $wpdb->update( $table_name, array( "expired_at" => $week, "description" => $message),array('user_id'=>$user_id, 'package_id'=>$account_vip));
//
//    } else {
//    $week = strtotime(date("Y-m-d", strtotime($today)) . " +" . $num_date . " day");
//    $week = strftime("%d-%m-%Y", $week);
//        add_user_meta($user_id, 'vip_level', $vip_level);
//        add_user_meta($user_id, 'vip_package_id', $package_id);
//        add_user_meta($user_id, 'vip_star', $vip_star);
//        add_user_meta($user_id, 'discount_percent', $discount_percent);
//        add_user_meta($user_id, 'vip_expire', $week);
//        add_user_meta($user_id, 'user_daily_max_post', $user_daily_max_post);
//        add_user_meta($user_id, 'user_monthly_max_post', $user_monthly_max_post);
//        add_user_meta($user_id, 'user_cv_view_count',$cv_view_count);
//        add_user_meta($user_id, 'user_cv_view_expire',  $week);
//        $message= "Gói ".$name." dành cho tài khoản ".$user_name." thời hạn kết thúc vào ngày ".$week." do thành viên admin tạo vào lúc ". date('Y-m-d H:i:s');
//        $wpdb->insert("crb_vip_manage", array(
//            "user_id" => $user_id,
//            "admin_id" => 1 ,
//            "package_id"=>$package_id,
//            "expired_at" => $week,
//            "description" => $message,
//            "service_type"=>"user_vip",
//            "date_create" => date('Y-m-d H:i:s') ,
//        ));
//
//    }
//


}
if(isset($_GET['vip_star'])) {
    $package_id_vip=$_GET['vip_star'];
    $user_name=$current_user->user_login;
    $today = date('Y-m-d');
    $user_id=$current_user->ID;
    $date_expierd = get_user_meta($current_user->ID, 'vip_star_expire', true);
    $post_vip = get_user_meta($current_user->ID, 'star_package_id', true);
    $post_vips = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'vip_job' AND package_id='$package_id_vip' ");
    foreach ( $post_vips as $package )
    {
        $name=$package->name;
        $user_name=$current_user->user_login;
        $id_package=$package->package_id;
        $description=$package->service_benefit;
        $description=json_decode($description, true);
        $num_week=$description["duration"];
    }
    ?>
    <script>
        jQuery(document).ready(function($) {
            var id=<?php echo $id_package; ?>;

            swal({
                title: 'Xác nhận đăng ký gói <?php echo $name; ?>',
                text: "Tài khoản <?php echo $current_user->user_login; ?> của bạn đã đăng ký gói <?php echo $name; ?>.Nhân viên hỗ trợ của chúng tôi sẽ liên lạc hỗ trợ trực tiếp cho quý khách. ",
                type: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Chấp nhận',
                cancelButtonText: 'Bỏ qua',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function () {

                $.ajax({
                    type: 'POST',
                    data: {'action': 'admin_contact_vip', 'data': id},
                    url: '<?php echo admin_url( "admin-ajax.php" ); ?>',
                    success: function (resp) {
                        swal({
                            title: 'Đăng ký thành công!',
                            text: 'Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi.',
                            timer: 10000
                        }).then(
                            function () {
                                location.href="<?php echo home_url(); ?>/my-account";

                            },
                            function (dismiss) {
//                    if (dismiss === 'timer') {
//                        console.log('I was closed by the timer')
//                    }
                            }
                        )
                    }
                });
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    location.href="<?php echo home_url(); ?>/my-account";

                }
            })
        });

    </script>
    <?php

//    $week = strtotime(date("Y-m-d", strtotime($today)) . " +" . $num_week . " day");
//    $balance = get_user_meta($current_user->ID, 'user_cash', true);
//    update_user_meta($user_id, 'user_cash', $balance-$package->price);
//    update_user_meta($user_id, 'vip_package_id',$package_id_vip);
//    if($post_vip ==""){
//        $message= "Gói ".$name." dành cho tài khoản ".$user_name." thời hạn kết thúc vào ngày ".$week." do thành viên admin tạo vào lúc ". date('Y-m-d H:i:s');
//        $wpdb->insert("crb_vip_manage", array(
//            "user_id" => $user_id,
//            "admin_id" => 1 ,
//            "package_id"=>$package_id_vip,
//            "expired_at" => $week,
//            "description" => $message,
//            "service_type"=>"vip_job",
//            "date_create" => date('Y-m-d H:i:s') ,
//        ));
//
//    }
//    else{
//        $table_name="crb_vip_manage";
//        $message= "Gói ".$name." dành cho tài khoản ".$user_name." thời hạn kết thúc vào ngày ".$week." do thành viên admin cập nhật vào lúc ". date('Y-m-d H:i:s');
//        $wpdb->update( $table_name, array( "expired_at" => $week, "description" => $message),array('user_id'=>$user_id, 'package_id'=>$package_id_vip,'service_type'=>'vip_job'));
//
//
//
//    }
//
//    ?>

<?php


}
if(isset($_GET['up_post'])) {
    $package_id_up=$_GET['up_post'];
    $post_up = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'up' AND package_id='$package_id_up'");
    foreach ( $post_up as $package )
    {
        $name=$package->name;
    }
    ?>
    <script>
        jQuery(document).ready(function($) {
            var id=<?php echo $package_id_up; ?>;

            swal({
                title: 'Xác nhận đăng ký gói <?php echo $name; ?>',
                text: "Tài khoản <?php echo $current_user->user_login; ?> của bạn đã đăng ký gói <?php echo $name; ?>.Nhân viên hỗ trợ của chúng tôi sẽ liên lạc hỗ trợ trực tiếp cho quý khách. ",
                type: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Chấp nhận',
                cancelButtonText: 'Bỏ qua',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function () {

                $.ajax({
                    type: 'POST',
                    data: {'action': 'admin_contact_up', 'data': id},
                    url: '<?php echo admin_url( "admin-ajax.php" ); ?>',
                    success: function (resp) {
                        swal({
                            title: 'Đăng ký thành công!',
                            text: 'Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi.',
                            timer: 10000
                        }).then(
                            function () {
                                location.href="<?php echo home_url(); ?>/my-account";

                            },
                            function (dismiss) {
//                    if (dismiss === 'timer') {
//                        console.log('I was closed by the timer')
//                    }
                            }
                        )
                    }
                });
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    location.href="<?php echo home_url(); ?>/my-account";

                }
            })
        });

    </script>
    <?php
//    $user_name=$current_user->user_login;
//    $today = date('Y-m-d');
//    $user_id=$current_user->ID;
//    $date_expierd = get_user_meta($current_user->ID, 'user_up_expire', true);
//    $count_up = get_user_meta($current_user->ID, 'user_up_count', true);
//    $post_up = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'up' AND package_id='$package_id_up'");
//    foreach ( $post_up as $package )
//    {
//        $name=$package->name;
//        $id_package=$package->package_id;
//        $description=$package->service_benefit;
//        $description=json_decode($description, true);
//        $num_date= $description["duration"];
//        $user_up_count=$description["up_count"];
//    }
//    $balance = get_user_meta($current_user->ID, 'user_cash', true);
//    update_user_meta($user_id, 'user_cash', $balance-$package->price);
//    if($date_expierd !="" ){
//        $week = strtotime(date("Y-m-d", strtotime($date_expierd)) . "+" . $num_date . " day");
//        $week = strftime("%Y-%m-%d", $week);
//        update_user_meta($user_id, 'vip_package_id',$package_id_up);
//        update_user_meta($user_id, 'user_up_count',$count_up+$user_up_count);
//        update_user_meta($user_id, 'user_up_expire',$week);
//        $table_name="crb_vip_manage";
//        $message= "Gói User VIP 1 dành cho tài khoản ".$user_name." thời hạn kết thúc vào ngày ".$week." do thành viên admin cập nhật vào lúc ". date('Y-m-d H:i:s');
//        $wpdb->update( $table_name, array( "expired_at" => $week, "description" => $message),array('user_id'=>$user_id, 'package_id'=>$package_id_up,'service_type'=>'up'));
//
//    }
//    else{
//        $week = strtotime(date("Y-m-d", strtotime($today)) . "+" . $num_date . " day");
//        $week = strftime("%Y-%m-%d", $week);
//        add_user_meta($user_id, 'vip_package_id',$package_id_up);
//        add_user_meta($user_id, 'user_up_count',$user_up_count);
//        add_user_meta($user_id, 'user_up_expire',$week);
//        $message= "Gói ".$name." dành cho tài khoản ".$user_name." thời hạn kết thúc vào ngày ".$week." do thành viên admin tạo vào lúc ". date('Y-m-d H:i:s');
//        $wpdb->insert("crb_vip_manage", array(
//            "user_id" => $user_id,
//            "admin_id" => 1 ,
//            "package_id"=>$package_id_up,
//            "expired_at" => $week,
//            "description" => $message,
//            "service_type"=>"up",
//            "date_create" => date('Y-m-d H:i:s') ,
//        ));
//    }
//    ?>

<?php




}
if(isset($_GET["up"]))
{
    $post_id=$_GET["up"];

    $vip_expire = get_user_meta($current_user->ID, 'user_up_expire', true);
    $package_id_up = get_user_meta($current_user->ID, 'up_package_id', true);
    $count_up = get_user_meta($current_user->ID, 'user_up_count', true);
//    update_post_meta( $_GET["up"], 'vip_package_id',$package_id_up);
//    update_post_meta( $_GET["up"], 'vip_expire',$vip_expire);
    update_user_meta($current_user->ID, 'user_up_count',$count_up-1);



    $crb_wp2es_up = $wpdb->get_var("SELECT * FROM crb_wp2es WHERE post_id = '$post_id' AND uid= '$current_user->ID' AND sync_type ='edit'");

if($crb_wp2es_up==""||$crb_wp2es_up==0) {
    $wpdb->insert("crb_wp2es", array(
        "uid" => $current_user->ID,
        "is_synced" => 1,
        "sync_type" => "edit",
        "post_id" => $post_id,
        "sync_at" => date('Y-m-d H:i:s'),
    ));

}
    else{
        $wpdb->update("crb_wp2es", array(
                "is_synced" => 1,
                "sync_at" => date('Y-m-d H:i:s'))
            ,array("uid" => $current_user->ID, "post_id" =>$post_id,"sync_type" => "edit")
        );
    }
    ?>
    <script>
        location.href="<?php echo home_url(); ?>/my-account";
        swal(
            'Bạn đã up tin thành công!'
        )
    </script>
<?php

}
if(isset($_GET["vip"])) {
    $post_id=$_GET["vip"];
    $date = esc_attr(get_post_meta($post_id, 'vip_star_expire',true));
    $post_vip_star = get_user_meta($current_user->ID, 'star_package_id', true);
    $today=date("Y-m-d");
    $post_vips = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'vip_job' AND package_id='$post_vip_star' ");
    foreach ($post_vips as $package) {
        $name = $package->name;
        $id_package = $package->package_id;
        $description = $package->service_benefit;
        $description = json_decode($description, true);
        $num_week = $description["duration"];
        $package_id_vip=$_GET['package_post_star'];
    }
    if($num_week=="")
    {
        $num_week=5;
    }


    if($date !=""){
        $week = strtotime(date("Y-m-d", strtotime($date)) . "+" . $num_week . " day");
        $vip_expire = strftime("%Y-%m-%d", $week);

    }
    else{
        $vip_expire=strtotime(date("Y-m-d", strtotime($today)) . " +" . $num_week . " day");
    }
    $count_vip_star = get_user_meta($current_user->ID, 'count_post_star', true);
    update_post_meta( $_GET["vip"], 'vip_star',5);
    update_post_meta( $_GET["vip"], 'vip_star_expire',$vip_expire);
    update_user_meta($current_user->ID, 'count_post_star',$count_vip_star-1);
    if($count_vip_star <=0 ||$count_vip_star=="")
    {
        delete_user_meta($current_user->ID, 'star_package_id',$post_vip_star);
    }


    $crb_wp2es_vip = $wpdb->get_var("SELECT * FROM crb_wp2es WHERE post_id = '$post_id' AND uid= '$current_user->ID' AND sync_type ='edit'");
if($crb_wp2es_vip==""||$crb_wp2es_vip==0)
{
    $wpdb->insert("crb_wp2es", array(
        "uid" => $current_user->ID,
        "is_synced" => 1,
        "sync_type" => "edit",
        "post_id" =>$post_id,
        "sync_at" => date('Y-m-d H:i:s'),
    ));

}
    else{
        $wpdb->update("crb_wp2es", array(
            "is_synced" => 1,
            "sync_type" => "edit",
            "sync_at" => date('Y-m-d H:i:s'))
            ,array("uid" => $current_user->ID, "post_id" => $post_id,"sync_type" => "edit")
        );

    }

    ?>
    <script>
        location.href="<?php echo home_url(); ?>/my-account";
        swal(
            'Bạn đã nâng cấp tin đặc biệt thành công!'
        )
    </script>
<?php
}
?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  