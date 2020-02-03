<?php get_header(); ?>

<section class="page_title contact_page">
  <div class="bkgBox parallaxie" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
  <div class="container">
    <h1 class="mb-5">
      <?php the_title(); ?>
    </h1>
    <div class="contactBox">
      <div class="row no-gutters">

        <div class="col-xl-7 col-md-6 order-md-2">
          <div class="contactForm">
            <h5 class="mb-5">
              Get in touch
            </h5>

          <?php echo do_shortcode('[contact-form-7 id="8" title="Contact form 1"]'); ?>
          </div>
        </div>

        <div class="col-xl-5 col-md-6 mr-auto order-md-1">
          <div class="contactInfo">
            <h6 class="mb-3">
              Contact Information
            </h6>
            <ul class="ul contactDetails">
              <li>
                <address>
                  <i class="far fa-map-marker-alt"></i> <?php the_field('address', 14); ?>
                </address>
              </li>
              <li>
                <?php
                  $phoneNum = get_field('phone', 14);
                  $phone = preg_replace('~^.{5}|.{3}(?!$)~', '$0 ', $phoneNum);
                ?>
                <i class="far fa-phone"></i> <a href="tel:<?php echo $phoneNum; ?>"><?php echo $phone; ?></a>
              </li>
              <li>
                <i class="far fa-envelope"></i> <a href="mailto:<?php the_field('email', 14); ?>"><?php the_field('email', 14); ?></a>
              </li>
            </ul>

            <?php if(get_field('social', 14)){ ?>
              <ul class="ul ul-inline social mt-3">
                <h6 class="mt-4 mb-3">
                  Follow us
                </h6>
                <?php
                  if( have_rows('social', 14) ):
                    while ( have_rows('social', 14) ) : the_row();
                      $socIcon = get_sub_field('icon');
                ?>
                      <li>
                        <span class="sr-only"><?php the_sub_field('website'); ?></span>
                        <a href="<?php the_sub_field('url'); ?>" target="_blank"><i class="<?php echo $socIcon['style']; ?> fa-<?php echo $socIcon['name']; ?>"></i></a>
                      </li>
                <?php
                    endwhile;
                  endif;
                ?>
              </ul>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
