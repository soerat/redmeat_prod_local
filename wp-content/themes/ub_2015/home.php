<?php get_header(); ?>

<div class="body">
  <div class="slider">
    	<!---------------------ISI KODE META SLIDER DISINI----------------------->
  </div>
  <div class="clear"></div>
  <div class="title-news">
    <?php

				$link_request = $_SERVER['REDIRECT_URL'];

				preg_match('/\/(en)\/*/i', $link_request,$match);

				$language = (isset($match[1])) ? $match[1] : 'indo';

				

		

				if($language == 'en'){

					echo '<h2><a>N  E  W  S</a></h2>';

				}

				else{

					echo '<h2><a>B E R I T A</a></h2>';

				}

			?>
    <div id="owl-demo" class="owl-carousel owl-theme">
      <?php if (have_posts()) : ?>
      <?php query_posts('category_name=berita&showposts=5'); ?>
      <?php while (have_posts()) : the_post(); ?>
      <div class="item">
        <div class="post-news">
          <?php if (has_post_thumbnail( $post->ID ) ): ?>
          <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );

                                $image = $image[0]; ?>
          <?php else :

                                $image = get_bloginfo( 'stylesheet_directory') . '/img/thumb_y.png'; ?>
          <?php endif; ?>
          <div class="thumb" id="thumbnail" style="background-image: url('<?php echo $image; ?>')" > </div>
          <div class="title-news-post"> <span>
            <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
              <?php the_title(); ?>
              </a></h3>
            </span> </div>
          <div class="desc-block">
            <div class="date-news"> <img src="<?php bloginfo('template_url'); ?>/img/date.png" alt="" width="20" height="20" style="margin:0 5px -3px -2px">
              <?php the_time('d-M-Y') ?>
            </div>
            <div class="author"> <img src="<?php bloginfo('template_url'); ?>/img/user.png" alt="" width="20" height="20" style="margin:0 5px -3px -2px">
              <?php the_author() ?>
            </div>
            <div class="clear"></div>
          </div>
          <div class="spoiler-news"> <?php echo get_excerpt(200); ?> </div>
          <div class="more-button-news"> <a href="<?php the_permalink() ?>"><img src="<?php bloginfo('template_url'); ?>/img/more.png" title="More" alt="more" width="80" height="35" style="margin:0px 0 -3px"></a> </div>
        </div>
      </div>
      <?php endwhile; ?>
      <?php endif; ?>
    </div>
    <div class="clear"></div>
  </div>
  <div class="more-news"> <a href="<?php bloginfo('url'); ?>/category/berita/">
    <?php

					$link_request = $_SERVER['REDIRECT_URL'];

					preg_match('/\/(en)\/*/i', $link_request,$match);

					$language = (isset($match[1])) ? $match[1] : 'indo';

					

			

					if($language == 'en'){

						echo 'more news';

					}

					else{

						echo 'berita lainnya';

					}

				?>
    </a> </div>
  <div class="clear"></div>
</div>
<div class="secondary">
  <div class="secondary-wrap">
    <div class="first">
      <?php

					$link_request = $_SERVER['REDIRECT_URL'];

					preg_match('/\/(en)\/*/i', $link_request,$match);

					$language = (isset($match[1])) ? $match[1] : 'indo';

					

			

					if($language == 'en'){

						echo '<h2>A N N O U N C E M E N T S</h2>';

					}

					else{

						echo '<h2>P E N G U M U M A N</h2>';

					}

				?>
      <?php if (have_posts()) : ?>
      <?php query_posts('category_name=pengumuman&showposts=5'); ?>
      <?php while (have_posts()) : the_post(); ?>
      <div class="announ-box">
        <table width="100%" class="announcement-table">
          <tr>
            <td width="40px"><div class="star">
                <div class="star-icon"></div>
              </div></td>
            <td width="18px;"><div class="separated"></div></td>
            <td><div class="announ-content">
                <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                  <?php the_title(); ?>
                  </a></h3>
                <div class="announ-desc"> <img class="date-announ" src="<?php bloginfo('template_url'); ?>/img/date.png" alt="" >
                  <?php the_time('d-M-Y') ?>
                  <img class="user-announ" src="<?php bloginfo('template_url'); ?>/img/user.png" alt="" >
                  <?php the_author() ?>
                </div>
              </div></td>
          </tr>
        </table>
      </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <div class="more-announ"> <a href="<?php bloginfo('url'); ?>/category/pengumuman/">
        <?php

                            $link_request = $_SERVER['REDIRECT_URL'];

                            preg_match('/\/(en)\/*/i', $link_request,$match);

                            $language = (isset($match[1])) ? $match[1] : 'indo';

                            

                    

                            if($language == 'en'){

                                echo 'more announcements';

                            }

                            else{

                                echo 'pengumuman lainnya';

                            }

                        ?>
        </a> </div>
    </div>
    <div class="second">
      <?php

					$link_request = $_SERVER['REDIRECT_URL'];

					preg_match('/\/(en)\/*/i', $link_request,$match);

					$language = (isset($match[1])) ? $match[1] : 'indo';

					

			

					if($language == 'en'){

						echo '<h2>E V E N T S</h2>';

					}

					else{

						echo '<h2>K E G I A T A N</h2>';

					}

				?>
      <div class="event-box">
        <div class="timeline">
          <?php if (have_posts()) : ?>
          <?php query_posts('category_name=kegiatan&showposts=5'); ?>
          <?php while (have_posts()) : the_post(); ?>
          <table width="100%" class="event-table">
            <tr>
              <td width="60px"><div class="event-date">
                  <div class="tanggal">
                    <?php the_time('d') ?>
                  </div>
                  <div class="bulan">
                    <?php the_time('M') ?>
                  </div>
                </div></td>
              <td width="10px;"><div class="litle-separated"></div></td>
              <td style="background:rgba(0, 0, 0, 0.8)"><div class="event-content">
                  <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                    <?php the_title(); ?>
                    </a></h3>
                  <div class="event-desc"> <img class="user-event" src="<?php bloginfo('template_url'); ?>/img/user.png" alt="" >
                    <?php the_author(); ?>
                  </div>
                </div></td>
            </tr>
          </table>
          <?php endwhile; ?>
          <?php endif; ?>
          <div class="clear"></div>
        </div>
        <div class="more-event"> <a href="<?php bloginfo('url'); ?>/category/kegiatan/">
          <?php

                                $link_request = $_SERVER['REDIRECT_URL'];

                                preg_match('/\/(en)\/*/i', $link_request,$match);

                                $language = (isset($match[1])) ? $match[1] : 'indo';

                                

                        

                                if($language == 'en'){

                                    echo 'more events';

                                }

                                else{

                                    echo 'kegiatan lainnya';

                                }

                            ?>
          </a> </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<?php get_footer(); ?>
