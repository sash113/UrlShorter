<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 20.07.19
 * Time: 1:07
 */

namespace UrlShorter\Common\DI;
use UrlShorter\Exception\BaseException;

/**
 * Class Container
 * @package UrlShorter\Common\DI
 */
class Container implements IContainer
{
    /** @var Container $instance */
    private static $instance = null;

    /** @var array */
    protected $containers = [];

    /**
     * Container constructor.
     */
    private function __construct()
    {
    }

    /**
     * @throws \Exception
     */
    protected function __clone()
    {
        throw new \Exception('__clone method not supported');
    }

    /**
     * @throws \Exception
     */
    protected function __wakeup()
    {
        throw new \Exception('__wakeup method not supported');
    }

    /**
     * @return Container
     */
    public static function getInstance(): self
    {
        if (static::$instance === null) {
            static::$instance = new static;
        }
        return static::$instance;
    }

    /**
     * @param string $containerName
     * @param object $object
     * @throws BaseException
     */
    public function register(string $containerName, object $object)
    {
        if (array_key_exists($containerName, $this->containers)) {
            throw new BaseException(sprintf('%s already registered', $containerName));
        }
        $this->containers[$containerName] = $object;
    }

    /**
     * @param string $containerName
     * @return object|null
     */
    public function getService(string $containerName): ?object
    {
        if (array_key_exists($containerName, $this->containers)) {
            return $this->containers[$containerName];
        } else {
            return null;
        }
    }
}