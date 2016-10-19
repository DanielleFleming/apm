<?php
    if ( ( isset( $instance[ 'faqs' ] ) ) && ( is_array( $instance[ 'faqs' ] ) ) && ( count( $instance[ 'faqs' ] ) ) ) :
        ?>
        <ul>
            <?php
                foreach ( $instance[ 'faqs' ] as $faq ) :
                    ?>
                    <li>
                        <h3 class="question"><?php echo $faq[ 'question' ]; ?></h3>
                        <div class="answer">
                            <?php echo wpautop( $faq[ 'answer' ] ); ?>
                        </div>
                    </li>
                    <?php
                endforeach;
            ?>
        </ul>
        <?php
    endif;
?>