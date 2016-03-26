<?php
/* Template Name: Testimonials */
/**
 * @package mood
 */

get_header(); ?>

	<div id="primary" class="content-area <?php echo lsx_main_class(); ?>">

		<?php lsx_content_before(); ?>

		<main id="main" class="site-main" role="main">

			<?php lsx_content_top(); ?>

			<?php while ( have_posts() ) : the_post(); ?>
					
				<?php lsx_entry_before(); ?>
					
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<?php lsx_entry_top(); ?>
				
					<header class="page-header">
						<h1 class="page-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->
					
					<?php 
					$testimonial_query = new WP_Query(array('post_type'=>'jetpack-testimonial','post_per_page'=>'3','post_status'=>'publish')); 
						if($testimonial_query->have_posts()) { ?>				
						<div class="widget widget_testimonials">
							<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="6000">
							
								<?php 
									$testimonials_titles = array();
									$testimonials_content = array();
								?>
								
								<?php 
								$counter = 0;
								$active = 'active';
								while ( $testimonial_query->have_posts() ) { $testimonial_query->the_post(); 
									$testimonials_titles[] = '<li data-target="#myCarousel" data-slide-to="'.$counter.'" class="'.$active.'"></li>';
									$testimonials_content[] = "
									    <div class='item ".$active."'>
									      ".apply_filters('the_content',get_the_content())."
									    </div>";
									$active = '';
									$counter++;
								} ?>						
							
							  <!-- Wrapper for slides -->
							  <div class="carousel-inner" role="listbox">
							    <?php echo implode('',$testimonials_content);?>
							  </div>
							
							  <!-- Left and right controls -->
							  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
							    <span class="genericon genericon-leftarrow" aria-hidden="true"></span>
							  </a>
							  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
							    <span class="genericon genericon-rightarrow" aria-hidden="true"></span>
							  </a>
							</div>
						</div>	
					<?php wp_reset_postdata();	} ?>					
				
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
					</div><!-- .entry-content -->
					<?php edit_post_link( __( 'Edit', 'lsx' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
				
					<?php lsx_entry_bottom(); ?>
					
				</article><!-- #post-## -->
				
				<?php lsx_entry_after(); ?>

			<?php endwhile; // end of the loop. ?>
			
			<?php lsx_content_bottom(); ?>
			
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>	

		</main><!-- #main -->

		<?php lsx_content_after(); ?>
		
	</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer();