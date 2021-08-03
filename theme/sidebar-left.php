<?php
/**
 * The left sidebar containing the widget area.
 *
 * @package SPOPPIN WordPress theme
 */

?>

<?php do_action( 'ocean_before_sidebar' ); ?>

<aside id="left-sidebar" class="sidebar-container widget-area sidebar-secondary"<?php SPOPPIN_schema_markup( 'sidebar' ); ?> role="complementary" aria-label="<?php esc_attr_e( 'Secondary Sidebar', 'SPOPPIN' ); ?>">

	<?php do_action( 'ocean_before_sidebar_inner' ); ?>

	<div id="left-sidebar-inner" class="clr">

		<?php
		$sidebar = SPOPPIN_get_second_sidebar();
		if ( $sidebar ) {
			dynamic_sidebar( $sidebar );
		}
		?>

	</div><!-- #sidebar-inner -->

	<?php do_action( 'ocean_after_sidebar_inner' ); ?>

</aside><!-- #sidebar -->

<?php do_action( 'ocean_after_sidebar' ); ?>
