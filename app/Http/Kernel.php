<?php

namespace App\Http;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
class Kernel extends HttpKernel{
    protected $routeMiddleware = [
        'auth' => 'App\Http\Middleware\Authenticate',
        'admin' => 'App\Http\Middleware\Admin',
    ];
}

