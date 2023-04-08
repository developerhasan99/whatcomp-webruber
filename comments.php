<?php 
//Exit If Accesed Directly
if( ! defined('ABSPATH') ) exit;

/**
 * @webruber 1.0
 * Comments tamplate!
 */

 ?>

<?php if ( post_password_required() ) { return; } ?>
<div id="comments" class="py-5">
	<?php if ( have_comments() ) : global $wp_query; ?>
		<h3><?php comments_number( esc_html__( 'No Responses', 'ruber' ), esc_html__( '1 Response', 'ruber' ), esc_html__( '% Responses', 'ruber' ) ); ?> to "<?php the_title(); ?>"</h3>
		<div id="commentlist-container" class="py-3">
			<ol class="commentlist">
				<?php wp_list_comments( 'avatar_size=96&type=comment' ); ?>	
			</ol>
			<?php if ( get_comment_pages_count() > 1 && get_option('page_comments') ) : ?>
			<nav class="comments-nav group">
				<div class="nav-previous">
					<?php previous_comments_link(); ?>
				</div>
				<div class="nav-next">
					<?php next_comments_link(); ?>
				</div>
			</nav>
			<?php endif; ?>
		</div>
		<?php if ( ! empty( $comments_by_type['comment'] ) ) { ?>
		<div id="commentlist-container" class="py-3">
			<ol class="commentlist">
				<?php wp_list_comments( 'avatar_size=96&type=comment' ); ?>	
			</ol>
			<?php if ( get_comment_pages_count() > 1 && get_option('page_comments') ) : ?>
			<nav class="comments-nav group">
				<div class="nav-previous">
					<?php previous_comments_link(); ?>
				</div>
				<div class="nav-next">
					<?php next_comments_link(); ?>
				</div>
			</nav>
			<?php endif; ?>
		</div>	
		<?php } ?>
	<?php else: ?>
		<?php if (comments_open()) : ?>
		<?php else : ?>
		<?php endif; ?>
	<?php endif; ?>
	<?php comment_form(
		array(
			'logged_in_as'       => null,
			'title_reply'        => esc_html__( 'Speak your mind!', 'ruber' ),
			'title_reply_before' => '<p id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</p>',
		)
	); ?>
</div>