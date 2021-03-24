<?php get_header(); ?>

            <div class="content">              
                <div class="left-big">
                	<div class="breadcrumbs">
						<?php wp_breadcrumb(); ?>
                    </div>
                    <?php if (have_posts()) : ?>
                    	<h3 class="sdtitle">
                            Search result for "<?php the_search_query(); ?>" found
                            <?php
                                global $wp_query;
                                $total_results = $wp_query->found_posts;
                                echo $total_results;
                            ?>
                            related posts
                        </h3>
					<?php while (have_posts()) : the_post(); ?>
                    <div class="title">
                    	<div class="title-wrap">
                            <span>
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>  
                            </span>
                        </div><!--end title-wrap-->
                    </div><!--end title-->
                    <div class="single-content">
                    	<?php the_excerpt(); ?>
						<div class="clear"></div><!-- selalu ada pada akhir entry -->
                    </div><!--end single-content-->
                    <div class="single-identitas">
                    	<span>Posted in <?php the_time('d.m.Y') ?> | <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">readmore</a></span>
                    </div><!--end single identitas-->
                    <div class="clear"></div>
                    <?php endwhile; ?>
                    <?php else : ?>
						<h3 class="sdtitle">No posts found for "<?php the_search_query(); ?>". Try a different search.</h3>
					<?php endif; ?>			
                    <div class="clear"></div>
                    <div class="pages">
						<?php 
                            if (function_exists("paginate")) {
                                paginate(); 
                            }
                        ?>
                    </div>
                </div><!--end left-big-->
                
                
            	<?php get_sidebar(); ?>
                <div class="clear"></div>
            
            
            </div><!--end content-->
        </div><!--end container inside-->
	</div><!--end container-->
    
    
<?php get_footer(); ?>
