<?php

namespace UrlShorter;

use \UrlShorter\Common\Kernel;
use \UrlShorter\Common\Router\Router;
use \UrlShorter\Common\Http\Request;

require __DIR__.'/../vendor/autoload.php';

const CONTROLLER_NAMESPACE = __NAMESPACE__ . '\\Controller';

$kernel = new Kernel(new Router(CONTROLLER_NAMESPACE));
$res = $kernel->handle(new Request(
        $_SERVER['REQUEST_URI'],
        $_GET,
        $_POST,
        $_COOKIE,
        $_FILES,
        $_SERVER
    )
);
echo $res;
?>