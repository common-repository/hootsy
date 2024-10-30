<?php

// Create a option page for settings
add_action('admin_menu', 'add_hootsy_option_page');

// Add top-level admin bar link
add_action('admin_bar_menu', 'add_hootsy_link_to_admin_bar', 999);

// Adds Hootsy link to top-level admin bar
function add_hootsy_link_to_admin_bar()
{
  global $wp_version;
  global $wp_admin_bar;

  $hootsy_icon = '<img src="' . HOOTSY_PATH . '/assets/hootsy-icon-16x16-white.png' . '">';

  $args = array(
    'id' => 'hootsy-admin-menu',
    'title' => '<span class="ab-icon" ' . '' . '>' . $hootsy_icon . '</span><span class="ab-label">Hootsy</span>', // alter the title of existing node
    'parent' => FALSE,   // set parent to false to make it a top level (parent) node
    'href' => get_bloginfo('wpurl') . '/wp-admin/admin.php?page=hootsy-menus.php',
    'meta' => array('title' => 'Hootsy')
  );

  $wp_admin_bar->add_node($args);
}

// Hook in the options page functionality
function add_hootsy_option_page()
{
  add_options_page('Hootsy Options', 'Hootsy', 'activate_plugins', basename(__FILE__), 'hootsy_options_page');
}

?>
