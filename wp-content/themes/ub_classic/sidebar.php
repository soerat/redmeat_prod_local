				<div class="sidebar">
                	<div class="title">
                    	<div class="title-wrap side">
                            <span>
                               <?php
									$link_request = $_SERVER['REDIRECT_URL'];
									preg_match('/\/(en)\/*/i', $link_request,$match);
									$language = (isset($match[1])) ? $match[1] : 'indo';
									if($language == 'en'){
										echo 'UB News';
									}
									else{
										echo 'Berita UB';
									}
								?>
                               
                            </span>
                        </div>
                    </div><!--end title-->
                    <div class="sidebar-block">
                    	<div class="sidecontent">
							<?php
								include_once(ABSPATH . WPINC . '/rss.php');
								$rss = fetch_rss('http://prasetya.ub.ac.id/rss.xml?lang=id');
								$maxitems = 5;
								$items = array_slice($rss->items, 0, $maxitems);
								if (empty($items)) echo 'No RSS items';
								else
								echo '<ul>';
								foreach ( $items as $item ) : ?>
									<li>
										
										<span class="date"><?php $pubdate = strftime("%d.%m.%Y", strtotime($item['pubdate'])); echo $pubdate; ?>&nbsp;&raquo;&nbsp;</span>
										<a href='<?php echo $item['link']; ?>' title='<?php echo $item['title']; ?>'><?php echo $item['title']; ?></a>
										
									</li>			
								<?php endforeach; 
								echo '</ul>';
							?>
                        </div>
	                    <div class="arsip bawah"><a href="http://prasetya.ub.ac.id" target="_blank">
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
                    </div><!--end block-->
                    <div class="clear"></div>
         
                    
                    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar') ) : else : ?>
                    	
            		<?php endif; ?>
                </div>
                    
                