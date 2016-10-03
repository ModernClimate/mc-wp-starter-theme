<?php
/**
 * Template part for displaying the entry footer.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AD Starter
 */
?>

<footer class="entry__footer">
	<?php
	hybrid_post_terms( [
		'taxonomy' => 'category',
		'text'     => __( 'Posted in: %s', 'ad-starter' )
	] );

	edit_post_link( __( 'Edit', 'ad-starter' ), '<span class="edit-link">', '</span>' );
	?>
</footer><!-- /.entry__footer -->