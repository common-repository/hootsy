<?php

// Add the Hootsy Javascript
add_action('wp_enqueue_scripts', 'add_hootsy');

// The guts of the Hootsy script
function add_hootsy()
{
  // Ignore admin, feed, robots or trackbacks
  if ( is_feed() || is_robots() || is_trackback() )
  {
    return;
  }

  $options = get_option('Hootsy_settings');

  // If options is empty then exit
  if( empty( $options ) )
  {
    return;
  }

  // Check to see if Hootsy is enabled
  if ( esc_attr( $options['hootsy_enabled'] ) == "on" )
  {
    $hootsy_org = esc_attr($options['hootsy_org']);

    // Insert tracker code
    if ( '' != $hootsy_org )
    {
      $output="window.hootsySettings= { orgId: '$hootsy_org' }";
      wp_enqueue_script("hootsy", plugins_url( '/js/hootsy-embed.js', __FILE__ ), array(), "", true);
      wp_add_inline_script("hootsy", $output, "before");
    }
  }
}
?>