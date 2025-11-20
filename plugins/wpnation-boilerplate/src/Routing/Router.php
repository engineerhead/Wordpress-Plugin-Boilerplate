<?php

namespace WPNBoilerplate\Routing;

use WPNBoilerplate\Admin\MenuRegistrar;

class Router
{
    public function __construct(protected MenuRegistrar $adminMenuRegistrar) {}
    public function register()
    {
        $this->adminMenuRegistrar->register();
    }
}
