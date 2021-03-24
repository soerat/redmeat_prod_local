	<footer>
    	<?php wp_footer(); ?>
    	<div class="footer-wrap">
        	<div class="footer-box">
            	<?php
					$link_request = $_SERVER['REDIRECT_URL'];
					preg_match('/\/(en)\/*/i', $link_request,$match);
					$language = (isset($match[1])) ? $match[1] : 'indo';
					
			
					if($language == 'en'){
						echo '<h3>Latest Posts</h3>';
					}
					else{
						echo '<h3>Posting Terakhir</h3>';
					}
				?>
                <div class="list">
                	<ul>
						<?php
                            $recentPosts = new WP_Query();
                            $recentPosts->query('showposts=10');
                        ?>
                        <?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
                            <li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
                        <?php endwhile; ?>	
                    </ul>
                </div>
            </div>
            <div class="footer-box">
            	<?php
					$link_request = $_SERVER['REDIRECT_URL'];
					preg_match('/\/(en)\/*/i', $link_request,$match);
					$language = (isset($match[1])) ? $match[1] : 'indo';
					
			
					if($language == 'en'){
						echo '<h3>Categories</h3>';
					}
					else{
						echo '<h3>Kategori</h3>';
					}
				?>
                <div class="list">
                	<ul>
						<?php wp_list_cats('sort_column=name&hierarchical=0'); ?>
                    </ul>
                </div>
                <h3>Quick Link</h3>
                <div class="list">
                	<ul>
                    	<li><a href="http://ub.ac.id/">UB Official</a></li>
                        <li><a href="http://bits.ub.ac.id/">BITS</a></li>
                        <li><a href="http://webmail.ub.ac.id/">UB Webmail</a></li>
                        <li><a href="http://prasetya.ub.ac.id/">Prasetya</a></li>
                        <li><a href="http://digilib.ub.ac.id/">Digital Library</a></li>
                        <li><a href="http://jpc.ub.ac.id/">Job Placement Center</a></li>
                        <li><a href="http://ebookstore.ub.ac.id/">E-Book Store</a></li>
                        <li><a href="http://forum.ub.ac.id/">UB Forum</a></li>
                        <li><a href="http://tv.ub.ac.id/">UBTV</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-box">
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
                <div class="list">
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
                        <?php
							$link_request = $_SERVER['REDIRECT_URL'];
							preg_match('/\/(en)\/*/i', $link_request,$match);
							$language = (isset($match[1])) ? $match[1] : 'indo';
							if($language == 'en'){
								echo '<li><a href="http://beasiswa.ub.ac.id/">Scholarship</a></li>';
							}
							else{
								echo '<li><a href="http://beasiswa.ub.ac.id/">Beasiswa</a></li>';
							}
						?>
                        <li><a href="http://e-complaint.ub.ac.id/">E-Complaint</a></li>
                        <li><a href="http://jurnal.ub.ac.id/">UB Journal</a></li>
                        <li><a href="http://soi.ub.ac.id/">School On The Internet</a></li>
                        <li><a href="http://mca.ub.ac.id/">Microsoft Campus Agreement</a></li>
                        <li><a href="http://hosting.ub.ac.id/">Hosting</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-box">
            	<?php
					$link_request = $_SERVER['REDIRECT_URL'];
					preg_match('/\/(en)\/*/i', $link_request,$match);
					$language = (isset($match[1])) ? $match[1] : 'indo';
					
			
					if($language == 'en'){
						echo '<h3>Blogs</h3>';
					}
					else{
						echo '<h3>Blog</h3>';
					}
				?>
                
                <div class="list">
                	<ul>
                    	<?php
							$link_request = $_SERVER['REDIRECT_URL'];
							preg_match('/\/(en)\/*/i', $link_request,$match);
							$language = (isset($match[1])) ? $match[1] : 'indo';
							if($language == 'en'){
								echo '
									<li><a href="http://blog.ub.ac.id/">Student</a></li>
									<li><a href="http://lecture.ub.ac.id/">Lecturer</a></li>
									<li><a href="http://staff.ub.ac.id/">Staff</a></li>
								';
							}
							else{
								echo '
									<li><a href="http://blog.ub.ac.id/">Mahasiswa</a></li>
									<li><a href="http://lecture.ub.ac.id/">Dosen</a></li>
									<li><a href="http://staff.ub.ac.id/">Karyawan</a></li>
								';
							}
						?>
                    	
                    </ul>
                </div>
                <?php
					$link_request = $_SERVER['REDIRECT_URL'];
					preg_match('/\/(en)\/*/i', $link_request,$match);
					$language = (isset($match[1])) ? $match[1] : 'indo';
					
			
					if($language == 'en'){
						echo '<h3>Keep In Touch</h3>';
					}
					else{
						echo '<h3>Media Sosial</h3>';
					}
				?>
                <div class="list">
                	<ul class="social">
                    	<li><a class="rss" href="http://">RSS Feed</a></li>
                        <li><a class="facebook" href="http://facebook.com/universitas.brawijaya/">Facebook</a></li>
                        <li><a class="twitter" href="http://twitter.com/UB_Official/">Twitter</a></li>
                        <li><a class="flickr" href="http://www.flickr.com/photos/ub_pictures/">Flickr</a></li>
                        <li><a class="tube" href="http://t.ub.ac.id/">UB Tube</a></li>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </footer>
    <div class="copyright">
    	<div class="copy-wrap">
        	<div class="footer-left">
            	Copyright © 2015 Universitas Brawijaya. All Rights Reserved.
            </div> 
            <div class="footer-right">
            	
            </div>   
            <div class="clear"></div>	
        </div>
    </div>
</body>
</html>
