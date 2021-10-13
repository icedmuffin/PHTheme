<?php get_header(); ?>

<?php $the_query = new WP_Query(
    array(
        'posts_per_page' => '3',
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1
    )
);
?>


<main>
    <h1 class="hasil-pencarian">Keprofesian</h1>
    <?php
    if (have_posts()) : ?>



        <?php

        // The Loop
        while (have_posts()) : the_post(); ?>
            <h2>
                <a href="<?php the_permalink() ?>" rel="bookmark">
                    <?php the_title(); ?>
                </a>
            </h2>
            <small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>

            <div class="entry">
                <img src="<?php echo catch_that_image() ?>">
                <?php the_excerpt();  ?>


                <p class="postmetadata"><?php
                                        ?></p>
            </div>

        <?php endwhile; // End Loop

    else : ?>
        <p>Maaf, postingan yang Anda cari ada</p>
    <?php endif; ?>
    <div class="pagination">
        <?php
        global $wp_query;
        $big = 999999999; // need an unlikely integer
        echo paginate_links(array(
            'base' => str_replace($big, '%#%', get_pagenum_link($big)),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $the_query->max_num_pages
        ));
        wp_reset_postdata();
        ?>
    </div>

</main>





<?php get_footer(); ?>