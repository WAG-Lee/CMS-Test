<?php
  get_header();
  $title = get_the_title( get_option('page_for_posts', true) );
?>

<section class="page_title overlap">

  <div class="bkgBox parallaxie" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
  <div class="container">
    <h1>
      News
    </h1>
  </div>
</section>

<section class="standard latestNews newsPage">

  <div class="container">
    <?php
      $args = array(
        'posts_per_page'  => -1,
      );

      $news = new WP_Query( $args );

      if ($news->have_posts()):
    ?>
      <div class="row mb-5">
        <?php
          $i = 0;
          while ( $news->have_posts() ): $news->the_post();
            $i++;
        ?>

          <?php if($i == 1){ ?>

            <div class="col-md-12 mb-5 firstPost">
              <div class="row">
                <div class="col-md-7">
                  <a href="<?php the_permalink(); ?>">
                    <div class="newsCard">
                      <div class="newsTitle">
                        <div class="date">
                          <?php the_time('j M y'); ?>
                        </div>
                        <h6>
                          <?php the_title(); ?>
                        </h6>
                      </div>
                      <div class="newsExcerpt">
                        <?php echo word_count(get_the_excerpt(), '20').' [...]'; ?>
                      </div>
                    </div>

                    <div class="readMore">
                      <span>Read More</span>
                    </div>
                  </a>
                </div>
                <div class="col-md-5">
                  <div class="firstImg">
                    <img src="<?php the_post_thumbnail_url('large'); ?>" alt="">
                  </div>
                </div>
              </div>
            </div>

          <?php } else { ?>

            <div class="col-md-4 my-4">
              <a href="<?php the_permalink(); ?>">
                <div class="newsCard">
                  <div class="newsTitle">
                    <div class="date">
                      <?php the_time('j M y'); ?>
                    </div>
                    <h6>
                      <?php the_title(); ?>
                    </h6>
                  </div>
                  <div class="newsExcerpt">
                    <?php echo word_count(get_the_excerpt(), '20').' [...]'; ?>
                  </div>
                </div>

                <div class="readMore">
                  <span>Read More</span>
                </div>

              </a>
            </div>
          <?php } ?>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
