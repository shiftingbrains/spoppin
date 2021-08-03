<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments and the comment
 * form. The actual display of comments is handled by a callback to
 * SPOPPIN_comment() which is located at functions/comments-callback.php
 *
 * @package SPOPPIN WordPress theme
 */

// Return if password is required.
if ( post_password_required() ) {
	return;
}

// Add classes to the comments main wrapper.
$classes = 'comments-area clr';

if ( get_comments_number() !== 0 ) {
	$classes .= ' has-comments';
}

if ( ! comments_open() && get_comments_number() < 1 ) {
	$classes .= ' empty-closed-comments';
	return;
}

if ( 'full-screen' === SPOPPIN_post_layout() ) {
	$classes .= ' container';
}

// Get comment form position.
$comment_position = apply_filters( 'ocean_comment_form_position', get_theme_mod( 'ocean_comment_form_position' ) );
$comment_position = $comment_position ? $comment_position : 'after';

// Comment form args.
$args = array(
	/* translators: 1: logged in to comment */
	'must_log_in'          => '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a comment.', 'SPOPPIN' ), '<a href="' . wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) . '">', '</a>' ) . '</p>',
	'logged_in_as'         => '<p class="logged-in-as">' . esc_html__( 'Logged in as', 'SPOPPIN' ) . ' <a href="' . admin_url( 'profile.php' ) . '">' . $user_identity . '</a>.<span class="screen-reader-text">' . SPOPPIN_theme_strings( 'owp-string-comment-profile-edit', false, 'SPOPPIN' ) . '</span> <a href="' . wp_logout_url( get_permalink() ) . '" aria-label="' . SPOPPIN_theme_strings( 'owp-string-comment-logout-text', false, 'SPOPPIN' ) . '">' . esc_html__( 'Log out &raquo;', 'SPOPPIN' ) . '</a></p>',
	'comment_notes_before' => false,
	'comment_notes_after'  => false,
	'comment_field'        => '<div class="comment-textarea"><label for="comment" class="screen-reader-text">' . esc_html__( 'Comment', 'SPOPPIN' ) . '</label><textarea name="comment" id="comment" cols="39" rows="4" tabindex="0" class="textarea-comment" placeholder="' . SPOPPIN_theme_strings( 'owp-string-comment-placeholder', false, 'SPOPPIN' ) . '"></textarea></div>',
	'id_submit'            => 'comment-submit',
	'label_submit'         => esc_html( SPOPPIN_theme_strings( 'owp-string-comment-post-button', false, 'SPOPPIN' ) ),
);

?>

<section id="comments" class="<?php echo esc_attr( $classes ); ?>">

	<?php
	// You can start editing here -- including this comment!
	// Display comment form if position set to before the comment list.
	if ( 'before' === $comment_position ) {
		comment_form( $args );
	}
	?>

	<?php

	if ( have_comments() ) :

		// Get comments title.
		$comments_number = number_format_i18n( get_comments_number() );
		if ( '1' === $comments_number ) {
			$comments_title = esc_html__( 'This Post Has One Comment', 'SPOPPIN' );
		} else {
			/* translators: %s: Comments number */
			$comments_title = sprintf( esc_html__( 'This Post Has %s Comments', 'SPOPPIN' ), $comments_number );
		}
		$comments_title = apply_filters( 'ocean_comments_title', $comments_title );

		?>

		<h3 class="theme-heading comments-title">
			<span class="text"><?php echo esc_html( $comments_title ); ?></span>
		</h3>

		<ol class="comment-list">
			<?php
			// List comments.
			wp_list_comments(
				array(
					'callback' => 'SPOPPIN_comment',
					'style'    => 'ol',
					'format'   => 'html5',
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		// Display comment navigation - WP 4.4.0.
		if ( function_exists( 'the_comments_navigation' ) ) :

			$prev_comm_txt = is_rtl() ? SPOPPIN_icon( 'angle_right', false ) : SPOPPIN_icon( 'angle_left', false );
			$next_comm_txt = is_rtl() ? SPOPPIN_icon( 'angle_left', false ) : SPOPPIN_icon( 'angle_right', false );

			the_comments_navigation(
				array(
					'prev_text' => $prev_comm_txt . '<span class="screen-reader-text">' . __( 'Previous comment', 'SPOPPIN' ) . '</span>' . esc_html__( 'Previous', 'SPOPPIN' ),
					'next_text' => esc_html__( 'Next', 'SPOPPIN' ) . $next_comm_txt . '</i><span class="screen-reader-text">' . __( 'Next comment', 'SPOPPIN' ) . '</span>',
				)
			);

		elseif ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :

			?>

			<div class="comment-navigation clr">
				<?php
				paginate_comments_links(
					array(
						'prev_text' => $prev_comm_txt . '</i><span class="screen-reader-text">' . __( 'Previous comment', 'SPOPPIN' ) . '</span>' . esc_html__( 'Previous', 'SPOPPIN' ),
						'next_text' => esc_html__( 'Next', 'SPOPPIN' ) . $next_comm_txt . '<span class="screen-reader-text">' . __( 'Next comment', 'SPOPPIN' ) . '</span>',
					)
				);
				?>
			</div>

		<?php endif; ?>

		<?php
		// Display comments closed message.
		if ( ! comments_open() && get_comments_number() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'SPOPPIN' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php
	// Display comment form if position set to after the comment list (default setting).
	if ( 'after' === $comment_position ) {
		comment_form( $args );
	}
	?>

</section><!-- #comments -->
