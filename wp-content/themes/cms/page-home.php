<?php get_header(); ?>

<section class="hero">

  <div class="bkg_img">
    <div id="heroBkg" class="carousel slide carousel-fade carousel-sync" data-ride="carousel">
      <div class="carousel-inner">
        <?php if( have_rows('hero') ): ?>
          <?php
            $bkg = 0;
            while ( have_rows('hero') ) : the_row();
              $bkg++;
          ?>
            <div class="carousel-item <?php if($bkg == 1){ echo 'active'; } ?>">
              <?php $bkgImg = get_sub_field('bkg_img'); ?>
              <img src="<?php echo $bkgImg['url']; ?>" alt="">
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div id="heroContent" class="carousel slide carousel-sync" data-ride="carousel">

    <div class="carouselNav">
      <a class="carousel-control-prev" href="#heroContent" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true">
          <i class="far fa-chevron-up"></i>
        </span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#heroContent" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true">
          <i class="far fa-chevron-down"></i>
        </span>
        <span class="sr-only">Next</span>
      </a>

      <ol class="carousel-indicators">
        <?php if( have_rows('hero') ): ?>
          <?php
            $ol = 0;
            while ( have_rows('hero') ) : the_row();
              $ol++;
          ?>
            <li data-target="#heroContent" data-slide-to="<?php echo $ol-1; ?>" class="<?php if($ol == 1){ echo 'active'; } ?>"></li>
          <?php endwhile; ?>
        <?php endif; ?>
      </ol>
    </div>

    <div class="carousel-inner">
      <?php if( have_rows('hero') ): ?>
        <?php
          $i = 0;
          while ( have_rows('hero') ) : the_row();
            $i++;
        ?>
          <div class="carousel-item <?php if($i == 1){ echo 'active'; } ?>">
            <div class="container clearfix">
              <?php $heroContent = get_sub_field('content'); ?>
              <h1>
                <?php echo $heroContent['header']; ?>
              </h1>

              <div class="heroContent">
                <?php echo $heroContent['text']; ?>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="standard offer">
  <div class="container">
    <h2 class="thin text-center mb-5">
      Lorem Ipsum dolor amit
    </h2>

    <div class="row">
      <div class="col-md-4 mb-4 mb-md-0">
        <div class="box">
          <h4>
            Title
          </h4>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          </p>
        </div>
      </div>

      <div class="col-md-4 mb-4 mb-md-0">
        <div class="box">
          <h4>
            Title
          </h4>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          </p>
        </div>
      </div>

      <div class="col-md-4 mb-4 mb-md-0">
        <div class="box">
          <h4>
            Title
          </h4>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="standard info">
  <div class="container position-relative">
    <div class="shape"></div>
    <div class="row">
      <div class="col-md-6 mr-auto">
        <div class="content vCenter">
          <h4 class="mb-5">
            Lorem Ipsum
          </h4>
          <p>
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>

          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>

        </div>
      </div>
      <div class="col-md-5 my-5 my-md-0">
        <div class="img">
          <img src="/wp-content/uploads/2019/10/adult-blur-businessman-927022.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
</section>

<section class="standard services">
  <div class="container">
    <div class="row">
      <?php
        $args = array(
          'post_type' => 'services',
          'posts_per_page'  => 2,
        );

        $news = new WP_Query( $args );

        if ($news->have_posts()):
          while ( $news->have_posts() ): $news->the_post();
      ?>
      <?php
        $serviceBkg = get_field('bkg');
        $serviceContent = get_field('content');
      ?>
        <div class="col-md-6">
          <div class="serviceBox text-center mb-5 mb-md-0">

            <?php $serBkg = $serviceBkg['bkg_img']; ?>
            <div class="serBkg">
              <img src="<?php echo $serBkg['sizes']['large']; ?>" alt="">
            </div>

            <?php $icon = $serviceContent['icon']; ?>
              <div class="iconBox">
                <i class="<?php echo $icon['style']; ?> fa-<?php echo $icon['name']; ?>"></i>
              </div>

            <div class="content">
              <h5>
                <?php the_title(); ?>
              </h5>

              <div class="inner">
                <?php echo $serviceContent['sh_desc']; ?>
              </div>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
      <?php endif; ?>

    </div>
  </div>
</section>

<section class="standard news">
  <div class="container">
    <h2 class="thin text-center mb-5">
      Latest News
    </h2>
    <div class="row">
      <?php
        $args = array(
          'posts_per_page'  => 3,
        );

        $news = new WP_Query( $args );

        if ($news->have_posts()):
          while ( $news->have_posts() ): $news->the_post();
      ?>
        <div class="col-md-4 mb-5">
          <div class="newsBox mb-5 mb-md-0">
            <div class="imgBox">
              <img src="<?php the_post_thumbnail_url('medium_large'); ?>" alt="">
            </div>

            <div class="newsContent">
              <h5>
                <?php the_title(); ?>
                <span class="date">
                  <?php the_time('jS M Y') ?>
                </span>
              </h5>

              <div class="inner">
                <?php echo word_count(get_the_excerpt(), '20').' [...]'; ?>
              </div>

              <a href="<?php the_permalink(); ?>" class="readLink">
                Read More
              </a>
            </div>

          </div>
        </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
