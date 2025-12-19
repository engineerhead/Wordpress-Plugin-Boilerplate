<?php

namespace ClouduskBoilerplate\Admin;

use ClouduskBoilerplate\Admin\PageRenderer;

class MenuRegistrar
{
    public function __construct(protected PageRenderer $renderer) {}
    public function register(): void
    {
        add_menu_page(
            'ClouduskBoilerplate',
            'ClouduskBoilerplate',
            'manage_options',
            'ClouduskBoilerplate',
            [$this->renderer, 'render'],
            'dashicons-admin-generic',
            20
        );
    }
}
