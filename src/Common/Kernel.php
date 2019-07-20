<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 18.07.19
 * Time: 1:46
 */

namespace UrlShorter\Common;

use UrlShorter\Common\DI\IContainer;
use UrlShorter\Common\DI\IDContainer;
use UrlShorter\Common\DI\IRegistry;
use UrlShorter\Common\Http\Request;
use UrlShorter\Common\Http\Response;
use UrlShorter\Common\I18n\I18n;
use UrlShorter\Common\Router\IRouter;
use UrlShorter\Exception\NotFoundException;
use UrlShorter\Service\HashService;

/**
 * Class Kernel
 * @package UrlShorter\Common
 */
class Kernel
{
    /** @var IRouter */
    protected $router;

    /**
     * Kernel constructor.
     * @param IRouter $router
     */
    public function __construct(IRouter $router)
    {
        $this->router = $router;
    }

    /**
     * @param Request $request
     * @return Response
     * @throws \Throwable
     */
    public function handle(Request $request): Response
    {
        try {
            /** @var $routeTarget */
            $routeTarget = $this->router->route($request);

            if (!class_exists($routeTarget->class, true)) {
                throw new NotFoundException(I18n::t("Not found controller"));
            }

            $targetClass = new $routeTarget->class;

            if (!method_exists($targetClass, $routeTarget->getMethod())) {
                throw new NotFoundException(I18n::t("Not found method"));
            }

            /** @var Response $response */
            $response = call_user_func([$targetClass, $routeTarget->getMethod()], $request);
            return $response;
        } catch (NotFoundException $exception) {
            return new Response(I18n::t('Not Found'), Response::HTTP_NOT_FOUND);
        }
    }
}