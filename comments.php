<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package LaComuna-Theme
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
global $post;
if ( post_password_required() ) {
	return;
}
?>
<div class="container-fluid lc_comments marPad0">
	<div class="row">
		<div class="col-12 marPad0 books">
			
		</div>
	</div>
			<h2 class="text-center">¿TIENES PREGUNTAS?</h2>

	<div class="container">
		<div class="row">
			<div class="col-12">





<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<p><i><small>
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'Un comentario en &ldquo;%2$s&rdquo;', '%1$s comentarios en &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'lacomuna-theme' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</small></i></p><!-- .comments-title -->

		<!--<//?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'lacomuna-theme' ); ?></h2> 
			<div class="nav-links">

				<div class="nav-previous"><//s?php previous_comments_link( esc_html__( 'Antiguos', 'lacomuna-theme' ) ); ?></div>
				<div class="nav-next"><//?php next_comments_link( esc_html__( 'Nuevos', 'lacomuna-theme' ) ); ?></div>

			</div> 
		</nav> 
		<//?php endif; // Check for comment navigation. ?>-->

		<ol class="lc_comment_list">
			<?php
				/*wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'max_depth' => 5
				) );*/

				$comments = get_comments( array( 'post_id' => $post->ID, 'parent' => 0 ) );
 
				foreach ( $comments as $comment ) :?>
    				<b><?php echo $comment->comment_author;?></b> dice:<br>
    				<?php echo $comment->comment_date;?><br>
    				<?php echo $comment->comment_content; ?><br>
    				<div class="reply"><a rel="nofollow" class="comment-reply-link" href="#comment-<?php echo $comment->comment_ID;?>" data-commentid="<?php echo $comment->comment_ID;?>" data-postid="<?php echo $post->ID;?>" data-belowelement="div-comment-<?php echo $comment->comment_ID;?>" data-respondelement="respond" aria-label="Responder a <?php echo $comment->comment_author;?>">Responder</a></div>
    				<?php $sub_comments = get_comments( array( 'post_id' => $post->ID, 'parent' => $comment->comment_ID ) );
    				foreach($sub_comments as $sub_comment): ?>
    				&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $sub_comment->comment_author;?></b> dice:<br>
    				&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sub_comment->comment_date;?><br>
    				&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sub_comment->comment_content; ?><br>
    				&nbsp;&nbsp;&nbsp;&nbsp;<div class="reply"><a rel="nofollow" class="comment-reply-link" href="#comment-<?php echo $sub_comment->comment_ID;?>" data-commentid="<?php echo $sub_comment->comment_ID;?>" data-postid="<?php echo $post->ID;?>" data-belowelement="div-comment-<?php echo $sub_comment->comment_ID;?>" data-respondelement="respond" aria-label="Responder a <?php echo $sub_comment->comment_author;?>">Responder</a></div>
    				<?php endforeach;?>
				<?php endforeach;
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<div class="lc_comment_nav text-center">

				 <?php previous_comments_link( esc_html__( 'Antiguos', 'lacomuna-theme' ) ); ?> 
				 <?php next_comments_link( esc_html__( 'Nuevos', 'lacomuna-theme' ) ); ?> 

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
    <?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Los comentarios están cerrados.', 'lacomuna-theme' ); ?></p>
	<?php 
	endif;
        $fields = array(
                        'author' => '<div class="lc_group"><label for="author">Nombre *</label>
                                    <input type="text" name="author" id="author" class="lc_input" required="required" />
                                    </div>',
                        'email'  => '<div class="lc_group"><label for="email">Email *</label>
                                    <input type="email" name="email" id="email" class="lc_input" required="required" />
                                    </div>',
                        'url'    => '<div class="lc_group"><label for="url">Sitio web</label>
                                    <input type="url" name="url" id="url" class="lc_input" />
                                    </div>',
                    );
    $args = array (
                    'fields' => $fields,
                    'class_form' => "commentform",
                    'comment_field' => '<div class="input-group"><label for="comment">Comentario *</label>
                                        <textarea rows="8" name="comment" id="comment" class="lc_textarea" required="required" /></textarea>
                                        </div>',
                    'class_submit' => 'lc_commentBtn'
                    ); 
    comment_form($args);
	?>

				</div>
			</div>
		</div>
	</div>

</div>
<?php wp_enqueue_script( 'comment-reply' ); ?>
