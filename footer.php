
            <?php if ( !get_field( 'hide-quote-request' ) ) : ?>
            <?php get_template_part( 'parts/content', 'request_quote' ); ?>
            <?php endif; ?>
        </main>

		<?php get_template_part( 'parts/footer', 'content' ); ?>

        <?php wp_footer(); ?>

        <?php echo get_field( 'code-footer', 'options' ); ?>
    </body>
</html>
