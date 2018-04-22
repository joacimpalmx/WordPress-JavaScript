<?php

get_header();

// if we have posts, we want to loop through all our posts, if we don't have posts publish the else statement
if(have_posts()) : ?>

<h2 id="search-results">Search results for: <?php the_search_query(); ?></h2>

<?php 
    while(have_posts()) : the_post();

    get_template_part('content', get_post_format() );

    endwhile;

    echo paginate_links();

    else :
        echo "<p>No content found</p>";
    endif;

get_footer();

?>