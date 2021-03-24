	<div class="footer">
		<?php wp_footer(); ?>
    	<div class="footer-inside">
        	<div class="rektorat">
            </div><!--end rektorat-->
        	<div class="footblock left">
        	<?php
				$link_request = $_SERVER['REDIRECT_URL'];
				preg_match('/\/(en)\/*/i', $link_request,$match);
				$language = (isset($match[1])) ? $match[1] : 'indo';
				if($language == 'en'){
					echo '<h3>Main Menu</h3>';
				}
				else{
					echo '<h3>Menu Utama</h3>';
				}
			?>
            
            
            <ul>
            	<li><a href="<?php bloginfo('siteurl'); ?>" title="Home">
                <?php
					$link_request = $_SERVER['REDIRECT_URL'];
					preg_match('/\/(en)\/*/i', $link_request,$match);
					$language = (isset($match[1])) ? $match[1] : 'indo';
					if($language == 'en'){
						echo 'Home';
					}
					else{
						echo 'Beranda';
					}
				?>
                </a></li>
				<?php wp_list_pages('depth=1&title_li=');?>
            </ul>
        </div>
        <div class="footblock left">
        	<?php
					$link_request = $_SERVER['REDIRECT_URL'];
					preg_match('/\/(en)\/*/i', $link_request,$match);
					$language = (isset($match[1])) ? $match[1] : 'indo';
					if($language == 'en'){
						echo '<h3>Join Us</h3>';
					}
					else{
						echo '<h3>Layanan</h3>';
					}
				?>
            <ul>
                <li><a href="http://www.ub.ac.id/id/news/prasetya/rss.html" target="_blank">RSS Feed</a></li>
				<li><a href="http://www.facebook.com/Universitas.Brawijaya.Official" target="_blank">Facebook</a></li>
				<li><a href="http://twitter.com/UB_Official/" target="_blank">Twitter</a></li>
				<li><a href="http://www.flickr.com/photos/ub_pictures/" target="_blank">Flickr</a></li>
				<li><a href="http://t.ub.ac.id/" target="_blank">UB Tube</a></li>
				<li><a href="http://www.ub.ac.id/id/live_streaming/live_streaming/" target="_blank">UB Live</a></li>
			</ul>
        </div>
        <div class="footblock left">
        	<?php
				$link_request = $_SERVER['REDIRECT_URL'];
				preg_match('/\/(en)\/*/i', $link_request,$match);
				$language = (isset($match[1])) ? $match[1] : 'indo';
				if($language == 'en'){
					echo '<h3>Latest Posts</h3>';
				}
				else{
					echo '<h3>Posting Terbaru</h3>';
				}
			?>
            
			<ul>
				<?php

					$recentPosts = new WP_Query();

					$recentPosts->query('showposts=5');

				?>

				<?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>

					<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>

				<?php endwhile; ?>
            </ul>            
        </div>
        <div class="footblock left">
        	<h3>UB Blogroll</h3>
            <ul>
                <li><a href="http://www.ub.ac.id/" target="_blank">UB Official Web</a></li>
				<li><a href="http://prasetya.ub.ac.id/" target="_blank">Prasetya Online</a></li>
				<li><a href="http://webmail.ub.ac.id/" target="_blank">UB Webmail</a></li>
				<li><a href="http://digilib.ub.ac.id/" target="_blank">Digital Library</a></li>
				<li><a href="http://forum.ub.ac.id/" target="_blank">Forum UB</a></li>
				<li><a href="http://jpc.ub.ac.id/" target="_blank">Job Placement Center</a></li>
				<li><a href="http://selma.ub.ac.id/" target="_blank">Seleksi Masuk UB</a></li>
			</ul>
        </div>
        <div class="footblock left">
        	<h3>Copyright</h3>
            <cite>Universitas Brawijaya &copy; <?php echo date('Y'); ?><br />
			under terms of services<br />
			<a href="http://bits.ub.ac.id/" target="_blank">BITS UB</a>
            </cite>
        </div>		
        
        <div class="footblock left">
        	<h3>Other Links</h3>
            <ul>
				<?php wp_get_linksbyname('Link Footer','orderby=name&show_description=0&show_updated=1&before=<li>&after=</li>'); ?>
			</ul>
        </div>
        
        
        <div class="clear"></div>
        
    </div>
        
    	</div><!--end footer-inside-->
    </div><!--end footer-->
    <p id="back-top">
		<a href="#top">
            <span>
            	<span class="arrow">
                </span>
            	<i style=" width:90px;position:absolute; bottom:15px; text-align:center">
                	Back to top
                </i>
            </span>
        </a>
	</p>
</body>
</html>
