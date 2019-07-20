<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 19.07.19
 * Time: 22:37
 */

namespace UrlShorter\Common\Controller;


use UrlShorter\Common\DI\Container;
use UrlShorter\Common\Http\Request;
use UrlShorter\Common\Http\Response;
use UrlShorter\Common\I18n\I18n;
use UrlShorter\Common\Template\ITemplateEngine;
use UrlShorter\Common\Template\TemplateEngine;

/**
 * Class AbstractController
 * @package UrlShorter\Common\Controller
 */
abstract class AbstractController
{
    const MESSAGE_DEFAULT_INDEX = 'default page';
    
    /** @var TemplateEngine */
    protected $template;
    
    public function __construct()
    {
        $this->template = Container::getInstance()->getService(ITemplateEngine::class);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request): Response
    {
        return new Response(I18n::t(self::MESSAGE_DEFAULT_INDEX));
    }
}