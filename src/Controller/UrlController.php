<?php
declare(strict_types=1);

namespace UrlShorter\Controller;

use UrlShorter\Common\Controller\AbstractController;
use UrlShorter\Common\DI\Container;
use UrlShorter\Common\Http\Request;
use UrlShorter\Common\Http\Response;
use UrlShorter\Common\Template\TemplateEngine;
use UrlShorter\Service\UrlService;

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
class UrlController extends AbstractController
{
    /** @var UrlService */
    private $service;

    /**
     * UrlController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = Container::getInstance()->getService(UrlService::class);
    }

    public function indexAction(Request $request): Response
    {
        return new Response($this->template->render('index'));
    }

    public function newAction(Request $request): Response
    {
        return new Response($this->service->putUrl('http://google.com'));
    }

    public function redirectAction(Request $request): Response
    {

    }
}