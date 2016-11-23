<aside class="site-content--quote-request">
    <a href="javascript:;"><?php _e( '&#xf095; Contact Us', 'apm' ); ?></a>

    <section>
        <h3><?php the_field( 'quote-title', 'options' ); ?></h3>

        <?php echo ninja_forms_display_form( get_field( 'quote-form',' options' ) ); ?>
    </section>
</aside>