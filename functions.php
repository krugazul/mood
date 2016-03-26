<?php
/**
 * Functions
 */

/**
 * Enqueues the parent and the child theme styles.
 *
 * @package 	mood
 * @subpackage	setup
 * @category	scripts
 */
function mood_scripts() {
	//wp_enqueue_style( 'lsx-styles', get_template_directory_uri() . '/style.css');
	//wp_enqueue_style( 'lsx-child-styles', get_stylesheet_directory_uri() . '/style.css',array('lsx-styles'));
	
	wp_enqueue_script( 'mood-script', get_stylesheet_directory_uri() . '/assets/js/scripts.js',array('jquery','mood_script'));
}
add_action( 'wp_enqueue_scripts', 'mood_scripts' );

/**
 * Overwrites the parent nav menu function
 *
 * @package 	mood
 * @subpackage	template tags
 * @category	menu
 */
function lsx_nav_menu(){
	$nav_menu = get_theme_mod('nav_menu_locations',false);

    if(false != $nav_menu && isset($nav_menu['primary']) && 0 != $nav_menu['primary']){ ?>
		<nav class="primary-navbar collapse navbar-collapse" role="navigation">
	    	<?php
			wp_nav_menu( array(
				'menu' => $nav_menu['primary'],
				'depth' => 2,
				'container' => false,
				'menu_class' => 'nav navbar-nav',
				'walker' => new lsx_bootstrap_navwalker())
			);
			?>
	   		</nav>
    <?php } elseif(is_customize_preview()) { ?>
    		<nav class="primary-navbar collapse navbar-collapse" role="navigation">
    			<div class="alert alert-info" role="alert"><?php _e('Create a menu and assign it here via the "Navigation" panel.','mood');?></div>
    		</nav>
  	<?php }
}

/**
 * Overwrites the footer sidebar area
 *
 * @package 	mood
 * @subpackage	template tags
 * @category	widgets
 */
function lsx_add_footer_sidebar_area() {
	if ( is_active_sidebar( 'sidebar-footer-cta' ) ) : ?>
		<section id="footer-cta">
			<div class="container">
				<div class="lsx-full-width-alt">
					<div class="lsx-hero-unit">
						<?php dynamic_sidebar( 'sidebar-footer-cta' ); ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<section id="footer-widgets">
		<div class="container">
			<div class="row">
				<?php dynamic_sidebar( 'sidebar-footer' ); ?>
			</div>
		</div>
	</section>
	<?php
}	
