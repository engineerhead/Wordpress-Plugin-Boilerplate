<?php

namespace WPNBoilerplate\Admin;

use WPNBoilerplate\Admin\PageRenderer;

class MenuRegistrar
{
    public function __construct(protected PageRenderer $renderer) {}
    public function register(): void
    {
        add_menu_page(
            'WPNBoilerplate',
            'WPNBoilerplate',
            'manage_options',
            'wpnboilerplate',
            [$this->renderer, 'render'],
            'dashicons-admin-generic',
            20
        );
    }
}
