<?php get_header(); ?>

<div id="main">
	
    
    
    <div class="content right">
        
        <div class="single">
        			
			<div class="breadcrumbs">
				<?php wp_breadcrumb(); ?>
			</div>
			
            <div class="title" align="center"><h1>404 Page Not Found</h1></div>
			<div class="entry" align="center">
				<a href="<?php bloginfo('url'); ?>"><img width="150px" src="<?php bloginfo('template_url'); ?>/images/404.gif" border="0" alt="Not Found"></a>
				<p>Your target link now was lost in peace. </p>
				<p><strong><a href="<?php bloginfo('url'); ?>">Back to homepage</a></strong></p>
				<p><p>The page you requested was not found.</p></p>
				<div class="clear"></div>
			</div>
			    
            <div class="clear"></div>
        </div>
        
    </div>
    <?php get_sidebar(); ?>
    <div class="clear"></div>
    
</div>

<?php get_footer(); ?>