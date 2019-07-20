<?php
/**
 * Created by PhpStorm.
 * User: sash
 * Date: 20.07.19
 * Time: 13:48
 */

namespace UrlShorter\Common\Storage;

use UrlShorter\Common\Entity\IEntity;

/**
 * Interface IEntityHydrator
 * @package UrlShorter\Common\Storage
 */
interface IEntityHydrator
{
    /**
     * @param array $hydrated
     * @param string $className
     * @return IEntity
     */
    public function extract(array $hydrated, string $className): IEntity;

    /**
     * @param IEntity $entity
     * @return array
     */
    public function hydrate(IEntity $entity): array;
}