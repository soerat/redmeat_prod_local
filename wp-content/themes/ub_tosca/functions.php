<?php

function wp_breadcrumb() {
	$delimiter = '<a class="delimiter"> &raquo; </a>';
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

function get_excerpt($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
  $excerpt = $excerpt.'... <a href="'.$permalink.'">more</a>';
  return $excerpt;
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

function save_txt() {
	$title = preg_replace(array('/[ ]+/','/[^a-zA-Z0-9-]/'),
			array('-',''),trim('berita'.get_the_ID().'-'.get_the_title()));

	$txt = '<a class="mail" href="' . get_bloginfo('home') .'/'. $title . '.txt">	TEXT</a>';	
	echo $txt;
}

function save_doc() {	
	$title = preg_replace(array('/[ ]+/','/[^a-zA-Z0-9-]/'),
			array('-',''),trim('berita'.get_the_ID().'-'.get_the_title()));
	$doc = '<a class="word" href="' . get_bloginfo('home') .'/'. $title . '.doc">	DOC</a>';	
	echo $doc;
}

function save_pdf() {
	$title = preg_replace(array('/[ ]+/','/[^a-zA-Z0-9-]/'),
			array('-',''),trim('berita'.get_the_ID().'-'.get_the_title()));
	$pdf = '<a class="pdf" target=_blank href="' . get_bloginfo('home') .'/'. $title . '.pdf">	PDF</a>';	
	echo $pdf;
}

function save_htm() {
	$title = preg_replace(array('/[ ]+/','/[^a-zA-Z0-9-]/'),
			array('-',''),trim('berita'.get_the_ID().'-'.get_the_title()));
	$htm = '<a class="print" target=_blank href="' . get_bloginfo('home') .'/'. $title . '.htm">	PRINT</a>';	
	echo $htm;
}

// Custom Header
define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', '%s/images/default-home-image.jpg');
define('HEADER_IMAGE_WIDTH', 600);
define('HEADER_IMAGE_HEIGHT', 306);
define('NO_HEADER_TEXT', true );
//add_custom_image_header();


//functions
if(function_exists('register_sidebar'))
{
	register_sidebar(array(
		'name' => 'Sidebar Area',
		'id' => 'sidebar',
		'description' => 'Sidebar Area'
    ));
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
set_post_thumbnail_size( 300, 300, true );
add_image_size( 'small-thumbnail', 80, 80, true );


?>
