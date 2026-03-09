<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
// For shared hosting (when you upload the whole project into the webroot),
// the `vendor` and `bootstrap` directories will be at the same level as this file.
// We try the normal path first, then fall back to the same-directory path.
if (file_exists(__DIR__.'/../vendor/autoload.php')) {
    require __DIR__.'/../vendor/autoload.php';
    /** @var Application $app */
    $app = require_once __DIR__.'/../bootstrap/app.php';
} else {
    // Fallback for shared hosts where `index.php` is in the webroot and
    // the whole project is uploaded side-by-side with `index.php`.
    require __DIR__.'/vendor/autoload.php';
    /** @var Application $app */
    $app = require_once __DIR__.'/bootstrap/app.php';
}

$app->handleRequest(Request::capture());
