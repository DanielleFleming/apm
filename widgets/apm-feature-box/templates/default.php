<h2 class="title"><?php echo $instance[ 'content' ][ 'title' ]; ?></h2>
<div class="content">
    <?php echo wpautop( $instance[ 'content' ][ 'content' ] ); ?>
    <a href="<?php echo sow_esc_url( $instance[ 'linkage' ][ 'linkage' ] ); ?>" target="<?php echo $instance[ 'linkage' ][ 'target' ]; ?>" class="btn btn-tertiary"><?php echo $instance[ 'linkage' ][ 'text' ]; ?></a>
</div>
