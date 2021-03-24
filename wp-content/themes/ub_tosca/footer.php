	<div class="footer">
		
    	<div class="footer-inside">
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
            	<?php wp_nav_menu( array('menu' => 'Main Menu' )); ?>
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
					echo '<h3>Post Terakhir</h3>';
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
            <?php
				$link_request = $_SERVER['REDIRECT_URL'];
				preg_match('/\/(en)\/*/i', $link_request,$match);
				$language = (isset($match[1])) ? $match[1] : 'indo';
				
		
				if($language == 'en'){
					echo '<h3>UB Services</h3>';
				}
				else{
					echo '<h3>Layanan UB</h3>';
				}
			?>
            
            <ul>
              <li><a href="http://siam.ub.ac.id/">SIAM</a></li>
              <li><a href="http://siado.ub.ac.id/">SIADO</a></li>
              <li><a href="http://simpeg.ub.ac.id/">SIMPEG</a></li>
              <li><a href="http://selma.ub.ac.id/">SELMA</a></li>
              <li><a href="http://siakad.ub.ac.id/wisuda/">SIUDA</a></li>
              <li><a href="http://simpel.ub.ac.id/">SIMPEL</a></li>
              <li><a href="http://siakad.ub.ac.id/siregi/">SIREGI</a></li>
              <li><a href="http://sidea.ub.ac.id/">SIDEA</a></li>
              <li><a href="http://bais.ub.ac.id/">BAIS</a></li>
              <li><a href="http://beasiswa.ub.ac.id/">Scholarship</a></li>
              <li><a href="http://e-complaint.ub.ac.id/">E-Complaint</a></li>
              <li><a href="http://jurnal.ub.ac.id/">UB Journal</a></li>
              <li><a href="http://soi.ub.ac.id/">School On The Internet</a></li>
              <li><a href="http://mca.ub.ac.id/">Microsoft Campus Agreement</a></li>
              <li><a href="http://hosting.ub.ac.id/">Hosting</a></li>
          </ul>
          
        </div>
        <div class="footblock left">
        	<?php
				$link_request = $_SERVER['REDIRECT_URL'];
				preg_match('/\/(en)\/*/i', $link_request,$match);
				$language = (isset($match[1])) ? $match[1] : 'indo';
				
		
				if($language == 'en'){
					echo '<h3>Information</h3>';
				}
				else{
					echo '<h3>Informasi</h3>';
				}
			?>
            
            <br/>
            <br/><br/>
            <h3>Copyright</h3>
            <br/>
            <cite>Universitas Brawijaya &copy; <?php echo date('Y'); ?><br />
			under terms of services<br />
			<a href="http://bits.ub.ac.id/" target="_blank">BITS UB</a>
            </cite><br/><br/>
            <?php
				$link_request = $_SERVER['REDIRECT_URL'];
				preg_match('/\/(en)\/*/i', $link_request,$match);
				$language = (isset($match[1])) ? $match[1] : 'indo';
				
		
				if($language == 'en'){
					echo '<h3>Other Links</h3>';
				}
				else{
					echo '<h3>Tautan Lainnya</h3>';
				}
			?>
            
            <ul>
				<?php wp_get_linksbyname('Link Footer','orderby=name&show_description=0&show_updated=1&before=<li>&after=</li>'); ?>
			</ul>
        </div>
        
        <div class="clear"></div>
        
        
        
    </div>
    <div class="note">
        © 2015 PPTI UB - Universitas Brawijaya
    </div>
        <?php wp_footer(); ?>
    	</div><!--end footer-inside-->
    </div><!--end footer-->
</body>
</html>
