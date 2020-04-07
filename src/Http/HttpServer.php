<?php

namespace WorkerApp\Http;

use WorkerApp\Server\ServerAbstract;

/**
 * Class HttpServer
 * @package WorkerApp\Http
 */
class HttpServer extends ServerAbstract
{
    /**
     * @var int
     */
    public $port = 80;

    /**
     * @var HttpWorker
     */
    public $worker;

    /**
     * HttpServer constructor.
     */
    public function __construct()
    {
        $this->worker = HttpWorker::class;
    }
}