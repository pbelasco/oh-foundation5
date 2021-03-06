<?php
/**
 * Template Name: Full Width
 *
 * This Full Width template removes the primary and secondary asides so that content
 * can be displayed the entire width of the #content area.
 *
 * @package cleanyetibasic
 * @subpackage Templates
 */

	// calling the header.php
	get_header();

	// action hook for placing content above #container
	cleanyetibasic_abovecontainer();

		// action hook for inserting content above #content
		cleanyetibasic_abovecontent();

		// filter for manipulating the element that wraps the content
		echo apply_filters( 'cleanyetibasic_open_id_content', '<div id="content">' . "\n\n" );


		// start the loop
		while ( have_posts() ) : the_post();

			// action hook for inserting content above #post
			cleanyetibasic_abovepost();
			?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

				<?php

			// creating the post header
			cleanyetibasic_postheader();
			?>

					<div class="entry-content">

			<?php

			cleanyetibasic_insert_featured_image();

			the_content( cleanyetibasic_more_text() );

			if ( function_exists( 'cleanyetibasic_numerical_link_pages' )) {
				    cleanyetibasic_numerical_link_pages( array (
                        'before' => sprintf('<div class="pagination-centered"><ul class="page-numbers">%s', __('<li class="unavailable">Pages:<li>', 'cleanyetibasic')),
						'after'  => '</ul></div>'
                    ));
                } else {
                    wp_link_pages();
                }
			echo cleanyetibasic_pageeditlink();
			?>

					</div>

				</div><!-- .post -->

				<?php
				// calls the do_action for inserting content below #post
				cleanyetibasic_belowpost();
				
				cleanyetibasic_comments_template();

		// end loop
		endwhile;

	        ?>

			</div><!-- #content -->

			<?php
				// action hook for inserting content below #content
				cleanyetibasic_belowcontent();
			?>
		</div><!-- #container -->

<?php
	// action hook for placing content below #container
	cleanyetibasic_belowcontainer();

	// calling footer.php
	get_footer();
?>