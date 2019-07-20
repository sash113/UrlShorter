<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 20.07.19
 * Time: 2:07
 */

namespace UrlShorter\Common\Storage;

use UrlShorter\Common\Entity\IEntity;

/**
 * Class EntityHydrator
 * @package UrlShorter\Common\Storage
 */
class EntityHydrator implements IEntityHydrator
{
    /**
     * EntityHydrator constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param array $hydrated
     * @param string $className
     * @return IEntity
     */
    public function extract(array $hydrated, string $className): IEntity
    {
        $keys = get_class_methods($className);
        $entity = new $className;

        foreach ($keys as $key) {
            if ($this->isKeyNeedHydrateForSet($key)) {
                $keyNameHydrated = $this->getKeyName($key);
                $entity->{$key}($hydrated[$keyNameHydrated]);
            }
        }
        return $entity;
    }

    /**
     * @param IEntity $entity
     * @return array
     */
    public function hydrate(IEntity $entity): array
    {
        $keys = get_class_methods(get_class($entity));
        $hydrated = [];
        foreach ($keys as $key) {
            if ($this->isKeyNeedHydrateForGet($key)) {
                $keyNameHydrated = $this->getKeyName($key);
                $hydrated[$keyNameHydrated] = $entity->{$key}();
            }
        }
        return $hydrated;
    }

    /**
     * @param string $keyName
     * @return bool
     */
    private function isKeyNeedHydrateForSet(string $keyName): bool
    {
        return $this->isKeyNeedHydrate($keyName, 'set');
    }

    /**
     * @param string $keyName
     * @return bool
     */
    private function isKeyNeedHydrateForGet(string $keyName): bool
    {
        return $this->isKeyNeedHydrate($keyName, 'get');
    }

    /**
     * @param string $keyName
     * @return bool
     */
    private function isKeyNeedHydrate(string $keyName, string $prefix): bool
    {
        return (substr($keyName, 0, 3) === $prefix);
    }

    /**
     * @param string $keyName
     * @return string
     */
    protected function getKeyName(string $keyName): string
    {
        return strtolower(substr($keyName, 3, strlen($keyName)-3));
    }
}