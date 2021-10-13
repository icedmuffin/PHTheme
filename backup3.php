<?php /* Template Name: Fajrul */ ?>

<?php get_header(); ?>


<?php
global $post;
$post_slug = $post->post_name; ?>
<div class="kategori-judul">
    <h2> <?php echo the_title(); ?> </h2>
    <p> <?php echo the_content(); ?> </p>
</div>

<?php $the_query = new WP_Query(
    array(
        'posts_per_page' => '2',
        'post_type' => 'post',
        'category' => '',
        'category_name' => $post_slug,
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1
    )
);
?>



<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
    <small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>

    <div class="entry">
        <img src="<?php echo catch_that_image() ?>">
        <?php the_excerpt();  ?>

        <p class="postmetadata"><?php
                                ?></p>
    </div>
<?php
endwhile; ?>
<div class="pagination">
    <?php
    $big = 999999999; // need an unlikely integer
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $the_query->max_num_pages
    ));

    wp_reset_postdata(); ?>
</div>


<?php get_footer(); ?>