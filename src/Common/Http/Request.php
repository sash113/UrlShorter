<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 17.07.19
 * Time: 0:48
 */

namespace UrlShorter\Common\Http;

/**
 * Class Request
 * @package UrlShorter\Common\Http
 */
class Request
{
    const METHOD_HEAD = 'HEAD';
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_PATCH = 'PATCH';
    const METHOD_DELETE = 'DELETE';
    const METHOD_PURGE = 'PURGE';
    const METHOD_OPTIONS = 'OPTIONS';
    const METHOD_TRACE = 'TRACE';
    const METHOD_CONNECT = 'CONNECT';

    /**
     * Request path
     *
     * @var string
     */
    protected $requestUri;

    /**
     * Query string parameters ($_GET).
     *
     * @var array
     */
    protected $query;

    /**
     * Query string parameters ($_POST).
     *
     * @var array
     */
    protected $post;

    /**
     * Server and execution environment parameters ($_SERVER).
     *
     * @var array
     */
    protected $server;

    /**
     * Uploaded files ($_FILES).
     *
     * @var array
     */
    protected $files;

    /**
     * Cookies ($_COOKIE).
     *
     * @var array
     */
    protected $cookies;

    /**
     * Headers (taken from the $_SERVER).
     *
     * @var array
     */
    protected $headers;

    /**
     * Request constructor.
     * @param string $requestUri
     * @param array $query
     * @param array $post
     * @param array $cookies
     * @param array $files
     * @param array $headers
     * @param array $server
     */
    public function __construct(string $requestUri, array $query = [], array $post = [], array $cookies = [], array $files = [], array $headers = [], array $server = [])
    {
        $this->requestUri = $requestUri;
        $this->query = $query;
        $this->post = $post;
        $this->cookies = $cookies;
        $this->files = $files;
        $this->headers = $headers;
        $this->server = $server;
    }

    /**
     * @return string
     */
    public function getRequestUri(): string
    {
        return $this->requestUri;
    }

    /**
     * @param string $requestUri
     */
    public function setRequest(string $requestUri)
    {
        $this->requestUri = $requestUri;
    }

    /**
     * @return array
     */
    public function getQuery(): array
    {
        return $this->query;
    }

    /**
     * @param array $query
     */
    public function setQuery(array $query)
    {
        $this->query = $query;
    }

    /**
     * @return array
     */
    public function getPost(): array
    {
        return $this->post;
    }

    /**
     * @param array $post
     */
    public function setPost(array $post)
    {
        $this->post = $post;
    }

    /**
     * @return array
     */
    public function getCookies(): array
    {
        return $this->cookies;
    }

    /**
     * @param array $cookies
     */
    public function setCookies(array $cookies)
    {
        $this->cookies = $cookies;
    }

    /**
     * @return array
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param $files
     */
    public function setFiles($files)
    {
        $this->files = $files;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }

    /**
     * @return array
     */
    public function getServer(): array
    {
        return $this->server;
    }

    /**
     * @param array $server
     */
    public function setServer(array $server)
    {
        $this->server = $server;
    }
}