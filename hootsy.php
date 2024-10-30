<?php
 /**
 * Plugin Name: Hootsy
 * Plugin URI: https://www.hootsy.com
 * Description: Hootsy is the #1 proactive chat platform for sales and marketing.
 * Version: 1.0.0
 * Author: Hootsy
 * Author URI: https://www.hootsy.com/?ref=wordpress
 */

// Prevent Direct Access
defined('ABSPATH') or die("Restricted access!");

/*
* Define
*/
define('HOOTSY_VERSION', '1.0.0');
define('HOOTSY_DIR', plugin_dir_path(__FILE__));
define('HOOTSY_URL', plugin_dir_url(__FILE__));
defined('HOOTSY_PATH') or define('HOOTSY_PATH', untrailingslashit(plugins_url('', __FILE__)));

require_once(HOOTSY_DIR . 'includes/core.php');
require_once(HOOTSY_DIR . 'includes/hootsy-menus.php');
require_once(HOOTSY_DIR . 'includes/admin.php');
require_once(HOOTSY_DIR . 'includes/embed.php');


?>
