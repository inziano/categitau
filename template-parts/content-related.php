<?php
/**
 * Template part for displaying posts
 */
    // Show the latest three posts
    $custom_query = new WP_Query( 'posts_per_page=3' );
    if ($custom_query->have_posts()): while($custom_query->have_posts()) : $custom_query->the_post(); 
?>

<div class="item-related">
    <a href="post.html">
        
        <?php 
            if ( has_post_thumbnail() ) {
                // Get the post image
                // $theimage = wp_get_attachment_image_src( get_post_thumbnail_id ( $post->ID ), 'thumbnail' );
                $theimage = the_post_thumbnail( array(675,450) );
            }
        ?>
        <img class="img_class" src="<?php echo $theimage[0]; ?>" />
        <!-- <img src="assets/img/blog-9.jpg" width="150" height="100"> -->
        <h3>
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>
    </a>
</div>

<?php endwhile; ?>
<?php else: ?>

	<p> 
        <?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?>
    </p>
    
<?php endif; ?>

<?php wp_reset_postdata(); ?>