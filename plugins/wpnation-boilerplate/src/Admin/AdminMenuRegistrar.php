<?php

namespace WPNBoilerplate\Admin;

use WPNBoilerplate\Admin\AdminPageRenderer;

class AdminMenuRegistrar
{
    public function __construct(protected AdminPageRenderer $renderer) {}

    public function register(): void
    {
        add_menu_page(
            'Products',
            'Products',
            'manage_options',
            'myplugin_products',
            [$this->renderer, 'render'],
            'dashicons-products',
            20
        );
    }
}
