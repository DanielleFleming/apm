<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <div class="entry-meta">
            <time>
                <?php if ( get_post_type() === 'post' ) : ?>
                    <?php echo get_the_date( 'm/y' ); ?>
                <?php else : ?>
                    <?php _e( 'PAGE', 'apm' ); ?>
                <?php endif; ?>
            </time>
        </div>

        <?php if ( !is_single() ) : ?>
            <h3 class="entry-title">
                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
            </h3>
		<?php endif; ?>
	</header>

	<?php if ( get_post_type() === 'product' ) : ?>
		<?php global $product; ?>
		<div class="row">
			<div class="product-button">
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>
				<?php if ( $image ) : ?>
					<div class="part-image col-md-3 col-xs-12 col-sm-6">

				    <a href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>" class="img-responsive"></a>

					</div>
				<?php else : ?>
					<div class="part-image col-md-3 col-xs-12 col-sm-6">

				    <a href="<?php the_permalink(); ?>"><img src="http://apm4parts.com/wp-content/uploads/parts-placeholder.jpg" class="img-responsive"></a>

					</div>
				<?php endif; ?>

				<div class="clearfix visible-sm visible-xs"></div>
				<div class="entry-summary col-md-9">
						<?php echo improved_trim_excerpt(); ?> <br>
						<a class="view-part" href="<?php the_permalink(); ?>">View Part</a>
				</div>
			</div>
		</div>
	<?php elseif ( ( is_search() ) || ( is_archive() ) || ( is_home() ) ) : ?>
        <div class="entry-summary">
            <?php echo get_the_excerpt(); ?>

            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php _e( 'Read More', 'apm' ); ?></a>
        </div>
	<?php else : ?>
        <div class="entry-content">
            <?php
                the_content( sprintf(
                    __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'apm' ),
                    the_title( '<span class="screen-reader-text">', '</span>', false )
                ) );
            ?>
        </div>
	<?php endif; ?>
</div>
