<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package categitau
 */

get_header();
?>

<!-- Articles -->
<section class="content-section" id="portfolio">
    <div class="container">
        <div class="content-section-heading text-center">
        <h5 class="m-3"><?php the_title(); ?></h5>
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
        
        <div class="row">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="col-lg-4 col-md-6">
                    <article class="post">
                        <div style="display: block;">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'blog-thumb' ); ?>
                                </a>
                            </div>
                        <?php else : ?>
                        <div class="post-image">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?=get_template_directory_uri() ?>/assets/img/blog-8.jpg" width="675" height="450">
                                </a>
                            </div>     
                                            
                        <?php endif; ?>
                            <div class="post-header">
                                <div class="post-tag">
                                    <a href="" rel="tag">
                                        <?= the_date('Y-m-d') ?> 
                                    </a>  
                                </div>
                                <h5>
                                    <span>
                                        <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
                                    </span>
                                </h5>
                            </div>
                            <div class="post-entry">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </article>
                </div>
            <?php endwhile; ?>
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="pagination">
                    <?php the_posts_pagination( array( 'mid_size'  => 2 ) ); ?>
                </div>
            </div>
            <?php else : ?>
            <article>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-10 mx-auto">
                            <p>
                                No posts available
                            </p>
                        </div>
                    </div>
                </div>
            </article>

            <?php endif; ?>
        </div>
    </div>
</section>
<br>

<?php
get_footer();
