<h2 class="title"><?php echo $instance[ 'title' ]; ?></h2>
<div class="content">
    <div class="content--inner">
        <div class="content--inner-text">
            <?php echo wpautop( $instance[ 'content' ] ); ?>
        </div>
        <div class="content--inner-image" style="background-image: url(<?php echo wp_get_attachment_image_url( $instance[ 'image' ], 'full' ); ?>);"></div>
    </div>
</div>