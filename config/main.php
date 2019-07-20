<?php
declare(strict_types=1);

namespace UrlShorter;
/**
 * Created by PhpStorm.
 * User: sash
 * Date: 09.07.19
 * Time: 2:56
 */

use UrlShorter\Common\DI\Container;
use UrlShorter\Common\Storage\EntityHydrator;
use UrlShorter\Common\Storage\IEntityHydrator;
use UrlShorter\Repository\UrlRepository;
use UrlShorter\Service\HashService;
use UrlShorter\Service\UrlService;
use UrlShorter\Common\Template\ITemplateEngine;
use UrlShorter\Common\Template\TemplateEngine;

Container::getInstance()->register(\PDO::class,
    new \PDO(
        sprintf(
            'mysql:host=%s;dbname=%s', $_SERVER['MYSQL_HOST'], $_SERVER['MYSQL_DATABASE']
        ),
        $_SERVER['MYSQL_USER'], $_SERVER['MYSQL_PASSWORD']
    )
);

Container::getInstance()->register(IEntityHydrator::class, new EntityHydrator());
Container::getInstance()->register(HashService::class, new HashService());
Container::getInstance()->register(UrlRepository::class, new UrlRepository());
Container::getInstance()->register(UrlService::class, new UrlService());
Container::getInstance()->register(ITemplateEngine::class,
    new TemplateEngine(__DIR__ . '/../templates/')
);