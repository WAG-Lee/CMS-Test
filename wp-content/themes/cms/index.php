<?php get_header(); ?>

<section class="page_title">

  <div class="bkgBox parallaxie" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
  <div class="container">
    <h1>
      <?php the_title(); ?>
    </h1>
  </div>
</section>

<section class="standard">
  <div class="container">
    <?php
      if ( have_posts() ) {
        while ( have_posts() ) {
          the_post();
          the_content();
        }
      }
    ?>
  </div>
</section>

<?php get_footer(); ?>
