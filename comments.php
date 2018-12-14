<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package categitau
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="post-comments col-lg-12 col-md-12">

<div class="post-box">
	<h4 class="post-box-title">
		Comments
	</h4>
</div>

<?php if ( have_comments() ) : ?>

<?php the_comments_navigation(); ?>
<div class="comments">
	<div class="comment-holder">
		<div class="comment-thread">
			<ol>
				<?php wp_list_comments('type=comment&callback=format_comment'); ?>
			</ol>
		</div>
	</div>
</div>
<?php
	the_comments_navigation();

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() ) : ?>
		<p class="no-comments">Comments are closed</p>
	<?php
	endif;

endif;

comment_form();
?>

</div>
