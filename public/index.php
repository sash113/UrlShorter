<?php

namespace UrlShorter;

use UrlShorter\Common\Http\Response;
use \UrlShorter\Common\Kernel;
use \UrlShorter\Common\Router\Router;
use \UrlShorter\Common\Http\Request;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../config/main.php';

const CONTROLLER_NAMESPACE = __NAMESPACE__ . '\\Controller';

$kernel = new Kernel(new Router(CONTROLLER_NAMESPACE));

/** @var Response $response */
$response = $kernel->handle(new Request(
        $_SERVER['REQUEST_URI'],
        $_GET,
        $_POST,
        $_COOKIE,
        $_FILES,
        $_SERVER
    )
);

$headers = $response->getHeaders();
foreach ($headers as $key => $header) {
    header(sprintf('%s: %s', $key, $header), false);
}

http_response_code($response->getCode());

echo $response->getBody();
?>