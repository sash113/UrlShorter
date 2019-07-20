<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 20.07.19
 * Time: 15:56
 */

namespace UrlShorter\Common\Template;

/**
 * Class TemplateEngine
 * @package UrlShorter\Template
 */
class TemplateEngine
{
    /** @var string */
    private $path;

    /**
     * TemplateEngine constructor.
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function render(string $templateName): string
    {
        $templateName = preg_replace('/\\\\\/\.\0/', '', $templateName);
        return file_get_contents(
            $this->path . DIRECTORY_SEPARATOR . $templateName . '.html'
        );
    }
}