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

	<?php if ( ( is_search() ) || ( is_archive() ) || ( is_home() ) ) : ?>
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
