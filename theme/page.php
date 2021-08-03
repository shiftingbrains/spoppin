<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package SPOPPIN WordPress theme
 */

get_header(); ?>

<section class="wrapper">
	<div class="container">
		<div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto mb-13">
		<?php the_content(); ?>

		</div>
	</div>
</section>


<?php get_footer(); ?>
