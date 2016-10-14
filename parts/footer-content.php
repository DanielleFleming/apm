<footer class="container-fluid" role="complementary">
    <?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
        <section class="row">
            <div class="col-lg-12">
                <?php dynamic_sidebar( 'sidebar-footer' ); ?>
            </div>
        </section>
    <?php endif; ?>

    <?php get_template_part( 'parts/footer', 'navigation' ); ?>

    <section class="row">
        <div class="col-lg-12 text-center">
            <p class="copyright">
                <?php
                    echo sprintf(
                        __( '&copy; AP+M %d. We value your <a href="%s">privacy</a>. Website by <a href="%s" target="_blank">Dream Factory</a>.', 'apm' ),
                        date( 'Y' ),
                        get_field( 'footer-privacy', 'options' ),
                        'http://dreamfactoryagency.com/'
                    );
                ?>
            </p>
            <p>
                <small>
                    <?php the_field( 'footer-epilogue', 'options' ); ?>
                </small>
            </p>
        </div>
    </section>
</footer>
