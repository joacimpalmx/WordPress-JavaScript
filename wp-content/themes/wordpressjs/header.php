<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width">
        <title><?php bloginfo('name'); ?></title>
		<?php wp_head(); ?>
	</head>
	
<body <?php body_class(); ?>>

	<img class="toggle" src="<?php echo get_template_directory_uri(); ?>/images/toggle.png">
		<div class="sidebar_menu">
		<i class="fa fa-times"></i>

			<!-- sidebar logo -->
			<section>
        <h1 class="boxed_item">WordPress <span class="logo_bold">Site</span></h1>
			<h2 class="logo_title">Custom made by Joacim Palm</h2>
        </section> <!-- /sidebar logo -->

			<nav class="site-nav">
				
				<?php
				
				$args = array(
					'theme_location' => 'primary'
				);
				
				?>
				
				<?php wp_nav_menu(  $args ); ?>
			</nav>
			<section>
            <a href="http://localhost/wordpress/wp-admin/"><h1 class="boxed_item boxed_item_smaller"><i class="fa fa-user"></i> LOGIN</h1></a>
        </section>
			</div>
	
	<div class="container">
	
		<!-- site-header -->
		<header class="site-header">
			
			<!-- hd-search -->
			<div class="hd-search">
                <?php get_search_form(); ?>
			</div><!-- /hd-search -->
			
			
			<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
			<h5><?php bloginfo('description'); ?> <?php if (is_page('portfolio')) { ?>
				- Thank you for viewing our work
			<?php }?></h5>
			
		</header><!-- /site-header -->