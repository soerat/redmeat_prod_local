
<div class="sidebar">
  <div class="title" style="display:none;">
    <div class="title-wrap"> <span> Posting Terbaru </span> </div>
  </div>
  <!--end title-->
  
  <div class="sidebar-block" style="display:none;">
    <?php

							$args = array( 'numberposts' => '10' );

							$recent_posts = wp_get_recent_posts( $args );

							echo "<ul>";

							foreach( $recent_posts as $recent ){

								echo '<li><span class="date">'. strftime("%d.%m.%Y", strtotime($recent["post_date"])) .'&nbsp;&raquo;&nbsp;</span><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a></li>';

							}

							echo "</ul>";

						?>
  </div>
  <!--end block--> 
  
  <!--<div class="arsip bawah"><a href="<?php //bloginfo('siteurl'); ?>">Arsip &raquo;</a></div>-->
  
  <div class="clear"></div>
  <div class="title" style="display:none;">
    <div class="title-wrap"> <span> Berita UB </span> </div>
  </div>
  <!--end title-->
  
  <div class="sidebar-block" style="display:none;">
    <?php

							include_once(ABSPATH . WPINC . '/rss.php');

							$rss = fetch_rss('http://ub.ac.id/berita/rss');

							$maxitems = 4;

							$items = array_slice($rss->items, 0, $maxitems);

							if (empty($items)) echo 'No RSS items';

							else

							echo '<ul>';

							foreach ( $items as $item ) : ?>
    <li> <span class="date">
      <?php $pubdate = strftime("%d.%m.%Y", strtotime($item['pubdate'])); echo $pubdate; ?>
      &nbsp;&raquo;&nbsp;</span> <a href='<?php echo $item['link']; ?>' title='<?php echo $item['title']; ?>'><?php echo $item['title']; ?></a> </li>
    <?php endforeach; 

							echo '</ul>';

						?>
  </div>
  <!--end block-->
  
  <div class="arsip bawah" style="display:none;"><a href="http://prasetya.ub.ac.id/">Arsip &raquo;</a></div>
  <div class="clear"></div>
  
  <!--<div class="arsip bawah"><a href="">Arsip &raquo;</a></div>-->
  
  <div class="clear"></div>
  <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar') ) : else : ?>
                    	
            		<?php endif; ?>
</div>
<!--end sidebar--> 

