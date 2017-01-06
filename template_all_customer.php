<?php
?>
    <script src="/wp-content/themes/mangvieclam789/js/sweetalert2.min.js"></script>
    <link href="/wp-content/themes/mangvieclam789/css/sweetalert2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--<link rel='stylesheet' id='main-style-css'  href='--><?php //echo home_url("/"); ?><!--wp-content/themes/mangvieclam789/css/main.css?ver=1' type='text/css' media='all' />-->
    <h1>Danh sách khách hàng</h1>
<?php
global $wpdb,$wp2es;
$item_per_page=30;
if($_GET['user_search_staff']!="")
{
    $key_user=$_GET['user_search_staff'];
    $id=$key_user;
//    $company_name = $wpdb->get_var( "SELECT post_author FROM $wpdb->posts WHERE post_type='company' AND post_title = '". $key_user."'" );
    $args = array(
        'post_type' => 'company',
        's' => $key_user,
        'post_status' => 'publish',
        'orderby'     => 'title',
        'order'       => 'ASC'
    );
    $wp_query = new WP_Query($args);
//    print_r($wp_query);
    foreach($wp_query as $value_author)
    {}
    $user = get_user_by('login',$id);
    $user_email = get_user_by( 'email',$id);
    if($company_name !="")
    {
        $id_user_search=$company_name;
    }
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
else{
    $where="";
}

$page=intval($_GET['p']);
$limit=$page>0?($page-1)*$item_per_page:0;
$user_count=$wpdb->get_var('select count(crb_salestaff_company.ID) from crb_salestaff_company join wp_users on crb_salestaff_company.ID=wp_users.ID '.$where.'');

$users=$wpdb->get_results('select wp_users.*,crb_salestaff_company.* from crb_salestaff_company join wp_users on crb_salestaff_company.ID=wp_users.ID  '.$where.' limit '.$limit.','.$item_per_page);
//echo "<pre>";
//var_dump($users->query_vars);
//echo "</pre>";
?>
    <h3 style="color:darkred; ">Có <?php echo $user_count; ?> tài khoản</h3>
    <table>
        <tr>
            <td><input placeholder="Nhập từ khoá tìm kiếm" value="<?php echo $_GET['user_search_staff']; ?>" class="key_search_user" type="text" name="key_search_user"></td>
            <td><input type="button" class="search_user_staff" name="search_user_staff" value="Tìm kiếm"></td>
        </tr>

    </table>
<?php
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
            <div>Liên hệ: '.($user->last_contact?$user->last_contact:' Lần đầu liên hệ').' </div>
            <br>
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
?>
    <style>table#table{
            border-collapse:collapse;
            border:1px solid #ccc;
        } #table th, td{border:solid 1px #ccc; padding:3px;} </style>
    <table id="table">

        <thead>
        <tr>
            <th style="background-color: #418aa4;">ID</th>
            <th style="background-color: #418aa4;">Thông tin khách hàng</th>
            <th style="background-color: #418aa4;width:200px;">Sở hữu</th>
            <th style="background-color: #418aa4;width:200px;">Thời điểm</th>
            <th style="background-color: #418aa4;width:100px;">Trạng thái</th>
            <th style="background-color: #418aa4; width: 300px;">Comment</th>

        </tr>
        </thead>
        <thead>
        <?php
        if($user_count) {
            foreach ($users as $user){
                $args = array(
                    'author'        =>  $user->ID, // I could also use $user_ID, right?
                    'post_type'       =>  'company',

                );
                $current_user_posts = get_posts( $args );
                $sale_id=$user->sale_uid;
                $sale_obj = get_user_by('id', $sale_id);
                if($sale_id==0)
                {
                    $user_status="Không xác định";

                }else{
                    $user_status="Đã liên hệ";
                }

                foreach($current_user_posts as $post){
                    $post_company= $post->ID;
                    $user_id=$user->ID;
//            print_r($post);

                }
//            print_r($current_user_posts);
                ?>
                <tr>
                    <td><?php echo $user->ID; ?></td>
                    <td>
                        <p><b>Tài khoản :</b><a href="?page=all-customer&p=<?php echo $page; ?>&customer=<?php echo $user->ID ;?>">  <?php echo $user->user_login; ?></a></p>
                        <p><b>Email :</b> <?php echo $user->user_email; ?></p>
                        <p><b>Tên công ty :</b> <?php echo $user->name ; ?> <a target="_blank" href="<?php echo get_permalink($post_company); ?>"><br>Xem công ty</a></p>
                        <p><b>Địa chỉ :</b> <?php echo  get_post_meta($post_company, 'wpjobus_company_address',true); ?></p>

                        <?php  ?>
                    </td>
                    <td><?php
                        $where = get_posts_by_author_sql("job", true,$user_id );
                        $date_expierd=get_user_meta($user_id, 'account_vip', true);
                        if($date_expierd !="")
                        {
                            echo "<p>Tài khoản đã được cấp VIP thời hạn là : ".$date_expierd."</p>";

                        }
                        global $wp2es;

                        $cond=array('post_status'=>'publish','post_type'=>'job','job_company'=>$post_company);
                        $order=array('ID'=>'desc');
                        $limit=array('size'=>1,'page'=>1);
                        $result_job = $wp2es->and_simple_search($cond,$order,$limit);
                        $jobs_offer= $result_job[0]["es_total_result"];
                        $jobs_offer = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts $where" );
                        $user_post_count=$jobs_offer ?:0;
                        $count_vip=$wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts INNER JOIN wp_postmeta ON wp_posts.ID=wp_postmeta.post_id $where AND wp_postmeta.meta_key='mvl_is_vip' " )?:0;
                        $count_new=$wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts INNER JOIN wp_postmeta ON wp_posts.ID=wp_postmeta.post_id $where AND wp_postmeta.meta_key='mvl_is_new' " )?:0;
                        echo "<p><b>Tin đăng tuyển dụng : </b>".$user_post_count."</p>";
                        echo "<p><b>Tin đăng đặc biệt :</b> ".$count_vip."</p>";
                        echo "<p><b>Tin đăng ưu tiên :</b> ".$count_new."</p>";


                        ?></td>
                    <td><p><b>Đăng ký tài khoản:</b><?php echo $user->user_registered;  ?></p>

                    </td>
                    <td><?php echo $user_status; ?></td>
                    <td>
                        <?php
                        if($sale_id !=0)
                        {
                            ?>
                            <p><b><?php echo $sale_obj->user_login; ?>:</b> đã liên lạc(<?php echo $user->last_contact; ?>)</p>
                        <?php
                        }
                        ?>

                    </td>

                </tr>
            <?php
            }}
        ?>
        </thead>
    </table>
<?php
echo '<div>'.salestaff_paginate_function($item_per_page,$page,$user_count,'?page=all-customer').'</div>';

?>