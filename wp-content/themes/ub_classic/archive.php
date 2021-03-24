<?php get_header(); ?>
	
            <div class="content">              
                <div class="left-big">
                	<div class="breadcrumbs">
						<?php wp_breadcrumb(); ?>
                    </div>
                    <?php if (have_posts()) : ?>
                    	<h3 class="sdtitle">Arsip : <?php echo get_the_time('F').'&nbsp;'.get_the_time('Y'); ?></h3>
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
					<?php endif; ?>	
                    
                    <div class="pages">
						<?php 
							if (function_exists("paginate")) {
								paginate(); 
							}
						?>
					</div>
                    		
                    <div class="clear"></div>
                </div><!--end left-big-->
                
            	<?php get_sidebar(); ?>
                <div class="clear"></div>
            
            
            </div><!--end content-->
        </div><!--end container inside-->
	</div><!--end container-->
    
    
<?php get_footer(); ?>

