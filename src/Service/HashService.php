<?php
/**
 * Created by PhpStorm.
 * User: sash
 * Date: 20.07.19
 * Time: 14:49
 */

namespace UrlShorter\Service;


class HashService
{
    public function hash(string $value): string
    {
        return md5($value);
    }
}