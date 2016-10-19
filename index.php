<?php
	get_header();

	get_template_part( 'parts/title', 'all' );
	get_template_part( 'parts/breadcrumbs', 'all' );
	?>
	<section class="container-fluid site-content">
		<div class="row">
			<article class="col-md-8 site-content--primary" role="article">
				<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							get_template_part( 'parts/content', get_post_format() );
						endwhile;
					else :
						get_template_part( 'parts/content', 'none' );
					endif;
				?>
			</article>
			<aside class="col-md-4 site-content--sidebar" role="complementary">
				<?php dynamic_sidebar( 'sidebar-default' ); ?>
			</aside>
		</div>
	</section>
	<?php
	get_footer();
?>