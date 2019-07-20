<?php
declare(strict_types=1);

namespace UrlShorter\Entity;
/**
 * Created by PhpStorm.
 * User: sash
 * Date: 18.07.19
 * Time: 1:38
 */
use UrlShorter\Common\Entity\IEntity;

/**
 * Class Url
 * @package UrlShorter\Entity
 */
class Url implements IEntity
{
    /** @var string */
    private $id;

    /** @var string */
    private $url;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }
}