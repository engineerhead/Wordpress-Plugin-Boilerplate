<?php

namespace WPNBoilerplate\Admin;

use WPNBoilerplate\Admin\AdminPageRenderer;

class AdminMenuRegistrar
{
    public function __construct(protected AdminPageRenderer $renderer) {}

    public function register(): void
    {
        add_menu_page(
            'WPNBoilerplate',
            'WPNBoilerplate',
            'manage_options',
            'myplugin_wpnboilerplate',
            [$this->renderer, 'render'],
            'dashicons-admin-generic',
            20
        );
    }
}
