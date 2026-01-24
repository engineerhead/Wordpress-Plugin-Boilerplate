<?php

/**
 * Plugin Name: Cloudusk Boilerplate
 * Description: A boilerplate for WordPress plugins.
 * Version: 0.0.1
 * Author: Umair Bussi
 * Author URI: https://cloudusk.com
 * License: GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

require_once __DIR__ . '/vendor/autoload.php';

use ClouduskBoilerplate\DI\ContainerBuilderFactory;
use ClouduskBoilerplate\Plugin;

$ClouduskBoilerplateContainer = ContainerBuilderFactory::build();
$ClouduskBoilerplatePlugin = new Plugin($ClouduskBoilerplateContainer);
$ClouduskBoilerplatePlugin->boot();
