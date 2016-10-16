<?php
    /*
     * Template Name: Content with Sidebar
     */
?>
<?php
    get_header();

    get_template_part( 'parts/title', 'all' );
    get_template_part( 'parts/breadcrumbs', 'all' );
    get_template_part( 'parts/code', 'header' );
?>
    <section class="container site-content">
        <div class="row">
            <article class="col-md-8 site-content--primary" role="article">
                <?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            get_template_part( 'parts/content', 'page' );
                        endwhile;
                    else :
                        get_template_part( 'parts/content', 'none' );
                    endif;
                ?>
            </article>
            <aside class="col-md-4 site-content--sidebar" role="complementary">
                <?php dynamic_sidebar( 'sidebar-default' ); ?>
            </aside>
        </div>
    </section>
<?php
    get_footer();

    get_template_part( 'parts/code', 'footer' );
?>