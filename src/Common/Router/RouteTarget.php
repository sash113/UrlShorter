<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: sash
 * Date: 18.07.19
 * Time: 1:54
 */

namespace UrlShorter\Common\Router;

/**
 * Class RouteTarget
 * @package UrlShorter\Common\Router
 */
class RouteTarget
{
    /** @var string */
    public $class;

    /** @var  string */
    public $method;

    /**
     * RouteTarget constructor.
     * @param string $class
     * @param string $method
     */
    public function __construct(string $class, string $method)
    {
        $this->class = $class;
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getClass(): string
    {
        return $this->class;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }
}