<?php

get_header(); ?>

<script src="/js/menu.js"></script>
<link rel="stylesheet" href="style.css">

<!-- Site content -->
<div class="site-content clearfix">

    <!-- Main column -->
    <div class="main-column">

        <?php if (current_user_can('administrator')) : ?> <!-- quick-add-post sektionen på bloggen syns bara om man har rättighet till det och är inloggad, annars syns den inte tackvare denna kod -->
        <div class="admin-quick-add">
            <h3>Quick Add Post</h3>
            <input type="text" name="title" placeholder="Title">
            <textarea name="content" placeholder="Content"></textarea>
            <button id="quick-add-button">Create Post</button>
        </div>
        <?php endif; ?>


    <!-- if we have posts, we want to loop through all our posts, if we don't have posts publish the else statement -->
        <?php if(have_posts()) :
        while(have_posts()) : the_post();

        get_template_part('content', get_post_format() );

        endwhile;

        // Shows how many pages there are and outputs previous and next page links
        echo paginate_links();


        else :
            echo "<p>No content found</p>";
        endif; ?>
    </div>
    <!-- /Main column -->

<?php get_sidebar(); ?>

</div>
<!-- /Site content -->

<?php get_footer();

?>



