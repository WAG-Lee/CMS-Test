<?php get_header(); ?>

<section class="page_title single_page">
  <div class="container">

    <h1 class="mb-5">
      <?php the_title(); ?>
    </h1>

    <?php if ( function_exists('yoast_breadcrumb') ) { ?>
      <div class="breadcrumb text-right">
        <?php yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); ?>
      </div>
    <?php } ?>

    <div class="row">
      <div class="col-xl-8 col-lg-7 mr-auto">

        <div class="newsImg">
          <img src="<?php the_post_thumbnail_url('large'); ?>" alt="">
        </div>

        <?php
          if ( have_posts() ) {
            while ( have_posts() ) {
              the_post();
              the_content();
            }
          }
        ?>
      </div>
      <div class="col-xl-4 col-lg-5 mt-5 mt-lg-0">
       <?php get_template_part('sidebar'); ?>
     </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
