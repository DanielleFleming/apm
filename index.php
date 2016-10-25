<?php
	get_header();

	?>
	<section class="container-fluid site-content">
		<div class="row">
			<article class="col-md-8 site-content--primary" role="article">
				<?php
					get_template_part( 'parts/title', 'all' );
					get_template_part( 'parts/breadcrumbs', 'all' );
					get_template_part( 'parts/content', 'blog_before' );

					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							get_template_part( 'parts/content', get_post_format() );
						endwhile;
					else :
						get_template_part( 'parts/content', 'none' );
					endif;

					if ( is_search() ) :
						?>
						<div class="search-wrapper">
							<h3><?php _e( 'Refine Your Search', 'apm' ); ?></h3>
							<?php get_search_form(); ?>
						</div>
						<?php
					endif;
				?>
			</article>
			<aside class="col-md-4 site-content--sidebar" role="complementary">
				<?php dynamic_sidebar( ( ( is_search() ) ? 'sidebar-search' : 'sidebar-default' ) ); ?>
			</aside>
		</div>

		<div class="row">
			<section class="col-md-12" role="complementary">
				<?php dynamic_sidebar( 'sidebar-default-after' ); ?>
			</section>
		</div>
	</section>
	<?php
	get_footer();
?>
