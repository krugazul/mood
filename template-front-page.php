<?php
/* Template Name: Mood Front Page */
/**
 * @package mood
 */

	get_header(); ?>
	
	<div id="primary" class="content-area front-page col-sm-12">
	
		<?php lsx_content_before(); ?>
		
		<main id="main" class="site-main" role="main">

			<?php lsx_content_top(); ?>		
			
			<?php if(have_posts()) : ?>
			
				<?php while ( have_posts() ) : the_post(); ?>
				
					<?php lsx_entry_before(); ?>

						<article id="leonies-personal-testimony" <?php post_class(); ?>>
	
							<div class="entry-content">
								<?php the_content(); ?>
								<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
							</div><!-- .entry-content -->
						
							<?php lsx_entry_bottom(); ?>
							
						</article><!-- #post-## -->
	
				<?php endwhile; // end of the loop. ?>			
			
			<?php endif; ?>	
				
			<?php lsx_content_bottom(); ?>
		
		</main><!-- #main -->
		
		<?php lsx_content_after(); ?>

	</div><!-- #primary -->
	
	
	</div><!-- .content -->
</div><!-- wrap -->	

<?php $portfolio_query = new WP_Query(array('post_type'=>'jetpack-portfolio','post_per_page'=>'50','post_status'=>'publish','nopagin'=>true)); 
if($portfolio_query->have_posts()) { ?>
	<div id="treatments" class="col-sm-12">
		<div class="filter-items-wrapper lsx-portfolio-wrapper">
				<div id="portfolio-infinite-scroll-wrapper" class="lsx-portfolio masonry">
					<?php while ( $portfolio_query->have_posts() ) { $portfolio_query->the_post(); ?>
						<?php get_template_part( 'content', 'portfolio' ); ?>
					<?php } ?>
					<br clear="all" />
				</div>
			
			<br clear="all" />	
		</div><!-- .portfolio-wrapper -->
	</div>
<?php wp_reset_postdata();} ?>	

<div class="wrap container" role="document">
	<div class="content role row">
		<div id="primary-bottom" class="content-area front-page col-sm-12">
			<main class="site-main" role="main">
			
				<section id="home-widgets">
				
					<?php $testimonial_query = new WP_Query(array('post_type'=>'jetpack-testimonial','post_per_page'=>'3','post_status'=>'publish')); 
					if($testimonial_query->have_posts()) { ?>				
					<aside id="testimonials" class="widget widget_testimonials">
						<h3 class="tcenter widget-title">TESTIMONIALS</h3>
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
						<p class="tcenter"><a class="read-more btn btn-default" href="<?php echo home_url('/testimonials/');?>" title="Read more of our testimonials" >Read More</a></p>
					</aside>
					<br clear="all" />	
					<?php wp_reset_postdata();} ?>
					
					<div id="get-in-touch">
					<?php if ( ! dynamic_sidebar( 'sidebar-home' ) ) : ?>
					<?php endif; // end sidebar widget area ?>
					</div>					
					
				</section>			
			
			</main><!-- #main -->
		</div><!-- #primary -->
	
<?php get_footer();