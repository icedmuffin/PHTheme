<section class="container-fluid keprofesian">

    <h2>
        Hasil Pencarian
    </h2>
    <div class="profesi-space">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

                <div class="profesi-kotak">
                    <div class="profesi-gambar">
                        <!-- catch image -->
                        <img src="<?php echo catch_that_image() ?>">
                    </div>
                    <div class="profesi-tulisan">
                        <section class="profesi-judul">
                            <h3>
                                <a href="<?php the_permalink() ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                        </section>
                        <section class="profesi-paragraf">
                            <!-- content - 250 word -->

                            <?php echo get_excerpt(250) ?>

                        </section>
                    </div>
                </div>

            <?php endwhile;
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


    </div>
</section>