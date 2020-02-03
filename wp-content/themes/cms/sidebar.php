<div class="contactDetailsDiv sideBox">
  <h6>
    Contact Details
  </h6>
  <ul class="ul contactDetails">
    <li class="">
      <?php
        $phone = get_field('phone', 14);
        $phone = preg_replace('~^.{5}|.{3}(?!$)~', '$0 ', $phone);
      ?>
      <i class="far fa-phone"></i> <a href="tel:<?php the_field('phone', 14); ?>"><?php echo $phone; ?></a>
    </li>
    <li>
      <i class="far fa-envelope"></i> <a href="mailto:<?php the_field('email', 14); ?>"><?php the_field('email', 14); ?></a>
    </li>
  </ul>
</div>

<?php if (is_singular('post')) { dynamic_sidebar('newssidebar'); } ?>

<?php if(has_tag()){ ?>
  <div class="tags sideBox">

    <?php the_tags('', ' '); ?>
  </div>
<?php } ?>

<?php if(get_field('testimonials')){ ?>
  <div class="sideTestim plainBox">
    <div class="testContent">
        <?php
          $posts = get_field('testimonials');
          foreach( $posts as $post): // variable must be called $post (IMPORTANT)
        ?>
        <?php setup_postdata($post); ?>
        <p>
          <i class="far fa-quote-left"></i>
          <?php the_field('quote_text'); ?>
          <i class="far fa-quote-right"></i>
          <span>
            - <?php
              the_title();
              if (get_field('pos_loc')) {
                echo ', ';
                the_field('pos_loc');
              } ?>
          </span>
        </p>
      <?php endforeach; ?>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
    </div>
  </div>
<?php } ?>


<?php if( have_rows('social', 14) ): ?>
  <div class="socialDiv sideBox">
    <h6>
      Follow us
    </h6>
    <ul class="ul ul-inline social">
      <?php
        while ( have_rows('social', 14) ) : the_row();
          $icon = get_sub_field('icon');
      ?>
        <li>
          <a href="<?php the_sub_field('url'); ?>" target="_blank">
            <span class="sr-only"><?php the_sub_field('website'); ?></span>
            <i class="<?php echo $icon['style']; ?> fa-<?php echo $icon['name']; ?>"></i>
          </a>
        </li>
      <?php endwhile; ?>
    </ul>
  </div>
<?php endif; ?>
