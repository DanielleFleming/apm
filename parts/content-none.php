<div class="alert alert-danger">
    <p>
        <?php if ( is_search() ) : ?>
            <?php _e( 'Sorry, but nothing was found with the search criteria you entered.', 'apm' ); ?>
        <?php else : ?>
            <?php _e( 'Nothing was found.', 'apm' ); ?>
        <?php endif; ?>
    </p>
</div>
