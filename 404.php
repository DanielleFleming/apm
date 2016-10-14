<?php
	get_header();
	?>
	<section class="container-fluid site-content">
		<div class="row">
			<article class="col-lg-12">
                <?php
                    get_template_part( 'parts/breadcrumbs', 'all' );
                
                ?>
                <h1><?php _e( '404 Not Found', 'apm' ); ?></h1>
                <p><?php _e( 'It looks like nothing was found at this location. Sorry about that!', 'apm' ); ?></p>
			</article>
		</div>
	</section>
	<?php
	get_footer();
?>
