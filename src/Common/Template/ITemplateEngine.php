<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: sash
 * Date: 20.07.19
 * Time: 16:06
 */

namespace UrlShorter\Common\Template;

/**
 * Interface ITemplateEngine
 * @package UrlShorter\Common\Template
 */
interface ITemplateEngine
{
    /**
     * @param string $templateName
     * @return string
     */
    public function render(string $templateName): string;
}