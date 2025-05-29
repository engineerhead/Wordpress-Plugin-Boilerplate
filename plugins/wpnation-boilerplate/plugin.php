<?php

/**
 * Plugin Name: WPNation Boilerplate
 * Description: A boilerplate for WordPress plugins.
 * Version: 0.0.1
 * Author: Umair Bussi
 * Author URI: https://umairbussi.com
 * License: GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

require_once __DIR__ . '/vendor/autoload.php';

use WPNBoilerplate\Core\ContainerBuilderFactory;
use WPNBoilerplate\Plugin;

$container = ContainerBuilderFactory::build();
$plugin = new Plugin($container);
$plugin->boot();
