<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package SPOPPIN WordPress theme
 */

// Retunr if full width or full screen.
if ( in_array( SPOPPIN_post_layout(), array( 'full-screen', 'full-width' ), true ) ) {
	return;
} ?>

<?php do_action( 'ocean_before_sidebar' ); ?>

<aside id="right-sidebar" class="sidebar-container widget-area sidebar-primary"<?php SPOPPIN_schema_markup( 'sidebar' ); ?> role="complementary" aria-label="<?php esc_attr_e( 'Primary Sidebar', 'SPOPPIN' ); ?>">

	<?php do_action( 'ocean_before_sidebar_inner' ); ?>

	<div id="right-sidebar-inner" class="clr">

		<?php
		$sidebar = SPOPPIN_get_sidebar();
		if ( $sidebar ) {
			dynamic_sidebar( $sidebar );
		}
		?>

	</div><!-- #sidebar-inner -->

	<?php do_action( 'ocean_after_sidebar_inner' ); ?>

</aside><!-- #right-sidebar -->

<?php do_action( 'ocean_after_sidebar' ); ?>
