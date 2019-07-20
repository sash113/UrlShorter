<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 20.07.19
 * Time: 1:54
 */

namespace UrlShorter\Common\DI;

/**
 * Interface IContainer
 * @package UrlShorter\Common\DI
 */
interface IContainer
{
    /**
     * @param string $containerName
     * @param object $object
     * @return mixed
     */
    public function register(string $containerName, object $object);

    /**
     * @param string $containerName
     * @return mixed
     */
    public function getService(string $containerName): ?object;
}