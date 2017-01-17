<?php global $theme; get_header(); ?>
<style>
#page-title .container, #page-title .container img,.main-content img{
max-width: 100%;
max-height: 100%;
width: auto !important;
height: auto !important;
}
</style>
<div class="main-content">
    <div class="list-job">
        <div class="container bg-fff">
            <div class="row">
                <div class=" col-md-8 col-sm-12 col-xs-12">
                    <div id="">
                        <?php
                        if (have_posts()) : while (have_posts()) : the_post();
                        /**
                        * Find the post formatting for the pages in the post-page.php file
                        */
                        get_template_part('post', 'page');
                        if(comments_open( get_the_ID() ))  {
                        comments_template('', true);
                        }
                        endwhile;
                        else :
                        get_template_part('post', 'noresults');
                        endif;
                        ?>
                        <?php $theme->hook('content_after'); ?>
                    </div>
                    <?php
                    get_template_part('navigation');
                    ?>
                    <?php $theme->hook('content_after'); ?>
                    </div> <!-- end col-md-8 -->
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="input-search">
                            <form action="" class="form-search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm Kiếm ">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default btn-search" type="button"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <div class="category-menu">
                            <ul class="menu-title">
                                <li class="title">Chuyên mục</li>
                                <?php
                                $categories = get_categories( array(
                                'orderby' => 'name',
                                'order'   => 'ASC'
                                ) );
                                foreach( $categories as $category ) {
                                $category_link = sprintf(
                                '<a href="%1$s" alt="%2$s">%3$s</a>',
                                esc_url(get_category_link($category->term_id)),
                                esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $category->name)),
                                esc_html($category->name)
                                );
                                ?>
                                <li><?php echo $category_link; ?></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>            </div>
                    </div>
                </div>
            </div>
        </div>
        <?php  include('desktop/template-scroll-top.php');?>
        
        <?php get_footer(); ?>
        <!-- #content -->