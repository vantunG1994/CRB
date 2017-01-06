<?php
global $wpdb;

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='stylesheet' id='main-style-css'  href='<?php echo home_url("/"); ?>wp-content/themes/mangvieclam789/css/main.css?ver=1' type='text/css' media='all' />
<html>
<body>
<div class="content">
    <input type="submit" name="user_vip" class="user_vip" value="Gói tài khoản VIP"/>
    <input type="submit" name="post_vip" class="post_vip" value="Gói tin VIP"/>
    <input type="submit" name="post_vip" class="post_up" value="Gói tin UP"/>
    <?php
    $post_vip = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'vip_job'");
    $post_up = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'up'");
    if(isset($_GET['post_up']))
    {

    if(isset($_GET['edit_post_up']))
    {
        $post_up_id = $wpdb->get_row("SELECT *FROM crb_vip_package WHERE service_type = 'up' AND package_id=".$_GET['edit_post_up']."");
        $description=$post_up_id->service_benefit;
        $description=json_decode($description, true);
        ?>
        <form method="post">
            <table>
                <tr>
                    <td>Tên gói UP</td>
                    <td> <input type="text" name="package_name_post_up" value="<?php echo $post_up_id->name;?>"></td>
                </tr>
                <tr>
                    <td>Giá</td>
                    <td> <input type="number" name="package_price_post_up"  value="<?php echo $post_up_id->price;?>"></td>
                </tr>
                <tr>
                    <td>Thời hạn</td>
                    <td> <input type="number" name="duration_post_up" value="<?php echo $description["duration"];?>"></td>
                </tr>

                <tr>
                    <td>Số tin UP</td>
                    <td> <input type="number" value="<?php echo $description["up_count"];?>"  name="up_count"></td>
                </tr>


                <td> <input type="submit" name="update_post_up" value="Cập nhật"></td>
                </tr>
            </table>
        </form>
    <?php
    }
    if($_GET['post_up']=="add_post_up"){
        ?>
        <form method="post">
            <table>
                <tr>
                    <td>Tên gói VIP</td>
                    <td> <input type="text" name="package_name_post_up"></td>
                </tr>
                <tr>
                    <td>Giá</td>
                    <td> <input type="number" name="package_price_post_up"></td>
                </tr>

                <tr>
                    <td>Thời hạn</td>
                    <td> <input type="number" name="duration_post_up"></td>
                </tr>
                <tr>
                    <td>Số luot UP</td>
                    <td> <input type="number" name="up_count"></td>
                </tr>

                <tr>
                    <td> <input type="submit" name="add_post_up" value="Chấp nhận"></td>
                </tr>

            </table>
        </form>
    <?php

    }
    ?>
    <table id="table">
    <tr>
        <td><b>STT</b></td>
        <td><b>ID package</b></td>
        <td><b>Tên Gói VIP</b></td>
        <td><b>Mô tả </b></td>
        <td><b>Thao tác</b>
            <a class="button-ag-full" href="admin.php?page=package-vip&post_up=add_post_up">Thêm</a>
        </td>
    </tr>

    <?php
    $i=0;
    foreach ($post_up as $package) {
        $description=$package->service_benefit;
        $description=json_decode($description, true);
        ?>
        <tr>
            <td><?php echo $i=$i+1;?></td>
            <td><?php echo $package->package_id;?></td>
            <td><?php echo $package->name;?></td>
            <td>
                <ul>
                    <li><b>Thời hạn sử dụng: </b><span><?php echo $description["duration"];?> ngày</span></li>
                    <li><b>số lượt UP: </b><span><?php  echo $description["up_count"];?></span></li>
                    <li><b>Giá: </b><span><?php echo format_gia( $package->price); ?></span></li>

                </ul>
            </td>
            <td><a onclick='return confirm("Bạn có chắc chắn muốn xoá gói <?php echo $package->name; ?> ?")' class="button-ag-full" href="admin.php?page=package-vip&post_up&delete_vip=<?php echo $package->package_id;?>">Xoá</a>
                <a class="button-ag-full" href="admin.php?page=package-vip&post_up&edit_post_up=<?php echo $package->package_id;?>">Sửa</a>
            </td>
        </tr>

        <?php

        ?>
    <?php
    }
    ?>

    <?php
    }

    if(isset($_GET['post_vip']))
    {

    if(isset($_GET['edit_post_vip']))
    {
        $post_vip_id = $wpdb->get_row("SELECT *FROM crb_vip_package WHERE service_type = 'vip_job' AND package_id=".$_GET['edit_post_vip']."");
        $description=$post_vip_id->service_benefit;
        $description=json_decode($description, true);
        ?>
        <form method="post">
            <table>
                <tr>
                    <td>Tên gói VIP</td>
                    <td> <input type="text" name="package_name_post_vip" value="<?php echo $post_vip_id->name;?>"></td>
                </tr>
                <tr>
                    <td>Giá</td>
                    <td> <input type="number" name="package_price_post_vip"  value="<?php echo $post_vip_id->price;?>"></td>
                </tr>
                <tr>
                    <td>Thời hạn</td>
                    <td> <input type="number" name="duration_post_vip" value="<?php echo $description["duration"];?>"></td>
                </tr>

                <tr>
                    <td>VIP star</td>
                    <td> <input type="number" value="<?php echo $description["vip_star"];?>"  name="star_user_vip"></td>
                </tr>
                <tr>
                    <td>Giảm giá</td>
                    <td> <input value="<?php  echo $description["discount_percent"];?>" type="number" name="discount_post"></td>
                </tr>

                    <td> <input type="submit" name="update_post_vip" value="Cập nhật"></td>
                </tr>
            </table>
        </form>
    <?php
    }
    if($_GET['post_vip']=="add_post_vip"){
        ?>
        <form method="post">
            <table>
                <tr>
                    <td>Tên gói VIP</td>
                    <td> <input type="text" name="package_name_post_vip"></td>
                </tr>
                <tr>
                    <td>Giá</td>
                    <td> <input type="number" name="package_price_post_vip"></td>
                </tr>

                <tr>
                    <td>Thời hạn</td>
                    <td> <input type="number" name="duration_post_vip"></td>
                </tr>
                <tr>
                    <td>VIP star</td>
                    <td> <input type="number" name="star_post_vip"></td>
                </tr>
                <tr>
                    <td>Giảm giá</td>
                    <td> <input value="" type="number" name="discount_post"></td>
                </tr>
                <tr>
                    <td> <input type="submit" name="add_post_vip" value="Chấp nhận"></td>
                </tr>

            </table>
        </form>
    <?php

    }
    ?>
    <table id="table">
    <tr>
        <td><b>STT</b></td>
        <td><b>ID package</b></td>
        <td><b>Tên Gói VIP</b></td>
        <td><b>Mô tả </b></td>
        <td><b>Thao tác</b>
            <a class="button-ag-full" href="admin.php?page=package-vip&post_vip=add_post_vip">Thêm</a>
        </td>
    </tr>

    <?php
    $i=0;
    foreach ($post_vip as $package) {
        $description=$package->service_benefit;
        $description=json_decode($description, true);
        $job_star=$description['vip_star'];
        ?>
        <tr>
            <td><?php echo $i=$i+1;?></td>
            <td><?php echo $package->package_id;?></td>
            <td><?php echo $package->name;?></td>
            <td>
                <ul>
                    <li><b>Thời hạn sử dụng: </b><span><?php echo $description["duration"];?> ngày</span></li>
                    <li><b>Số sao: </b><span><?php  echo $job_star;?></span></li>
                    <li><b>Giá: </b><span><?php echo format_gia( $package->price); ?></span></li>
                    <li><b>Giảm giá: </b><span><?php  echo $description["discount_percent"];?>%</span></li>

                </ul>
            </td>
            <td><a onclick='return confirm("Bạn có chắc chắn muốn xoá gói <?php echo $package->name; ?> ?")' class="button-ag-full" href="admin.php?page=package-vip&post_vip&delete_vip=<?php echo $package->package_id;?>">Xoá</a>
                <a class="button-ag-full" href="admin.php?page=package-vip&post_vip&edit_post_vip=<?php echo $package->package_id;?>">Sửa</a>
            </td>
        </tr>

        <?php

        ?>
        <?php
    }
    ?>

    <?php
    }

    if(isset($_GET['user_vip']))
    {


    $user_vip = $wpdb->get_results("SELECT *FROM crb_vip_package WHERE service_type = 'user_vip' ORDER BY package_id DESC ");

    if(isset($_GET['edit_vip']))
    {
        $user_vip_id = $wpdb->get_row("SELECT *FROM crb_vip_package WHERE service_type = 'user_vip' AND package_id=".$_GET['edit_vip']."");
        $description=$user_vip_id->service_benefit;
        $description=json_decode($description, true);
        ?>
        <form method="post">
            <table>
                <tr>
                    <td>Tên gói VIP</td>
                    <td> <input type="text" name="package_name_user_vip" value="<?php echo $user_vip_id->name;?>"></td>
                </tr>
                <tr>
                    <td>Giá</td>
                    <td> <input type="number" name="package_price_user_vip"  value="<?php echo $user_vip_id->price;?>"></td>
                </tr>

                <tr>
                    <td>Thời hạn</td>
                    <td> <input type="number" value="<?php echo $description["duration"] ?>" name="duration_user_vip"></td>
                </tr>
                <tr>
                    <td>Lượt xem hồ sơ</td>
                    <td> <input type="number" value="<?php echo $description["cv_view_count"];?>" name="count_view_user_vip"></td>
                </tr>
                <tr>
                    <td>VIP level</td>
                    <td> <input type="number" value="<?php echo $description["vip_level"];?>" name="level_user_vip"></td>
                </tr>
                <tr>
                    <td>VIP star</td>
                    <td> <input type="number" value="<?php echo $description["vip_star"];?>"  name="star_user_vip"></td>
                </tr>
                <tr>
                    <td>Lượt đăng trong ngày</td>
                    <td> <input type="number" value="<?php echo $description["user_daily_max_post"];?>" name="post_day_user_vip"></td>
                </tr>
                <tr>
                    <td>Lượt đăng trong tháng</td>
                    <td> <input type="number" value="<?php  echo $description["user_monthly_max_post"];?>" name="post_month_user_vip"></td>
                </tr>
                <tr>
                    <td>Giảm giá</td>
                    <td> <input value="<?php  echo $description["discount_percent"];?>" type="number" name="discount"></td>
                </tr>
                <tr>
                    <td>Số tin tặng</td>
                    <td> <input type="number" value="<?php echo $description["count_gift_post"];?>" name="count_gift_post"></td>
                </tr>
                <tr>
                    <td>Chọn gói VIP tặng</td>
                    <td>
                        <select name="package_vip_gift">
                            <?php
                            if($description["package_vip_gift"]=="")
                            {
                               ?>
                                <option value="">Gói tin đặc biệt</option>
                            <?php
                            }

                            foreach($post_vip as $value)
                            {
                                if($description["package_vip_gift"]==$value->package_id)
                                {
                                    $checked="selected";
                                }else{$checked="";}

                                ?>
                                <option  <?php echo $checked; ?> value="<?php echo $value->package_id; ?>"><?php echo $value->name; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>

                    <td> <input type="submit" name="update_package_vip" value="Cập nhật"></td>
                </tr>
            </table>
        </form>
    <?php
    }
    if($_GET['user_vip']=="add_vip"){
        ?>
        <form method="post">
            <table>
                <tr>
                    <td>Tên gói VIP</td>
                    <td> <input type="text" name="package_name_user_vip"></td>
                </tr>
                <tr>
                    <td>Giá</td>
                    <td> <input type="number" name="package_price_user_vip"></td>
                </tr>

                <tr>
                    <td>Thời hạn</td>
                    <td> <input type="number" name="duration_user_vip"></td>
                </tr>
                <tr>
                    <td>Lượt xem hồ sơ</td>
                    <td> <input type="number" name="count_view_user_vip"></td>
                </tr>
                <tr>
                    <td>VIP level</td>
                    <td> <input type="number" name="level_user_vip"></td>
                </tr>
                <tr>
                    <td>VIP star</td>
                    <td> <input type="number" name="star_user_vip"></td>
                </tr>
                <tr>
                    <td>Lượt đăng trong ngày</td>
                    <td> <input type="number" name="post_day_user_vip"></td>
                </tr>
                <tr>
                    <td>Lượt đăng trong tháng</td>
                    <td> <input type="number" name="post_month_user_vip"></td>
                </tr>
                <tr>
                    <td>Giảm giá</td>
                    <td> <input type="number" name="discount"></td>
                </tr>
                <tr>
                    <td>Số tin tặng</td>
                    <td> <input type="number" name="count_gift_post"></td>
                </tr>
                <tr>
                    <td>Chọn gói VIP tặng</td>
                    <td>
                       <select name="package_vip_gift">
                           <option value="">Gói tin đặc biệt</option>
                           <?php

                           foreach($post_vip as $value)
                           {
                           ?>
                           <option value="<?php echo $value->package_id; ?>"><?php echo $value->name; ?></option>
                           <?php
                           }
                         ?>
                       </select>
                    </td>
                </tr>
                <tr>

                    <td> <input type="submit" name="add_package_vip" value="Chấp nhận"></td>
                </tr>
            </table>
        </form>
    <?php

    }
        ?>
    <table id="table">
            <tr>
                <td><b>STT</b></td>
                <td><b>ID package</b></td>
                <td><b>Tên Gói VIP</b></td>
                <td><b>Mô tả </b></td>
                <td><b>Thao tác</b>
                    <a class="button-ag-full" href="admin.php?page=package-vip&user_vip=add_vip">Thêm</a>
                </td>
            </tr>

        <?php
        $i=0;
    foreach ($user_vip as $package) {
        $description=$package->service_benefit;
        $description=json_decode($description, true);
        $job_star=$description['vip_star'];
        $post_vip_gift = $wpdb->get_row("SELECT *FROM crb_vip_package WHERE service_type = 'vip_job' AND package_id=".$description["package_vip_gift"]."");

        ?>
        <tr>
            <td><?php echo $i=$i+1;?></td>
            <td><?php echo $package->package_id;?></td>
            <td><?php echo $package->name;?></td>
            <td>
                <ul>
                    <li><b>Thời hạn sử dụng: </b><span><?php echo $description["duration"];?> ngày</span></li>
                    <li><b>Lượt xem hồ sơ: </b><span><?php echo $description["cv_view_count"];?></span></li>
                    <li><b>Lượt đăng tin trong ngày: </b><span><?php echo $description["user_daily_max_post"];?></span></li>
                    <li><b>Số sao: </b><span><?php  echo $job_star;?></span></li>
                    <li><b>Lượt đăng tin trong tháng: </b><span><?php  echo $description["user_monthly_max_post"];?></span></li>
                    <li><b>Giảm giá: </b><span><?php  echo $description["discount_percent"];?>%</span></li>
                    <li><b>Số tin khuyến mãi: </b><span><?php  echo $description["count_gift_post"]?: "";?></span></li>
                    <li><b>Gói khuyến mãi: </b><span><?php  echo $post_vip_gift->name ?: "";;?></span></li>

                    <li><b>Giá: </b><span><?php echo format_gia( $package->price); ?></span></li>
                </ul>
            </td>
            <td><a onclick='return confirm("Bạn có chắc chắn muốn xoá gói <?php echo $package->name; ?> ?")' class="button-ag-full" href="admin.php?page=package-vip&user_vip&delete_vip=<?php echo $package->package_id;?>">Xoá</a>
                <a class="button-ag-full" href="admin.php?page=package-vip&user_vip&edit_vip=<?php echo $package->package_id;?>">Sửa</a>
            </td>
        </tr>

    <?php

    ?>
        <?php
        $description = $user_vip[0]->service_benefit;
        $description = json_decode($description, true);
        $job_star = $description['vip_star'];
        }
        ?>

    <?php
    }
    ?>

        </table>
</div>
</body>
</html>
<?php
if(isset($_POST['update_package_vip']))
{
    $package_name_user_vip= $_POST['package_name_user_vip'];
    $package_price_user_vip=$_POST['package_price_user_vip'];
    $duration_user_vip=$_POST['duration_user_vip'];
    $count_view_user_vip=$_POST['count_view_user_vip'];
    $level_user_vip=$_POST['level_user_vip'];
    $star_user_vip=$_POST['star_user_vip'];
    $post_day_user_vip=$_POST['post_day_user_vip'];
    $post_month_user_vip=$_POST['post_month_user_vip'];
    $discount=$_POST['discount'];
    $data_user_vip=array();
    $data_user_vip['duration']=$duration_user_vip;
    $data_user_vip['cv_view_count']=$count_view_user_vip;
    $data_user_vip['vip_level']=$level_user_vip;
    $data_user_vip['vip_star']=$star_user_vip;
    $data_user_vip['user_daily_max_post']=$post_day_user_vip;
    $data_user_vip['user_monthly_max_post']=$post_month_user_vip;
    $data_user_vip['discount_percent']=$discount;
    $data_user_vip['package_vip_gift']=$_POST['package_vip_gift'];
    $data_user_vip['count_gift_post']=$_POST['count_gift_post'];
    $wpdb->update('crb_vip_package',
            array(
                "name" => $package_name_user_vip,
                "price" => $package_price_user_vip ,
                "service_type" => 'user_vip',
                "service_benefit" =>json_encode($data_user_vip)
            ),
        array( 'package_id' => $_GET['edit_vip'] )

    );


    ?>
    <script>
        alert("Cập nhật thành công");

        window.location="<?php echo home_url('/').'wp-admin/admin.php?page=package-vip&user_vip'?>";
    </script>
<?php

}
if(isset($_POST['add_post_up']))
{
    $package_name_post_up= $_POST['package_name_post_up'];
    $package_price_post_up=$_POST['package_price_post_up'];
    $count_post_up=$_POST['up_count'];
    $data_post_up=array();
    $data_post_up['duration']=$_POST['duration_post_up'];
    $data_post_up['up_count']=$count_post_up;


    $wpdb->insert("crb_vip_package", array(
        "name" => $package_name_post_up,
        "price" => $package_price_post_up ,
        "service_type" => 'up',
        "service_benefit" =>json_encode($data_post_up) ,

    )
    );

    ?>
    <script>
        alert("Thêm mới thành công");

        window.location="<?php echo home_url('/').'wp-admin/admin.php?page=package-vip&post_up'?>";
    </script>
<?php

}
if(isset($_POST['update_post_up']))
{
    $package_name_post_up= $_POST['package_name_post_up'];
    $package_price_post_up=$_POST['package_price_post_up'];
    $count_post_up=$_POST['up_count'];
    $data_post_up=array();
    $data_post_up['duration']=$_POST['duration_post_up'];
    $data_post_up['up_count']=$count_post_up;


    $wpdb->update("crb_vip_package", array(
            "name" => $package_name_post_up,
            "price" => $package_price_post_up ,
            "service_type" => 'up',
            "service_benefit" =>json_encode($data_post_up) ,

        ),
        array( 'package_id' => $_GET['edit_post_up'] )
    );

    ?>
    <script>
        alert("Thêm mới thành công");

        window.location="<?php echo home_url('/').'wp-admin/admin.php?page=package-vip&post_up'?>";
    </script>
<?php

}
if(isset($_POST['add_post_vip']))
{
    $package_name_post_vip= $_POST['package_name_post_vip'];
    $package_price_post_vip=$_POST['package_price_post_vip'];
    $duration_post_vip=$_POST['duration_post_vip'];
    $discount=$_POST['discount_post'];
    $data_post_vip=array();
    $data_post_vip['duration']=$duration_post_vip;
    $data_post_vip['vip_star']=5;
    $data_post_vip['discount_percent']=$discount;


    $wpdb->insert("crb_vip_package", array(
            "name" => $package_name_post_vip,
            "price" => $package_price_post_vip ,
            "service_type" => 'vip_job',
            "service_benefit" =>json_encode($data_post_vip) ,

        )
    );

    ?>
    <script>
        alert("Thêm mới thành công");

        window.location="<?php echo home_url('/').'wp-admin/admin.php?page=package-vip&post_vip'?>";
    </script>
<?php

}

if(isset($_POST['update_post_vip']))
{
    $package_name_post_vip= $_POST['package_name_post_vip'];
    $package_price_post_vip=$_POST['package_price_post_vip'];
    $duration_post_vip=$_POST['duration_post_vip'];
    $discount=$_POST['discount_post'];
    $data_post_vip=array();
    $data_post_vip['duration']=$duration_post_vip;
    $data_post_vip['vip_star']=5;
    $data_post_vip['discount_percent']=$discount;

    $wpdb->update("crb_vip_package", array(
        "name" => $package_name_post_vip,
        "price" => $package_price_post_vip ,
        "service_type" => 'vip_job',
        "service_benefit" =>json_encode($data_post_vip) ),

        array( 'package_id' => $_GET['edit_post_vip'] )
    );

    ?>
    <script>
        alert("Cập nhập thành công");

        window.location="<?php echo home_url('/').'wp-admin/admin.php?page=package-vip&post_vip'?>";
    </script>
<?php

}

if(isset($_POST['add_package_vip']))
{
    $package_name_user_vip= $_POST['package_name_user_vip'];
    $package_price_user_vip=$_POST['package_price_user_vip'];
    $duration_user_vip=$_POST['duration_user_vip'];
    $count_view_user_vip=$_POST['count_view_user_vip'];
    $level_user_vip=$_POST['level_user_vip'];
    $star_user_vip=$_POST['star_user_vip'];
    $post_day_user_vip=$_POST['post_day_user_vip'];
    $post_month_user_vip=$_POST['post_month_user_vip'];
    $discount=$_POST['discount_post'];
    $data_user_vip=array();
    $data_user_vip['duration']=$duration_user_vip;
    $data_user_vip['cv_view_count']=$count_view_user_vip;
    $data_user_vip['vip_level']=$level_user_vip;
    $data_user_vip['vip_star']=$star_user_vip;
    $data_user_vip['user_daily_max_post']=$post_day_user_vip;
    $data_user_vip['user_monthly_max_post']=$post_month_user_vip;
    $data_user_vip['discount_percent']=$discount;
    $data_user_vip['package_vip_gift']=$_POST['package_vip_gift'];
    $data_user_vip['count_gift_post']=$_POST['count_gift_post'];

    $wpdb->insert("crb_vip_package", array(
        "name" => $package_name_user_vip,
        "price" => $package_price_user_vip ,
        "service_type" => 'user_vip',
        "service_benefit" =>json_encode($data_user_vip) ,

    ));

    ?>
    <script>
        alert("Thêm mới thành công");

        window.location="<?php echo home_url('/').'wp-admin/admin.php?page=package-vip&user_vip'?>";
    </script>
<?php

}

if(isset($_GET['delete_vip']))
{
    $wpdb->delete( 'crb_vip_package', array( 'package_id' =>$_GET['delete_vip'] ) );
    ?>
    <script>
        alert("Xoá thành công");
        window.location="<?php echo home_url('/').'wp-admin/admin.php?page=package-vip&user_vip'?>";
    </script>
<?php

}
?>
<script>
    jQuery(document).ready(function ($) {
        $(".user_vip").click(function () {
//            var id = $("#user_name").val();
            var url = "<?php echo home_url('/');?>wp-admin/admin.php?page=package-vip&user_vip";
            location.href = url;
        });
        $(".post_vip").click(function () {
//            var id = $("#user_name").val();
            var url = "<?php echo home_url('/');?>wp-admin/admin.php?page=package-vip&post_vip";
            location.href = url;
        });
        $(".post_up").click(function () {
//            var id = $("#user_name").val();
            var url = "<?php echo home_url('/');?>wp-admin/admin.php?page=package-vip&post_up";
            location.href = url;
        });

    });



</script>
<?php
//global $wp2es;
//$cond_resume=array('post_status'=>'publish','post_type'=>'resume', 'resume_industry'=>'Công nghệ thông tin','resume_location'=>'Hồ Chí Minh');
//$order_count=array('ID'=>'desc');
//$limit_count=array('size'=>100,'page'=>1);
//$resume_it = $wp2es->and_simple_search($cond_resume,$order_count,$limit_count);
//foreach($resume_it as $value)
//{
//    $data=array();
//    $data['name']=$value['wpjobus_resume_fullname'];
//    $data['title']=$value['post_title'];
//    $data['mobile_phone']=$value['wpjobus_resume_phone'];
//    $data['email_resume']=$value['wpjobus_resume_email'];
//    var_dump(json_encode($data));
//
//}

//print_r($resume_it);
//$resume_it = $wpdb->get_results("SELECT wp_posts.*,wp_postmeta.* FROM wp_posts INNER JOIN wp_postmeta ON wp_posts.ID=wp_postmeta.post_id WHERE  post_type= 'resume' AND wp_postmeta.meta_key='resume_industry' AND wp_postmeta.meta_value='Công nghệ thông tin' ORDER BY post_date DESC LIMIT 1");
//print_r($resume_it);

?>

