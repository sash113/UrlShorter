<?php
declare(strict_types=1);

namespace UrlShorter\Controller;

use UrlShorter\Common\Controller\AbstractController;
use UrlShorter\Common\Http\Request;
use UrlShorter\Common\Http\Response;

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 09.07.19
 * Time: 3:04
 */

/**
 * Class DisplayController
 * @package UrlShorter\Controller
 */
class DisplayController extends AbstractController
{
    public function indexAction(Request $request): Response
    {
        return new Response("Hello world");
    }
}