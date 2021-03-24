<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/responsive.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/midscreen.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/menu/slicknav.css" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script src="<?php bloginfo('template_url'); ?>/menu/jquery.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/menu/jquery.slicknav.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/menu/modernizr.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function(){

	$('#menu').slicknav();

});

if (document.images) {

    img1 = new Image();

    img1.src = "wp-content/themes/ub_bluegreen/images/garis.png";

    img2 = new Image();

    img2.src = "wp-content/themes/ub_bluegreen/images/header.png";

	img3 = new Image();

    img3.src = "wp-content/themes/ub_bluegreen/images/image.jpg";

	img4 = new Image();

    img4.src = "wp-content/themes/ub_bluegreen/images/rektorat.png";

	img5 = new Image();

    img5.src = "wp-content/themes/ub_bluegreen/images/rektorat-flip.png";

	img6 = new Image();

    img6.src = "wp-content/themes/ub_bluegreen/images/rss.png";

	img7 = new Image();

    img7.src = "wp-content/themes/ub_bluegreen/images/search.png";

}



</script>
<?php wp_get_archives('type=monthly&format=link'); ?>
<?php //comments_popup_script(); // off by default ?>
<?php wp_head(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php bloginfo('name'); ?>
<?php wp_title(); ?>
</title>
</head>

<body>
<div class="container">
<div class="container-inside">
<div class="header-home">
  <div class="info">
    <ul class="list-info small">
      <?php

							//echo "<pre>";

							//print_r ($_SERVER);

							//echo "</pre>";

							$link_request = $_SERVER['REDIRECT_URL'];

							preg_match('/\/(en)\/*/i', $link_request,$match);

							$language = (isset($match[1])) ? $match[1] : 'indo';

							$link = substr($_SERVER['REDIRECT_URL'],0);

							/*

								angka dibelakang adalah jumlah karakter untuk subdomain dibelakang domain utama.

								ganti dengan 0 apabila tidak terdapat subdomain dalam website.

							*/

							

							if($language == 'en'){

								echo '

									

									<li class="small dark"><a title="UB Official Site" href="http://www.ub.ac.id/" target="_blank" style="border-left:none">UB Official</a></li>

									<li class="small dark"><a title="BITS UB" href="http://bits.ub.ac.id/" target="_blank">BITS</a></li>

									<li class="small dark"><a title="Mail UB" href="http://webmail.ub.ac.id/" target="_blank">Webmail</a></li>

									<li class="small dark"><a title="Prasetya Online" href="http://prasetya.ub.ac.id/" target="_blank">UB News</a></li>

									<li class="small dark"><a title="Translate to Indonesia" href="'.$_SERVER['REQUEST_URI'].'" style="border-right:none">Indonesia</a></li>

								';

							}

							else{

								echo '

									

									<li class="small dark"><a title="UB Official Site" href="http://www.ub.ac.id/" target="_blank" style="border-left:none">UB Official</a></li>

									<li class="small dark"><a title="BITS UB" href="http://bits.ub.ac.id/" target="_blank">BITS</a></li>

									<li class="small dark"><a title="Mail UB" href="http://webmail.ub.ac.id/" target="_blank">Webmail</a></li>

									<li class="small dark"><a title="Prasetya Online" href="http://prasetya.ub.ac.id/" target="_blank">UB News</a></li>

								';

							}

						?>
    </ul>
    <div class="search">
      <form method="get" id="search-form" action="<?php bloginfo('home'); ?>/">
	  <?php
			$link_request = $_SERVER['REDIRECT_URL'];
			preg_match('/\/(en)\/*/i', $link_request,$match);
			$language = (isset($match[1])) ? $match[1] : 'indo';
			if($language == 'en'){
				echo '<input class="search-field" type="text" value="" name="s" id="searchinput" placeholder="Search..."/>';
			}
			else{
				echo '<input class="search-field" type="text" value="" name="s" id="searchinput" placeholder="Cari..."/>';
			}
	  ?>
      <input class="submit-search" type="submit" value="">
      </form>
    </div>
    <div class="clear"></div>
    <div class="search-mobile">
      <form method="get" id="search-form" action="<?php bloginfo('home'); ?>/">
      <?php
			$link_request = $_SERVER['REDIRECT_URL'];
			preg_match('/\/(en)\/*/i', $link_request,$match);
			$language = (isset($match[1])) ? $match[1] : 'indo';
			if($language == 'en'){
				echo '<input class="search-field" type="text" value="" name="s" id="searchinput" placeholder="Search..."/>';
			}
			else{
				echo '<input class="search-field" type="text" value="" name="s" id="searchinput" placeholder="Cari..."/>';
			}
	  ?>
      <input class="submit-search" type="submit" value="" hidden="hidden">
      </form>
    </div>
    
    <!--end search-->
    
    <div class="clear"></div>
  </div>
  
  <!--end info-->
  
  <div class="header">
    <div class="wrap-title">
      <h1><a href="<?php bloginfo('url'); ?>">
        <?php bloginfo('name'); ?>
        </a></h1>
      <div class="garis"></div>
      <span>
      <?php bloginfo( 'description' ); ?>
      </span> </div>
    
    <!--end wrap-title-->
    
    <div class="clear"></div>
  </div>
  
  <!--end header-->
  
  <div class="dropdown">
    <?php wp_nav_menu( array('menu' => 'Main Menu' )); ?>
  </div>
  
  <!--end menu-->
  
  <div class="mobile-dropdown">
    <ul id="menu">
      <?php wp_nav_menu( array('menu' => 'Main Menu' )); ?>
    </ul>
  </div>
</div>

<!--end header-home-->

<div class="clear"></div>
