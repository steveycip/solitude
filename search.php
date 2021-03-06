<?php
/**
 * The template for displaying search results pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Merlin
 */
 
get_header(); 

// Get Theme Options from Database
$theme_options = merlin_theme_options();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
			<?php if ( function_exists( 'themezee_breadcrumbs' ) ) themezee_breadcrumbs(); ?>
			
			<header class="page-header">
				
				<h1 class="archive-title"><?php printf( esc_html__( 'Search Results for: %s', 'merlin' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				
			</header><!-- .page-header -->
			
		<?php 
		if (have_posts()) : 
		
			while (have_posts()) : the_post();
	
				if ( 'post' == get_post_type() ) :
		
					get_template_part( 'template-parts/content', $theme_options['post_content'] );
				
				else :
				
					get_template_part( 'template-parts/content', 'search' );
					
				endif;
		
			endwhile;

			// Display Pagination	
			merlin_pagination();

		else : ?>

			<div class="no-matches type-page">
				
				<header class="entry-header">
		
					<h2 class="page-title"><?php esc_html_e( 'No matches', 'merlin' ); ?></h2>
					
				</header><!-- .entry-header -->
				
				<div class="entry-content">
					
					<p><?php esc_html_e( 'Please try again, or use the navigation menus to find what you search for.', 'merlin' ); ?></p>
					
					<?php get_search_form(); ?>
				
				</div>
				
			</div>

		<?php endif; ?>
			
		</main><!-- #main -->
	</section><!-- #primary -->
	
	<?php get_sidebar(); ?>
	
<?php get_footer(); ?>