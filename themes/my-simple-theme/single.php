<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package my-simple-theme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
<?php
$meta = get_post_meta( get_the_ID(), 'Sponsored Post' );
if( $meta[0] == 'Yes' ) {
?>
<p>This post is sponsored content, and we received a free copy of the product in order to conduct our review.</p>
<?php } ?>
			
		<?php
		while ( have_posts() ) :
			the_post();
 	
			$newfield = get_post_meta( get_the_ID(), 'newfield', true);
 	
	

			get_template_part( 'template-parts/content', get_post_type() );
	
			if( ! empty( $newfield ) ) {
		
				echo '<div class="customfield">My custom field: ' . $newfield . '</div>';
	
			}
			
			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		<?php 

		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
