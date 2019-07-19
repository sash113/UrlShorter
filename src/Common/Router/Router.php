<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 18.07.19
 * Time: 1:49
 */

namespace UrlShorter\Common\Router;

use UrlShorter\Common\Http\Request;

/**
 * Class Router
 * @package UrlShorter\Common\Router
 */
class Router implements IRouter
{
    protected $namespace;

    /**
     * Router constructor.
     * @param string $namespace
     */
    public function __construct(string $namespace)
    {
        $this->namespace = $namespace;
    }

    /**
     * @param Request $request
     * @return RouteTarget
     */
    public function route(Request $request): RouteTarget
    {
        /** @var array $pathParts */
        $pathParts = explode('/', trim($request->getRequestUri(), '/'));

        // Get controller name - penultimate part
        /** @var string $className */
        $className = sprintf("%s\\%sController",
            $this->namespace,
            ucfirst(strtolower($pathParts[0]))
        );

        // Get method name - last part
        if (!empty($pathParts[1])) {
            $methodName = ucfirst(strtolower($pathParts[1]));
        } else {
            $methodName = 'index';
        }

        /** @var string $methodName */
        $methodName = sprintf("%sAction", $methodName);
        return new RouteTarget($className, $methodName);
    }
}