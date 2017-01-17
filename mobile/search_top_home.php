<?php
global $wpdb;
$job_field=$wpdb->get_results('select * from job_field ');
$job_province=$wpdb->get_results('select * from job_province ');
?>
<div class="coverImageHolder">
    
    <div class="container">
        <div class=row>
            <div class="col-xs-12 padding-bottom30">
                <section id="header-cover-image">
                    <div class="tab-wrapper">
                        <ul class="tab">
                            <li class="candidates">
                                <a href="#tab-candidates"><i class="fa fa-bullhorn"></i>Ứng Viên</a>
                            </li>
                            <li class="recruitment">
                                <a href="#tab-recruitment"><i class="fa fa-file-text-o"></i>Tuyển dụng</a>
                            </li>
                            
                        </ul>
                        <div class="tab-content">
                            <div class="tab-item" id="tab-candidates">
                                <h3 class="resume-section-subtitle"><a id="h3-resume" >Tìm Kiếm Ứng Viên !</a></h3>
                                <form method="get" action="<?php echo home_url()?>/ung-vien/">
                                    <div class="search-select">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="search-home ">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                <input class="input-lg" type="text" name="keyword" id="fullName" value="" placeholder="Từ khóa"  vk_11912="subscribed">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="search-home ">
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                <select class="input-lg select2 job_location"  role="presentation" name="resume_location" id="job_location"  >
                                                    <option value="">Chọn Khu Vực</option>
                                                    <?php
                                                    foreach ($job_province as $location) {
                                                    ?>
                                                    <option value="<?php echo $location->name; ?>"><?php echo $location->name; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="search-home ">
                                                <i class="fa fa-cog" aria-hidden="true"></i>
                                                <select class="input-lg select2 job_type"  role="presentation" name="industry" id="job_type" style="width: 100%; margin-bottom: 0;">
                                                    <option value="">Chọn Ngành Nghề</option>
                                                    <?php
                                                    foreach ($job_field as $industry) {
                                                    ?>
                                                    <option  value="<?php echo createSlug($industry->name); ?>"><?php echo $industry->name; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="search-home ">
                                                <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search" aria-hidden="true"></i>Tìm Kiếm</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            
                            <div class="tab-item" id="tab-recruitment">
                                <h3 class="resume-section-subtitle"><a id="h3-resume" >Tìm Kiếm Việc Làm!</a></h3>
                                <form method="get" action="<?php echo home_url()?>/tuyen-dung/">
                                    <div class="search-select">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="search-home ">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                <input class="input-lg" type="text" name="keyword" id="fullName" value="" placeholder="Từ khóa"  vk_11912="subscribed">
                                            </div></div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="search-home ">
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    <select class="input-lg select2 job_location "  role="presentation" placeholder="Chọn khu vực" name="resume_location" id="job_location" tabindex="-1" aria-hidden="true">
                                                        <option value="">Chọn Khu Vực</option>
                                                        <?php
                                                        foreach ($job_province as $location) {
                                                        ?>
                                                        <option value="<?php echo $location->name; ?>"><?php echo $location->name; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div></div>
                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                    <div class="search-home ">
                                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                                        <select class="input-lg select2 job_type "  role="presentation" name="industry" id="job_type"  tabindex="-1" aria-hidden="true">--&gt;
                                                            <option value="">Chọn Ngành Nghề</option>
                                                            <?php
                                                            foreach ($job_field as $industry) {
                                                            ?>
                                                            <option  value="<?php echo createSlug($industry->name); ?>"><?php echo $industry->name; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div></div>
                                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                                        <div class="search-home ">
                                                            <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search" aria-hidden="true"></i>Tìm Kiếm</button>
                                                        </div></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>