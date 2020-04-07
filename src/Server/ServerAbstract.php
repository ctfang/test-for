<?php


namespace WorkerApp\Server;

use Workerman\Worker;

/**
 * Class ServerAbstract
 * @package WorkerApp\Server
 */
class ServerAbstract
{
    /**
     * @var bool 标识启动
     */
    public $runInAll = false;

    /**
     * @var string
     */
    public $type = "http";

    /**
     * @var int
     */
    public $port = 80;

    /**
     * @var
     */
    public $event;

    /**
     * @var string
     */
    public $host = '0.0.0.0';

    /**
     * @var array
     */
    public $context_option = [];

    /**
     * @var Worker
     */
    public $worker;

    /**
     * init
     */
    public function newWorker()
    {
        $class = $this->worker;
        $this->worker = new $class($this->type."://".$this->host.":".$this->port,$this->context_option);
    }
}