<?php
	get_header();

	get_template_part( 'parts/code', 'header' );
	get_template_part( 'parts/title', 'all' );
	get_template_part( 'parts/breadcrumbs', 'all' );
	?>
	<section class="container-fluid site-content">
		<div class="row">
			<article class="col-lg-12 site-content--primary" role="article">
				<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							get_template_part( 'parts/content', 'page' );
						endwhile;
					else :
						get_template_part( 'parts/content', 'none' );
					endif;
				?>
			</article>
		</div>
	</section>
	<?php
	get_footer();

	get_template_part( 'parts/code', 'footer' );
?>