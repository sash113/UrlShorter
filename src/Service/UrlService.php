<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 20.07.19
 * Time: 14:47
 */

namespace UrlShorter\Service;


use UrlShorter\Common\DI\Container;
use UrlShorter\Common\Entity\IEntity;
use UrlShorter\Entity\Url;
use UrlShorter\Repository\UrlRepository;

class UrlService
{
    /** @var HashService */
    private $hashService;

    /** @var UrlRepository */
    private $urlRepository;

    public function __construct()
    {
        $this->hashService = Container::getInstance()->getService(HashService::class);
        $this->urlRepository = Container::getInstance()->getService(UrlRepository::class);
    }

    /**
     * @param string $url
     * @return string
     * @throws \Throwable
     */
    public function putUrl(string $url): string
    {
        $entity = new Url();
        $hash = $this->hashService->hash($url);
        $entity->setId($hash);
        $entity->setUrl($url);
        $this->urlRepository->saveUrl($entity);
        return $hash;
    }

    /**
     * @return IEntity
     */
    public function fetchUrl(): IEntity
    {

    }
}