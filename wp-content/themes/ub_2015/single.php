<?php get_header(); ?>



	<div class="single-body">

    	<div class="clear"></div>

    	<div class="single-wrap">

        	<div class="single-content">

                <div class="breadcrumbs">

                    <?php wp_breadcrumb(); ?>

                </div>

                <?php if (have_posts()) : ?>

				<?php while (have_posts()) : the_post(); ?>

                <div class="single-content-wrap">

                	<div class="single-title">

                    	<h2><?php the_title(); ?></h2>

                    </div>

                    <div class="single-description">

                    	<img class="date-single" src="<?php bloginfo('template_url'); ?>/img/date-gray.png" alt="" >10 - 01 - 2015

                        <img class="user-single" src="<?php bloginfo('template_url'); ?>/img/user-gray.png" alt="" ><span style="text-transform:uppercase;"><?php the_author(); ?></span>

                        <img class="tag-single" src="<?php bloginfo('template_url'); ?>/img/tag-gray.png" alt="" ><span class="kategori"><?php the_category(', '); ?></span>

                    </div>

                	<?php the_content(); ?>

                    

                </div>

                <?php endwhile; ?>

				<?php endif; ?>	

            </div>

            

			

            <?php get_sidebar(); ?>

            <div class="clear"></div>

        </div>

    </div>



<?php get_footer(); ?>