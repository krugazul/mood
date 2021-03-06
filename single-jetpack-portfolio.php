<?php
/**
 * The template for displaying single portfolio posts
 *
 * @package mood
 */

get_header(); ?>

	<div id="primary" class="content-area single-portfolio col-sm-12">

		<?php lsx_content_before(); ?>

		<main id="main" class="site-main" role="main">

			<?php lsx_content_top(); ?>
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'portfolio-single' ); ?>

			<?php endwhile; ?>

		</main><!-- #main -->

		<?php lsx_content_after(); ?>
		
	</div><!-- #primary -->

<?php get_footer();