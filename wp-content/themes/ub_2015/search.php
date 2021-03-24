<?php get_header(); ?>

	<div class="single-body">
    	<div class="clear"></div>
    	<div class="single-wrap">
        	<div class="single-content">
                <div class="breadcrumbs">
                    <?php wp_breadcrumb(); ?>
                </div>
                <?php if (have_posts()) : ?>
                
                <?php
					$link_request = $_SERVER['REDIRECT_URL'];
					preg_match('/\/(en)\/*/i', $link_request,$match);
					$language = (isset($match[1])) ? $match[1] : 'indo';
					
					global $wp_query;
					$total_results = $wp_query->found_posts;
			
					if($language == 'en'){
						echo '<h3 class="sdtitle">Search result for "'. $_GET['s']  .'" found '.$total_results.' related posts</h3>';
					}
					else{
						echo '<h3 class="sdtitle">Hasil pencarian dari "'. $_GET['s'] .'" ditemukan '.$total_results.' postingan yang sesuai.</h3>';
					}
				?>
                
				<?php while (have_posts()) : the_post(); ?>
                <div class="single-content-wrap-mini">
                	<div class="single-title">
                    	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    </div>
                    <div class="single-description">
                    	<img class="date-single" src="<?php bloginfo('template_url'); ?>/img/date-gray.png" alt="" >10 - 01 - 2015
                        <img class="user-single" src="<?php bloginfo('template_url'); ?>/img/user-gray.png" alt="" ><span style="text-transform:uppercase;"><?php the_author(); ?></span>
                        <img class="tag-single" src="<?php bloginfo('template_url'); ?>/img/tag-gray.png" alt="" >Announcement
                    </div>
                	<?php echo get_excerpt(300); ?>
                    
                </div>
                <?php endwhile; ?>
                
                <?php else : ?>
				<h3 class="sdtitle">No posts found for "<?php the_search_query(); ?>". Try a different search.</h3>
                
				<?php endif; ?>
                <div class="pages">
					<?php 
                        if (function_exists("paginate")) {
                            paginate(); 
                        }
                    ?>
                </div>	
            </div>
            
			
            <?php get_sidebar(); ?>
            <div class="clear"></div>
        </div>
    </div>

<?php get_footer(); ?>
