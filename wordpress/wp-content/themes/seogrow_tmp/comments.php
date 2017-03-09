<?php
/**
 * The default template for displaying comment in post detail page
 *
 *
 * @package WordPress
 * @subpackage SEOGrow
 * @since 1.0
 */
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
					echo get_comments_number( get_the_id());
					echo esc_html__( ' Comments', 'seogrow' );
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 56,
					'callback'    => 'seogrow_display_comments',
				) );
		?>
		</ol><!-- .comment-list -->

		<?php 
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="pagination-comment">
				<?php
					//Create pagination links for the comments on the current post, with single arrow heads for previous/next
					paginate_comments_links( array(
						'add_fragment' => '#comments',
						'prev_text' => esc_html__( 'Previous', 'seogrow' ), 
						'next_text' => esc_html__( 'Next', 'seogrow' ),
					) );
				?>
			</div>
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'seogrow' ); ?></p>
	<?php endif; ?>

	<?php
		// show comment form
		$seogrow_comment_args = seogrow_comment_form();
		comment_form($seogrow_comment_args);
	 ?>

</div><!-- .comments-area -->
