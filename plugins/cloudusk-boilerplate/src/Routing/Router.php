<?php

namespace ClouduskBoilerplate\Routing;

use ClouduskBoilerplate\Admin\MenuRegistrar;

class Router
{
    public function __construct(protected MenuRegistrar $adminMenuRegistrar) {}
    public function register()
    {
        $this->adminMenuRegistrar->register();
    }
}
