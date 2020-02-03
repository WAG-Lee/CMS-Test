<?php get_header(); ?>

<section class="page_title">
  <div class="bkgBox parallaxie" style="background-image: url('/wp-content/uploads/2019/10/adult-chair-company-380769.jpg');"></div>
  <div class="container">
    <h1>
      <?php post_type_archive_title(); ?>
    </h1>
  </div>
</section>

<section class="standard services_page">
  <div class="container">
    <div class="row">
      <div class="col-md-3 mr-auto d-none d-md-block">
        <ul class="ul serviceNav">
          <?php
            $sArgs = array(
              'post_type' => 'services',
              'posts_per_page'  => -1,
            );

            $services = new WP_Query( $sArgs );

            if ($services->have_posts()):
              while ( $services->have_posts() ): $services->the_post();
          ?>
          <li>
            <a href="<?php the_permalink(); ?>">
              <?php the_title(); ?> <i class="far fa-arrow-right"></i>
            </a>
          </li>
            <?php endwhile; ?>
          <?php endif; ?>
        </ul>
      </div>
      <div class="col-md-8">
        <?php
          if ($services->have_posts()):
            $sc = 0;
            while ( $services->have_posts() ): $services->the_post();
            $sc++;

            $imgs = get_field('bkg');
            $img = $imgs['bkg_img'];
        ?>
            <div class="row mb-4">
              <div class="col-md-6 <?php if($sc % 2 == 0){ echo 'order-md-2'; } ?>">
                <div class="servImg">
                  <img src="<?php echo $img['sizes']['medium_large']; ?>" alt="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="serviceInfo">
                  <h6>
                    <?php the_title(); ?>
                  </h6>

                  <div class="content">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
                  </div>

                  <a href="<?php the_permalink(); ?>" class="mt-3 d-inline-block">
                    <button type="button" class="btn btn-primary">View More</button>
                  </a>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
        <div class="row">

        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
