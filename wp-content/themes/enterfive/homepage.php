<?php /* Template Name: Homepage */ ?>

<?php get_header(); ?>
<!-- Hero section -->
<section class="hero-section"></section>
<!-- Intro Section -->
<section class="p-b-60 intro">
  <div class="text-center">
    <p class="intro-text unb-reg">
      Enterfive is a solutions agency. We exist to launch and scale<br /> businesses through innovative digital solutions. We're also<br />working on some ventures of our own.
    </p>
  </div>
</section>
<!-- Last Venture Section -->
<section class="p-t-100 p-b-60 venture" id="venture">
    <?php query_posts('post_type=latest_views&posts_per_page=1'); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php $latest_link = get_post_custom_values('latestLink'); ?>
  <div class="venture-layout">
    <div class="p-l-50 p-r-50">
      <p class="venture-header unb-bo">
        Our Latest Venture
      </p>
      <div class="row">
        <div class="col-md-4">
          <p class="venture-sub-head unb-bo">
          <?php the_title(); ?>
          </p>
        </div>
        <div class="col-md-8">
          <div class="venture-sub-text unb-reg"><?php the_content(); ?></div>
        </div>
      </div>
    </div>
    <div>
      <div class="featured-v">
      <?php $latest_link = get_post_custom_values('latestLink');
          if($latest_link[0] != ""){

      ?>
          <a href="<?php echo $latest_link[0]; ?>" class="f-link">

      <?php }else{ ?>
          <a href="#" class="f-link">
      <?php } ?>
        <a href="<?php echo $latest_link[0]; ?>" class="f-link">
          <div class="f-text unb-bo">
            Check out <span><?php the_title(); ?></span>
          </div>
        </a>
        <img src="<?php the_post_thumbnail_url(full); ?>" height="400" />
      </div>
    </div>
  </div>
  <?php endwhile; endif; ?>
</section>
<!-- Services -->
<section class="p-t-100 p-b-100 services" id="services">
  <div class="row">
    <div class="col-md-6">
      <p class="services-head unb-bo">
        Services
      </p>
      <p class="services-sub-text unb-bo">
        Delivering innovative solutions with best practice
      </p>
    </div>
    <div class="col-md-6">
      <div style="border-bottom: 2px solid #dee2e6; padding-bottom: 40px;">
        <p class="sub-header unb-bo">
          Product Management
        </p>
        <p class="sub-header-text unb-reg">
          We ideate, sketch, build and market product solutions relevant to industries across the board... and borders.
        </p>
      </div>
      <div style="padding-top: 40px;">
        <p class="sub-header unb-bo">
          Digital Sevices
        </p>
        <p class="sub-header-text unb-reg">
          We create, execute and track digital campaign solutions using well-distilled research findings to drive optimal results.
        </p>
      </div>
    </div>
  </div>
</section>
<!-- About us section -->
<section class="p-t-100 p-b-50 about-us" id="about">
  <p class="about-us-head unb-bo">
    About Us
  </p>
  <p class="about-us-sub-head unb-bo">
    We are technology leaders, building the local digital ecosystem while creating global impact from Africa.
  </p>
  <div class="row">
    <div class="col-md-6">
      <p class="about-us-text unb-reg">
        As technology growth leaders on the African continent, we are constantly innovating —finding intersections and opportunities in the unexpected.
      </p>
    </div>
    <div class="col-md-6">
      <p class="about-us-text unb-reg">
        Our user-first approach delivers unique experiences built on best practices. With every engagement, we build trust and foster long term partnerships —we’re cuddlers.
      </p>
    </div>
  </div>
  <p class="about-us-highlight unb-lit">
    <span style="font-weight: 900;" class="unb-bl">Trust</span> and long term partnerships
  </p>
  <p class="about-us-highlight-2 unb-bl">
    <span style="font-weight: 300" class="unb-lit">— we’re</span><br />cuddlers
  </p>
</section>

<!-- Work with us -->
<section class="p-t-60 p-b-60 work" id="work">
  <p class="work-with-us unb-bo">
    Have a project or an idea you’d like to collaborate on with EnterFive? Let’s talk.
  </p>
  <div class="text-center">
    <a href="#" class="work-btn">Work With Us</a>
  </div>
</section>

<!-- Cases -->
<section class="p-t-100 p-b-200 case" id="case">
  <p class="case-head p-b-117 unb-bo">
    Select Cases
  </p>
  <?php query_posts('post_type=cases_views&posts_per_page=9'); ?>
  
  <div class="container">

  <div class='row'>
    <div class='col-md-8'>

      <div class="carousel slide media-carousel" id="media">
        <div class="carousel slide media-carousel" id="eventCarousel" data-interval="0">
          <div class="carousel-inner onebyone-carosel">
              <?php
                $count = 0;
              ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php
            $title= str_ireplace('"', '', trim(get_the_title()));
            $desc= str_ireplace('"', '', trim(get_the_content()));

            $title44= str_ireplace('"', '', trim(get_the_title(44)));
            $desc44= get_post_field('post_content', 44);

            $title45= str_ireplace('"', '', trim(get_the_title(45)));
            $desc45= get_post_field('post_content', 45);

            $title46= str_ireplace('"', '', trim(get_the_title(46)));
            $desc46= get_post_field('post_content', 46);
            $count++;
        ?>
            <div class="item <?php if($count == 1){echo ' active';} ?>">
              <div class="col-md-4">
                <!--<div class="mid">-->
                  <p class="unb-reg">
                     <?php echo get_the_term_list($post->ID, 'cases-type', '', ', ',''); ?>
                  </p>
                  <?php $logo= get_post_custom_values('logoLink');
                      if($logo[0] != ""){
            
                  ?>
                  <img src="<?echo $logo[0]?>" class="img1"/>
            
                  <?php }else{ ?>
                  <img src="" alt="image" class="img1"/>
                  <?php } ?>
                  <a href="#<?php the_ID(); ?>" class="case-link unb-reg" data-toggle="modal" data-target="#<?php the_ID(); ?>">View Case</a>
                <!--</div>-->
              </div>
            </div>
            <?php endwhile; endif; ?>
          </div>
          <a data-slide="prev" href="#eventCarousel" class="left carousel-control">‹</a>
          <a data-slide="next" href="#eventCarousel" class="right carousel-control">›</a>
        </div>
      </div>

    </div>
  </div>

</div>

  
</section>

<div class="modal fade" id="44" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="case-modal">
          <p class="case-title unb-bo">
            <?php echo $title44; ?>
          </p>
          <p class="case-category unb-reg">
            <?php echo get_the_term_list(44, 'cases-type', '', ', ',''); ?>
          </p>
          <p class="class-description unb-reg">
            <?php echo $desc44; ?>
          </p>
          <div class="brand-img">
            <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( 44 ) ); ?>" />
          </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="45" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="case-modal">
          <p class="case-title unb-bo">
            <?php echo $title45; ?>
          </p>
          <p class="case-category unb-reg">
            <?php echo get_the_term_list(45, 'cases-type', '', ', ',''); ?>
          </p>
          <p class="class-description unb-reg">
            <?php echo $desc45; ?>
          </p>
          <div class="brand-img">
            <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( 45 ) ); ?>" />
          </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="46" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="case-modal">
          <p class="case-title unb-bo">
            <?php echo $title46; ?>
          </p>
          <p class="case-category unb-reg">
            <?php echo get_the_term_list(46, 'cases-type', '', ', ',''); ?>
          </p>
          <p class="class-description unb-reg">
            <?php echo $desc46; ?>
          </p>
          <div class="brand-img">
            <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( 46 ) ); ?>" />
          </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Portfolio Section -->
<section class="p-t-100 p-b-100 portfolio" id="portfolio">
  <p class="portfolio-head p-b-85 unb-bo">
    Portfolio & Partners
  </p>
  <div class="row">
    <?php query_posts('post_type=portfolio&posts_per_page=15'); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="col-md-3 col-xs-6 col-sm-4">
      <div class="div-block-7"><img class="apex image-3" src="<?php the_post_thumbnail_url(); ?>"></div>
    </div>
    <?php endwhile; endif; ?>
  </div>
</section>

<!-- Blog Section -->
<section class="p-t-100 p-b-60 e5-blog" id="blog">
  <p class="blog-head p-b-40 unb-bo">
    From The Blog
  </p>
  <div class="row">
<?php $the_query = new WP_Query( 'posts_per_page=1' ); ?>

<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

<div class="col-md-6">
  <p class="blog-title unb-bo">
    <a href="<?php the_permalink(); ?>" class="unb-bo"><?php the_title(); ?></a>
  </p>
</div>
<div class="col-md-6">
  <div class="blog-img">
    <img style="max-width: none;" src="<?php the_post_thumbnail_url(); ?>" width="428" height="286" alt="">
  </div>
</div>
<?php
endwhile;
wp_reset_postdata();
?>
</div>
<div class="text-center m-t-40">
  <a style="color: black;" href="http://blog.enterfive.com/" class="blog-btn">See More Posts</a>
</div>
  </div>
</section>

<?php get_footer(); ?>
