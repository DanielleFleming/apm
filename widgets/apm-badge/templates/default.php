<div class="content" style="background-color: <?php echo apm_color_postprocess( $instance[ 'bgcolor' ], $instance[ 'bgopacity' ] ); ?>;">
    <div class="content--inner">
        <div class="content--inner-badge"><img src="<?php echo wp_get_attachment_image_url( $instance[ 'image' ], 'full' ); ?>"></div>
        <div class="content--inner-text">
            <?php echo wpautop( $instance[ 'content' ] ); ?>
        </div>
    </div>
</div>