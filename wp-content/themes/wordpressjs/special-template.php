<?php

// Template Name: Special Layout

get_header();

// if we have posts, we want to loop through all our posts, if we don't have posts publish the else statement
if(have_posts()) :
    while(have_posts()) : the_post(); ?>

        <article class="post page">
            <h2><?php the_title();?></h2>

            <!--- info-box -->
            <div class="info-box">
                <h4>Disclaimer Title</h4>
                <p>
                Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. 
                Donec sollicitudin molestie malesuada. 
                Curabitur aliquet quam id dui posuere blandit. 
                Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                </p>
            </div><!-- /info-box -->

            <?php the_content(); ?>
        </article>

    <?php endwhile;

    else :
        echo "<p>No content found</p>";
    endif;

get_footer();

?>