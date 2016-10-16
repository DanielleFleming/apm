<?php
    $link           = apm_link_postprocess( $instance[ 'linkage' ][ 'linkage' ] );
?>
<h2 class="title"><?php echo $instance[ 'content' ][ 'title' ]; ?></h2>
<div class="content">
    <?php echo wpautop( $instance[ 'content' ][ 'content' ] ); ?>
    <a href="<?php echo $link[ 'url' ]; ?>" target="<?php echo $instance[ 'linkage' ][ 'target' ]; ?>" class="btn btn-tertiary"><?php echo $instance[ 'linkage' ][ 'text' ]; ?></a>
</div>
