<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 19.07.19
 * Time: 22:37
 */

namespace UrlShorter\Common\Controller;


use UrlShorter\Common\Http\Request;
use UrlShorter\Common\Http\Response;
use UrlShorter\Common\I18n\I18n;

/**
 * Class AbstractController
 * @package UrlShorter\Common\Controller
 */
abstract class AbstractController
{
    const MESSAGE_DEFAULT_INDEX = 'default page';

    /**
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request): Response
    {
        return new Response(I18n::t(self::MESSAGE_DEFAULT_INDEX));
    }
}