<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">

<meta name="HandheldFriendly" content="true">

<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="screen">

<link href="<?php bloginfo('template_url'); ?>/mobile.css" rel="stylesheet" type="text/css" media="screen">

<link href="<?php bloginfo('template_url'); ?>/dropdown.css" rel="stylesheet" type="text/css" media="screen">

<link href="<?php bloginfo('template_url'); ?>/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css" media="screen">

<link href="<?php bloginfo('template_url'); ?>/owl-carousel/owl.theme.css" rel="stylesheet" type="text/css" media="screen">

<link href="<?php bloginfo('template_url'); ?>/menu/slicknav.css" rel="stylesheet" type="text/css" media="screen">

<script src="<?php bloginfo('template_url'); ?>/owl-carousel/jquery-1.9.1.min.js" type="text/javascript"></script>

<script src="<?php bloginfo('template_url'); ?>/owl-carousel/owl.carousel.js" type="text/javascript"></script>

<script src="<?php bloginfo('template_url'); ?>/menu/jquery.slicknav.js" type="text/javascript"></script>

<script src="<?php bloginfo('template_url'); ?>/menu/modernizr.js" type="text/javascript"></script>

<script src="<?php bloginfo('template_url'); ?>/js/javascript.js" type="text/javascript"></script>

<script>

$(document).ready(function(){

	$('#menu').slicknav();

});

function hover() {

  document.getElementById("home").src = "<?php bloginfo('template_url'); ?>/img/home-hover.png";

}

function unhover() {

  document.getElementById("home").src = "<?php bloginfo('template_url'); ?>/img/home.png";

}

</script>

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />

<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />

<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_get_archives('type=monthly&format=link'); ?>

<?php //comments_popup_script(); // off by default ?>

<?php wp_head(); ?>

</head>



<body>

	<div class="background"></div>

	<header>

    	<div class="top-list">

            <div class="top-list-wrap">

                <ul>

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

								

								<li><a title="UB Official Site" href="http://www.ub.ac.id/" target="_blank" style="border-left:none">UB Official</a></li>

								<li><a title="BITS UB" href="http://bits.ub.ac.id/" target="_blank">BITS</a></li>

								<li><a title="Mail UB" href="http://webmail.ub.ac.id/" target="_blank">Webmail</a></li>

								<li><a title="Prasetya Online" href="http://prasetya.ub.ac.id/" target="_blank">UB News</a></li>


							';

						}

						else{

							echo '

								

								<li><a title="UB Official Site" href="http://www.ub.ac.id/" target="_blank" style="border-left:none">UB Official</a></li>

								<li><a title="BITS UB" href="http://bits.ub.ac.id/" target="_blank">BITS</a></li>

								<li><a title="Mail UB" href="http://webmail.ub.ac.id/" target="_blank">Webmail</a></li>

								<li><a title="Prasetya Online" href="http://prasetya.ub.ac.id/" target="_blank">UB News</a></li>

							';

						}

					?>

                </ul>

            </div>

        </div>

        

        <div class="header">

        	<div class="header-wrap">

            	<div class="left-logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo-ub.jpg" width="100" height="100" alt="logo ub"></a></div>

                <div class="web-title">

                	<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>

               		<div class="description"><?php bloginfo( 'description' ); ?></div>

                </div>

                <div class="right-logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/join-ub.jpg" width="100" height="100" alt="logo ub"></a></div>

                <div class="clear"></div>

            </div>

        </div>

        <div class="navigation">

        	<div class="navigation-wrap">

                <div class="dropdown">

                    <!--<li><a href="<?php //bloginfo('siteurl'); ?>" onmouseover='hover()' onMouseOut='unhover()'><img id="home" src="<?php //bloginfo('template_url'); ?>/img/home.png" alt="home" width="18" height="18" style="margin-bottom:-1px;"></a></li>-->

					<?php wp_nav_menu( array('menu' => 'Main Menu' )); ?>

                    <form action="<?php bloginfo('home'); ?>/" method="get" id="search">

                        <div>

                          <label for="name">Text Input:</label>

                          <input type="text" name="s" id="name" value="" tabindex="1" placeholder="Search..."/>

                          <input type="submit" value="Submit" />

                        </div>

                    </form> 

                </div>

            </div>

            <div class="mobile-dropdown">

                <ul id="menu">

    				<?php wp_nav_menu( array('menu' => 'Main Menu' )); ?>

                    <li>

                    	<form action="<?php bloginfo('home'); ?>/" method="get" id="search">

                        	<div style="width:100%; background:#fff">

                              <input type="text" name="s" id="name" value="" tabindex="1" placeholder="Search..." style="padding:9px; width:90%;border:none;outline:none;"/>

                              <input type="submit" value="Submit" hidden="hidden" />

                            </div>

                        </form> 

                    </li>

                </ul>

            </div>

        </div>

    </header>

    
