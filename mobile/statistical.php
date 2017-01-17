<?php
global $mvl_stats;
?>
<div class="statistical">
    <div class="container">
        <div class="title-st"><h3><i class="fa fa-bar-chart-o"></i>Thống Kê</h3></div>
        <div class="row">
            <div class="col-md-3  col-xs-6">
                <div class="stat-circle">
                    <div class="content">
                        <span class="count"><a style="color: white;" href="<?php echo home_url();?>/tuyen-dung"><i class="fa fa-bullhorn" ></i><?php echo $mvl_stats['total_job'];?></a></span><br>
                        <span class="subtitle">Việc làm</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3  col-xs-6">
                <div class="stat-circle">
                    <div class="content">
                        <span class="count"><a style="color: white;" href="<?php echo home_url();?>/ung-vien"><i class="fa fa-file-text-o"></i><?php echo $mvl_stats['total_resume'];?></a></span>
                        <span class="subtitle">ứng viên</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="stat-circle">
                    <div class="content">
                        <span class="count"><a style="color: white;" href="<?php echo home_url();?>/ho-so-doanh-nghiep"><i class="fa fa-briefcase"></i><?php echo $mvl_stats['total_employer'];?></a></span>
                        <span class="subtitle">công ty</span>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3  col-xs-6">
                <div class="stat-circle">
                    <div class="content" style="color: white;">
                        <span class="count"> <a style="color: white;" href="#"><i class="fa fa-user"></i><?php echo $mvl_stats['total_user'];?></a></span>
                        <span class="subtitle">thành viên</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>