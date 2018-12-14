<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package categitau
 */

while ( have_posts() ) :

the_post();

get_header();
?>

<article>
	<div class="container">
	<div class="row">
		<div class="col-lg-10 col-md-10 mx-auto">
			<?php the_content(); ?>
		</div>
	</div>
	<div class="row">
		<div class="post-meta col-lg-12 col-md-12">
			<div class="post-share">
				<a href="fb.com">
				<div class="sharebox">
					<i class="fab fa-facebook-f">

					</i>
				</div>
				</a>
				<a href="fb.com">
				<div class="sharebox">
					<i class="fab fa-twitter">
					
					</i>
				</div>
				</a>
				<a href="fb.com">
				<div class="sharebox">
					<i class="fab fa-linkedin-in">
					
					</i>
				</div>
				</a>
			</div>
			<div class="entry-tags gray-2-secondary">
				<strong class="tag-heading">
				<i class="fas fa-tag"></i>
				Tags:
				</strong>
				<!-- Display the post tags -->
				<?php the_tags('','',''); ?>
			</div>
		</div>
		<div id="blog-pager" class="blog-pager col-lg-12 col-md-12">
			<span id="blog-pager-older-link">
				<a class="blog-pager-older-link" title="Prev Post">
				<h5>
					<b>
					<?php next_post_link( '%link', 'Next Post ->'); ?>
					</b>
				</h5>
				<h3></h3>
				</a>
			</span>
		</div>
		<div class="clear"></div>
		<div class="post-related">
			<div class="post-box">
				<h4 class="post-box-title">
				Related Posts
				</h4>
			</div>

			<?php get_template_part( 'template-parts/content', 'related' ); ?>

		</div>
		<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif; 
		?>
	</div>
	</div>
</article>

<?php

endwhile; // End of the loop. 

?>

<?php
get_footer();
