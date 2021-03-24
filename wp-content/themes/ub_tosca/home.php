<?php get_header(); ?>

            

            <div class="slider">

           <!---------------------ISI KODE META SLIDER DISINI----------------------->

            </div><!--end slider-->

            <div class="clear"></div>

            <div class="content">

            	<div class="news">

                <div class="title">

                	<div class="title-wrap">

                        <span>

                            <?php

								$link_request = $_SERVER['REDIRECT_URL'];

								preg_match('/\/(en)\/*/i', $link_request,$match);

								$language = (isset($match[1])) ? $match[1] : 'indo';

								

						

								if($language == 'en'){

									echo 'News';

								}

								else{

									echo 'Berita Terbaru';

								}

							?>

                            <a href="<?php bloginfo('siteurl'); ?>/feed"><img src="<?php bloginfo('template_url'); ?>/images/rss.png" width="30px" height="30px" style="margin-bottom:-6px;" /></a>

                        </span>

                    </div>

                    <div class="arsip"><a href="<?php bloginfo('siteurl'); ?>/category/berita">

                     <?php

						$link_request = $_SERVER['REDIRECT_URL'];

						preg_match('/\/(en)\/*/i', $link_request,$match);

						$language = (isset($match[1])) ? $match[1] : 'indo';

						

				

						if($language == 'en'){

							echo 'More &raquo;';

						}

						else{

							echo 'Arsip &raquo;';

						}

					?>

                    

                    

                    </a></div>

                </div><!--end title-->

                

            	<div class="container-berita">

				<?php

					$recentPosts = new WP_Query();

					$recentPosts->query('showposts=3&category_name=berita');

				?>

				<?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>

					

                    <div class="block">

                        <div class="image-berita">

                            <img src="<?php bloginfo('template_url'); ?>/images/rektorat.png" style="background:#CCC;background-size:contain;width:100px;height:100px;border-radius:100%;background-repeat:no-repeat;background-position:center;" />

                        </div><!--image-berita-->

                        <div class="judul-berita">

                            <span><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></span>

                        </div><!--end judul berita-->

                        <div class="identitas-berita">

                            <span>

                            <?php

								$link_request = $_SERVER['REDIRECT_URL'];

								preg_match('/\/(en)\/*/i', $link_request,$match);

								$language = (isset($match[1])) ? $match[1] : 'indo';

								

						

								if($language == 'en'){

									echo 'Posted in';

								}

								else{

									echo 'Diterbitkan pada ';

								}

							?>

                             

							<?php the_time('d M Y') ?>

                            </span>

                        </div><!--identitas-berita-->

                        <div class="content-berita">

                            <?php echo get_excerpt(300); ?>

                        </div><!--content-berita-->

                        <div class="wrap-readmore">

                            <div class="read-more">

                                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">

                                <?php

									$link_request = $_SERVER['REDIRECT_URL'];

									preg_match('/\/(en)\/*/i', $link_request,$match);

									$language = (isset($match[1])) ? $match[1] : 'indo';

									

							

									if($language == 'en'){

										echo 'Read more';

									}

									else{

										echo 'Selengkapnya';

									}

								?>

                                </a>

                            </div><!--end read-more-->

                        </div><!--end wrap-readmore-->

                    </div><!--end block-->

                    

				<?php endwhile; ?>

				

                </div><!-- end container-berita-->

            	</div>

            

            	

                

                <div class="clear"></div>

                

                <div class="left-big">

                    <div class="title">

                    	<div class="title-wrap">

                            <span>

                            <?php

								$link_request = $_SERVER['REDIRECT_URL'];

								preg_match('/\/(en)\/*/i', $link_request,$match);

								$language = (isset($match[1])) ? $match[1] : 'indo';

								

						

								if($language == 'en'){

									echo 'Announcements';

								}

								else{

									echo 'Pengumuman';

								}

							?>

                            

                                

                                <a href="<?php bloginfo('siteurl'); ?>/category/pengumuman/feed"><img src="<?php bloginfo('template_url'); ?>/images/rss.png" width="30px" height="30px" style="margin-bottom:-6px;" /></a>

                            </span>

                        </div>

                        <div class="arsip"><a href="<?php bloginfo('siteurl'); ?>/category/pengumuman/">

                        <?php

							$link_request = $_SERVER['REDIRECT_URL'];

							preg_match('/\/(en)\/*/i', $link_request,$match);

							$language = (isset($match[1])) ? $match[1] : 'indo';

							

					

							if($language == 'en'){

								echo 'More &raquo;';

							}

							else{

								echo 'Arsip &raquo;';

							}

						?>

                        </a></div>

                    </div><!--end title-->

                    <div class="big-block">

                    	<div class="image-big">

                        	<img src="<?php bloginfo('template_url'); ?>/images/image.jpg" alt="" width="200px" height="150px" />

                        </div><!--end image-big-->

                        <div class="content-sekunder">

                        	<ul class="sekunder">

                            	

                                <?php

									$recentPosts = new WP_Query();

									$recentPosts->query('showposts=5&category_name=pengumuman');

								?>

								<?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>

									<li><?php the_time('d.m.Y') ?>&nbsp;-&nbsp;<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>

								<?php endwhile; ?>

                            	

                            </ul>

                        </div><!--end content-sekunder-->

                        <div class="clear"></div>

                    </div><!--end big-block-->

                    <div class="clear"></div>

                    <div class="title">

                    	<div class="title-wrap">

                            <span>

                                <?php

									$link_request = $_SERVER['REDIRECT_URL'];

									preg_match('/\/(en)\/*/i', $link_request,$match);

									$language = (isset($match[1])) ? $match[1] : 'indo';

									

							

									if($language == 'en'){

										echo 'Activities';

									}

									else{

										echo 'Kegiatan';

									}

								?>

                                

                                <a href="<?php bloginfo('siteurl'); ?>/category/kegiatan/feed"><img src="<?php bloginfo('template_url'); ?>/images/rss.png" width="30px" height="30px" style="margin-bottom:-6px;" /></a>

                            </span>

                        </div>

                        <div class="arsip"><a href="<?php bloginfo('siteurl'); ?>/category/kegiatan/">

                        <?php

							$link_request = $_SERVER['REDIRECT_URL'];

							preg_match('/\/(en)\/*/i', $link_request,$match);

							$language = (isset($match[1])) ? $match[1] : 'indo';

							

					

							if($language == 'en'){

								echo 'More &raquo;';

							}

							else{

								echo 'Arsip &raquo;';

							}

						?>

                        </a></div>

                    </div><!--end title-->

                    <div class="big-block">

                    	<div class="image-big">

                        	<img src="<?php bloginfo('template_url'); ?>/images/image.jpg" alt="" width="200px" height="150px" />

                        </div><!--end image-big-->

                        <div class="content-sekunder">

                        	<ul class="sekunder">

                            	<?php

									$recentPosts = new WP_Query();

									$recentPosts->query('showposts=10&category_name=kegiatan');

								?>

								<?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>

									<li><?php the_time('d.m.Y') ?>&nbsp;-&nbsp;<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>

								<?php endwhile; ?>

                            </ul>

                        </div><!--end content-sekunder-->

                    </div><!--end big-block-->

                    <div class="clear"></div>

                </div><!--end left-big-->

                

            	<?php get_sidebar(); ?>

                <div class="clear"></div>

            

            

            </div><!--end content-->

        </div><!--end container inside-->

	</div><!--end container-->



<?php get_footer(); ?>