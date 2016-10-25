<?php
    if ( ( isset( $instance[ 'items' ] ) ) && ( is_array( $instance[ 'items' ] ) ) && ( count( $instance[ 'items' ] ) ) ) :
        if ( ( isset( $instance[ 'title' ] ) ) && ( strlen( $instance[ 'title' ] ) ) ) :
            ?>
            <h2 class="title"><?php echo $instance[ 'title' ]; ?></h2>
            <?php
        endif;

        $accordion_id   = 'accordion-' . uniqid();
        ?>
        <div class="panel-group" id="<?php echo $accordion_id; ?>" role="tablist" aria-multiselectable="true">
            <?php
                $counter    = 0;

                foreach ( $instance[ 'items' ] as $item ) :
                    $heading_id     = 'accordion-heading-' . uniqid();
                    $section_id     = 'accordion-section-' . uniqid();
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="<?php echo $heading_id; ?>">
                            <h3 class="panel-title">
                                <a role="button" class="<?php echo ( ( $counter > 0 ) ? ' collapsed' : '' ); ?>" data-toggle="collapse" data-parent="#<?php echo $accordion_id; ?>" href="#<?php echo $section_id; ?>" aria-expanded="<?php echo ( ( $counter === 0 ) ? 'true' : 'false' ); ?>" aria-controls="collapseOne">
                                    <?php echo $item[ 'title' ]; ?>
                                </a>
                            </h3>
                        </div>
                        <div id="<?php echo $section_id; ?>" class="panel-collapse collapse<?php echo ( ( $counter === 0 ) ? ' in' : '' ); ?>" role="tabpanel" aria-labelledby="<?php echo $heading_id; ?>">
                            <div class="panel-body">
                                <?php echo wpautop( $item[ 'content' ] ); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    //$counter++;
                endforeach;
            ?>
        </div>
        <?php
    endif;
?>
