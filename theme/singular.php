<?php
/**
 * The template for displaying all pages, single posts and attachments
 *
 * This is a new template file that WordPress introduced in
 * version 4.3.
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
