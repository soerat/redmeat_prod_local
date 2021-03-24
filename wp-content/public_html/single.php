<?php get_header(); ?>

            <div class="content">              
                <div class="left-big">
                	<div class="breadcrumbs">
						<?php wp_breadcrumb(); ?>
                    </div>
                    <?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
                    <div class="title">
                    	<div class="title-wrap">
                            <span>
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>  
                            </span>
                        </div><!--end title-wrap-->
                    </div><!--end title-->
                    <div class="single-identitas">
                    	<span>Ditulis pada tanggal <?php the_time('j F Y') ?>, oleh <?php the_author(); ?>, pada kategori <?php the_category(', '); ?></span>
                    </div><!--end single identitas-->
                    <div class="single-content">
                    	<?php the_content(); ?>
						<div class="clear"></div><!-- selalu ada pada akhir entry -->
                    </div><!--end single-content-->
                    <div class="clear"></div>
                    <?php endwhile; ?>
					<?php endif; ?>			
                    <div class="clear"></div>
                </div><!--end left-big-->
                
            	<?php get_sidebar(); ?>
                <div class="clear"></div>
            
            
            </div><!--end content-->
        </div><!--end container inside-->
	</div><!--end container-->
    
    
<?php get_footer(); ?>
