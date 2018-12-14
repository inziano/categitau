<?php 
/**
 *
 *Template Name: Portfolio
 *
 * The portfolio page for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package categitau
 */

 get_header();
?>
   <!-- Portfolio -->
   <section class="content-section" id="portfolio">
      <div class="container">

        <div class="content-section-heading text-center">
          <h5 class="m-3">Projects</h5>
        </div>

        <div class="row mb-0">
            <div class="col-lg-5 col-md-5 col-sm-12 mx-auto">
                <div class="mb-5">
                    <form action="#">
                        <div class="select-box">
                        <label for="select-box1" class="label select-box1"><span class="label-desc"> Categories </span> </label>
                        <?php
                            $categories = get_categories( array(
                                'orderby' => 'name',
                                'order'   => 'ASC'
                            ) ); ?>
                           
                            <select id="select-box1" class="select">
                            <?php 

                                foreach( $categories as $category ) {

                                    echo '<option value="' .$category->term_id.'"><a href="'. get_category_link($category->term_id) .'"> ' . $category->name.' </a></option>';
                             
                            } ?>
                            </select>
                            
                        </div>
                            
                    </form>  
                </div>
            </div> <!-- End category dropdown -->
            <div class="col-lg-5 col-md-5 col-sm-12 mx-auto">
                <div id="top-search" class="mb-5">
                    <div class="header-right">
                        <form class="rst-search-form open rst-fixed" action="#">
                            <input id="qs" placeholder="Search here..." type="text">
                            <button id="qs-btn">
                                <i name="q" class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>		
        </div>
        
       
        <div class="row no-gutters">

            <?php

                $query = new WP_Query( array('post_type' => 'portfolios','posts_per_page' => 4 ) );

                if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
            ?>

          <div class="col-lg-6">
            <a class="portfolio-item" href="<?php the_permalink(); ?>">
              <span class="caption">
                <span class="caption-content">
                  <h2> <?php the_title(); ?> </h2>
                  <p class="mb-0">  <?php the_excerpt(); ?> </p>
                </span>
              </span>

                <?php if (has_post_thumbnail()) : ?>
                    <img class="img-fluid" src= <?=get_the_post_thumbnail_url()?> alt="">
                <?php else : ?>
                    <img src="<?=get_template_directory_uri()?>/assets/img/blog-8.jpg"> 
                <?php endif; ?> 
            </a>
          </div>
          <?php endwhile; ?>

            <div class="col-lg-12 d-flex justify-content-center">
                <div class="pagination">
                    <?php the_posts_pagination( array( 'mid_size'  => 2 ) ); ?>
                </div>
            </div>
            <?php else: ?>
        </div>
        <article>
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-12 col-md-12 mx-auto d-flex justify-content-center">
                            <p>
                                No posts available
                            </p>
                        </div>
                    </div>
                </div>
            </article>
            <?php endif; ?>
    </section>
    <br>
<?php get_footer()?>