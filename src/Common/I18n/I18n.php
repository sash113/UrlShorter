<?php
/**
 * Created by PhpStorm.
 * User: sash
 * Date: 19.07.19
 * Time: 23:15
 */

namespace UrlShorter\Common\I18n;

/**
 * Class I18n
 * @package UrlShorter\Common\I18n
 */
class I18n
{
    /**
     * @param string $message
     * @return string
     */
    public static function t(string $message): string
    {
        return $message;
    }
}