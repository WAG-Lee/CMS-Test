<?php get_header(); ?>

<?php
  $bkg = get_field('bkg');
  $img = $bkg['bkg_img'];
  $content = get_field('content');
?>

<section class="page_title">
  <div class="bkgBox parallaxie" style="background-image: url('<?php echo $img['url']; ?>');"></div>

  <div class="container">
    <h1>
      <?php the_title(); ?>
    </h1>
  </div>
</section>

<section class="standard services_page">
  <div class="container">
    <div class="row">
      <div class="col-md-8 order-md-2">
        <div class="image">
          <img src="<?php echo $img['sizes']['medium_large']; ?>" alt="">
        </div>

        <div class="content">
          <?php echo $content['service_content']; ?>
        </div>

      </div>
      <div class="col-md-4 mt-5 mt-md-0">
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
              <?php the_title(); ?>
            </a>
          </li>
        <?php endwhile; wp_reset_query(); ?>
          <?php endif; ?>
        </ul>

        <hr>

        <?php get_template_part('sidebar'); ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
