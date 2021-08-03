<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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

