<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 18.07.19
 * Time: 1:50
 */

namespace UrlShorter\Common\Router;

use UrlShorter\Common\Http\Request;

/**
 * Interface IRouter
 * @package UrlShorter\Common\Router
 */
interface IRouter
{
    /**
     * @param Request $request
     * @return RouteTarget
     */
    public function route(Request $request): RouteTarget;
}