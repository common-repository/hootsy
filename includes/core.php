<?php

// Register settings
function Hootsy_register_settings()
{
  register_setting( 'Hootsy_settings_group', 'Hootsy_settings' );
}
add_action( 'admin_init', 'Hootsy_register_settings' );

// Delete options on uninstall
function Hootsy_uninstall()
{
  delete_option( 'Hootsy_settings' );
}
register_uninstall_hook( __FILE__, 'Hootsy_uninstall' );


?>
