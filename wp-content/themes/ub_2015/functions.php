<?php

// Sidebar Widget
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'First Sidebar Area',
		'id' => 'first-area',
		'description' => 'The first sidebar widget area',
        'before_widget' => '<div class="block">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="sdtitle">',
        'after_title' => '</h3>',
    ));
	
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Second Sidebar Area',
		'id' => 'second-area',
		'description' => 'The second sidebar widget area',
        'before_widget' => '<div class="block">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="sdtitle">',
        'after_title' => '</h3>',
    ));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Third Sidebar Area',
		'id' => 'third-area',
		'description' => 'The third sidebar widget area',
        'before_widget' => '<div class="block">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="sdtitle">',
        'after_title' => '</h3>',
    ));
	
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Fourth Sidebar Area',
		'id' => 'fourth-area',
		'description' => 'The fourth sidebar widget area',
        'before_widget' => '<div class="block">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="sdtitle">',
        'after_title' => '</h3>',
    ));

function wp_breadcrumb() {
	$delimiter = '<a class="delimiter"> &rarr; </a>';
	$delimiter1 = '<span class="delimiter1"> &bull; </span>';
	
	$main = 'Home';
	$maxLength= 30;
	
	$arc_year = get_the_time('Y');
	$arc_month = get_the_time('F');
	$arc_day = get_the_time('d');
	$arc_day_full = get_the_time('l');
	
	$url_year = get_year_link($arc_year);
	$url_month = get_month_link($arc_year,$arc_month);
	
	if (!is_front_page()) {
	
		global $post, $cat;
		$homeLink = get_option('home');
		echo '<a class="home" href="' . $homeLink . '">' . $main . '</a>' . $delimiter;  
		
		if (is_single()) {
			$category = get_the_category();
            $num_cat = count($category);
			
			if ($num_cat <=1)
            {	
				echo get_category_parents($category[0],  true,' ' . $delimiter . ' ');
				echo '<a class="current" href="' . get_permalink() . '">' . get_the_title() . '</a>';
            }
			else {
                echo the_category( $delimiter1, multiple);
                    if (strlen(get_the_title()) >= $maxLength) {
						echo ' ' . $delimiter . trim(substr(get_the_title(), 0, $maxLength)) . ' ...';
                    }
                    else {
						echo ' ' . $delimiter . get_the_title();
                    }
            }
        }
        elseif (is_category()) {
			echo get_category_parents($cat, true,' ' . ' ' . ' ');
        }
        elseif ( is_tag() ) {
			echo 'Posts Tagged: "' . single_tag_title("", false) . '"';
        }
        elseif ( is_day()) {
			echo '<a href="' . $url_year . '">' . $arc_year . '</a> ' . $delimiter . ' ';
            echo '<a href="' . $url_month . '">' . $arc_month . '</a> ' . $delimiter . $arc_day . ' (' . $arc_day_full . ')';
        }
        elseif ( is_month() ) {
			echo '<a href="' . $url_year . '">' . $arc_year . '</a> ' . $delimiter . $arc_month;
        }
        elseif ( is_year() ) {
			echo $arc_year;
        }
		elseif ( is_search() ) {
			echo 'Search results for : ' . get_search_query();
        }
		elseif ( is_page() && !$post->post_parent ) {
			echo '<a class="current" href="' . get_permalink() . '">' . get_the_title() . '</a>';
        }
        elseif ( is_page() && $post->post_parent ) {
			$post_array = get_post_ancestors($post);
 
            krsort($post_array);
 
            foreach($post_array as $key=>$postid){
                $post_ids = get_post($postid);
                $title = $post_ids->post_title;
                echo '<a href="' . get_permalink($post_ids) . '">' . $title . '</a>' . $delimiter;
            }
            echo '<a class="current" href="' . get_permalink() . '">' . get_the_title() . '</a>';
        }
        elseif ( is_author() ) {
            global $author;
            $user_info = get_userdata($author);
            echo  'Archived Article(s) by Author: ' . $user_info->display_name ;
        }
        elseif ( is_404() ) {
            echo  'Error 404 - Not Found.';
        }
        else {
            //All other cases. No Breadcrumb trail.
        }
    }
}

function paginate($args = null) {
	$defaults = array(
		'page' => null, 'pages' => null, 
		'range' => 1, 'gap' => 1, 'anchor' => 1,
		'before' => '<div class="wp-paginate">', 'after' => '</div>',
		'title' => __('Page :'),
		'nextpage' => __('Next &rsaquo;'), 'previouspage' => __('&lsaquo; Previous'),
		'echo' => 1
	);

	$r = wp_parse_args($args, $defaults);
	extract($r, EXTR_SKIP);

	if (!$page && !$pages) {
		global $wp_query;

		$page = get_query_var('paged');
		$page = !empty($page) ? intval($page) : 1;

		$posts_per_page = intval(get_query_var('posts_per_page'));
		$pages = intval(ceil($wp_query->found_posts / $posts_per_page));
	}
	
	$output = "";
	if ($pages > 1) {	
		$output .= "$before<span class='wp-title'>Page ".$page." of ".$pages."</span>";
		$ellipsis = "<span class='wp-gap'>...</span>";

		/*if($page > 1) {
			$output .= "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
		}*/
		
		if ($page > 1 && !empty($previouspage)) {
			$output .= "<a href='" . get_pagenum_link($page - 1) . "' class='wp-prev'>$previouspage</a>";
		}
		
		$min_links = $range * 2 + 1;
		$block_min = min($page - $range, $pages - $min_links);
		$block_high = max($page + $range, $min_links);
		$left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;
		$right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;

		if ($left_gap && !$right_gap) {
			$output .= sprintf('%s%s%s', 
				paginate_loop(1, $anchor), 
				$ellipsis, 
				paginate_loop($block_min, $pages, $page)
			);
		}
		else if ($left_gap && $right_gap) {
			$output .= sprintf('%s%s%s%s%s', 
				paginate_loop(1, $anchor), 
				$ellipsis, 
				paginate_loop($block_min, $block_high, $page), 
				$ellipsis, 
				paginate_loop(($pages - $anchor + 1), $pages)
			);
		}
		else if ($right_gap && !$left_gap) {
			$output .= sprintf('%s%s%s', 
				paginate_loop(1, $block_high, $page),
				$ellipsis,
				paginate_loop(($pages - $anchor + 1), $pages)
			);
		}
		else {
			$output .= paginate_loop(1, $pages, $page);
		}

		if ($page < $pages && !empty($nextpage)) {
			$output .= "<a href='" . get_pagenum_link($page + 1) . "' class='wp-next'>$nextpage</a>";
		}
		
		/*if ($page <= $pages-1) {
		 	$output .= "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
		}*/

		$output .= $after;
	}

	if ($echo) {
		echo $output;
	}

	return $output;
}

function paginate_loop($start, $max, $page = 0) {
	$output = "";
	for ($i = $start; $i <= $max; $i++) {
		$output .= ($page === intval($i)) 
			? "<span class='current'>$i</span>" 
			: "<a href='" . get_pagenum_link($i) . "' class='wp-page'>$i</a>";
	}
	return $output;
}

// Tambahan Fungsi
function remove_dashboard_widgets() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

function remove_submenus() {
	global $submenu;
	unset($submenu['index.php'][10]);
}
add_action('admin_menu', 'remove_submenus');

add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );

function custom_admin_logo() {
	echo '<style type="text/css">
			#header-logo { 
				background-image: url('.get_bloginfo('template_directory').'/images/logo-admin.png) !important;
				width:32px;
				height:32px;
			}
			</style>';
}
add_action('admin_head', 'custom_admin_logo');

function custom_login() {
 echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/custom-login/custom-login.css" />';
}
add_action('login_head', 'custom_login');

function change_wp_login_url() {
echo bloginfo('url');
}
add_filter('login_headerurl', 'change_wp_login_url');

function change_wp_login_title() {
echo 'Powered by ' . get_option('blogname');
}
add_filter('login_headertitle', 'change_wp_login_title');

// Widget of RSS Prasetya
class RSSPrasetya extends WP_Widget
{
  function RSSPrasetya()
  {
    $widget_ops = array('classname' => 'RSSPrasetya', 'description' => 'UB News from Prasetya Online' );
    $this->WP_Widget('RSSPrasetya', 'UB Widget : Brawijaya News', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'maks' => '', 'deskripsi' => '' ) );
    $title = $instance['title'];
	$maks = $instance['maks'];
	$deskripsi = $instance['deskripsi'] ? 'checked="checked"' : '';
?>
  	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
		</label>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('maks'); ?>">Number of RSS: <input class="widefat" id="<?php echo $this->get_field_id('maks'); ?>" name="<?php echo $this->get_field_name('maks'); ?>" type="text" value="<?php echo attribute_escape($maks); ?>" />
		</label>
	</p>
	
	<p>
		<input type="checkbox" name="<?php echo $this->get_field_name('deskripsi');?>" <?php echo $deskripsi; ?> id="<?php echo $this->get_field_id('deskripsi'); ?>"/>
		<label for="<?php echo $this->get_field_id('deskripsi'); ?>"><?php _e('Show description'); ?></label>
	</p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
	$instance['maks'] = $new_instance['maks'];
	$instance['deskripsi'] = $new_instance['deskripsi'] ? 1 : 0;
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? 'UB News' : apply_filters('widget_title', $instance['title']);
	$maks = empty($instance['maks']) ? '3' : apply_filters('widget_title', $instance['maks']);
	$deskripsi = ! empty( $instance['deskripsi'] ) ? '1' : '0';
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
    // WIDGET CODE GOES HERE
		include_once(ABSPATH . WPINC . '/rss.php');
		$rss = fetch_rss('http://prasetya.ub.ac.id/rss.xml?lang=id');
		$maxitems = $maks;
		$items = array_slice($rss->items, 0, $maxitems);
		if (empty($items)) echo 'No RSS items';
		else
		echo '<ul>';
		foreach ( $items as $item ) : ?>
			<li>
				<span>
				<?php 
					$pubdate = strftime("%d.%m.%Y", strtotime($item['pubdate']));
					echo $pubdate;
				?>
				</span>
				<strong>
					<a href='<?php echo $item['link']; ?>' title='<?php echo $item['title']; ?>'><?php echo $item['title']; ?></a>
				</strong>
				<br />
				<?php
					if ($deskripsi) {
						echo $item['description'];
					}
				?>
				<br />
			</li>			
		<?php endforeach; 
		echo '</ul>';
 
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("RSSPrasetya");') );
// end of RSS Prasetya widget

// Widget of Social Link
class SocialLink extends WP_Widget
{
  function SocialLink()
  {
    $widget_ops = array('classname' => 'SocialLink', 'description' => 'Show your social network links' );
    $this->WP_Widget('SocialLink', 'UB Widget : Social Network Link', $widget_ops);
  }

  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);

    echo $before_widget;
    $title = empty($instance['title']) ? 'Network Link' : apply_filters('widget_title', $instance['title']);
    $facebook = empty($instance['facebook']) ? 'http://www.facebook.com' :  $instance['facebook'];
    $google = empty($instance['google']) ? 'http://plus.google.com' :  $instance['google'];
	$twitter = empty($instance['twitter']) ? 'http://www.twitter.com' :  $instance['twitter'];
    $feed = empty($instance['feed']) ? ''. get_bloginfo('url') .'' :  $instance['feed'];
    $sf = ! empty( $instance['sf'] ) ? '1' : '0';
    $sg = ! empty( $instance['sg'] ) ? '1' : '0';
	$st = ! empty( $instance['st'] ) ? '1' : '0';
    $sfd = ! empty( $instance['sfd'] ) ? '1' : '0';

    if (!empty($title))
      echo $before_title . $title . $after_title;

    // WIDGET CODE GOES HERE
    if(($sf)||($sg)||($st)||($sfd))
    {
	?>
	<ul style="list-style:none outside none;">
	<?php
        if($sf)
        {
        ?>
			<li style="padding:8px 0px 8px 40px; background: url(<?php bloginfo('template_directory');?>/images/ub-fb-32.png) no-repeat scroll 0 50% transparent;">
				<strong>Facebook</strong><br />				
				<a href="<?php echo $facebook;?>" target="_blank"><?php echo $facebook;?></a>
			</li>
        <?php
        }
        if($sg)
        {
        ?>
			<li style="padding:8px 0px 8px 40px; background: url(<?php bloginfo('template_directory');?>/images/ub-go-32.png) no-repeat scroll 0 50% transparent;">
				<strong>Google+</strong><br />
				<a href="<?php echo $google;?>" target="_blank"><?php echo $google;?></a>
			</li>
        <?php
        }
		if($st)
        {
        ?>
			<li style="padding:8px 0px 8px 40px; background: url(<?php bloginfo('template_directory');?>/images/ub-tw-32.png) no-repeat scroll 0 50% transparent;">
				<strong>Twitter</strong><br />				
				<a href="<?php echo $twitter;?>" target="_blank"><?php echo $twitter;?></a>
			</li>
        <?php
        }
        if($sfd)
        {
        ?>
			<li style="padding:8px 0px 8px 40px; background: url(<?php bloginfo('template_directory');?>/images/ub-fe-32.png) no-repeat scroll 0 50% transparent;">
				<strong>Feed</strong><br />
				<a href="<?php echo $feed;?>" target="_blank"><?php echo $feed;?></a>
			</li>
        <?php
        }
		?>
	</ul>
	<?php
    }else{
         echo '<span>'._e('Tidak ada link social network yang ditampilkan!').'</span>';
    }
    ?>
    <?php

    echo $after_widget;
  }

  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '','facebook'=>'','google'=>'','twitter'=>'','feed'=>'','sf'=>'','sg'=>'','st'=>'','sfd'=>'' ));
    $title = $instance['title'];
    $facebook = $instance['facebook'];
    $google = $instance['google'];
	$twitter = $instance['twitter'];
    $feed = $instance['feed'];
    $sf = $instance['sf'] ? 'checked="checked"' : '';
    $sg = $instance['sg'] ? 'checked="checked"' : '';
	$st = $instance['st'] ? 'checked="checked"' : '';
    $sfd = $instance['sfd'] ? 'checked="checked"' : '';
    ?>
      <p>
        <label for="<?php echo $this->get_field_id('title'); ?>">
            Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
        </label>
      </p>
      <p>
        <label for="<?php echo $this->get_field_id('facebook'); ?>">Facebook URL: <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo attribute_escape($facebook); ?>" /></label>
      </p>
      <p>
        <label for="<?php echo $this->get_field_id('google'); ?>">Google+ URL: <input class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" type="text" value="<?php echo attribute_escape($google); ?>" /></label>
      </p>
	  <p>
        <label for="<?php echo $this->get_field_id('twitter'); ?>">Twitter URL: <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo attribute_escape($twitter); ?>" /></label>
      </p>
      <p>
        <label for="<?php echo $this->get_field_id('feed'); ?>">Feed URL: <input class="widefat" id="<?php echo $this->get_field_id('feed'); ?>" name="<?php echo $this->get_field_name('feed'); ?>" type="text" value="<?php echo attribute_escape($feed); ?>" /></label>
      </p>
	  <p>
        <input type="checkbox" name="<?php echo $this->get_field_name('sf');?>" <?php echo $sf;?> id="<?php echo $this->get_field_id('sf'); ?>"/>
        <label for="<?php echo $this->get_field_id('sf');?>"><?php _e('Show Facebook'); ?></label>
      </p>
      <p>
        <input type="checkbox" name="<?php echo $this->get_field_name('sg');?>" <?php echo $sg;?> id="<?php echo $this->get_field_id('sg'); ?>"/>
        <label for="<?php echo $this->get_field_id('sg');?>"><?php _e('Show Google+'); ?></label>
      </p>
	  <p>
        <input type="checkbox" name="<?php echo $this->get_field_name('st');?>" <?php echo $st;?> id="<?php echo $this->get_field_id('st'); ?>"/>
        <label for="<?php echo $this->get_field_id('st');?>"><?php _e('Show Twitter'); ?></label>
      </p>
      <p>
        <input type="checkbox" name="<?php echo $this->get_field_name('sfd');?>" <?php echo $sfd;?> id="<?php echo $this->get_field_id('sfd'); ?>"/>
        <label for="<?php echo $this->get_field_id('sfd');?>"><?php _e('Show Feed'); ?></label>
      </p>
    <?php
  }

  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['facebook'] = $new_instance['facebook'];
    $instance['google'] = $new_instance['google'];
	$instance['twitter'] = $new_instance['twitter'];
    $instance['feed'] = $new_instance['feed'];
    $instance['sf'] = $new_instance['sf'] ? 1 : 0;
    $instance['sg'] = $new_instance['sg'] ? 1 : 0;
	$instance['st'] = $new_instance['st'] ? 1 : 0;
    $instance['sfd'] = $new_instance['sfd'] ? 1 : 0;
    return $instance;
  }

}
add_action( 'widgets_init', create_function('', 'return register_widget("SocialLink");'));
// end of Social Link widget

// Widget of Banner
class UBBanner extends WP_Widget
{
  function UBBanner()
  {
    $widget_ops = array('classname' => 'UBBanner', 'description' => 'Display your image banner' );
    $this->WP_Widget('UBBanner', 'UB Widget : Banner', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'imageURL' => '', 'imageLINK' => '', 'imageTITLE' => '', 'imageALT' => '', 'imgHeight' => '', 'imgWidth' => '' ) );
    $title = $instance['title'];
	$imageURL = $instance['imageURL'];
	$imageLINK = $instance['imageLINK'];
	$imageLINK = $instance['imageLINK'];
	$imageTITLE = $instance['imageTITLE'];
	$imageALT = $instance['imageALT'];
	$imgHeight = $instance['imgHeight'];
	$imgWidth = $instance['imgWidth'];

?>	
  	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
		</label>
		<small>Title of banner widget.</small>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('imageURL'); ?>">Image URL: <input class="widefat" id="<?php echo $this->get_field_id('imageURL'); ?>" name="<?php echo $this->get_field_name('imageURL'); ?>" type="text" value="<?php echo attribute_escape($imageURL); ?>" />
		</label>
		<small>
			Enter image URL here.<br />
			(Eg. http://www.flickr.com/sample.jpg)
		</small>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('imageLINK'); ?>">Link: <input class="widefat" id="<?php echo $this->get_field_id('imageLINK'); ?>" name="<?php echo $this->get_field_name('imageLINK'); ?>" type="text" value="<?php echo attribute_escape($imageLINK); ?>" />
		</label>
		<small>Enter link address here.</small>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('imageTITLE'); ?>">Tooltip text: <input class="widefat" id="<?php echo $this->get_field_id('imageTITLE'); ?>" name="<?php echo $this->get_field_name('imageTITLE'); ?>" type="text" value="<?php echo attribute_escape($imageTITLE); ?>" />
		</label>
		<small>Displayed as image tooltip text.</small>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('imageALT'); ?>">Alt text: <input class="widefat" id="<?php echo $this->get_field_id('imageALT'); ?>" name="<?php echo $this->get_field_name('imageALT'); ?>" type="text" value="<?php echo attribute_escape($imageALT); ?>" />
		</label>
		<small>
			Alternative text for non-image.
		</small>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('imgHeight'); ?>">Height: <input class="widefat" id="<?php echo $this->get_field_id('imgHeight'); ?>" name="<?php echo $this->get_field_name('imgHeight'); ?>" type="text" value="<?php echo attribute_escape($imgHeight); ?>" style="padding: 3px; width: 45px;" />&nbsp;pixels
		</label>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('imgWidth'); ?>">Width: <input class="widefat" id="<?php echo $this->get_field_id('imgWidth'); ?>" name="<?php echo $this->get_field_name('imgWidth'); ?>" type="text" value="<?php echo attribute_escape($imgWidth); ?>" style="padding: 3px; width: 45px;" />&nbsp;pixels
		</label>
	</p>
	
	<p>
		Preview:<br />
		<?php echo $preview = empty($imageURL) ? '<em>No Image</em>' : ''; ?>
		<img src="<?php echo $imageURL ?>" height="<?php echo $imgHeight ?>" width="<?php echo $imgWidth ?>" />
	</p>
	
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
	$instance['imageURL'] = $new_instance['imageURL'];
	$instance['imageLINK'] = $new_instance['imageLINK'];
	$instance['imageTITLE'] = $new_instance['imageTITLE'];
	$instance['imageALT'] = $new_instance['imageALT'];
	$instance['imgHeight'] = $new_instance['imgHeight'];
	$instance['imgWidth'] = $new_instance['imgWidth'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? 'Banner' : apply_filters('widget_title', $instance['title']);
	$imageURL = empty($instance['imageURL']) ? ' ' : apply_filters('widget_title', $instance['imageURL']);
	$imageLINK = empty($instance['imageLINK']) ? ' ' : apply_filters('widget_title', $instance['imageLINK']);
	$imageTITLE = empty($instance['imageTITLE']) ? ' ' : apply_filters('widget_title', $instance['imageTITLE']);
	$imageALT = empty($instance['imageALT']) ? ' ' : apply_filters('widget_title', $instance['imageALT']);
	$imgHeight = empty($instance['imgHeight']) ? ' ' : apply_filters('widget_title', $instance['imgHeight']);
	$imgWidth = empty($instance['imgWidth']) ? ' ' : apply_filters('widget_title', $instance['imgWidth']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
    // WIDGET CODE GOES HERE
	echo '<div class="bx"><a href="'.$imageLINK.'"><img src="'.$imageURL.'" alt="'.$imageALT.'" title="'.$imageTITLE.'" height="'.$imgHeight.'" width="'.$imgWidth.'"  /></a></div>';
 
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("UBBanner");') );
// end of Banner widget

function save_txt() {
	$title = preg_replace(array('/[ ]+/','/[^a-zA-Z0-9-]/'),
			array('-',''),trim('berita'.get_the_ID().'-'.get_the_title()));

	$txt = '<a class="mail" href="' . get_bloginfo('home') .'/'. $title . '.txt">text</a>';	
	echo $txt;
}

function save_doc() {	
	$title = preg_replace(array('/[ ]+/','/[^a-zA-Z0-9-]/'),
			array('-',''),trim('berita'.get_the_ID().'-'.get_the_title()));
	$doc = '<a class="word" href="' . get_bloginfo('home') .'/'. $title . '.doc">word</a>';	
	echo $doc;
}

function save_pdf() {
	$title = preg_replace(array('/[ ]+/','/[^a-zA-Z0-9-]/'),
			array('-',''),trim('berita'.get_the_ID().'-'.get_the_title()));
	$pdf = '<a class="pdf" target="_blank" href="' . get_bloginfo('home') .'/'. $title . '.pdf">pdf</a>';	
	echo $pdf;
}

function save_htm() {
	$title = preg_replace(array('/[ ]+/','/[^a-zA-Z0-9-]/'),
			array('-',''),trim('berita'.get_the_ID().'-'.get_the_title()));
	$htm = '<a class="print" target="_blank" href="' . get_bloginfo('home') .'/'. $title . '.htm">print</a>';	
	echo $htm;
}

function get_excerpt($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
  $excerpt = $excerpt.'...';
  return $excerpt;
}

// Custom Header
define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', '%s/images/default-home-image.jpg');
define('HEADER_IMAGE_WIDTH', 600);
define('HEADER_IMAGE_HEIGHT', 306);
define('NO_HEADER_TEXT', true );
//add_custom_image_header();
if ( function_exists( 'register_nav_menus' ) ) {
  register_nav_menus(
  array(
    'main_menu' => 'Main Menu'
  )
  );
}
// THUMBNAIL

add_theme_support( 'post-thumbnails' );
add_image_size('featuredImageCropped', 250, 200, true);
?>
