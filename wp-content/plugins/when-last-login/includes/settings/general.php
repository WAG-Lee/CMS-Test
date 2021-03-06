<?php $settings = get_option( 'wll_settings' ); ?>

<?php if( isset( $settings['record_ip_address'] ) && $settings['record_ip_address'] == 1 ){ $checked = 1; } else { $checked = 0; } ?>
<table class="form-table">
	<tr>
		<th><h2><?php _e( 'Options' , 'when-last-login' ); ?></h2></th>
		<td></td>
	</tr>
	<tr>
		<th><?php _e( "Record user's IP address", "when-last-login" ); ?><br></th>
		<td><input type='checkbox' value='1' name='wll_record_user_ip_address' <?php checked( 1, $checked ); ?>/>
			<small><?php _e( 'This will anonymize the IP address to support GDPR regulations.', 'when-last-login' ); ?></small></td>
	</tr>

	<?php if( isset( $settings['show_all_login_records'] ) && $settings['show_all_login_records'] == 1 ){ $checked = 1; } else { $checked = 0; } ?>
	<tr>
		<th><?php _e('Enable "All Login Records"', 'when-last-login'); ?></th>
		<td><input type='checkbox' value='1' name='wll_all_login_records' <?php checked( 1, $checked ); ?>/></td>
	</tr>

	<tr>
		<th><h2><?php _e( 'Tools', 'when-last-login' ); ?></h2></th>
		<td></td>
	</tr>
	<!-- loaded from general.php -->
	<?php 
		$old_records_message = __( 'Are you sure you want to remove all records older than 3 months?', 'when-last-login' );
		$all_records_message = __( 'Are you sure you want to remove all login records?', 'when-last-login' );
		$all_ip_message = __( 'Are you sure you want to remove all IP addresses?', 'when-last-login' );
	?>

		<script>
			function wll_remove_old_records(){
				if( window.confirm('<?php echo $old_records_message; ?>')) {
					window.location.href = "<?php echo admin_url( 'admin.php?page=when-last-login-settings&remove_wll_records=1' ); ?>";
				}
			}

			function wll_remove_all_records(){
				if( window.confirm('<?php echo $all_records_message; ?>')) {
					window.location.href = "<?php echo admin_url( 'admin.php?page=when-last-login-settings&remove_all_wll_records=1' ); ?>";
				}
			}

			function wll_remove_all_ips(){
				if( window.confirm('<?php echo $all_ip_message; ?>')) {
					window.location.href = "<?php echo admin_url( 'admin.php?page=when-last-login-settings&remove_wll_ip_addresses=1' ); ?>";
				}
			}
	</script>

	<tr>
		<th><?php _e( 'Clear old logs', 'when-last-login' ); ?></th>
		<td><a href="javascript:void(0);" onclick="wll_remove_old_records(); return false;" class="button-primary"><?php _e( 'Run Now', 'when-last-login' ); ?></a></td>
	</tr>

	<tr>
		<th><?php _e( 'Clear all logs', 'when-last-login' ); ?></th>
		<td><a href="javascript:void(0);" onclick="wll_remove_all_records(); return false;" class="button-primary"><?php _e( 'Run Now', 'when-last-login' ); ?></a></td>
	</tr>

	<tr>
		<th><?php _e( 'Clear all IP Addresses', 'when-last-login' ); ?></th>
		<td><a href="javascript:void(0);" onclick="wll_remove_all_ips(); return false;" class="button-primary"><?php _e( 'Run Now', 'when-last-login' ); ?></a></td>
	</tr>

	<tr>
	    <th><input type="submit" name="wll_save_settings"  class="button-primary" value="<?php _e('Save Settings', 'when-last-login'); ?>" /></th>
	    <td></td>
	</tr>
</table>

