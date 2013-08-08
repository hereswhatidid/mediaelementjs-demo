<?php
/**
 * Represents the view for the administration dashboard.
 *
 * This includes the header, options, and other information that should provide
 * The User Interface to the end user.
 *
 * @package   MediaElement_Demo
 * @author    Gabe Shackle <gabe@hereswhatidid.com>
 * @license   GPL-2.0+
 * @link      http://hereswhatidid.com
 * @copyright 2013 Gabe Shackle
 */
?>
<div class="wrap">
	<?php screen_icon(); ?>
	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
	<?php settings_errors(); ?>
	<p><a href="https://github.com/hereswhatidid/mediaelementjs-demo"><?php _e( 'Plugin Documentation', $this->plugin_slug ); ?></a></p>
	<form method="post" action="options.php">
		<?php settings_fields( $this->plugin_screen_hook_suffix ); ?>
		<?php do_settings_sections( $this->plugin_screen_hook_suffix );	?>
		<?php submit_button(); ?>
		</form>
</div>
