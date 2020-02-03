<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="title" content="" />
  	<meta name="description" content="" />
  	<meta name="keywords" content=""/>
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <title><?php wp_title(' | ', 'true', 'right'); ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_directory'); ?>/css/bootstrap.css"/>
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,900&display=swap" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_directory'); ?>/css/animate.css"/>
    <!-- Font Awesome -->
    <script defer src="<?php echo get_bloginfo('template_directory'); ?>/js/all.min.js"></script>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo get_bloginfo('template_directory'); ?>/images/favicon.png">

    <?php wp_head(); ?>

    <!-- STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_directory'); ?>/style.css"/>

  </head>
  <body <?php body_class(); ?>>

    <header class="header">
      <div class="container">
        <div class="headerInner">
          <a href="/">
            <div class="logo inlineLogo">
              <div class="icon">
                <?php get_template_part('svg/icon'); ?>
              </div>
              <div class="name">
                CMS
                <span class="">
                  office interiors
                </span>
              </div>
            </div>
          </a>

          <div class="hamburger d-md-none">
            <button type="button">
              <i class="far fa-stream"></i>
            </button>
          </div>

          <div class="headerNav d-none d-md-block">
            <ul class="ul ul-inline contactDetails">
              <li>
                <?php
                  $phoneNum = get_field('phone', 14);
                  $phone = preg_replace('~^.{5}|.{3}(?!$)~', '$0 ', $phoneNum);
                ?>
                <i class="fas fa-phone"></i><a href="tel:<?php echo $phoneNum; ?>"><?php echo $phone; ?></a>
              </li>
              <li>
                <i class="fas fa-envelope"></i><a href="mailto:<?php the_field('email', 14); ?>" class="d-md-none d-lg-inline-block"><?php the_field('email', 14); ?></a><a href="mailto:<?php the_field('email', 14); ?>" class="d-none d-md-inline-block d-lg-none">Email</a>
              </li>
            </ul>

            <ul class="ul ul-inline mainMenu">
              <?php
                wp_nav_menu(array(
                  'theme_location' => 'primary',
                  'container'      => '',
                  'items_wrap'     => '%3$s',
                  )
                );
              ?>
            </ul>

          </div>
        </div>
      </div>
    </header>

    <header id="headerfixed" class="header fixed header-sm">
      <div class="container">
        <div class="headerInner">
          <a href="/">
            <div class="logo inlineLogo">
              <div class="icon">
                <?php get_template_part('svg/icon'); ?>
              </div>
            </div>
          </a>

          <div class="hamburger d-md-none">
            <button type="button">
              <i class="far fa-stream"></i>
            </button>
          </div>

          <div class="headerNav d-none d-md-flex">
            <ul class="ul ul-inline mainMenu">
              <?php
                wp_nav_menu(array(
                  'theme_location' => 'primary',
                  'container'      => '',
                  'items_wrap'     => '%3$s',
                  )
                );
              ?>
            </ul>

            <ul class="ul ul-inline contactDetails">
              <li>
                <?php
                  $phoneNum = get_field('phone', 14);
                  $phone = preg_replace('~^.{5}|.{3}(?!$)~', '$0 ', $phoneNum);
                ?>
                <a href="tel:<?php echo $phoneNum; ?>"><i class="far fa-phone"></i></a>
              </li>
              <li>
                <a href="mailto:<?php the_field('email', 14); ?>" class=""><i class="far fa-envelope"></i></a>
              </li>
            </ul>

          </div>
        </div>
      </div>
    </header>

    <div class="mobileMenu">

      <div class="hamburger">
        <button type="button">
          <i class="far fa-times"></i>
        </button>
      </div>

      <div class="mobileInner">
        <div class="mobMenuWrapper">
          <ul class="ul mobMenu">
            <?php
              wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => '',
                'items_wrap'     => '%3$s',
                )
              );
            ?>
          </ul>

          <ul class="ul contactDetails mt-5">
            <li>
              <address>
                <?php the_field('address', 14); ?>
              </address>
            </li>
            <li>
              <?php
                $phoneNum = get_field('phone', 14);
                $phone = preg_replace('~^.{5}|.{3}(?!$)~', '$0 ', $phoneNum);
              ?>
              <a href="tel:<?php echo $phoneNum; ?>"><?php echo $phone; ?></a>
            </li>
            <li>
              <a href="mailto:<?php the_field('email', 14); ?>"><?php the_field('email', 14); ?></a>
            </li>
          </ul>

          <?php if(get_field('social', 14)){ ?>
            <ul class="ul ul-inline social mt-4">
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
