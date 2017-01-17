<?php
global $wpdb,$current_user;
$item_per_page=18;
$page=$_GET['p'];
$limit=$page>0?($page-1)*$item_per_page:0;
$list_award=$wpdb->get_results("select * from crb_resume_award ORDER BY id DESC limit ".$limit.",".$item_per_page." ");
$user_count=$wpdb->get_var('select COUNT(id) from crb_resume_award ');
 ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />

<style>
    table{
        width: 100%;
    }
    table *{
        border: solid 1px gainsboro;
    }
    td, th {
        padding: 10px;
        text-align: center;
    }
    #head td{
        font-weight: bold;
    }
</style>
<div class="container">
    <h1>Danh sách khách hàng dự thưởng</h1>
    <table>
        <tr id="head">
        <td>STT</td>
        <td>Khách hàng</td>
        <td>Mã dự thưởng</td>
        <td>IP</td>
        <td>SĐT</td>
        <td>Ngày dự thưởng</td>
        </tr>
        <?php
        $i=0;
        foreach ($list_award as $list) {
            $user = get_user_by( 'id',$list->id );
            $args = array(
                'author'        =>  $list->id,
                'post_type'       =>  'resume',
                'posts_per_page' => 1
            );
            $current_user_posts = get_posts( $args );
            $td_current_post= $current_user_posts[0]->ID;
             $wpjobus_resume_fullname = get_post_meta($td_current_post, 'wpjobus_resume_fullname',true)?:$user->user_login;



            ?>
            <tr>
                <td><?php echo $i=$i+1;?></td>
                <td><?php echo $wpjobus_resume_fullname; ?></td>
                <td><?php echo $list->id; ?></td>
                <td><?php echo $list->ip; ?></td>
                <td><?php echo $user->user_login; ?></td>
                <td><?php echo date('d/m/Y H:i:s',$list->sign_time); ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
    echo '<div>'.salestaff_paginate_function($item_per_page,$page,$user_count,'?page=user-award').'</div>';
    ?>
</div>
