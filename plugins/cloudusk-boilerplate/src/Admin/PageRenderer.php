<?php

namespace ClouduskBoilerplate\Admin;

class PageRenderer
{
    public function render(): void
    {

        $asset_file = plugin_dir_path(__FILE__) . '../../admin/build/main.asset.php';

        if (! file_exists($asset_file)) {
            echo 'Asset file does not exist: ' . $asset_file;
            return;
        }

        $asset = include $asset_file;

        wp_enqueue_script(
            'unadorned-announcement-bar-script',
            plugin_dir_url(__DIR__) . '../admin/build/main.js',
            $asset['dependencies'],
            $asset['version'],
            array(
                'in_footer' => true,
            )
        );

        wp_enqueue_style('wp-components');
    }
}
