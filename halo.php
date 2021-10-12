<form class="d-flex" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn cari" type="submit" id="searchsubmit" value="<?php echo esc_attr_x('Search', 'submit button'); ?>">Search</button>
</form>