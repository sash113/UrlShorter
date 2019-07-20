<?php
declare(strict_types=1);

namespace UrlShorter\Common\Storage;

use UrlShorter\Common\DI\Container;

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 18.07.19
 * Time: 1:34
 */
abstract class AbstractRepository
{
    /** @var \PDO */
    protected $pdo;

    /** @var  IEntityHydrator */
    protected $hydrator;

    /**
     * AbstractStorage constructor.
     */
    public function __construct()
    {
        $this->pdo = Container::getInstance()->getService(\PDO::class);
        $this->hydrator = Container::getInstance()->getService(IEntityHydrator::class);
    }
}