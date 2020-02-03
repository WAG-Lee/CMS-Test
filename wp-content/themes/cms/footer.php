
      <?php if( have_rows('Affiliates', 'options') ): ?>
        <section class="affiliates">
          <div class="container position-relative">
            <div class="row justify-content-center">
              <?php while ( have_rows('Affiliates', 'options') ) : the_row(); ?>
                <div class="col-lg-2 col-md-3 col-4">
                  <div class="affBox">
                    <a href="<?php the_sub_field('website'); ?>">
                      <?php $compImg = get_sub_field('logo'); ?>
                      <img src="<?php echo $compImg['sizes']['medium']; ?>" alt="<?php the_sub_field('name'); ?>">
                    </a>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          </div>
        </section>
      <?php endif; ?>

      <?php if(!is_page('contact')): ?>
      <section class="contactBar">
        <div class="shape"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="contactInfo text-center text-md-left mb-4 mb-md-0">
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
                    <i class="far fa-envelope"></i>
                    <a href="mailto:<?php the_field('email', 14); ?>"><?php the_field('email', 14); ?></a>
                  </li>
                </ul>

                <?php if(get_field('social', 14)){ ?>
                  <ul class="ul ul-inline social mt-3">
                    <h6 class="mt-5 mb-3">
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
            <div class="col-md-6 col-10 mx-auto">
              <h6 class="mb-3">
                Contact Form
              </h6>
              <div class="contacteFormBox">
                <?php echo do_shortcode('[contact-form-7 id="8" title="Contact form"]'); ?>
              </div>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>

      <footer class="footer">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              &copy; Copyright <?php echo get_bloginfo('name'); ?> <?php echo date('Y') ?> | Website by <a href="https://www.wearegomarketing.com/" target="_blank">We Are Go</a>
            </div>
            <div class="col-md-6 mt-3 mt-md-0">
              <?php if(get_field('social', 14)){ ?>
                <ul class="ul ul-inline social text-md-right">
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
      </footer>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
      <script src="<?php echo get_bloginfo('template_directory'); ?>/js/bootstrap.js"></script>
      <script src="<?php echo get_bloginfo('template_directory'); ?>/js/classie.js"></script>
      <script src="<?php echo get_bloginfo('template_directory'); ?>/js/parallaxie.js"></script>
      <script src="<?php echo get_bloginfo('template_directory'); ?>/js/wow.js"></script>
      <script src="<?php echo get_bloginfo('template_directory'); ?>/js/custom.js"></script>

      <?php wp_footer(); ?>

  </body>
</html>
