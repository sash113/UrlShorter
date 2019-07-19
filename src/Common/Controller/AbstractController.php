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

abstract class AbstractController
{
    const MESSAGE_DEFAULT_INDEX = 'default page';

    /**
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request): Response
    {
        return new Response(self::MESSAGE_DEFAULT_INDEX);
    }
}