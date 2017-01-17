<div class="main-content">
	<div class="list-job-detail">
		<div class="container bg-fff">
			<div class="row">
				<div class="col-md-8 col-xs-12">
					<?php
					if (have_posts()) : while (have_posts()) : the_post();
					/**
					* Find the post formatting for the single post (full post view) in the post-single.php file
					*/
					get_template_part('post', 'single');
					endwhile;
					else :
					get_template_part('post', 'noresults');
					endif;
					?>
				</div>

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

                            $category= get_queried_object();
                            $cat_single= $category->term_id;

                            $parent_cat_arg = array('hide_empty' => false, 'parent' =>$cat_single );
                            $parent_cat = get_terms('category',$parent_cat_arg);//category name
                            foreach ($parent_cat as $catVal) {

                                ?>
                                <li style="padding-left: 10px"><a href="<?php echo esc_url( get_term_link( $catVal ) );?>"><?php echo $catVal->name; ?></a></li>

                                <?php

                                $child_arg = array( 'hide_empty' => false, 'parent' => $catVal->term_id);
                                $child_cat = get_terms( 'category', $child_arg );

                                foreach( $child_cat as $child_term ) {


                                    echo '<li><a href="'. esc_url( get_term_link( $child_term ) ) .'">'.$child_term->name . '</a></li>'; //Child Category
                                    $child_arg_1 = array( 'hide_empty' => false, 'parent' => $child_term->term_id );
                                    $child_cat_1 = get_terms( 'category', $child_arg_1 );
                                    if($child_cat_1 !="")
                                    {
                                        foreach( $child_cat_1 as $child_term_1 ) {
                                            echo '<li><a href="'. esc_url( get_term_link( $child_term_1 ) ) .'">' . $child_term_1->name . '</a></li>'; //Child Category
                                        }


                                    }
                                }

                            }
                            ?>


                        </ul>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
<?php  include('template-scroll-top.php');?>