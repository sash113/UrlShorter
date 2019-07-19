<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 18.07.19
 * Time: 1:46
 */

namespace UrlShorter\Common;

use UrlShorter\Common\Http\Request;
use UrlShorter\Common\Http\Response;
use UrlShorter\Common\Router\IRouter;
use UrlShorter\Exception\NotFoundException;

class Kernel
{
    /** @var IRouter */
    protected $router;

    public function __construct(IRouter $router)
    {
        $this->router = $router;
    }

    public function handle(Request $request): Response
    {
        /** @var $routeTarget */
        $routeTarget = $this->router->route($request);
        if(!class_exists($routeTarget->class, true)) {var_dump($routeTarget->class);
            throw new NotFoundException("Not found controller");
        }

        $targetClass = new $routeTarget->class;

        if(!method_exists($targetClass, $routeTarget->getMethod())) {
            throw new NotFoundException("Not found method");
        }

        /** @var Response $response */
        $response = call_user_func([$targetClass, $routeTarget->getMethod()], $request);
        return $response;
    }
}