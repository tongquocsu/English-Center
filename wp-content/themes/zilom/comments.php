<?php
/**
 * The template for displaying posts in the Video post format
 *
 * @author     Gaviasthemes Team     
 * @copyright  Copyright (C) 2021 gaviasthemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */
?>

<?php
	if ( post_password_required() ){
		return; 
	}
?>
<div id="comments">

	<?php if ( have_comments() ) { ?>
	  	
	  	<h2 class="comments-title">
			<?php 
				printf( 
					_nx( 
						'One thought on &ldquo;%2$s&rdquo;',
						'%1$s thoughts on &ldquo;%2$s&rdquo;',
						get_comments_number(),
						'comments title',
						'zilom'
					),
					number_format_i18n( get_comments_number() ), get_the_title() 
				);
			?>
	  </h2>
		  
	  	<div class="gav-comment-list clearfix">
		 	
		 	<ol class="pingbacklist">
		 		<?php wp_list_comments( array( 'type' => 'pings', 'callback' => 'zilom_comment_template', 'short_ping'  => true ) ); ?>
		 	</ol>
		 	<ol class="comment-list">
		 		<?php wp_list_comments('type=comment&callback=zilom_comment_template'); ?>
		 	</ol>
		 	
		 	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			 	<footer class="navigation comment-navigation" role="navigation">
				  	<div class="previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'zilom') ); ?></div>
				  	<div class="next right"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'zilom') ); ?></div>
			 	</footer>
		 	<?php endif; ?>

		 	<?php if ( ! comments_open() && get_comments_number() ) : ?>
			  	<p class="no-comments"><?php echo esc_html__( 'Comments are closed.' , 'zilom'); ?></p>
		 	<?php endif; ?>
		 	
	  	</div>

	<?php } ?>

	<?php
		global $post;
		$aria_req = ( $req ? " aria-required='true'" : '' );

		$comment_field = '<div class="form-group">';
			$comment_field .= '<textarea placeholder="' . esc_attr__('Write Your Comment', 'zilom') . '" rows="5" id="comment" class="form-control"  name="comment"' . $aria_req . '></textarea>';
		$comment_field .=  '</div>';
		
		$author_field = '<div class="row"><div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">';
		  $author_field .= '<input type="text" name="author" placeholder="'.esc_attr__('Your Name *', 'zilom').'" class="form-control" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />';
		$author_field .= '</div>';

		$email_field = '<div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">';
		  $email_field .= '<input id="email" name="email" placeholder="'.esc_attr__('Email *', 'zilom').'" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' />';
		$email_field .= '</div></div>';
		
		
		$comment_args = array(
			'title_reply' 		=> '<div class="comments-title">' . esc_html__('Add a Comment', 'zilom') . '</div>',
			'comment_field' => $comment_field,				
			'fields' => apply_filters('comment_form_default_fields',
				array(
				  'author' => 	$author_field,
				  'email' => $email_field,
				)
			),
			'label_submit' => esc_html__('Post Comment', 'zilom'),
			'comment_notes_before' => '<div class="form-group h-info">'.esc_html__('Your email address will not be published.','zilom').'</div>',
			'comment_notes_after' => '',
		);
	?>

	<?php if('open' == $post->comment_status){ ?>
	<div class="comment-form-main">
		<div class="comment-form-inner">
			<?php zilom_comment_form($comment_args); ?>
		</div>
	 </div>
	<?php } ?>
</div>
