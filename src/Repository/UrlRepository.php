<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: sash
 * Date: 20.07.19
 * Time: 12:10
 */

namespace UrlShorter\Repository;

use UrlShorter\Common\Storage\AbstractRepository;
use UrlShorter\Entity\Url;

class UrlRepository extends AbstractRepository
{
    /**
     * @param Url $entity
     * @throws \Throwable
     */
    public function saveUrl(Url $entity)
    {
        $statement = $this->pdo->prepare('INSERT INTO url(id, url) VALUES(:id, :url)');
        $statement->execute($this->hydrator->hydrate($entity));
    }

    public function fetchUrl(): Url
    {
        
    }
}