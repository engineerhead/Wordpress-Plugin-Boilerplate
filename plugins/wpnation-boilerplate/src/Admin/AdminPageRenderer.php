<?php

namespace WPNBoilerplate\Admin;

class AdminPageRenderer
{
    public function render(): void
    {

        echo '<div id="wpncommerce-admin-root"></div>';



        wp_enqueue_script(
            'wpncommerce-admin',
            plugin_dir_url(__DIR__) . '../admin/build/main.js',
            ['react-jsx-runtime', 'wp-element'],
            null,
            true
        );
    }
}
