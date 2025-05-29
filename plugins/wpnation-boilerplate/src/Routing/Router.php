<?php

namespace WPNBoilerplate\Routing;

use WPNBoilerplate\Admin\AdminMenuRegistrar;

class Router
{
    public function __construct(protected AdminMenuRegistrar $adminMenuRegistrar) {}
    public function register()
    {
        $this->adminMenuRegistrar->register();
    }
}
