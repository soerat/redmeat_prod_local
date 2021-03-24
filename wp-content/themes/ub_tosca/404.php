<?php get_header(); ?>
	
    
    
    
    
            <div class="content">              
                <div class="left-big">
                	<div class="breadcrumbs">
						<?php wp_breadcrumb(); ?>
                    </div>
                    <div class="title">
                    	<div class="title-wrap">
                            <span>
                                Error 404 : Not Found !  
                            </span>
                        </div><!--end title-wrap-->
                    </div><!--end title-->
                    <div class="single-content" style="text-align:center">
                    	<p>Your target link now was lost in peace. </p>
                        <p><strong><a style="color:#900" href="<?php bloginfo('url'); ?>">Back to homepage</a></strong></p>
                        <p><p>The page you requested was not found.</p></p>
						<div class="clear"></div><!-- selalu ada pada akhir entry -->
                    </div><!--end single-content-->
                    <div class="clear"></div>
                </div><!--end left-big-->
                
            	<?php get_sidebar(); ?>
                <div class="clear"></div>
            
            
            </div><!--end content-->
        </div><!--end container inside-->
	</div><!--end container-->
    
    
<?php get_footer(); ?>
