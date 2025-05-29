<?php

namespace WPNBoilerplate\Admin;

class AdminPageRenderer
{
    public function render(): void
    {

        echo '<div id="wpnboilerpalte-admin-root"></div>';



        wp_enqueue_script(
            'wpnboilerplate-admin',
            plugin_dir_url(__DIR__) . '../admin/build/main.js',
            ['react-jsx-runtime', 'wp-element'],
            null,
            true
        );
    }
}
